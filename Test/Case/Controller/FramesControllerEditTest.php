<?php
/**
 * FramesController Edit Test Case
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
class FramesControllerEditTest extends YAControllerTestCase {

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
		'plugin.users.user_attributes_user',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();

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
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		RolesControllerTest::login($this);

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

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testEditGetMethod method
 *
 * @return void
 */
	public function testEditGetMethod() {
		$this->setExpectedException('MethodNotAllowedException');

		RolesControllerTest::login($this);

		$this->testAction('/frames/frames/edit/1', array('method' => 'get'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * testEditSaveError method
 *
 * @return void
 */
	public function testEditSaveError() {
		$this->setExpectedException('BadRequestException');

		RolesControllerTest::login($this);

		$this->controller->Frame = $this->getMockForModel('Frames.Frame', array('saveFrame'));
		$this->controller->Frame->expects($this->once())
			->method('saveFrame')
			->will($this->returnValue(false));

		$this->testAction('/frames/frames/edit/1');

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

		$this->testAction('/frames/frames/edit/1');

		AuthGeneralControllerTest::logout($this);
	}

}
