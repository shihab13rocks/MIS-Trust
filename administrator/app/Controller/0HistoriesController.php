<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class HistoriesController extends AppController {

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
	
	public function transaction() {
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
			$where['Income.user_id ='] = AuthComponent::user('id');
			
			$incomes = $this->Income->find('all', array( 'conditions' => $where ));
		}
		else
		{
			$where['Income.status >'] = 0;
			$where['Income.user_id ='] = AuthComponent::user('id');
			
			$incomes = $this->Income->find('all', array( 'conditions' => $where ));
		}
		//debug($incomeTotal);die;
		$incomeTypes = $this->Income->IncomeType->find('list');
		$books = $this->Income->Book->find('list');
		$purposes = $this->Income->Purpose->find('list');
		$this->set(compact('searchParams', 'incomes', 'incomeTypes', 'books', 'purposes'));
	}
}
