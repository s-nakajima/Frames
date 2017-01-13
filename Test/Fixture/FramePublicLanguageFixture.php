<?php
/**
 * FramePublicLanguageFixture
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

/**
 * Summary for FramePublicLanguageFixture
 */
class FramePublicLanguageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
		'frame_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'フレームID'),
		'is_public' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'key' => 'index', 'comment' => '公開かどうか'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'language_id' => array('column' => array('is_public', 'language_id', 'frame_id', 'id'), 'unique' => 0)
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
			'language_id' => 1,
			'frame_id' => 1,
			'is_public' => 1,
			'created_user' => 1,
			'created' => '2017-01-13 02:20:11',
			'modified_user' => 1,
			'modified' => '2017-01-13 02:20:11'
		),
	);

/**
 * Initialize the fixture.
 *
 * @return void
 */
	public function init() {
		require_once App::pluginPath('Frames') . 'Config' . DS . 'Schema' . DS . 'schema.php';
		$this->fields = (new FramesSchema())->tables[Inflector::tableize($this->name)];

		parent::init();
	}

}
