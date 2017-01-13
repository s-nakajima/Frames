<?php
/**
 * FramesLanguageFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * FramesLanguageFixture
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Blocks\Test\Fixture
 */
class FramesLanguageFixture extends CakeTestFixture {

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//メイン
		array(
			'id' => '6',
			'language_id' => '2',
			'frame_id' => '6',
			'name' => 'Test frame main',
			'is_origin' => true,
			'is_translation' => false,
		),
		//フレーム削除（論理削除）
		array(
			'id' => '12',
			'language_id' => '2',
			'frame_id' => '12',
			'name' => 'Test frame main 2',
			'is_origin' => true,
			'is_translation' => false,
		),
		//フレームのブロックなし
		array(
			'id' => '14',
			'language_id' => '2',
			'frame_id' => '14',
			'name' => 'Test frame main 3',
			'is_origin' => true,
			'is_translation' => false,
		),
		//メイン(別ルーム(room_id=5))
		array(
			'id' => '16',
			'language_id' => '2',
			'frame_id' => '16',
			'name' => 'Test frame main',
			'is_origin' => true,
			'is_translation' => false,
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'id' => '18',
			'language_id' => '2',
			'frame_id' => '18',
			'name' => 'Test frame main',
			'is_origin' => true,
			'is_translation' => false,
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
