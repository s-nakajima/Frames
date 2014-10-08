<?php
/**
 * Frames Controller
 *
 * @property Frame $Frame
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesAppController', 'Frames.Controller');

class FramesController extends FramesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Frames.Frame');

/**
 * index method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$this->Frame->hasAndBelongsToMany['Language']['conditions'] = array('Language.code' => 'ja');
		$frame = $this->Frame->findById($id);
		if (empty($frame)) {
			throw new NotFoundException();
		}

		$frame['Frame']['Plugin'] = $frame['Plugin'];
		$frame['Frame']['Language'] = $frame['Language'];
		unset($frame['Plugin'], $frame['Language']);
		$this->set('frames', array($frame['Frame']));

		// It probably does'nt needs index.ctp, but lower readability.
		//$this->render('Frames.Elements/render_frames');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if (!$this->request->is('post')) {
			return;
		}

		// テスト用データ
		//$this->Frame->create();
		//$data['Frame'] = array_merge(
		//		$this->request->data,
		//		array('room_id' => 1, 'language_id' => 1, 'name' => 'Test' . date('Y/m/d H:i:s'))
		//	);
		//if (!$this->Frame->save($data)) {
		//	//エラー処理
		//	return $this->render();
		//}

		$this->Frame->create();
		$data['Frame'] = array_merge(
				$this->request->data,
				array(
					'room_id' => 1,
					'language_id' => 2,
					'key' => hash('sha256', 'テスト' . date('Y/m/d H:i:s')),
					'name' => 'テスト' . date('Y/m/d H:i:s'),
				)
			);
		if (!$this->Frame->save($data)) {
			//エラー処理
			return $this->render();
		}

		$this->autoRender = false;
		$this->redirect('/setting/');
	}

}
