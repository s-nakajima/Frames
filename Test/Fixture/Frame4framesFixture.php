<?php
/**
 * FrameFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FrameFixture', 'Frames.Test/Fixture');

/**
 * FrameFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Blocks\Test\Fixture
 */
class Frame4framesFixture extends FrameFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'Frame';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'frames';

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//ヘッダー
		array(
			'id' => '1',
			'language_id' => '1',
			'room_id' => '1',
			'box_id' => '1',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_header',
			'name' => 'Test frame header',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '2',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '1',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_header',
			'name' => 'Test frame header',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//レフト
		array(
			'id' => '3',
			'language_id' => '1',
			'room_id' => '1',
			'box_id' => '2',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_left',
			'name' => 'Test frame left',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '4',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '2',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_major',
			'name' => 'Test frame major',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//ライト
		array(
			'id' => '7',
			'language_id' => '1',
			'room_id' => '1',
			'box_id' => '3',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_right',
			'name' => 'Test frame right',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '8',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '3',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_minor',
			'name' => 'Test frame minor',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//フッター
		array(
			'id' => '9',
			'language_id' => '1',
			'room_id' => '1',
			'box_id' => '4',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_footer',
			'name' => 'Test frame footer',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '10',
			'language_id' => '2',
			'room_id' => '1',
			'box_id' => '4',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_footer',
			'name' => 'Test frame footer',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//メイン
		array(
			'id' => '5',
			'language_id' => '1',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_3',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '6',
			'language_id' => '2',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_3',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//フレーム削除（論理削除）
		array(
			'id' => '11',
			'language_id' => '1',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '1',
			'key' => 'frame_6',
			'name' => 'Test frame main 2',
			'weight' => '2',
			'is_deleted' => '1',
		),
		array(
			'id' => '12',
			'language_id' => '2',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_6',
			'name' => 'Test frame main 2',
			'weight' => '2',
			'is_deleted' => '1',
		),
		//フレームのブロックなし
		array(
			'id' => '13',
			'language_id' => '1',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => null,
			'key' => 'frame_7',
			'name' => 'Test frame main 3',
			'weight' => '2',
			'is_deleted' => '0',
		),
		array(
			'id' => '14',
			'language_id' => '2',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => null,
			'key' => 'frame_7',
			'name' => 'Test frame main 3',
			'weight' => '2',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=5))
		array(
			'id' => '15',
			'language_id' => '1',
			'room_id' => '5',
			'box_id' => '47',
			'plugin_key' => 'test_frames',
			'block_id' => '7',
			'key' => 'frame_8',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '16',
			'language_id' => '2',
			'room_id' => '5',
			'box_id' => '47',
			'plugin_key' => 'test_frames',
			'block_id' => '8',
			'key' => 'frame_8',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'id' => '17',
			'language_id' => '1',
			'room_id' => '6',
			'box_id' => '61',
			'plugin_key' => 'test_frames',
			'block_id' => '8',
			'key' => 'frame_9',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
		),
		array(
			'id' => '18',
			'language_id' => '2',
			'room_id' => '6',
			'box_id' => '61',
			'plugin_key' => 'test_frames',
			'block_id' => '9',
			'key' => 'frame_9',
			'name' => 'Test frame main',
			'weight' => '1',
			'is_deleted' => '0',
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
