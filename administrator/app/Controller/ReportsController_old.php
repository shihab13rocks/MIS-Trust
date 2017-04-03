<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class ReportsController extends AppController {

/**
 * Before Render method
 *
 * @return void
 */
	public function beforeRender() {
		parent::beforeRender();
		$actionTitle  =  __(Inflector::humanize(Inflector::underscore($this->action)));
		Configure::write('currentAction', $actionTitle);
	}
	
/**
 * Index method
 *
 * @return void
 */	
	public function index() {}


	
/**
 * Training Report method
 *
 * @return void
 */	
	public function balanceReport() {
		$searchParams = array();
		
		$incomes = array();
		$expenses = array();
		$balances = array();
		
		$where_i = array();
		$where_e = array();
		
		$this->loadModel('Income');
		$this->Income->recursive = 0;
		
		$this->loadModel('Expense');
		$this->Expense->recursive = 0;
		
		if($this->request->data){
			$duration = 'From ';
			$searchParams = array(
				'Balance' => array(
					'from_date' => $this->request->data['Balance']['from_date'],
					'to_date' => $this->request->data['Balance']['to_date']
				)
			);		
		
			$where_i['Income.status >'] = 0; 
		
			if($searchParams['Balance']['from_date'] && $searchParams['Balance']['to_date'] == false){
				$where_i['Income.date >='] = $searchParams['Balance']['from_date'];
				$duration .= $searchParams['Balance']['from_date'].' To Current';
			}
		
			if($searchParams['Balance']['from_date'] == false && $searchParams['Balance']['to_date']){
				$where_i['Income.date <='] = $searchParams['Balance']['to_date'];
				$duration .= 'Begining To '.$searchParams['Balance']['to_date'];
			}			
			
			if($searchParams['Balance']['from_date'] && $searchParams['Balance']['to_date']){
				$where_i['Income.date >='] = $searchParams['Balance']['from_date']; 
				$where_i['Income.date <='] = $searchParams['Balance']['to_date'];
				$duration .= $searchParams['Balance']['from_date'].' To '.$searchParams['Balance']['to_date'];
			}
				
			$incomes = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc'), 'conditions' => $where_i ));
			
			$where_e['Expense.status >'] = 0; 
		
			if($searchParams['Balance']['from_date'] && $searchParams['Balance']['to_date'] == false){
				$where_e['Expense.date >='] = $searchParams['Balance']['from_date']; 
			}
		
			if($searchParams['Balance']['from_date'] == false && $searchParams['Balance']['to_date']){
				$where_e['Expense.date <='] = $searchParams['Balance']['to_date']; 
			}			
			
			if($searchParams['Balance']['from_date'] && $searchParams['Balance']['to_date']){
				$where_e['Expense.date >='] = $searchParams['Balance']['from_date']; 
				$where_e['Expense.date <='] = $searchParams['Balance']['to_date']; 
			}
				
			$expenses = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp'), 'conditions' => $where_e ));
			
			if($incomes[0][0]['inc'] == null) $incomes[0][0]['inc'] = 0;
			if($expenses[0][0]['exp'] == null) $expenses[0][0]['exp'] = 0;
			
			array_push($balances, $duration,$incomes[0][0]['inc'], $expenses[0][0]['exp'], $incomes[0][0]['inc'] - $expenses[0][0]['exp']);
			//debug($balances);die;
		}
		else
		{
			$incomes = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc')));
			$expenses = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp')));
				
			if($incomes[0][0]['inc'] == null) $incomes[0][0]['inc'] = 0;
			if($expenses[0][0]['exp'] == null) $expenses[0][0]['exp'] = 0;
			
			array_push($balances, 'All', $incomes[0][0]['inc'], $expenses[0][0]['exp'], $incomes[0][0]['inc'] - $expenses[0][0]['exp']);
		}
		$this->set(compact('searchParams', 'balances'));
	}
	
	
	
	
	public function incomeReport() {
		$searchParams = array();
		$incomes = array();
		$where = array();
		
		$this->loadModel('Income');
		$this->Income->recursive = 1;	
		
		if($this->request->data){
			$duration = 'From ';
			$searchParams = array(
				'Income' => array(
					'from_date' => $this->request->data['Income']['from_date'],
					'to_date' => $this->request->data['Income']['to_date'],
					'income_type_id' =>$this->request->data['Income']['income_type_id'],
					'book_id' =>$this->request->data['Income']['book_id'],
					'purpose_id' =>$this->request->data['Income']['purpose_id']
					)
			);		
		
			$where['Income.status >'] = 0; 
			
			if($searchParams['Income']['income_type_id'] != 'all' && $searchParams['Income']['income_type_id'] != false){
				$where['Income.income_type_id'] = $searchParams['Income']['income_type_id'];
			}
			
			if($searchParams['Income']['book_id'] != 'all' && $searchParams['Income']['book_id'] != false){
				$where['Income.book_id'] = $searchParams['Income']['book_id'];
			}
			
			if($searchParams['Income']['purpose_id'] != 'all' && $searchParams['Income']['purpose_id'] != false){
				$where['Income.purpose_id'] = $searchParams['Income']['purpose_id'];
			}
			
			if($searchParams['Income']['from_date'] && $searchParams['Income']['to_date'] == false){
				$where['Income.date >='] = $searchParams['Income']['from_date'];
				$duration .= $searchParams['Income']['from_date'].' To Current';
			}
		
			if($searchParams['Income']['from_date'] == false && $searchParams['Income']['to_date']){
				$where['Income.date <='] = $searchParams['Income']['to_date'];
				$duration .= 'Begining To '.$searchParams['Income']['to_date'];
			}			
			
			if($searchParams['Income']['from_date'] && $searchParams['Income']['to_date']){
				$where['Income.date >='] = $searchParams['Income']['from_date']; 
				$where['Income.date <='] = $searchParams['Income']['to_date'];
				$duration .= $searchParams['Income']['from_date'].' To '.$searchParams['Income']['to_date'];
			}
			
			$incomes = $this->Income->find('all', array( 'conditions' => $where ));
		}
		else
		{
			$incomes = $this->Income->find('all');
		}
		//debug($incomeTotal);die;
		$incomeTypes = $this->Income->IncomeType->find('list');
		$books = $this->Income->Book->find('list');
		$purposes = $this->Income->Purpose->find('list');
		$this->set(compact('searchParams', 'incomes', 'incomeTypes', 'books', 'purposes'));
	}
	
	public function expenseReport() {
		$searchParams = array();
		$expenses = array();
		$where = array();
		
		$this->loadModel('Expense');
		$this->Expense->recursive = 1;	
		
		if($this->request->data){
			$duration = 'From ';
			$searchParams = array(
				'Expense' => array(
					'from_date' => $this->request->data['Expense']['from_date'],
					'to_date' => $this->request->data['Expense']['to_date'],
					'expense_type_id' =>$this->request->data['Expense']['expense_type_id'],
					'purpose_id' =>$this->request->data['Expense']['purpose_id']
					)
			);		
		
			$where['Expense.status >'] = 0; 
			
			if($searchParams['Expense']['expense_type_id'] != 'all' && $searchParams['Expense']['expense_type_id'] != false){
				$where['Expense.expense_type_id'] = $searchParams['Expense']['expense_type_id'];
			}
			
			if($searchParams['Expense']['purpose_id'] != 'all' && $searchParams['Expense']['purpose_id'] != false){
				$where['Expense.purpose_id'] = $searchParams['Expense']['purpose_id'];
			}
			
			if($searchParams['Expense']['from_date'] && $searchParams['Expense']['to_date'] == false){
				$where['Expense.date >='] = $searchParams['Expense']['from_date'];
				$duration .= $searchParams['Expense']['from_date'].' To Current';
			}
		
			if($searchParams['Expense']['from_date'] == false && $searchParams['Expense']['to_date']){
				$where['Expense.date <='] = $searchParams['Expense']['to_date'];
				$duration .= 'Begining To '.$searchParams['Expense']['to_date'];
			}			
			
			if($searchParams['Expense']['from_date'] && $searchParams['Expense']['to_date']){
				$where['Expense.date >='] = $searchParams['Expense']['from_date']; 
				$where['Expense.date <='] = $searchParams['Expense']['to_date'];
				$duration .= $searchParams['Expense']['from_date'].' To '.$searchParams['Expense']['to_date'];
			}
			
			$expenses = $this->Expense->find('all', array( 'conditions' => $where ));
		}
		else
		{
			$expenses = $this->Expense->find('all');
		}
		$expenseTypes = $this->Expense->ExpenseType->find('list');
		$purposes = $this->Expense->Purpose->find('list');
		$this->set(compact('searchParams', 'expenses', 'expenseTypes', 'purposes'));
	}
	
}
