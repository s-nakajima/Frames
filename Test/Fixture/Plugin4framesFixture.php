<?php
/**
 * PluginFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('PluginFixture', 'PluginManager.Test/Fixture');

/**
 * PluginFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\Fixture
 */
class Plugin4framesFixture extends PluginFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'Plugin';

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'plugins';

/**
 * Initialize the fixture.
 *
 * @return void
 */
	public function init() {
		$this->records[0]['key'] = 'test_frames';
		$this->records[1]['key'] = 'test_frames';
		$this->records[2]['key'] = 'test_frames1';
		$this->records[3]['key'] = 'test_frames2';
		parent::init();
	}

}
