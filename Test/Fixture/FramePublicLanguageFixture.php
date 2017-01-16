<?php
/**
 * FramePublicLanguageFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * FramePublicLanguageFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Fixture
 */
class FramePublicLanguageFixture extends CakeTestFixture {

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//メイン
		array(
			'frame_id' => '6',
			'language_id' => '0',
			'is_public' => '1',
		),
		//フレーム削除（論理削除）
		array(
			'frame_id' => '12',
			'language_id' => '0',
			'is_public' => '1',
		),
		//フレームのブロックなし
		array(
			'frame_id' => '14',
			'language_id' => '0',
			'is_public' => '1',
		),
		//メイン(別ルーム(room_id=5))
		array(
			'frame_id' => '16',
			'language_id' => '0',
			'is_public' => '1',
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'frame_id' => '18',
			'language_id' => '0',
			'is_public' => '1',
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
