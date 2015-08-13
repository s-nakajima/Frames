<?php
/**
 * FramesController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');
App::uses('YAControllerTestCase', 'NetCommons.TestSuite');

App::uses('FramesController', 'Frames.Controller');

/**
 * Plugin controller class for testAction
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Test\Case\Controller
 */
class TestPluginController extends FramesController {

/**
 * Set to true to automatically render the view
 * after action logic.
 *
 * @var bool
 */
	public $autoRender = false;

/**
 * index action
 *
 * @param string $id frameId
 * @return string
 */
	public function index($id = null) {
		if ($id == 2) {
			return '';
		}

		return 'TestPluginController_index_' . $id;
	}
}
CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * Summary for FramesController Test Case
 */
class FramesControllerTest extends YAControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.frames.frame',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();

		App::uses('Page', 'Pages.Model');
		Page::unsetIsSetting();
	}

/**
 * It asserts view value of frame ID 1
 *
 * @param int $frameId frames.id
 * @return void
 */
	private function __assertView($frameId) {
		$this->assertTextContains('<section class="frame panel panel-default">', $this->view);
		$this->assertTextContains('Test frame name ' . $frameId, $this->view);
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$frameId = '1';

		$this->testAction('/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->__assertView($frameId);
		$this->assertTextContains('TestPluginController_index_' . $frameId, $this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testIndexNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/frames/frames/index');
	}

/**
 * testIndexNoneContent method
 *
 * @return void
 */
	public function testIndexNoneContent() {
		$frameId = '2';

		$this->testAction('/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->assertEmpty($this->view);
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		$frameId = '1';

		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->__assertView($frameId);
		$this->assertTextContains('TestPluginController_index_' . $frameId, $this->view);
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingModeNoneContent() {
		$frameId = '2';

		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);

		$this->__assertView($frameId);
		$this->assertTextContains('/frames/frames/order/' . $frameId, $this->view);
		$this->assertTextContains('/frames/frames/delete/' . $frameId, $this->view);
	}

}
