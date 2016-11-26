<?php
/**
 * FramesLanguageFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesLanguageFixture', 'Frames.Test/Fixture');

/**
 * FramesLanguageFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Blocks\Test\Fixture
 */
class FramesLanguage4framesFixture extends FramesLanguageFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'FramesLanguage';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'frames_languages';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//ヘッダー
		array(
			'id' => '2',
			'language_id' => '2',
			'frame_id' => '2',
			'name' => 'Test frame header',
			'is_original' => true,
			'is_translation' => false,
		),
		//レフト
		array(
			'id' => '4',
			'language_id' => '2',
			'frame_id' => '4',
			'name' => 'Test frame major',
			'is_original' => true,
			'is_translation' => false,
		),
		//ライト
		array(
			'id' => '8',
			'language_id' => '2',
			'frame_id' => '8',
			'name' => 'Test frame minor',
			'is_original' => true,
			'is_translation' => false,
		),
		//フッター
		array(
			'id' => '10',
			'language_id' => '2',
			'frame_id' => '10',
			'name' => 'Test frame footer',
			'is_original' => true,
			'is_translation' => false,
		),
		//メイン
		array(
			'id' => '6',
			'language_id' => '2',
			'frame_id' => '6',
			'name' => 'Test frame main',
			'is_original' => true,
			'is_translation' => false,
		),
		//フレーム削除（論理削除）
		array(
			'id' => '12',
			'language_id' => '2',
			'frame_id' => '12',
			'name' => 'Test frame main 2',
			'is_original' => true,
			'is_translation' => false,
		),
		//フレームのブロックなし
		array(
			'id' => '14',
			'language_id' => '2',
			'frame_id' => '14',
			'name' => 'Test frame main 3',
			'is_original' => true,
			'is_translation' => false,
		),
		//メイン(別ルーム(room_id=5))
		array(
			'id' => '16',
			'language_id' => '2',
			'frame_id' => '16',
			'name' => 'Test frame main',
			'is_original' => true,
			'is_translation' => false,
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'id' => '18',
			'language_id' => '2',
			'frame_id' => '18',
			'name' => 'Test frame main',
			'is_original' => true,
			'is_translation' => false,
		),
	);

/**
 * Initialize the fixture.
 *
 * @return void
 */
	public function init() {
		parent::init();
	}

}
