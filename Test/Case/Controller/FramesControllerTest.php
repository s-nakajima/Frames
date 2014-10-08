<?php
/**
 * FramesController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesController', 'Frames.Controller');

/**
 * Plugin controller class for testAction
 */
class TestPluginController extends FramesController {

	public $autoRender = false;

/**
 * index action
 *
 * @param string $id frameId
 * @return string
 */
	public function index($id = null) {
		return 'TestPluginController_index_' . $id;
	}

}
CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * Summary for FramesController Test Case
 */
class FramesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.frames.frame',
		'plugin.frames.site_setting',
		'plugin.frames.box',
		'plugin.frames.plugin',
		'plugin.frames.block',
		'plugin.frames.language',
		//'plugin.frames.frames_language'
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
 * @return void
 */
	private function __assertNormalView() {
		$this->assertTextContains('<div id="frame-wrap-1" class="frame frame-id-1">', $this->view);
		$this->assertTextContains('<div class="block block-id-5">', $this->view);
		$this->assertTextContains('TestPluginController_index_1', $this->view);
		$this->assertTextContains('Test frame name 1', $this->view);
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/frames/frames/index/1', array('return' => 'view'));
		$this->__assertNormalView();
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
		$this->testAction('/frames/frames/index/2', array('return' => 'view'));
		$this->assertEmpty($this->view);
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/1', array('return' => 'view'));
		$this->__assertNormalView();
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingModeNoneContent() {
		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/2', array('return' => 'view'));
		$this->assertTextContains('<div id="frame-wrap-2" class="frame frame-id-2">', $this->view);
		$this->assertTextContains('<div class="block block-id-2">', $this->view);
		$this->assertTextContains('Test frame name 2', $this->view);
		$this->assertTextNotContains('TestPluginController_index_', $this->view);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$options = array(
			'data' => array(
				'box_id' => '1',
				'plugin_id' => '1'
			)
		);
		$this->testAction('/frames/frames/add', $options);
		$this->assertEmpty($this->result);
	}

/**
 * testAddGetMethod method
 *
 * @return void
 */
	public function testAddGetMethod() {
		$this->testAction('/frames/frames/add', array('method' => 'get'));
		$this->assertEmpty($this->result);
	}

}
