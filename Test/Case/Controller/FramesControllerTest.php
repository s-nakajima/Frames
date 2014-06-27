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
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->generate('Frames.Frames');
		$this->controller->Frame = ClassRegistry::init('Frames.Frame');
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/frames/frames/index/1', array('return' => 'view'));
		$this->assertEmpty($this->view);
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
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		Configure::write('Pages.isSetting', true);
		$this->testAction('/frames/frames/index/1', array('return' => 'view'));
		$this->assertTextContains('<div class="block block-id-', $this->view);
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
