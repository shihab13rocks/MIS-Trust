<?php
App::uses('AppController', 'Controller');
/**
 * UserTypes Controller
 *
 * @property UserType $UserType
 */
class UserTypesController extends AppController {
	var $paginate = array(
		'conditions' => array('UserType.id <>' => 1),  
		'order' => array( 'UserRole.title' => 'asc')
	);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserType->recursive = 0;
		$this->set('userTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserType->exists($id)) {
			throw new NotFoundException(__('Invalid user type'),'flash/warning');
		}
		$options = array('conditions' => array('UserType.' . $this->UserType->primaryKey => $id));
		$this->set('userType', $this->UserType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserType->create();
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'),'flash/error');
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
		if (!$this->UserType->exists($id)) {
			throw new NotFoundException(__('Invalid user type'),'flash/warning');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserType->save($this->request->data)) {
				$this->Session->setFlash(__('The user type has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user type could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserType.' . $this->UserType->primaryKey => $id));
			$this->request->data = $this->UserType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserType->id = $id;
		if (!$this->UserType->exists()) {
			throw new NotFoundException(__('Invalid user type'),'flash/warning');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserType->delete()) {
			$this->Session->setFlash(__('User type deleted'),'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User type was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
