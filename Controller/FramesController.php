<?php
/**
 * Frames Controller
 *
 * @property Frame $Frame
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('FramesAppController', 'Frames.Controller');

class FramesController extends FramesAppController {

/**
 * index method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$this->Frame->hasAndBelongsToMany['Language']['conditions'] = array('Language.code' => 'jpn');
		$frames = $this->Frame->findById($id);
		if (empty($frames)) {
			throw new NotFoundException();
		}

		$this->set('frame', $frames);
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

		$this->Frame->create();

		$data['Frame'] = $this->request->data;
		//$data['Frame']['block_id'] = 0;
		// テスト用データ
		$data['Language'] = array(
			array(
				'id' => 1,
				'FramesLanguage' => array(
					'language_id' => 1,
					'name' => 'Test' . date('Y/m/d H:i:s'),
				),
			),
			array(
				'id' => 2,
				'FramesLanguage' => array(
					'language_id' => 2,
					'name' => 'テスト' . date('Y/m/d H:i:s'),
				),
			),
		);

		if (!$this->Frame->save($data)) {
			//エラー処理
			return $this->render();
		}

		$this->autoRender = false;
		$this->redirect('/setting/');
	}
}
