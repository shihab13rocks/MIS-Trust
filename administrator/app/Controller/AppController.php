<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');
App::uses('SettingsController', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/** 
	 * default pagination limit
	 *
	 */	
	public $paginate = array('limit' => 9999999999);
	
	/** 
	 * default components
	 *
	 */	
	public $components = array(
		'Session',
		'Rights',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Dashboards', 'action' => 'index'),
            'logoutRedirect' => array('controller '=> 'Pages', 'action' => 'index','home'),
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array('username' => 'username', 'password' => 'password')
				)
			)
		)
	);
	
	/** 
	 * default helpers
	 *
	 */
	public $helpers = array(
		'Html' => array('className' => 'BoostrapHtml'),
		'Form' => array('className' => 'BoostrapForm'),
		'Paginator' => array('className' => 'BoostrapPaginator'),
		'App' => array('className' => 'Generic')
	);

	/** 
	 * default theme
	 *
	 */
	//public $theme = "Website";
	
	/** 
	 * beforeFilter
	 *
	 */	
	public function beforeFilter() {
		parent::beforeFilter();
		// set default theme after login
		$this->setCurrentTheme();
		
		// Accessable Methods 
		$this->Auth->allow('validateLogin', 'login', 'logout','forgotPassword');
		
		// load Settings from database
		$settings = new SettingsController();
		$settings->getSiteSetting();
		
		// Page Title setting 
		if (Inflector::humanize($this->params['controller'])!='Pages') {
			$this->setSiteAndPageTitle();
		}

		// Theme Dir
		$this->setFolderPath();

		// Authorized controller for top menu
		$this->Rights->isAuthorizedController();
	}	

	/** 
	 * before render
	 *
	 */
	public function beforeRender() {
		parent::beforeRender();
	}	
	
   /**
	* checking authorized user 
	*
	*/	
	public function isAuthorized($user) {
		if (in_array($this->action, $this->Rights->isAuthorizedActions())) {
			return true;
		} else {
			$this->Session->setFlash(__('You don\'t have access right!'),'flash/error');
			return false;
		}
	}

   /**
	* set Current Theme
	*
	*/	
	public function setCurrentTheme() {
		if (AuthComponent::user()) {
			$this->theme = 'Admin';
			
			if ($this->params['controller'] == '') {
				$this->redirect(array('controller'=>'Dashboard'));
			}			

			if ($this->params['controller'] == 'Pages' && ($this->params['action']=='index'||$this->params['action']=='home')) {
				$this->theme = 'Website';
			} 
		} else {
			$this->theme = 'Website';
		}
	}	
	
   /**
	* set page title
	*
	*/	
	public function setSiteAndPageTitle() {
		if (Inflector::humanize($this->params['controller'])!='Pages') {
			// Page Title
			Configure::write('pageTitle', __(Inflector::humanize(Inflector::underscore($this->params['controller']))));
			
			// Action Page Title
			$actionTitle  =  __(Inflector::humanize(Inflector::underscore($this->action)));
			$actionTitle  = ($actionTitle=='Index')? 'List of' : $actionTitle;
			Configure::write('currentAction', $actionTitle.' '.Inflector::singularize(Configure::read('pageTitle')));
		}
	}	

   /**
	* set path
	*
	*/	
	public function setFolderPath() {
		// Theme Dir
		Configure::write('Dir.themed', APP . 'View' . DS . 'Themed' . DS);
		Configure::write('Dir.upload', Configure::read('Dir.themed') . $this->theme . DS . 'webroot' . DS . 'upload');
		Configure::write('Dir.logo',   Configure::read('Dir.themed') . $this->theme . DS . 'webroot' . DS . 'upload'. DS . 'logo');
		Configure::write('Dir.user',   Configure::read('Dir.themed') . $this->theme . DS . 'webroot' . DS . 'upload'. DS . 'user');	
		
		// Theme Web path
		Configure::write('Path.upload', $this->theme .'/upload');
		Configure::write('Path.logo',   '/upload/logo');
		Configure::write('Path.user',   '/upload/user');	
		Configure::write('Path.noImage',  '/img/no-image/');
		
		// current basename
		$currentPath = pathinfo($this->here);
		Configure::write('Path.basename', $currentPath['basename']);
	}	
	
} // end of the App Class