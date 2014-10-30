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
		'plugin.frames.frame',
		'plugin.frames.site_setting',
		'plugin.frames.box',
		'plugin.frames.plugin',
		'plugin.frames.block',
		'plugin.frames.language'
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();
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

		$this->testAction('/frames/frames/add');
		// It should be error assertion
	}

}
