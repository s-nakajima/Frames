<?php
/**
 * Test Frame Model
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('FramesAppModel', 'Frames.Model');

/**
 * Test Frame Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Frames\Test\test_app\Plugin\TestFrames\Model
 * @codeCoverageIgnore
 */
class TestFrameAfter extends FramesAppModel {

/**
 * saveFrame()後にプラグインの後処理を呼ぶ
 *
 * @param array $frame フレームデータ
 * @return bool True on success
 */
	public function afterFrameSave($frame) {
		return true;
	}

}
