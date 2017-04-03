<?php
App::uses('AppController', 'Controller');
/**
 * Expenses Controller
 *
 * @property Expense $Expense
 * @property PaginatorComponent $Paginator
 */
class ExpensesController extends AppController {

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
		$this->Expense->recursive = 0;
		$this->set('expenses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Expense->exists($id)) {
			throw new NotFoundException(__('Invalid expense'));
		}
		$options = array('conditions' => array('Expense.' . $this->Expense->primaryKey => $id));
		$this->set('expense', $this->Expense->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Expense->create();
			
			$this->request->data['Expense']['due'] = $this->request->data['Expense']['payable_amount'] - $this->request->data['Expense']['paid'];
			
			if ($this->Expense->save($this->request->data)) {
				$this->Session->setFlash(__('The expense has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expense could not be saved. Please, try again.'));
			}
		}
		$expenseTypes = $this->Expense->ExpenseType->find('list');
		$payments = $this->Expense->Payment->find('list');
		$purposes = $this->Expense->Purpose->find('list');
		$this->set(compact('expenseTypes', 'purposes', 'payments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Expense->exists($id)) {
			throw new NotFoundException(__('Invalid expense'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->request->data['Expense']['due'] = $this->request->data['Expense']['payable_amount'] - $this->request->data['Expense']['paid'];
			
			if ($this->Expense->save($this->request->data)) {
				$this->Session->setFlash(__('The expense has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expense could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Expense.' . $this->Expense->primaryKey => $id));
			$this->request->data = $this->Expense->find('first', $options);
		}
		$expenseTypes = $this->Expense->ExpenseType->find('list');
		$payments = $this->Expense->Payment->find('list');
		$purposes = $this->Expense->Purpose->find('list');
		$this->set(compact('expenseTypes', 'purposes', 'payments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Expense->id = $id;
		if (!$this->Expense->exists()) {
			throw new NotFoundException(__('Invalid expense'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Expense->delete()) {
			$this->Session->setFlash(__('The expense has been deleted.'));
		} else {
			$this->Session->setFlash(__('The expense could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
