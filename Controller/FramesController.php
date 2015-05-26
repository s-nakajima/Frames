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

/**
 * Frames Controller
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Frames\Controller
 */
class FramesController extends FramesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'Frames.Frame',
		'Pages.Page'
	);

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'NetCommons.NetCommonsRoomRole' => array(
			//コンテンツの権限設定
			'allowedActions' => array(
				'pageEditable' => array('add', 'edit', 'delete'),
			),
		),
		'Security'
	);

/**
 * index method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$frame = $this->Frame->findById($id);
		if (empty($frame)) {
			throw new NotFoundException();
		}

		$frame['Frame']['Plugin'] = $frame['Plugin'];
		$frame['Frame']['Language'] = $frame['Language'];
		unset($frame['Plugin'], $frame['Language']);
		$this->set('frames', array($frame['Frame']));

		// It probably doesn't needs index.ctp, but lower readability.
		//$this->render('Frames.Elements/render_frames');
	}

/**
 * add method
 *
 * @return void
 */
	public function add($pageId = null) {
		$this->request->onlyAllow('post');

		$this->Frame->create();

		if (! $page = $this->Page->findById($pageId)) {
			$this->throwBadRequest();
			return;
		}

		// It should modify to use m17n on key and name
		$data = $this->request->data;
		$data['Frame']['name'] = __d('frames', 'New frame %s', date('YmdHis'));
		if (! $data['Frame']['room_id']) {
			$data['Frame']['room_id'] = null;
		}

		if (! $this->Frame->saveFrame($data)) {
			//エラー処理
			$this->throwBadRequest();
			return;
		}

		$this->redirect('/' . Page::SETTING_MODE_WORD . '/' . $page['Page']['permalink']);
	}

/**
 * delete method
 *
 * @param string $id frameId
 * @throws NotFoundException
 * @return void
 */
	public function delete($id = null) {
		$this->request->onlyAllow('delete');

		if (! $frame = $this->Frame->findById($id)) {
			$this->throwBadRequest();
			return;
		}

		$this->Frame->id = $id;
		if ($this->Frame->deleteFrame()) {
			return $this->flash(__('The frame has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The frame could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}

/**
 * edit method
 *
 * @param int $frameId frameId
 * @return void
 * @throws InternalErrorException
 */
	public function edit($frameId = null) {
		$this->request->onlyAllow('post');

		$this->Frame->setDataSource('master');
		if (! $frame = $this->Frame->findById($frameId)) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

		$data = Hash::merge($frame, $this->data);
		if (! $this->Frame->saveFrame($data)) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}
		if (! $this->request->is('ajax')) {
			$this->redirect($this->request->referer());
		}
	}
}
