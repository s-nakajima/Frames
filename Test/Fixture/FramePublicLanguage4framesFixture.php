<?php
/**
 * FrameFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramePublicLanguageFixture', 'Frames.Test/Fixture');

/**
 * FrameFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Fixture
 */
class FramePublicLanguage4framesFixture extends FramePublicLanguageFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'FramePublicLanguage';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'frame_public_languages';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//ヘッダー
		array(
			'frame_id' => '2',
			'language_id' => '0',
			'is_public' => '1',
		),
		//レフト
		array(
			'frame_id' => '4',
			'language_id' => '0',
			'is_public' => '1',
		),
		//ライト
		array(
			'frame_id' => '8',
			'language_id' => '0',
			'is_public' => '1',
		),
		//フッター
		array(
			'frame_id' => '10',
			'language_id' => '0',
			'is_public' => '1',
		),
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
		parent::init();
	}

}
