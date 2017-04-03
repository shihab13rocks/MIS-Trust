<?php
App::uses('AppController', 'Controller');
/**
 * IncomeTypes Controller
 *
 * @property IncomeType $IncomeType
 * @property PaginatorComponent $Paginator
 */
class IncomeTypesController extends AppController {

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
		$this->IncomeType->recursive = 0;
		$this->set('incomeTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->IncomeType->exists($id)) {
			throw new NotFoundException(__('Invalid income type'));
		}
		$options = array('conditions' => array('IncomeType.' . $this->IncomeType->primaryKey => $id));
		$this->set('incomeType', $this->IncomeType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IncomeType->create();
			if ($this->IncomeType->save($this->request->data)) {
				$this->Session->setFlash(__('The income type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income type could not be saved. Please, try again.'));
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
		if (!$this->IncomeType->exists($id)) {
			throw new NotFoundException(__('Invalid income type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->IncomeType->save($this->request->data)) {
				$this->Session->setFlash(__('The income type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('IncomeType.' . $this->IncomeType->primaryKey => $id));
			$this->request->data = $this->IncomeType->find('first', $options);
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
		$this->IncomeType->id = $id;
		if (!$this->IncomeType->exists()) {
			throw new NotFoundException(__('Invalid income type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->IncomeType->delete()) {
			$this->Session->setFlash(__('The income type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The income type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
