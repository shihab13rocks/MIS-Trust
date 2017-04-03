<?php
App::uses('AppController', 'Controller');
/**
 * OrganizationTypes Controller
 *
 * @property OrganizationType $OrganizationType
 */
class OrganizationTypesController extends AppController {
	public function beforeRender() {
		parent::beforeRender();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrganizationType->recursive = 0;
		$this->set('organizationTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__('Invalid organization type'));
		}
		$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
		$this->set('organizationType', $this->OrganizationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrganizationType->create();
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__('The organization type has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization type could not be saved. Please, try again.'),'flash/error');
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
		if (!$this->OrganizationType->exists($id)) {
			throw new NotFoundException(__('Invalid organization type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrganizationType->save($this->request->data)) {
				$this->Session->setFlash(__('The organization type has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization type could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('OrganizationType.' . $this->OrganizationType->primaryKey => $id));
			$this->request->data = $this->OrganizationType->find('first', $options);
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
		$this->OrganizationType->id = $id;
		if (!$this->OrganizationType->exists()) {
			throw new NotFoundException(__('Invalid organization type'),'flash/warning');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrganizationType->delete()) {
			$this->Session->setFlash(__('Organization type deleted'),'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization type was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
