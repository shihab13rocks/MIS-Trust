<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'Highcharts/Highchart');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
	
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Contact');
	public $theme = "Website";
	public $layout = 'default';
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','home','contactus');
	}		
	
	public function beforeRender() {
		parent::beforeRender();
	}	
	
	public function index($page="home") {
		// by default, chart is null and required to each page
		$chart = null;
		Configure::write('Path.logo', '/theme/Admin/upload/logo');

		if ($page) {
			
			$viewName = Inflector::slug($page,'_');

			// Page Title
			Configure::write('pageTitle', __(Inflector::humanize(Inflector::underscore($viewName))));
		
			// Action Page Title
			$actionTitle  =  __(Inflector::humanize(Inflector::underscore($viewName)));
			$actionTitle  = ($actionTitle=='Index'||$actionTitle=='Home')? __('Welcom to '.Configure::read('Setting.siteName')) : $actionTitle;
			Configure::write('currentAction', $actionTitle);
		}

		if ($page == 'home') {
			$this->set(compact('chart'));		
		}		
		
		if ($page == 'refineries') {
			$refineries = $this->refineries();
			$this->set(compact('refineries','chart'));		
		}
		
		if ($page == 'productions') {
			$productionInformations = $this->productions();
			$chart[] = $this->totalProductionChart();	
			$this->set(compact('productionInformations','chart'));		
		}

		$this->render("/Pages/{$viewName}");
	}	
	
/**
 * Displays home
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function home() {}	
	protected function about_us() {}	
	
	protected function refineries() {
		$this->loadModel('Organization');
		$this->Organization->recursive = 0;
		
		return $this->Organization->find('all', array(
			'conditions' => array(
				'Organization.bsti_license_no !=' =>"",
				'Organization.organization_type_id =' =>3,
				'Organization.status =' =>1,
			),
			'order' => array('Organization.title ASC')
		));
	}		
	
	protected function productions() {
		$data = array();
		$this->loadModel('Production');
		$this->Production->recursive = 1;
		$productions = $this->Production->find('all',array(
			'fields' => array(
				'Premix.name',
				'Production.product_fortified',
				'Production.production_date',
				'Production.premix_used',
				'Production.product_refined'
			)
		));
		
		if($productions){		
			foreach($productions as $production){
				$allYears[] = CakeTime::format($production['Production']['production_date'], '%Y');
			}
			
			if($allYears){
				$allYears = array_unique($allYears);
				
				foreach($allYears as $value){
					foreach($productions as $production){
						$year = CakeTime::format($production['Production']['production_date'], '%Y');
						$month = date('n',CakeTime::fromString($production['Production']['production_date']));
						if($value==$year){
							$data['productionReport'][$year][$month][] = $production['Production'];
						}
					}
				}	
			}
		}
		
		return $data;	
	}	
	
	protected function totalProductionChart() {
		$barChart = new Highchart(0, 10, true);
		
		$barChart->credits->enabled = false;
		$barChart->data->table = "productionChartTable";
		$barChart->chart->type = "column";
		$barChart->chart->height = 600;
		$barChart->chart->renderTo = "productionChartContainer";
		$barChart->title->text = "Total Production Chart";
		$barChart->xAxis = new HighchartOption();
		$barChart->xAxis->title->text = "Months and Years";
		$barChart->yAxis->title->text = "Productions (MT)";
		$barChart->plotOptions->bar->dataLabels->enabled = 1;
		$barChart->tooltip->formatter = new HighchartJsExpr(
			"function() { return this.x + '<br /><b>'+ this.series.name +'</b><br/>'+ this.y +' (MT)'}"
		);
		
		return $barChart;
	}	
	
	public function contactus() {
		if( $this->request->is('post')) {
		
			$data = array(
				'Contact' => array(
					'name' => $this->request->data['Contact']['name'],
					'email' => $this->request->data['Contact']['email'],
					'subject' => $this->request->data['Contact']['subject'],
					'message' => $this->request->data['Contact']['message'],
				),
				'siteName' => Configure::read('Setting.siteName')

			);
			
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$email = new CakeEmail();
				$email->template('feedback','default')
					  ->sender(Configure::read('Setting.adminEmail'), Configure::read('Setting.siteName'))
					  ->emailFormat('html')
					  ->helpers(array('Html','Text'))					  
					 // ->config('gmail')
					  ->from( array($this->request->data['Contact']['email'] => Configure::read('Setting.siteName')) )
					  ->to( Configure::read('Setting.contactEmail') )
					  ->subject(__(Configure::read('Setting.siteName').': Feedback Mail'))					  
					  ->viewVars($data);

				if($email->send()) {
					$this->Session->setFlash(__('The mail is successfully sent to admin!'), 'flash/success');
					$this->theme = 'Website';
					$this->redirect('/contact-us');
				} else {
					$this->Session->setFlash(__('The mail is failed. Please try again!'), 'flash/warning');				
				}
			} else {
				$this->Session->setFlash(__('The mail is failed. Please try again!'),'flash/error');
			}
		}
	}		
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		
		// converting slug to underscore 
		if ($subpage) {
			$viewName = Inflector::slug($subpage);
		} else {
			$viewName = 'index';
		}
		
		//debug($viewName); exit;
		
		try {
			$this->render("/{$page}/{$viewName}");
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
