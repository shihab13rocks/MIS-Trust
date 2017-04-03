<?php
App::uses('AppController', 'Controller');
/**
 * ExpenseTypes Controller
 *
 * @property ExpenseType $ExpenseType
 * @property PaginatorComponent $Paginator
 */
class ExpenseTypesController extends AppController {

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
		$this->ExpenseType->recursive = 0;
		$this->set('expenseTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExpenseType->exists($id)) {
			throw new NotFoundException(__('Invalid expense type'));
		}
		$options = array('conditions' => array('ExpenseType.' . $this->ExpenseType->primaryKey => $id));
		$this->set('expenseType', $this->ExpenseType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExpenseType->create();
			if ($this->ExpenseType->save($this->request->data)) {
				$this->Session->setFlash(__('The expense type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expense type could not be saved. Please, try again.'));
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
		if (!$this->ExpenseType->exists($id)) {
			throw new NotFoundException(__('Invalid expense type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExpenseType->save($this->request->data)) {
				$this->Session->setFlash(__('The expense type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expense type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExpenseType.' . $this->ExpenseType->primaryKey => $id));
			$this->request->data = $this->ExpenseType->find('first', $options);
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
		$this->ExpenseType->id = $id;
		if (!$this->ExpenseType->exists()) {
			throw new NotFoundException(__('Invalid expense type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ExpenseType->delete()) {
			$this->Session->setFlash(__('The expense type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The expense type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
