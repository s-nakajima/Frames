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
		'plugin.frames.box',
		'plugin.frames.plugin',
		'plugin.frames.block',
		'plugin.frames.language'
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

/**
 * testSaveFrame method
 *
 * @return void
 */
	public function testSaveFrame() {
		$expectCount = $this->Frame->find('count', array('recursive' => -1)) + 1;

		$this->Frame->create();
		$this->Frame->saveFrame(array());

		//$this->assertEquals('master', $this->Frame->useDbConfig);
		$this->assertEquals($expectCount, $this->Frame->find('count', array('recursive' => -1)));

		$actualFrame = $this->Frame->findById($this->Frame->getLastInsertID());
		$this->assertEquals('11', $actualFrame['Frame']['id']);
	}

/**
 * testSaveFrameError method
 *
 * @return void
 */
	public function testSaveFrameError() {
		$frameMock = $this->getMockForModel('Frames.Frame', array('save'));
		$frameMock->expects($this->once())
			->method('save')
			->will($this->returnValue(false));

		$expectCount = $frameMock->find('count', array('recursive' => -1));

		$frameMock->create();
		$this->assertFalse($frameMock->saveFrame(array()));

		//$this->assertEquals('master', $this->Frame->useDbConfig);
		$this->assertEquals($expectCount, $frameMock->find('count', array('recursive' => -1)));
	}

/**
 * testDeleteFrame method
 *
 * @return void
 */
	public function testDeleteFrame() {
		$expectCount = $this->Frame->find('count', array('recursive' => -1)) - 1;

		$this->Frame->id = 10;
		$this->Frame->deleteFrame();

		//$this->assertEquals('master', $this->Frame->useDbConfig);
		$this->assertEquals($expectCount, $this->Frame->find('count', array('recursive' => -1)));
		$this->assertEmpty($this->Frame->findById('10'));
	}

/**
 * testDeleteFrameError method
 *
 * @return void
 */
	public function testDeleteFrameError() {
		$frameMock = $this->getMockForModel('Frames.Frame', array('delete'));
		$frameMock->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));

		$expectCount = $frameMock->find('count', array('recursive' => -1));

		$frameMock->id = 10;
		$this->assertFalse($frameMock->deleteFrame());

		//$this->assertEquals('master', $this->Frame->useDbConfig);
		$this->assertEquals($expectCount, $frameMock->find('count', array('recursive' => -1)));
	}

}
