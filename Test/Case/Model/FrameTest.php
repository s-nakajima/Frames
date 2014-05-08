<?php
/**
 * Frame Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('Frame', 'Frames.Model');

/**
 * Summary for Frame Test Case
 */
class FrameTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.frames.frame',
		//'plugin.frames.box',
		//'plugin.frames.plugin',
		//'plugin.frames.block',
		//'plugin.frames.language',
		//'plugin.frames.frames_language'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Frame = ClassRegistry::init('Frames.Frame');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Frame);

		parent::tearDown();
	}

/**
 * test method
 *
 * @return void
 */
	public function test() {
	}
}
