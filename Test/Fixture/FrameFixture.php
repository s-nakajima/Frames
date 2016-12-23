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
 * FrameFixture
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Blocks\Test\Fixture
 */
class FrameFixture extends CakeTestFixture {

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//メイン
		array(
			'id' => '6',
			'room_id' => '2',
			'box_id' => '27',
			'plugin_key' => 'test_plugin',
			'block_id' => '2',
			'key' => 'frame_3',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//フレーム削除（論理削除）
		array(
			'id' => '12',
			'room_id' => '2',
			'box_id' => '27',
			'plugin_key' => 'test_plugin',
			'block_id' => '2',
			'key' => 'frame_6',
			'weight' => '2',
			'is_deleted' => '1',
		),
		//フレームのブロックなし
		array(
			'id' => '14',
			'room_id' => '2',
			'box_id' => '27',
			'plugin_key' => 'test_plugin',
			'block_id' => null,
			'key' => 'frame_7',
			'weight' => '2',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=5))
		array(
			'id' => '16',
			'room_id' => '5',
			'box_id' => '42',
			'plugin_key' => 'test_plugin',
			'block_id' => null,
			'key' => 'frame_8',
			'weight' => '1',
			'is_deleted' => '0',
		),
		//メイン(別ルーム(room_id=6、ブロックなし))
		array(
			'id' => '18',
			'room_id' => '6',
			'box_id' => '51',
			'plugin_key' => 'test_plugin',
			'block_id' => null,
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
		require_once App::pluginPath('Frames') . 'Config' . DS . 'Schema' . DS . 'schema.php';
		$this->fields = (new FramesSchema())->tables['frames'];

		if (class_exists('NetCommonsTestSuite') && NetCommonsTestSuite::$plugin) {
			$records = array_keys($this->records);
			foreach ($records as $i) {
				if ($this->records[$i]['plugin_key'] === 'test_plugin') {
					$this->records[$i]['plugin_key'] = NetCommonsTestSuite::$plugin;
				}
			}
		}
		parent::init();
	}

}
