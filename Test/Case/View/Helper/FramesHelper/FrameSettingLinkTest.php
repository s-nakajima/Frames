<?php
/**
 * FramesHelper::frameSettingLink()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesHelperTestCase', 'Frames.TestSuite');

/**
 * FramesHelper::frameSettingLink()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Case\View\Helper\FramesHelper
 */
class FramesHelperFrameSettingLinkTest extends FramesHelperTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'frames';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストデータ生成
		$viewVars = array();
		$requestData = array();
		$params = array();

		//Helperロード
		$this->loadHelper('Frames.Frames', $viewVars, $requestData, $params);

		Current::$current['Page']['id'] = '4';
		$this->Frames->plugins = [
			'test_plugin' => [
				'plugin_key' => 'test_plugin',
				'default_setting_action' => 'test_plugin/test_plugin_blocks/index',
			]
		];
	}

/**
 * frameSettingLink()のテスト
 *
 * @return void
 */
	public function testFrameSettingLink() {
		//データ生成
		$frame = [
			'id' => '1',
			'plugin_key' => 'test_plugin'
		];
		$settingAction = null;
		$title = null;
		$options = [];

		//テスト実施
		$result = $this->Frames->frameSettingLink($frame, $settingAction, $title, $options);

		//チェック
		$expected =
			'<a href="/test_plugin/test_plugin/test_plugin_blocks/index?frame_id=1&amp;page_id=4" ' .
					'class="btn btn-default btn-sm frame-btn pull-left">' .
				'<span class="glyphicon glyphicon-cog" aria-hidden="true"> </span> ' .
				'<span class="sr-only">' . __d('frames', 'Show flame setting') . '</span>' .
			'</a>';

		$this->assertEquals($expected, $result);
	}

/**
 * frameSettingLink()の$settingAction引数ありのテスト
 *
 * @return void
 */
	public function testWithSettingAction() {
		//データ生成
		$frame = [
			'id' => '1',
			'plugin_key' => 'test_plugin'
		];
		$settingAction = 'test_plugin_2/test_plugin_blocks_2';
		$title = null;
		$options = [];

		//テスト実施
		$result = $this->Frames->frameSettingLink($frame, $settingAction, $title, $options);

		//チェック
		$expected =
			'<a href="/test_plugin/test_plugin_2/test_plugin_blocks_2?frame_id=1&amp;page_id=4" ' .
					'class="btn btn-default btn-sm frame-btn pull-left">' .
				'<span class="glyphicon glyphicon-cog" aria-hidden="true"> </span> ' .
				'<span class="sr-only">' . __d('frames', 'Show flame setting') . '</span>' .
			'</a>';

		$this->assertEquals($expected, $result);
	}

/**
 * frameSettingLink()の$title引数ありのテスト
 *
 * @return void
 */
	public function testWithTitle() {
		//データ生成
		$frame = [
			'id' => '1',
			'plugin_key' => 'test_plugin'
		];
		$settingAction = null;
		$title = '<span class="glyphicon glyphicon-edit" aria-hidden="true"> </span> ' .
					'<span class="sr-only">' . __d('net_commons', 'Edit') . '</span>';
		$options = [];

		//テスト実施
		$result = $this->Frames->frameSettingLink($frame, $settingAction, $title, $options);

		//チェック
		$expected =
			'<a href="/test_plugin/test_plugin/test_plugin_blocks/index?frame_id=1&amp;page_id=4" ' .
					'class="btn btn-default btn-sm frame-btn pull-left">' .
				'<span class="glyphicon glyphicon-edit" aria-hidden="true"> </span> ' .
				'<span class="sr-only">' . __d('net_commons', 'Edit') . '</span>' .
			'</a>';

		$this->assertEquals($expected, $result);
	}

/**
 * frameSettingLink()の$options引数ありのテスト
 *
 * @return void
 */
	public function testWithOptions() {
		//データ生成
		$frame = [
			'id' => '1',
			'plugin_key' => 'test_plugin'
		];
		$settingAction = null;
		$title = null;
		$options = [
			'class' => 'btn btn-primary btn-xs frame-btn pull-left',
			'onclick' => 'return false;'
		];

		//テスト実施
		$result = $this->Frames->frameSettingLink($frame, $settingAction, $title, $options);

		//チェック
		$expected =
			'<a href="/test_plugin/test_plugin/test_plugin_blocks/index?frame_id=1&amp;page_id=4" ' .
					'class="btn btn-primary btn-xs frame-btn pull-left" onclick="return false;">' .
				'<span class="glyphicon glyphicon-cog" aria-hidden="true"> </span> ' .
				'<span class="sr-only">' . __d('frames', 'Show flame setting') . '</span>' .
			'</a>';

		$this->assertEquals($expected, $result);
	}

}
