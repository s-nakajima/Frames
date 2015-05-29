<?php
/**
 * FramesController Add Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesController', 'Frames.Controller');

/**
 * Summary for FramesController Test Case
 */
class FramesControllerAddTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blocks.block',
		'plugin.boxes.box',
		'plugin.frames.frame',
		'plugin.plugin_manager.plugin',
		'plugin.m17n.language',
		'plugin.net_commons.site_setting',
		'plugin.pages.page',
		'plugin.users.user',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();

		$framesPath = App::pluginPath('Frames');
		$noDir = (empty($framesPath) || !file_exists($framesPath));
		if ($noDir) {
			$this->markTestAsSkipped('Could not find Frames in plugin paths');
		}

		App::build(array(
			'Plugin' => array($framesPath . 'Test' . DS . 'test_app' . DS . 'Plugin' . DS)
		));
		CakePlugin::load('ModelWithAfterFrameSaveTestPlugin');
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
				'plugin_key' => 'model_with_after_frame_save_test_plugin',
				'plugin_id' => '1',
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
		$this->setExpectedException('MethodNotAllowedException');
		$this->testAction('/frames/frames/add', array('method' => 'get'));
	}

/**
 * testAddError method
 *
 * @return void
 */
	public function testAddError() {
		$this->generate('Frames');
		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('save'));
		$this->controller->Frame->expects($this->once())
			->method('save')
			->will($this->returnValue(false));

		$options = array(
			'data' => array(
				'box_id' => '1',
				'plugin_key' => 'model_with_after_frame_save_test_plugin',
				'plugin_id' => '1',
			)
		);
		$this->testAction('/frames/frames/add', $options);
		// It should be error assertion
	}

}
