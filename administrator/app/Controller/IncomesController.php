<?php
App::uses('AppController', 'Controller');
/**
 * Incomes Controller
 *
 * @property Income $Income
 * @property PaginatorComponent $Paginator
 */
class IncomesController extends AppController {

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
		$this->Income->recursive = 0;
		$this->set('incomes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Income->exists($id)) {
			throw new NotFoundException(__('Invalid income'));
		}
		$options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
		$this->set('income', $this->Income->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Income->create();
			
			$this->request->data['Income']['due'] = $this->request->data['Income']['payable_amount'] - $this->request->data['Income']['paid'];
			if($this->request->data['Income']['user_id'] == NULL)
			{
				$this->request->data['Income']['user_id'] = 0;
			}
			/*if($this->request->data['Income']['name'] == '' || $this->request->data['Income']['name'] == NULL)
			{
				$this->request->data['Income']['name'] = $this->Income->User->find('list',array('fields' => 'User.first_name', 'conditions' => array('User.user_id =' => $this->request->data['Income']['user_id'])));
			}*/
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
			}
		}
		$incomeTypes = $this->Income->IncomeType->find('list');
		$books = $this->Income->Book->find('list');
		$users = array(NULL=>'None');
		$users += $this->Income->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$payments = $this->Income->Payment->find('list');
		$purposes = $this->Income->Purpose->find('list');
		$this->set(compact('incomeTypes', 'books', 'users', 'purposes', 'payments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Income->exists($id)) {
			throw new NotFoundException(__('Invalid income'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->request->data['Income']['due'] = $this->request->data['Income']['payable_amount'] - $this->request->data['Income']['paid'];
			if($this->request->data['Income']['user_id'] == NULL)
			{
				$this->request->data['Income']['user_id'] = 0;
			}
			if($this->request->data['Income']['name'] == '' || $this->request->data['Income']['name'] == NULL)
			{
				$this->request->data['Income']['name'] = $this->Income->User->find('list',array('fields' => 'User.first_name', 'conditions' => array('User.user_id =' => $this->request->data['Income']['user_id'])));
			}
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
			$this->request->data = $this->Income->find('first', $options);
		}
		$incomeTypes = $this->Income->IncomeType->find('list');
		$books = $this->Income->Book->find('list');
		$users = array(NULL=>'None');
		$users += $this->Income->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$payments = $this->Income->Payment->find('list');
		$purposes = $this->Income->Purpose->find('list');
		$this->set(compact('incomeTypes', 'books', 'users', 'purposes', 'payments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Income->id = $id;
		if (!$this->Income->exists()) {
			throw new NotFoundException(__('Invalid income'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Income->delete()) {
			$this->Session->setFlash(__('The income has been deleted.'));
		} else {
			$this->Session->setFlash(__('The income could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
