<?php
/**
 * FramesController::edit()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesControllerTestCase', 'Frames.TestSuite');

/**
 * FramesController::edit()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Case\Controller\FramesController
 */
class FramesControllerEditTest extends FramesControllerTestCase {

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'frames';

/**
 * Controller name
 *
 * @var string
 */
	protected $_controller = 'frames';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Frames', 'TestFrames');

		//ログイン
		TestAuthGeneral::login($this);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		//ログアウト
		TestAuthGeneral::logout($this);

		parent::tearDown();
	}

/**
 * edit()アクションのGetリクエストテスト
 *
 * @return void
 */
	public function testEditGet() {
		//テスト実行
		$this->_testGetAction(
			array('action' => 'edit'),
			null, 'BadRequestException', 'view'
		);
	}

/**
 * POSTリクエストデータ生成
 *
 * @return array リクエストデータ
 */
	private function __data() {
		$data = array(
			'Frame' => array(
				'id' => '6',
				'name' => 'Edit name',
				'header_type' => 'success',
			),
		);

		return $data;
	}

/**
 * edit()アクションのPOSTリクエストテスト
 *
 * @return void
 */
	public function testEditPost() {
		//テストデータ
		$this->generateNc(Inflector::camelize($this->_controller), array('components' => array(
			'NetCommons.NetCommons' => array('setFlashNotification')
		)));
		$this->controller->Components->NetCommons
			->expects($this->once())->method('setFlashNotification')
			->with(__d('net_commons', 'Successfully saved.'), array('class' => 'success'));

		//テスト実行
		$this->_testPostAction(
			'put', $this->__data(),
			array('action' => 'edit'),
			null, 'view'
		);

		//チェック
		$header = $this->controller->response->header();
		$this->assertNotEmpty($header['Location']);
	}

/**
 * edit()アクションのPOSTリクエストの_Frame.redirectが指定されているときのテスト
 *
 * @return void
 */
	public function testEditPostRedirect() {
		//テストデータ
		$data = $this->__data();
		$data['_Frame']['redirect'] = '/frames/frames/index';

		//テスト実行
		$this->_testPostAction(
			'put', $data,
			array('action' => 'edit'),
			null, 'view'
		);

		//チェック
		$header = $this->controller->response->header();
		$this->assertTextContains($data['_Frame']['redirect'], $header['Location']);
	}

/**
 * SaveErrorテスト
 *
 * @return void
 */
	public function testEditPostSaveError() {
		$this->_mockForReturnFalse('Frame', 'saveFrame');

		$this->_testPostAction(
			'put', $this->__data(),
			array('action' => 'edit'),
			'BadRequestException', 'view'
		);
	}

}
