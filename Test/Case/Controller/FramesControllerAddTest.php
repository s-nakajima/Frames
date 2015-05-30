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
		'plugin.blocks.block',
		'plugin.blocks.block_role_permission',
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
		'plugin.containers.container',
		'plugin.containers.containers_page',
		'plugin.frames.frame',
		'plugin.m17n.language',
		'plugin.m17n.languages_page',
		'plugin.net_commons.site_setting',
		'plugin.pages.page',
		'plugin.plugin_manager.plugin',
		'plugin.roles.default_role_permission',
		'plugin.rooms.plugins_room',
		'plugin.rooms.roles_room',
		'plugin.rooms.roles_rooms_user',
		'plugin.rooms.room',
		'plugin.rooms.room_role_permission',
		'plugin.users.user',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();

		YACakeTestCase::loadTestPlugin('Frames', 'ModelWithAfterFrameSaveTestPlugin');

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
