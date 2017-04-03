<?php
App::uses('AppController', 'Controller');
/**
 * MemberTypes Controller
 *
 * @property MemberType $MemberType
 * @property PaginatorComponent $Paginator
 */
class MemberTypesController extends AppController {

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
		$this->MemberType->recursive = 0;
		$this->set('memberTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MemberType->exists($id)) {
			throw new NotFoundException(__('Invalid member type'));
		}
		$options = array('conditions' => array('MemberType.' . $this->MemberType->primaryKey => $id));
		$this->set('memberType', $this->MemberType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MemberType->create();
			if ($this->MemberType->save($this->request->data)) {
				$this->Session->setFlash(__('The member type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member type could not be saved. Please, try again.'));
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
		if (!$this->MemberType->exists($id)) {
			throw new NotFoundException(__('Invalid member type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MemberType->save($this->request->data)) {
				$this->Session->setFlash(__('The member type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MemberType.' . $this->MemberType->primaryKey => $id));
			$this->request->data = $this->MemberType->find('first', $options);
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
		$this->MemberType->id = $id;
		if (!$this->MemberType->exists()) {
			throw new NotFoundException(__('Invalid member type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MemberType->delete()) {
			$this->Session->setFlash(__('The member type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The member type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
