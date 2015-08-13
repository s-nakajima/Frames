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
App::uses('RolesControllerTest', 'Roles.Test/Case/Controller');
App::uses('AuthGeneralControllerTest', 'AuthGeneral.Test/Case/Controller');

App::uses('FramesController', 'Frames.Controller');

/**
 * Summary for FramesController Test Case
 */
class FramesControllerDeleteTest extends YAControllerTestCase {

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

		YACakeTestCase::loadTestPlugin($this, 'NetCommons', 'TestPlugin');

		$this->generate(
			'Frames.Frames',
			[
				'components' => [
					'Auth' => ['user'],
					'Session',
					'Security',
				]
			]
		);
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		RolesControllerTest::login($this);

		$this->testAction('/frames/frames/delete/1', array('method' => 'delete'));
		$this->assertTextNotContains('The frame has been deleted.', $this->view);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testDeleteNotFound method
 *
 * @return void
 */
	public function testDeleteNotFound() {
		$this->setExpectedException('BadRequestException');

		RolesControllerTest::login($this);

		$this->testAction('/frames/frames/delete/99', array('method' => 'delete'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testDeletePost method
 *
 * @return void
 */
	public function testDeletePost() {
		$this->setExpectedException('MethodNotAllowedException');

		RolesControllerTest::login($this);

		$this->testAction('/frames/frames/delete/9', array('method' => 'post'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testDeleteError method
 *
 * @return void
 */
	public function testDeleteError() {
		$this->setExpectedException('BadRequestException');

		RolesControllerTest::login($this);

		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('saveFrame'));
		$this->controller->Frame->expects($this->once())
			->method('saveFrame')
			->will($this->returnValue(false));

		$this->testAction('/frames/frames/delete/1', array('method' => 'delete'));
		// It should be error assertion

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testEditFindError method
 *
 * @return void
 */
	public function testEditFindError() {
		$this->setExpectedException('BadRequestException');

		RolesControllerTest::login($this);

		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('find'));
		$this->controller->Frame->expects($this->once())
			->method('find')
			->will($this->returnValue(false));

		$this->testAction('/frames/frames/delete/1', array('method' => 'delete'));
	}

}
