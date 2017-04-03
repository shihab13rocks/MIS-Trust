<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

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
		$this->Message->recursive = 0;
		$option = array(
			'conditions' => array(
				'Message.user_id =' => array(0, AuthComponent::user('id')), 
				'Message.status' => 1
			)
		);
		$messages = $this->Message->find('all', $option);
		$this->set('messages', $messages);
		$users = $this->Message->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$this->set('users', $users);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
		$users = $this->Message->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$this->set('users', $users);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if(isset($this->request->data['Message']['user_id']))
			{
				if($this->request->data['Message']['user_id'] == NULL || $this->request->data['Message']['user_id'] == '' || $this->request->data['Message']['user_id'] == 'all')
				{
					$this->request->data['Message']['user_id'] = 0;
				}
			}
			else
			{
				$this->request->data['Message']['user_id'] = 2;
			}
			$this->request->data['Message']['from'] = AuthComponent::user('id');
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		}
		//$users = $this->Message->User->find('list');
		$users = array(NULL=>'All');
		$users += $this->Message->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Message']['user_id'] == NULL || $this->request->data['Message']['user_id'] == '' || $this->request->data['Message']['user_id'] == 'all')
			{
				$this->request->data['Message']['user_id'] = 0;
			}
			//$this->request->data['Message']['from'] = AuthComponent::user('id');
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		//$users = $this->Message->User->find('list');
		$users = array(NULL=>'All');
		$users += $this->Message->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Message->delete()) {
			$this->Session->setFlash(__('The message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
