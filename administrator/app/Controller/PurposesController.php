<?php
App::uses('AppController', 'Controller');
/**
 * Purposes Controller
 *
 * @property Purpose $Purpose
 * @property PaginatorComponent $Paginator
 */
class PurposesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Purpose->recursive = 0;
		$this->set('purposes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Purpose->exists($id)) {
			throw new NotFoundException(__('Invalid purpose'));
		}
		$options = array('conditions' => array('Purpose.' . $this->Purpose->primaryKey => $id));
		$this->set('purpose', $this->Purpose->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Purpose->create();
			if ($this->Purpose->save($this->request->data)) {
				$this->Session->setFlash(__('The purpose has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purpose could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Purpose->exists($id)) {
			throw new NotFoundException(__('Invalid purpose'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Purpose->save($this->request->data)) {
				$this->Session->setFlash(__('The purpose has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purpose could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Purpose.' . $this->Purpose->primaryKey => $id));
			$this->request->data = $this->Purpose->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Purpose->id = $id;
		if (!$this->Purpose->exists()) {
			throw new NotFoundException(__('Invalid purpose'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Purpose->delete()) {
			$this->Session->setFlash(__('The purpose has been deleted.'));
		} else {
			$this->Session->setFlash(__('The purpose could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
