<?php
App::uses('AppController', 'Controller');
/**
 * OrganizationGroups Controller
 *
 * @property OrganizationGroup $OrganizationGroup
 */
class OrganizationGroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrganizationGroup->recursive = 0;
		$this->set('organizationGroups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationGroup->exists($id)) {
			throw new NotFoundException(__('Invalid organization group'));
		}
		$options = array('conditions' => array('OrganizationGroup.' . $this->OrganizationGroup->primaryKey => $id));
		$this->set('organizationGroup', $this->OrganizationGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationGroup->create();
			if ($this->OrganizationGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The organization group has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization group could not be saved. Please, try again.'),'flash/error');
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
		if (!$this->OrganizationGroup->exists($id)) {
			throw new NotFoundException(__('Invalid organization group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The organization group has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization group could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('OrganizationGroup.' . $this->OrganizationGroup->primaryKey => $id));
			$this->request->data = $this->OrganizationGroup->find('first', $options);
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
		$this->OrganizationGroup->id = $id;
		if (!$this->OrganizationGroup->exists()) {
			throw new NotFoundException(__('Invalid organization group'),'flash/warning');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationGroup->delete()) {
			$this->Session->setFlash(__('Organization group deleted'),'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization group was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
