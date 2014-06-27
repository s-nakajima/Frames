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
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesAppModel', 'Frames.Model');

/**
 * Summary for Frame Model
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
		'ParentFrame' => array(
			'className' => 'Frame',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Plugin' => array(
			'className' => 'Plugin',
			'foreignKey' => 'plugin_id',
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ChildFrame' => array(
			'className' => 'Frame',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Language' => array(
			'className' => 'Language',
			'joinTable' => 'frames_languages',
			'foreignKey' => 'frame_id',
			'associationForeignKey' => 'language_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * findBlockIdByFrameId
 *
 * @param integer $frameId frameId
 * @return mixed $blockId or false
 */
	public function findBlockIdByFrameId($frameId) {
		$frame = $this->find('first', array(
			'fields' => array('Frame.id', 'Block.id'),
			'recursive' => -1,
			'conditions' => array('Frame.id' => $frameId),
			'joins' => array(
				array(
					"type" => "LEFT",
					"table" => "blocks",
					"alias" => "Block",
					"conditions" => array(
						'Frame.block_id = Block.id'
					)
				)
			),
		));
		if (!isset($frame['Frame']['id'])) {
			return false;
		}
		if (!isset($frame['Block']['id'])) {
			return 0;	// BlockIDが設定されていない。
		}
		return $frame['Block']['id'];
	}

}
