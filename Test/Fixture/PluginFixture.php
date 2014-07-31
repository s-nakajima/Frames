<?php
/**
 * PluginFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for PluginFixture
 */
class PluginFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'folder' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null),
		'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '1:for frame,2:for controll panel'),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
		public $records = array(
		array(
			'id' => 1,
			'folder' => 'test_plugin',
			'weight' => 1,
			'type' => 1,
			'created_user_id' => 1,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 1,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 2,
			'folder' => '',
			'weight' => 2,
			'type' => 2,
			'created_user_id' => 2,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 2,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 3,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 3,
			'type' => 3,
			'created_user_id' => 3,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 3,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 4,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 4,
			'type' => 4,
			'created_user_id' => 4,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 4,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 5,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 5,
			'type' => 5,
			'created_user_id' => 5,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 5,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 6,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 6,
			'type' => 6,
			'created_user_id' => 6,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 6,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 7,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 7,
			'type' => 7,
			'created_user_id' => 7,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 7,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 8,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 8,
			'type' => 8,
			'created_user_id' => 8,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 8,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 9,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 9,
			'type' => 9,
			'created_user_id' => 9,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 9,
			'modified' => '2014-07-25 08:16:24'
		),
		array(
			'id' => 10,
			'folder' => 'Lorem ipsum dolor sit amet',
			'weight' => 10,
			'type' => 10,
			'created_user_id' => 10,
			'created' => '2014-07-25 08:16:24',
			'modified_user_id' => 10,
			'modified' => '2014-07-25 08:16:24'
		),
	);

}
