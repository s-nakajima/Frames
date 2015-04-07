<?php
/**
 * FramesController Edit Test Case
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
class FramesControllerEditTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blocks.block',
		'plugin.boxes.box',
		'plugin.frames.frame',
		'plugin.frames.plugin',
		'plugin.m17n.language',
		'plugin.net_commons.site_setting',
		'plugin.pages.page',
		'plugin.users.user',
		'plugin.users.user_attributes_user',
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
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$options = array(
			'method' => 'post',
			'data' => array(
				'Frame' => array(
					'id' => 1,
					'name' => 'edit name',
					'header_type' => 'success'
				)
			),
		);
		$this->testAction('/frames/frames/edit/1', $options);
		$this->assertEmpty($this->result);
	}

/**
 * testEditGetMethod method
 *
 * @return void
 */
	public function testEditGetMethod() {
		$this->setExpectedException('MethodNotAllowedException');
		$this->testAction('/frames/frames/edit/1', array('method' => 'get'));
	}

/**
 * testEditSaveError method
 *
 * @return void
 */
	public function testEditSaveError() {
		$this->setExpectedException('InternalErrorException');

		$this->generate('Frames');
		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('save'));
		$this->controller->Frame->expects($this->once())
			->method('save')
			->will($this->returnValue(false));

		$this->testAction('/frames/frames/edit/1');
	}

/**
 * testEditFindError method
 *
 * @return void
 */
	public function testEditFindError() {
		$this->setExpectedException('InternalErrorException');

		$this->generate('Frames');
		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('find'));
		$this->controller->Frame->expects($this->once())
			->method('find')
			->will($this->returnValue(false));

		$this->testAction('/frames/frames/edit/1');
	}

}
