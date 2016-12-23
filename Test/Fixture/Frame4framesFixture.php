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
			'id' => '2',
			'room_id' => '1',
			'box_id' => '1',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_header',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//レフト
		array(
			'id' => '4',
			'room_id' => '1',
			'box_id' => '2',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_major',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//ライト
		array(
			'id' => '8',
			'room_id' => '1',
			'box_id' => '3',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_minor',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//フッター
		array(
			'id' => '10',
			'room_id' => '1',
			'box_id' => '4',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_footer',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//メイン
		array(
			'id' => '6',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_3',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//フレーム削除（論理削除）
		array(
			'id' => '12',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => '2',
			'key' => 'frame_6',
			'weight' => '2',
			'is_deleted' => '1',
		),
		//フレームのブロックなし
		array(
			'id' => '14',
			'room_id' => '2',
			'box_id' => '28',
			'plugin_key' => 'test_frames',
			'block_id' => null,
			'key' => 'frame_7',
			'weight' => '2',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=5))
		array(
			'id' => '16',
			'room_id' => '5',
			'box_id' => '47',
			'plugin_key' => 'test_frames',
			'block_id' => '8',
			'key' => 'frame_8',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'id' => '18',
			'room_id' => '6',
			'box_id' => '61',
			'plugin_key' => 'test_frames',
			'block_id' => '9',
			'key' => 'frame_9',
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
