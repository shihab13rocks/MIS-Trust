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
			$incomes = $this->Income->find('all', array( 'conditions' => $where_i ));	
			$incomeSum = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc'), 'conditions' => $where_i ));
			
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
			$expenses = $this->Expense->find('all', array( 'conditions' => $where_e));	
			$expenseSum = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp'), 'conditions' => $where_e ));
			
			if($incomeSum[0][0]['inc'] == null) $incomeSum[0][0]['inc'] = 0;
			if($expenseSum[0][0]['exp'] == null) $expenseSum[0][0]['exp'] = 0;
			
			array_push($balances, $duration,$incomeSum[0][0]['inc'], $expenseSum[0][0]['exp'], $incomeSum[0][0]['inc'] - $expenseSum[0][0]['exp']);
			//debug($balances);die;
		}
		else
		{
			$incomes = $this->Income->find('all');
			$expenses = $this->Expense->find('all');
			
			$incomeSum = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc')));
			$expenseSum = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp')));
				
			if($incomeSum[0][0]['inc'] == null) $incomeSum[0][0]['inc'] = 0;
			if($expenseSum[0][0]['exp'] == null) $expenseSum[0][0]['exp'] = 0;
			
			array_push($balances, 'All', $incomeSum[0][0]['inc'], $expenseSum[0][0]['exp'], $incomeSum[0][0]['inc'] - $expenseSum[0][0]['exp']);
		}
		$incomeTypes = $this->Income->IncomeType->find('list');
		$expenseTypes = $this->Expense->ExpenseType->find('list');
		$this->set(compact('searchParams', 'balances', 'incomes', 'expenses', 'incomeTypes', 'expenseTypes'));
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
	
	public function particularReport() {
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
			$incomes = $this->Income->find('all', array( 'conditions' => $where_i, 'group' => '`Income`.`income_type_id`'));	
			$incomeSum = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc'), 'conditions' => $where_i));
			
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
			$expenses = $this->Expense->find('all', array( 'conditions' => $where_e));	
			$expenseSum = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp'), 'conditions' => $where_e));
			
			if($incomeSum[0][0]['inc'] == null) $incomeSum[0][0]['inc'] = 0;
			if($expenseSum[0][0]['exp'] == null) $expenseSum[0][0]['exp'] = 0;
			
			array_push($balances, $duration,$incomeSum[0][0]['inc'], $expenseSum[0][0]['exp'], $incomeSum[0][0]['inc'] - $expenseSum[0][0]['exp']);
			//debug($balances);die;
		}
		else
		{
			$incomes = $this->Income->find('all');
			$expenses = $this->Expense->find('all');
			
			$incomeSum = $this->Income->find('all', array('fields'=>array('sum(Income.paid) AS inc')));
			$expenseSum = $this->Expense->find('all', array('fields'=>array('sum(Expense.paid) AS exp')));
				
			if($incomeSum[0][0]['inc'] == null) $incomeSum[0][0]['inc'] = 0;
			if($expenseSum[0][0]['exp'] == null) $expenseSum[0][0]['exp'] = 0;
			
			array_push($balances, 'All', $incomeSum[0][0]['inc'], $expenseSum[0][0]['exp'], $incomeSum[0][0]['inc'] - $expenseSum[0][0]['exp']);
		}
		$incomeTypes = $this->Income->IncomeType->find('list');
		$expenseTypes = $this->Expense->ExpenseType->find('list');
		$this->set(compact('searchParams', 'balances', 'incomes', 'expenses', 'incomeTypes', 'expenseTypes'));
	}
	
	/* backup the db OR just a table */
	function backup_tables($host,$user,$pass,$name,$tables = '*')
	{
		$con = mysql_connect($host,$user,$pass);
		mysql_select_db($name,$con);
		
		//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		$return = "";
		
		//cycle through
		foreach($tables as $table)
		{
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "nn".$row2[1].";nn";
			
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++)
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace("#n#","n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");n";
			}
			$return.="nnn";
		}
		
		//save file
		$filename = 'db-backup-'.time();
		//echo $_SERVER['DOCUMENT_ROOT'].'/DB Backup/'.$filename.'.sql';exit;
		if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/DB_Backup')) mkdir($_SERVER['DOCUMENT_ROOT'].'/DB_Backup');
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/DB_Backup/'.$filename.'.sql','w+');
		fwrite($handle,$return);
		fclose($handle);
		//return $filename;
	}
	
	function recurse_zip($src,&$zip,$path_length) {
		$dir = opendir($src);
		while(false !== ( $file = readdir($dir)) ) {
		    if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
			    $this->recurse_zip($src . '/' . $file,$zip,$path_length);
			}
			else {
			    $zip->addFile($src . '/' . $file,substr($src . '/' . $file,$path_length));
			}
		    }
		}
		closedir($dir);
	}
	//Call this function with argument = absolute path of file or directory name.
	function compress($src)
	{
		if(substr($src,-1)==='/'){$src=substr($src,0,-1);}
		$arr_src=explode('/',$src);
		$tmp = array();
		array_push($tmp, $src);
		$filename=end($tmp);
		unset($arr_src[count($arr_src)-1]);
		$path_length=strlen(implode('/',$arr_src).'/');
		$f=explode('.',$filename);
		$filename=$f[0];
		$filename=(($filename=='')? 'backup.zip' : $filename.'.zip');

		$zip = new ZipArchive;
		$res = $zip->open($filename, ZipArchive::CREATE);
		if($res !== TRUE){
			echo 'Error: Unable to create zip file';
			exit;}
		if(is_file($src)){$zip->addFile($src,substr($src,$path_length));}
		else{
			if(!is_dir($src)){
			     $zip->close();
			     @unlink($filename);
			     echo 'Error: File not found';
			     exit;}
		$this->recurse_zip($src,$zip,$path_length);}
		$zip->close();
		//echo $filename;exit;
		//header("Location: $_SERVER['DOCUMENT_ROOT'].'/xadmin/app/webroot/'.$filename");
		//exit;
		//echo $_SERVER['DOCUMENT_ROOT'].$filename;exit;
		/*header('Content-Description: File Transfer');
		header('Content-Type: application/zip');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		ob_clean();
		flush();
		readfile($filename);
		exit;*/
	}
	
	/* backup the db OR just a table */
	public function backup()
	{
		//echo $_SERVER['DOCUMENT_ROOT'];exit;
		$this->backup_tables('localhost', 'ummahat1_admin', '951236', 'ummahat1_admin');
		//$this->compress($_SERVER['DOCUMENT_ROOT'].'/administrator');
	}
	
}
