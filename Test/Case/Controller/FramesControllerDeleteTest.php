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
 * Summary for FramesController Test Case
 */
class FramesControllerDeleteTest extends ControllerTestCase {

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
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->testAction('/frames/frames/10', array('method' => 'delete'));
		$this->assertTextNotContains('The frame has been deleted.', $this->view);
	}

/**
 * testDeleteNotFound method
 *
 * @return void
 */
	public function testDeleteNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/frames/frames/99', array('method' => 'delete'));
	}

/**
 * testDeletePost method
 *
 * @return void
 */
	public function testDeletePost() {
		$this->setExpectedException('MethodNotAllowedException');
		$this->testAction('/frames/frames/delete/9', array('method' => 'post'));
	}
}
