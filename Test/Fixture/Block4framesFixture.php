<?php
/**
 * BlockFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BlockFixture', 'Blocks.Test/Fixture');

/**
 * Frame用のBlockFixture
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Blocks\Test\Fixture
 */
class Block4FramesFixture extends BlockFixture {

/**
 * Model name
 *
 * @var string
 */
	public $name = 'Block';

/**
 * Initialize the fixture.
 *
 * @return void
 */
	public function init() {
		$this->records = Hash::insert($this->records, '{n}.plugin_key', 'test_frames');
		parent::init();
	}

}
