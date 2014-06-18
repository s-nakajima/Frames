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
		'plugin.boxes.language',
		'plugin.boxes.frames_language'
	);

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
 * testIndexNotFound method
 *
 * @return void
 */
	public function testAdd() {
		$this->testAction('/frames/frames/add', array('return' => 'view'));
		$this->assertEmpty($this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testAddGetMethod() {
		$options = array(
			'method' => 'get',
			'return' => 'view'
		);
		$this->testAction('/frames/frames/add', $options);
		$this->assertEmpty($this->view);
	}

}
