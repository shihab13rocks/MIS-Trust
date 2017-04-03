<?php
App::uses('AppController', 'Controller');
/**
 * UserRoles Controller
 *
 * @property UserRole $UserRole
 */
class UserRolesController extends AppController {
	var $paginate = array(
		'conditions' => array('UserRole.id <>' => 1),  
		'order' => array( 'UserRole.title' => 'asc')
	);
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserRole->recursive = 0;
		$this->set('userRoles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserRole->exists($id)) {
			throw new NotFoundException(__('Invalid user role'),'flash/warning');
		}
		$options = array('conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id));
		$this->set('userRole', $this->UserRole->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// Stop editing admiin role
		if (AuthComponent::user('id') != 1) {
			$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');
			$this->redirect(array('action' => 'index'));
		}		
		
		if ($this->request->is('post')) {

			// serialize the user access data
			$this->request->data['UserRole']['rights'] = serialize($this->request->data['UserRole']['rights']);
			
			$this->UserRole->create();
			if ($this->UserRole->save($this->request->data)) {
				$this->Session->setFlash(__('The user role has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user role could not be saved. Please, try again.'),'flash/error');
			}
		}
		$organizationTypes = $this->UserRole->OrganizationType->find('list');
		// remove Super Admin type from the list
		$userTypes = $this->UserRole->UserType->find('list', array('conditions' => array('UserType.id <>' => 1)));
		$this->set(compact('organizationTypes', 'userTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserRole->exists($id)) {
			throw new NotFoundException(__('Invalid user role'),'flash/warning');
		}

		// Stop editing admiin role
		if (AuthComponent::user('id') != 1 || $id == 1) {
			$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			// serialize the user access data
			$this->request->data['UserRole']['rights'] = serialize($this->request->data['UserRole']['rights']);

			if ($this->UserRole->save($this->request->data)) {
				$this->Session->setFlash(__('The user role has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user role could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('UserRole.' . $this->UserRole->primaryKey => $id));
			$this->request->data = $this->UserRole->find('first', $options);
		}
		$organizationTypes = $this->UserRole->OrganizationType->find('list');
		
		// remove Super Admin type from the list
		$userTypes = $this->UserRole->UserType->find('list', array('conditions' => array('UserType.id <>' => 1)));
		$this->set(compact('organizationTypes', 'userTypes'));
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
		$this->Session->setFlash(__('You don\'t have any access to delete any user role!'),'flash/error');
		$this->redirect(array('action' => 'index'));		
		
		/*
		$this->UserRole->id = $id;
		if (!$this->UserRole->exists()) {
			throw new NotFoundException(__('Invalid user role'),'flash/warning');
		}
		
		// Stop deleting admiin role
		if (AuthComponent::user('id') != 1 || $id == 1) {
			$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');
			$this->redirect(array('action' => 'index'));
		}	
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserRole->delete()) {
			$this->Session->setFlash(__('User role deleted'),'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User role was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
		*/
	}
}
