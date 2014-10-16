<?php
/**
 * Frame Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('Frame', 'Frames.Model');

/**
 * Summary for Frame Test Case
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Test\Case\Model
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
 * testGetContainableQuery method
 *
 * @return void
 */
	public function testGetContainableQuery() {
		$containableQuery = $this->Frame->getContainableQuery();

		$this->assertCount(3, $containableQuery);

		$this->assertArrayHasKey('order', $containableQuery);
		$this->assertCount(1, $containableQuery['order']);
		$this->assertContains('Frame.weight', $containableQuery['order']);

		$this->assertArrayHasKey('Language', $containableQuery);
		$this->assertCount(1, $containableQuery['Language']);
		$this->assertArrayHasKey('conditions', $containableQuery['Language']);
		$this->assertCount(1, $containableQuery['Language']['conditions']);
		$this->assertArrayHasKey('Language.code', $containableQuery['Language']['conditions']);
		// It should test language code.
		$this->assertContains('ja', $containableQuery['Language']['conditions']);

		$this->assertContains('Plugin', $containableQuery);
	}
}
