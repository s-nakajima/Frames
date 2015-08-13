<?php
/**
 * FramesController Add Test Case
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
class FramesControllerAddTest extends YAControllerTestCase {

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

		YACakeTestCase::loadTestPlugin($this, 'Frames', 'ModelWithAfterFrameSaveTestPlugin');

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
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		RolesControllerTest::login($this);

		$options = array(
			'data' => array(
				'Frame' => array(
					'box_id' => '1',
					'plugin_key' => 'model_with_after_frame_save_test_plugin',
					'plugin_id' => '1',
					'room_id' => '1',
				)
			)
		);
		$this->testAction('/frames/frames/add', $options);
		$this->assertEmpty($this->result);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testAddGetMethod method
 *
 * @return void
 */
	public function testAddGetMethod() {
		RolesControllerTest::login($this);

		$this->setExpectedException('MethodNotAllowedException');
		$this->testAction('/frames/frames/add', array('method' => 'get'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testAddError method
 *
 * @return void
 */
	public function testAddError() {
		$this->setExpectedException('InternalErrorException');

		RolesControllerTest::login($this);

		$this->generate('Frames');
		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('save'));
		$this->controller->Frame->expects($this->once())
			->method('save')
			->will($this->returnValue(false));

		$options = array(
			'data' => array(
				'Frame' => array(
					'box_id' => '1',
					'plugin_key' => 'model_with_after_frame_save_test_plugin',
					'plugin_id' => '1',
					'room_id' => '1',
				)
			)
		);
		$this->testAction('/frames/frames/add', $options);
		// It should be error assertion

		AuthGeneralControllerTest::logout($this);
	}

}
