<?php
/**
 * Frame::getContainableQuery()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesModelTestCase', 'Frames.TestSuite');

/**
 * Frame::getContainableQuery()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Case\Model\Frame
 */
class FrameGetContainableQueryTest extends FramesModelTestCase {

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'frames';

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
	protected $_methodName = 'getContainableQuery';

/**
 * getContainableQuery()のテスト
 *
 * @return void
 */
	public function testGetContainableQuery() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//データ生成

		//テスト実施
		$result = $this->$model->$methodName();

		//チェック
		$expected = array(
			'conditions' => array(
				'language_id' => '2',
				'is_deleted' => false,
			),
			'order' => array(
				0 => 'Frame.weight',
			),
		);
		$this->assertEquals($result, $expected);
	}

}
