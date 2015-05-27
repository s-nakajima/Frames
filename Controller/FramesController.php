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
		'Pages.Page',
		'PluginManager.Plugin'
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
				'pageEditable' => array('add', 'edit', 'delete', 'order'),
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
	public function add() {
		$this->request->onlyAllow('post');

		if (! $page = $this->Page->findById($pageId)) {
			$this->throwBadRequest();
			return;
		}

		$this->Frame->create();
		$data = $this->data;
		$data['Frame']['is_deleted'] = false;
		$data['Frame']['name'] = __d('frames', 'New frame %s', date('YmdHis'));
		if (! $data['Frame']['room_id']) {
			$data['Frame']['room_id'] = null;
		}

		if (! $this->Frame->saveFrame($data)) {
			//エラー処理
			$this->throwBadRequest();
			return;
		}

		if ($plugin = $this->Plugin->findByKey($data['Frame']['plugin_key'])) {
			if ($plugin['plugin']['default_setting_action']) {
				$this->redirect($data['Frame']['plugin_key'] . '/' . $plugin['plugin']['default_setting_action']);
				return;
			}
		}

		if (! $this->request->is('ajax')) {
			$this->redirect($this->request->referer());
		}
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

		$this->Frame->setDataSource('master');
		if (! $frame = $this->Frame->findById($id)) {
			$this->throwBadRequest();
			return;
		}

		$data = Hash::merge($frame, $this->data);
		$data['Frame']['is_deleted'] = true;
		if (! $this->Frame->saveFrame($data)) {
			//エラー処理
			$this->throwBadRequest();
			return;
		}

		if (! $this->request->is('ajax')) {
			$this->redirect($this->request->referer());
		}
	}

/**
 * edit method
 *
 * @param int $frameId frames.id
 * @return void
 * @throws InternalErrorException
 */
	public function edit($frameId = null) {
		$this->request->onlyAllow('post');

		$this->Frame->setDataSource('master');
		if (! $frame = $this->Frame->findById($frameId)) {
			$this->throwBadRequest();
			return;
		}

		$data = Hash::merge($frame, $this->data);
		if (! $this->Frame->saveFrame($data)) {
			$this->throwBadRequest();
			return;
		}
		if (! $this->request->is('ajax')) {
			$this->redirect($this->request->referer());
		}
	}

/**
 * sort method
 *
 * @param int $frameId frames.id
 * @return void
 * @throws InternalErrorException
 */
	public function order($frameId = null) {
		$this->request->onlyAllow('post');

		$this->Frame->setDataSource('master');
		if (! $frame = $this->Frame->findById($frameId)) {
			$this->throwBadRequest();
			return;
		}

		if (array_key_exists('up', $this->data)) {
			$order = 'up';
		} elseif (array_key_exists('down', $this->data)) {
			$order = 'down';
		} else {
			$this->throwBadRequest();
			return;
		}

		if (! $this->Frame->saveWeight($frame, $order)) {
			$this->throwBadRequest();
			return;
		}
		if (! $this->request->is('ajax')) {
			$this->redirect($this->request->referer());
		}
	}
}
