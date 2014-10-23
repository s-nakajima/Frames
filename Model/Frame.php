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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Box' => array(
			'className' => 'Box',
			'foreignKey' => 'box_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Plugin' => array(
			'className' => 'Plugin',
			'foreignKey' => false,
			'conditions' => array('Frame.plugin_key = Plugin.key'),
			'fields' => '',
			'order' => ''
		),
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Block' => array(
			'className' => 'Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Get query option for containable behavior
 *
 * @return array
 */
	public function getContainableQuery() {
		$query = array(
			'order' => array(
				'Frame.weight'
			),
			'Language' => array(
				'conditions' => array(
					'Language.code' => 'ja'
				)
			),
			'Plugin'
		);

		return $query;
	}

/**
 * Save frame to master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @param array $data request data
 * @throws Exception
 * @return mixed On success Model::$data if its not empty or true, false on failure
 */
	public function saveFrame($data) {
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		$this->set('weight', 1);			// It should use OrderedBehavior
		$this->set('is_published', true);	// It should check parts

		try {
			$frame = $this->save($data);
			if (!$frame) {
				throw new Exception();
			}

			$dataSource->commit();
			return $frame;

		} catch (Exception $e) {
			$dataSource->rollback();
			return false;
		}
	}

/**
 * Delete frame from master data source
 * Is it better to use before after method?
 * If so, is it okay to use beforeValidate?
 *
 * @throws Exception
 * @return bool True on success
 */
	public function deleteFrame() {
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			if (!$this->delete()) {
				throw new Exception();
			}

			$dataSource->commit();
			return true;

		} catch (Exception $e) {
			$dataSource->rollback();
			return false;
		}
	}

}
