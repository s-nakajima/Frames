<?php
/**
 * FrameFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for FrameFixture
 */
class FrameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'room_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'box_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'plugin_key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'block_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Key of the frame.', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Name of the frame.', 'charset' => 'utf8'),
		'header_type' => array('type' => 'string', 'null' => false, 'default' => 'default', 'collate' => 'utf8_general_ci', 'comment' => 'Header type of the frame.', 'charset' => 'utf8'),
		'translation_engine' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_first_auto_translation' => array('type' => 'boolean', 'null' => false),
		'is_auto_translated' => array('type' => 'boolean', 'null' => false),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'Display order.'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'language_id' => 2,
			'room_id' => 1,
			'box_id' => 1,
			'plugin_key' => 'test_plugin',
			'block_id' => 5,
			'key' => 'frame_1',
			'name' => 'Test frame name 1',
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 1,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 2,
			'language_id' => 2,
			'room_id' => 2,
			'box_id' => 2,
			'plugin_key' => 'test_plugin',
			'block_id' => 2,
			'key' => 'frame_2',
			'name' => 'Test frame name 2',
			'weight' => 2,
			'created_user' => 2,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 2,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 3,
			'language_id' => 2,
			'room_id' => 3,
			'box_id' => 3,
			'plugin_key' => 'plugin_3',
			'block_id' => 3,
			'key' => 'frame_3',
			'name' => 'Test frame name 3',
			'weight' => 3,
			'created_user' => 3,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 3,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 4,
			'language_id' => 2,
			'room_id' => 4,
			'box_id' => 4,
			'plugin_key' => 'plugin_4',
			'block_id' => 4,
			'key' => 'frame_4',
			'name' => 'Test frame name 4',
			'weight' => 4,
			'created_user' => 4,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 4,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 5,
			'language_id' => 2,
			'room_id' => 5,
			'box_id' => 5,
			'plugin_key' => 'plugin_5',
			'block_id' => 5,
			'key' => 'frame_5',
			'name' => 'Test frame name 5',
			'weight' => 5,
			'created_user' => 5,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 5,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 6,
			'language_id' => 2,
			'room_id' => 6,
			'box_id' => 6,
			'plugin_key' => 'plugin_6',
			'block_id' => 6,
			'key' => 'frame_6',
			'name' => 'Test frame name 6',
			'weight' => 6,
			'created_user' => 6,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 6,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 7,
			'language_id' => 2,
			'room_id' => 7,
			'box_id' => 7,
			'plugin_key' => 'plugin_7',
			'block_id' => 7,
			'weight' => 7,
			'key' => 'frame_7',
			'name' => 'Test frame name 7',
			'created_user' => 7,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 7,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 8,
			'language_id' => 2,
			'room_id' => 8,
			'box_id' => 8,
			'plugin_key' => 'plugin_8',
			'block_id' => 8,
			'key' => 'frame_8',
			'name' => 'Test frame name 8',
			'weight' => 8,
			'created_user' => 8,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 8,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 9,
			'language_id' => 2,
			'room_id' => 9,
			'box_id' => 9,
			'plugin_key' => 'plugin_9',
			'block_id' => 9,
			'key' => 'frame_9',
			'name' => 'Test frame name 9',
			'weight' => 9,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 9,
			'modified' => '2014-07-25 08:10:53'
		),
		array(
			'id' => 10,
			'language_id' => 2,
			'room_id' => 10,
			'box_id' => 10,
			'plugin_key' => 'plugin_10',
			'block_id' => 10,
			'key' => 'frame_10',
			'name' => 'Test frame name 10',
			'weight' => 10,
			'created_user' => 10,
			'created' => '2014-07-25 08:10:53',
			'modified_user' => 10,
			'modified' => '2014-07-25 08:10:53'
		),

		// Frame just placed into page w/o block.
		// This situation typically occur after placing new plugin into page.
		array(
			'id' => 11,
			'language_id' => 2,
			'room_id' => 11,
			'box_id' => 11,
			'plugin_key' => 'plugin_11',
			'block_id' => null,
			'key' => 'frame_11',
			'name' => 'Test frame name 11',
			'weight' => 11,
			'created_user' => 11,
			'created' => '2014-07-25 08:11:53',
			'modified_user' => 11,
			'modified' => '2014-07-25 08:11:53'
		),

		//Faqs plugin
		array(
			'id' => '100',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '1',
			'plugin_key' => 'faqs',
			'block_id' => '100',
			'key' => 'frame_100',
			'name' => 'Test frame name 100',
			'weight' => 1,
		),
		array(
			'id' => '101',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '1',
			'plugin_key' => 'faqs',
			'block_id' => '101',
			'key' => 'frame_101',
			'name' => 'Test frame name 101',
			'weight' => 1,
		),
		array(
			'id' => '102',
			'language_id' => '2',
			'room_id' => '2',
			'box_id' => '1',
			'plugin_key' => '',
			'block_id' => null,
			'key' => 'frame_102',
			'name' => 'Test frame name 102',
			'weight' => 1,
		),
		array(
			'id' => '103',
			'language_id' => '2',
			'room_id' => '3',
			'box_id' => '1',
			'plugin_key' => '',
			'block_id' => null,
			'key' => 'frame_105',
			'name' => 'Test frame name 105',
			'weight' => 1,
		),

	);

}
