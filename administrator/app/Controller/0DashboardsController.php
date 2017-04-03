<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class DashboardsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->loadModel('Message');
            $this->Message->recursive = 0;
            $option = array(
                    'conditions' => array(
                            'Message.user_id =' => array(0, AuthComponent::user('id')), 
                            'Message.status' => 1
                    ),
                    'order' => 'Message.id DESC',
                    'limit' => 3
            );
            $messages = $this->Message->find('all', $option);
            $this->set('messages', $messages);
            $users = $this->Message->User->find('list',array('fields' => 'User.username', 'conditions' => array('User.user_role_id >' => 1)));
            $this->set('users', $users);
            
            $incomes = array();
            $expenses = array();
            $balances = array();

            $this->loadModel('Income');
            $this->Income->recursive = 0;
            
            $this->loadModel('Expense');
            $this->Expense->recursive = 0;
            
            $incomes = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc')));
            $expenses = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp')));
                    
            if($incomes[0][0]['inc'] == null) $incomes[0][0]['inc'] = 0;
            if($expenses[0][0]['exp'] == null) $expenses[0][0]['exp'] = 0;
            
            array_push($balances, 'All', $incomes[0][0]['inc'], $expenses[0][0]['exp'], $incomes[0][0]['inc'] - $expenses[0][0]['exp']);
            $this->set('balances', $balances);
        }

	
}
