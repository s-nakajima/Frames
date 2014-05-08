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
 * @throws NotFoundException
 * @param string $id frameId
 * @return void
 */
	public function index($id = null) {
		$frames = $this->Frame->findById($id);
		if (empty($frames)) {
			throw new NotFoundException();
		}

		$this->set('frame', $frames);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Frame->exists($id)) {
			throw new NotFoundException(__('Invalid frame'));
		}
		$options = array('conditions' => array('Frame.' . $this->Frame->primaryKey => $id));
		$this->set('frame', $this->Frame->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Frame->create();
			if ($this->Frame->save($this->request->data)) {
				return $this->flash(__('The frame has been saved.'), array('action' => 'index'));
			}
		}
		$boxes = $this->Frame->Box->find('list');
		$parentFrames = $this->Frame->ParentFrame->find('list');
		$languages = $this->Frame->Language->find('list');
		$this->set(compact('boxes', 'parentFrames', 'languages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Frame->exists($id)) {
			throw new NotFoundException(__('Invalid frame'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Frame->save($this->request->data)) {
				return $this->flash(__('The frame has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Frame.' . $this->Frame->primaryKey => $id));
			$this->request->data = $this->Frame->find('first', $options);
		}
		$boxes = $this->Frame->Box->find('list');
		$parentFrames = $this->Frame->ParentFrame->find('list');
		$languages = $this->Frame->Language->find('list');
		$this->set(compact('boxes', 'parentFrames', 'languages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Frame->id = $id;
		if (!$this->Frame->exists()) {
			throw new NotFoundException(__('Invalid frame'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Frame->delete()) {
			return $this->flash(__('The frame has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The frame could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
