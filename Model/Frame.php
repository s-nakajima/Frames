<?php
/**
 * Frame Model
 *
 * @property Plugin $Plugin
 * @property Block $Block
 * @property Box $Box
 * @property Frame $ParentFrame
 * @property Frame $ChildFrame
 * @property Language $Language
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesAppModel', 'Frames.Model');

/**
 * Summary for Frame Model
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Model
 */
class Frame extends FramesAppModel {

/**
 * use behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'NetCommons.OriginalKey',
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Box' => array(
			'className' => 'Boxes.Box',
			'foreignKey' => 'box_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Plugin' => array(
			'className' => 'PluginManager.Plugin',
			'foreignKey' => false,
			'conditions' => array('Frame.plugin_key = Plugin.key'),
			'fields' => '',
			'order' => ''
		),
		'Language' => array(
			'className' => 'M17n.Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Block' => array(
			'className' => 'Blocks.Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Room' => array(
			'className' => 'Rooms.Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Get query option for containable behavior
 *
 * @param int $languageId languages.id
 * @return array
 */
	public function getContainableQuery($languageId = null) {
		if (! isset($languageId)) {
			$languageId = Configure::read('Config.languageId');
		}
		$query = array(
			'conditions' => array(
				'language_id' => $languageId,
				'is_deleted' => false
			),
			'order' => array(
				'Frame.weight'
			),
		);

		return $query;
	}

/**
 * getMaxWeight
 *
 * @param int $boxId boxes.id
 * @param int $languageId languages.id
 * @return int $weight link_orders.weight
 */
	public function getMaxWeight($boxId, $languageId = null) {
		if (! isset($languageId)) {
			$languageId = Configure::read('Config.languageId');
		}

		$order = $this->find('first', array(
				'recursive' => -1,
				'fields' => array('weight'),
				'conditions' => array(
					'language_id' => $languageId,
					'box_id' => $boxId
				),
				'order' => array('weight' => 'DESC')
			));

		if (isset($order[$this->alias]['weight'])) {
			$weight = (int)$order[$this->alias]['weight'];
		} else {
			$weight = 0;
		}
		return $weight;
	}

/**
 * Save frame to master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @param array $data request data
 * @throws InternalErrorException
 * @return mixed On success Model::$data if its not empty or true, false on failure
 */
	public function saveFrame($data) {
		$plugin = Inflector::camelize($data[$this->alias]['plugin_key']);
		$model = Inflector::singularize($plugin);
		$classExists = ClassRegistry::init($plugin . '.' . $model, true);
		$models = [];
		if ($classExists) {
			$models[$model] = $plugin . '.' . $model;
		}
		$this->loadModels($models);

		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			if ($data['Frame']['is_deleted']) {
				//論理削除の場合、カウントDown
				$this->__saveWeight($data, -1);
				$data['Frame']['weight'] = null;
			} elseif (! isset($data['Frame']['id']) || ! $data['Frame']['id']) {
				//カウントUp
				$data['Frame']['weight'] = $this->getMaxWeight($data['Frame']['box_id']) + 1;
				$this->__saveWeight($data, 1);
			}

			$frame = $this->save($data);
			if (! $frame) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			if ($this->{$model} instanceof Model && method_exists($this->{$model}, 'afterFrameSave')) {
				$this->{$model}->afterFrameSave($frame);
			}

			$dataSource->commit();
			return $frame;

		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}
	}

/**
 * Save frame to master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @param array $data request data
 * @param array $order Param is 'up' or 'down'
 * @throws InternalErrorException
 * @return mixed On success Model::$data if its not empty or true, false on failure
 */
	public function saveWeight($data, $order) {
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			if ($order === 'up') {
				$data['Frame']['weight']--;
				$this->__saveWeight($data, 1, '=');
			} else {
				$data['Frame']['weight']++;
				$this->__saveWeight($data, -1, '=');
			}

			$this->id = (int)$data['Frame']['id'];
			if (! $this->saveField('weight', $data['Frame']['weight'])) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$dataSource->commit();
			return true;

		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}
	}

/**
 * Save frame to master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @param array $data request data
 * @param int $sequence Count sequence
 * @param string $sign Sign
 * @throws InternalErrorException
 * @return mixed On success void if it not throw exception on failure
 */
	private function __saveWeight($data, $sequence, $sign = null) {
		if (! isset($sign)) {
			if ($sequence > 0) {
				$sign = '>=';
			} else {
				$sign = '>';
			}
		}

		if (! $this->updateAll(
			array('Frame.weight' => 'Frame.weight + (' . $sequence . ')'),
			array(
				'Frame.weight ' . $sign . ' ' => $data['Frame']['weight'],
				'Frame.box_id' => $data['Frame']['box_id'],
				'Frame.is_deleted' => false,
			)
		)) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}
	}

/**
 * Delete frame from master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @throws InternalErrorException
 * @return bool True on success
 */
	public function deleteFrame() {
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			if (!$this->delete()) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$dataSource->commit();
			return true;

		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}
	}

}
