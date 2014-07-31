<?php
/**
 * FramesController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
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
		'plugin.frames.site_setting_value',
		'plugin.frames.box',
		'plugin.frames.plugin',
		'plugin.frames.block',
		'plugin.frames.language',
		'plugin.frames.frames_language'
	);

/**
 * Frame ID 1 assertions
 *
 * @return void
 */
	private function __frameId1Assertion() {
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
		$this->__frameId1Assertion();
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
		Configure::write('Pages.isSetting', true);
		$this->testAction('/frames/frames/index/1', array('return' => 'view'));
		$this->__frameId1Assertion();
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingModeNoneContent() {
		Configure::write('Pages.isSetting', true);
		$this->testAction('/frames/frames/index/2', array('return' => 'view'));
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
