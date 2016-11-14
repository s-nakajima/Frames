<?php
/**
 * Frame::saveFrame()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesSaveTest', 'Frames.TestSuite');
App::uses('FrameFixture', 'Frames.Test/Fixture');

/**
 * Frame::saveFrame()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Case\Model\Frame
 */
class FrameSaveFrameTest extends FramesSaveTest {

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
	protected $_methodName = 'saveFrame';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Frames', 'TestFrames');
	}

/**
 * Save用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *
 * @return array テストデータ
 */
	public function dataProviderSave() {
		$data = array(
			'Frame' => array(
				'id' => '6',
				'box_id' => '28',
				'language_id' => '2',
				'room_id' => '2',
				'name' => 'Edit name',
				'header_type' => 'success',
				'key' => 'frame_3',
				'plugin_key' => 'test_frames',
				'is_deleted' => false,
				'weight' => '1',
			),
		);

		$results = array();
		// * 編集の登録処理
		$results[0] = array($data);
		// * 新規の登録処理
		$results[1] = array($data);
		$results[1] = Hash::insert($results[1], '0.Frame.id', null);
		$results[1] = Hash::insert($results[1], '0.Frame.key', null);
		$results[1] = Hash::remove($results[1], '0.Frame.created_user');
		// * 論理削除処理
		$results[2] = array($data);
		$results[2] = Hash::insert($results[2], '0.Frame.is_deleted', true);

		return $results;
	}

/**
 * 期待値の取得
 *
 * @param int $id ID
 * @param array $data 登録データ
 * @param array $before 登録前データ
 * @param bool $created 作成かどうか
 * @return array
 */
	protected function _getExpected($id, $data, $before, $created) {
		$model = $this->_modelName;

		$expected = parent::_getExpected($id, $data, $before, $created);
		if ($created) {
			$expected[$this->$model->alias] = Hash::merge(
				$expected[$this->$model->alias],
				array(
					'block_id' => null,
					'weight' => '1',
					'default_action' => ''
				)
			);
		} elseif ($expected[$this->$model->alias]['is_deleted']) {
			$expected[$this->$model->alias]['weight'] = null;
		}

		return $expected;
	}

/**
 * $this->{$model}->afterFrameSave($frame)のテスト
 *
 * @return void
 */
	public function testAfterFrameSave() {
		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Frames', 'TestFrameAfters');

		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//テストデータ
		$data = $this->dataProviderSave()[0][0];
		$data['Frame']['plugin_key'] = 'test_frame_afters';

		$this->$model->TestFrame = $this->getMockForModel(
			'TestFrameAfters.TestFrameAfter', array('afterFrameSave'), array('plugin' => 'TestFrameAfters')
		);
		$this->$model->TestFrame->expects($this->once())
				->method('afterFrameSave')
				->will($this->returnValue(true));

		//テスト実施
		$result = $this->$model->$methodName($data);

		//チェック
		unset($result['Frame']['modified']);
		$this->assertEquals($result, $data);
	}

/**
 * SaveのExceptionError用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *  - mockModel Mockのモデル
 *  - mockMethod Mockのメソッド
 *
 * @return array テストデータ
 */
	public function dataProviderSaveOnExceptionError() {
		$data = $this->dataProviderSave()[0][0];

		return array(
			array($data, 'Frames.Frame', 'save'),
		);
	}

/**
 * SaveのValidationError用DataProvider
 *
 * ### 戻り値
 *  - data 登録データ
 *  - mockModel Mockのモデル
 *  - mockMethod Mockのメソッド(省略可：デフォルト validates)
 *
 * @return array テストデータ
 */
	public function dataProviderSaveOnValidationError() {
		$data = $this->dataProviderSave()[0][0];

		return array(
			array($data, 'Frames.Frame'),
		);
	}

/**
 * SaveのValidationErrorテスト
 *
 * @param array $data 登録データ
 * @param string $mockModel Mockのモデル
 * @param string $mockMethod Mockのメソッド
 * @dataProvider dataProviderSaveOnValidationError
 * @return void
 */
	public function testSaveOnValidationError($data, $mockModel, $mockMethod = 'validates') {
		$model = $this->_modelName;
		$method = $this->_methodName;

		$this->_mockForReturnFalse($model, $mockModel, $mockMethod);

		$this->setExpectedException('InternalErrorException');
		$this->$model->$method($data);
	}

}
