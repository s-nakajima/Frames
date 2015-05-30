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

App::uses('FramesController', 'Frames.Controller');

/**
 * Plugin controller class for testAction
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Test\Case\Controller
 */
class TestPluginController extends FramesController {

/**
 * Set to true to automatically render the view
 * after action logic.
 *
 * @var bool
 */
	public $autoRender = false;

/**
 * index action
 *
 * @param string $id frameId
 * @return string
 */
	public function index($id = null) {
		if ($id == 2) {
			return '';
		}

		return 'TestPluginController_index_' . $id;
	}
}
CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * Summary for FramesController Test Case
 */
class FramesControllerTest extends YAControllerTestCase {

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
		'plugin.net_commons.site_setting',
		'plugin.pages.page',
		'plugin.pages.languages_page',
		'plugin.plugin_manager.plugin',
		'plugin.roles.default_role_permission',
		'plugin.rooms.plugins_room',
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

		App::uses('Page', 'Pages.Model');
		Page::unsetIsSetting();
	}

/**
 * It asserts view value of frame ID 1
 *
 * @return void
 */
	private function __assertNormalView() {
		$this->assertTextContains('<div id="frame-wrap-1" class="frame frame-id-1"', $this->view);
		$this->assertTextContains('<div class="block block-id-5">', $this->view);
		$this->assertTextContains('TestPluginController_index_1', $this->view);
		$this->assertTextContains('Test frame name 1', $this->view);
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$frameId = '1';

		$this->testAction('/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->__assertNormalView();
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
 * testIndexNoneContent method
 *
 * @return void
 */
	public function testIndexNoneContent() {
		$frameId = '2';

		$this->testAction('/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->assertEmpty($this->view);
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		$frameId = '1';

		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->__assertNormalView();
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingModeNoneContent() {
		$frameId = '2';

		$this->testAction('/' . Page::SETTING_MODE_WORD . '/frames/frames/index/' . $frameId,
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
		$this->assertTextContains('<div id="frame-wrap-2" class="frame frame-id-2"', $this->view);
		$this->assertTextContains('<div class="block block-id-2">', $this->view);
		$this->assertTextContains('Test frame name 2', $this->view);
		$this->assertTextNotContains('TestPluginController_index_', $this->view);
	}

}
