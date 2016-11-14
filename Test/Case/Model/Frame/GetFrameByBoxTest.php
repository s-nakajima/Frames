<?php
/**
 * Frame::getFrameByBox()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesGetTest', 'Frames.TestSuite');

/**
 * Frame::getFrameByBox()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Case\Model\Frame
 */
class FrameGetFrameByBoxTest extends FramesGetTest {

/**
 * Model name
 *
 * @var string
 */
	protected $_modelName = 'Frame';

/**
 * Method name
 *
 * @var string
 */
	protected $_methodName = 'getFrameByBox';

/**
 * getFrameByBox()のテスト
 *
 * @return void
 */
	public function testGetFrameByBox() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//データ生成
		$boxId = '1';

		//テスト実施
		$result = $this->$model->$methodName($boxId);

		//チェック
		$expected = array(
			0 => array(
				'id' => '2',
				'language_id' => '2',
				'room_id' => '2',
				'box_id' => '1',
				'plugin_key' => 'test_frames',
				'block_id' => '2',
				'key' => 'frame_header',
				'name' => 'Test frame header',
				'header_type' => 'default',
				'weight' => '1',
				'is_deleted' => false,
				'default_action' => '',
				'created_user' => null,
				'created' => null,
				'modified_user' => null,
				'modified' => null,
			),
		);
		$this->assertEquals($result, $expected);
	}

}
