<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');
App::uses('AppHelper', 'View/Helper');
App::uses('HtmlHelper', 'View/Helper');
App::uses('FormHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class GenericHelper extends AppHelper {

	public $helpers = array('Html','Form');

/**
 * Rights (All)
 *
 * @var array
 */	
	protected $_AllRights = array(
		'Dashboards' => array('index'),
		'Contacts' => array('add','edit','delete','view','index'),
		'OrganizationGroups' => array('add','edit','delete','view','index'),
		'Organizations' => array('add','edit','delete','view','index','profile'),
		'OrganizationTypes' => array('add','edit','delete','view','index'),
		'Settings' => array('add','edit','delete','view','index'),
		'UserRoles' => array('add','edit','delete','view','index'),
		'Users' => array('add','edit','delete','view','index','profile'),
		'UserTypes' => array('add','edit','delete','view','index')
			
	);

/**
 * html tags used by this helper.
 *
 * @var array
 */
	protected $_GenericTags = array(
		'file' => '<a href="%s" title="%s">%s</a>',
		'image' => '<img src="%s" alt="%s" />',
		'css' => '<link rel="stylesheet" type="text/css" href="%s" />',
		'js' => '<script type="text/javascript" href="%s"></script>'
	);

/**
 * Status dropdown value (0 or 1) to string (Active or Inactive)
 *
 */
	public function statusList($published = false) {
		$status = array();
		$status[0] = __('Inactive');
		$status[1] = __('Active');
		
		if ($published == true)
			$status[2] = __('Published');

		return $status;
	}
	
/**
 * attendance type dropdown value (1 , 2 or 3) to string (full day , Half day or absence)
 *
 */
	public function attendanceList() {
		$type = array();
		$type[1] = __('Full Day');
		$type[2] = __('Half Day');
		$type[3] = __('Leave');
		
		return $type;
	}
	
/**
 * View Status value (0 or 1) to string (Active or Inactive)
 *
 */
	public function viewAttendance($i) {
		switch($i) {
			case 1: $type = '<span class="label label-success">Full Day</span>'; 
			break;
			case 2: $type = '<span class="label label-important">Half Day</span>'; 
			break;
			case 3: $type = '<span class="label label-inactive">Leave</span>';
			break;	
			default: $type = 'No Type';
		}

		return $type;
	}	
/**
 * View Status value (0 or 1) to string (Active or Inactive)
 *
 */
	public function viewStatus($i) {
		switch($i) {
			case 0: $status = '<span class="label label-inactive">Inactive</span>';
			break;	
			case 1: $status = '<span class="label label-success">Active</span>'; 
			break;
			case 2: $status = '<span class="label label-important">Lave</span>'; 
			break;
			default: $status = 'No Status';
		}

		return $status;
	}
	
/**
 * All status array 
 *
 *	'0' => 'Inactive',
 *	'1' => 'Active',
 *	'2' => 'Requested',
 *	'3' => 'Processing',
 *	'4' => 'Delivered ',
 *	'5' => 'Completed'
 *
 */
	public function allStatusList($organizationType = 3) {
		$status = array();
		
		if ($organizationType == 3) {
			$status[0] = __('Inactive');	
			$status[1] = __('Active');	
			$status[2] = __('Requested');	
			$status[5] = __('Completed');			
		} elseif ($organizationType == 1) {
			$status[3] = __('Processing');	
			$status[4] = __('Delivered');	
			$status[6] = __('Cancelled');	
		} else {
			$status[0] = __('Inactive');			
			$status[1] = __('Active');	
			$status[2] = __('Requested');	
			$status[3] = __('Processing');	
			$status[4] = __('Delivered');	
			$status[5] = __('Completed');				
			$status[6] = __('Cancelled');				
		}

		return $status;
	}	

/**
 * View Status value (0 or 1) to string (Active or Inactive)
 *
 */
	public function viewAllStatus($i) {
		switch($i) {
			case 0: $status = '<span class="label label-inactive">Inactive</span>'; 
			break;	
			case 1: $status = '<span class="label label-success">Active</span>'; 
			break;
			case 2: $status = '<span class="label label-important">Requested</span>'; 
			break;
			case 3: $status = '<span class="label label-info">Processing</span>'; 
			break;
			case 4: $status = '<span class="label label-warning">Delivered</span>'; 
			break;
			case 5: $status = '<span class="label">Completed</span>'; 
			break;			
			case 6: $status = '<span class="label label-invert">Cancelled</span>'; 
			break;
			default: $status = 'No Status';
		}

		return $status;
	}	

/**
 * Term of a year value (1 or 2) to string (First half or Second half)
 *
 */
	public function halfOfYear() {
		return $status = array(
			'1' => __('January to June'),
			'2' => __('July to December')
		);
	}
	
/**
 * View Term of a year value (1 or 2) to string (First half or Second half)
 *
 */
	public function viewHalfOfYear($i) {
		switch($i) {
			case 1: $status = __('January to June');
			break;	
			case 2: $status = __('July to December'); 
			break;
		}

		return $status;
	}	
	
	
/**
 * Make input type array for setting
 *
 */
	public function inputTypeArray() {
		return array(
			'text'=>'text',
			'checkbox'=>'checkbox',
			'radio'=>'radio',
			'textarea'=>'textarea',
			'password'=>'password',
			'color'=>'color',
			'date'=>'date',
			'datetime'=>'datetime',
			'datetime-local'=>'datetime-local',
			'email'=>'email',
			'month'=>'month',
			'number'=>'number',
			'range'=>'range',
			'search'=>'search',
			'tel'=>'tel',
			'time'=>'time',
			'week'=>'week',
			'url'=>'url'
		);
	}
/**
 * Generate Setting view fields
 * 
 * param $groups
 * param $fields
 *
 */
	function settingFields($groups,$fields){
		$imgPath = $this->themePath('img');
		
		// re-arranging the arrays
		if(is_array($groups)){
			foreach ($groups as $groupKey=>$groupValue) {
				if(is_array($fields)){
					foreach ($fields as $fieldKey=>$fieldValue) {
						foreach ($fieldValue as $field) {
							if (in_array($groupValue['Setting']['group'],$field)) {
								$key = $groupValue['Setting']['group'];
								$newGroups[$key][] = $field;
							}
						}
					}
				}
			}		
		}
		
		$html  = '';
		$formAction = $this->Html->url( '/Settings/edit/', true );
		
		foreach ($newGroups as $groupKey => $group) {

			$html .= '<div class="custom-fieldset">';
			//$html .= '<div class="custom-legend">'.$this->_humanizeText($groupKey).'</div>';

			foreach ($group as $settingFields) {
				$fileParamForFrom = ($settingFields['input_type']=='file')? 'enctype="multipart/form-data"':'';
			
			
				$html .= '<form method="post" id="SettingEditForm" class="form-horizontal" action="'.$formAction.$settingFields['id'].'" '.$fileParamForFrom.'>';
				$html .= '<div style="display:none;"><input type="hidden" value="PUT" name="_method" /></div>';		
				$html .= '<input type="hidden" id="ProductId" value="'.$settingFields['id'].'" class="span6" name="data[Setting][id]" />';
				
				$value = (isset($settingFields['value']) && $settingFields['value']!='')?  $settingFields['value'] : $settingFields['default'];				
				$html .= '<div class="form-group">';
				$html .= '<label class="col-sm-2 control-label" for="'.h($settingFields['name']).'">'.$this->_humanizeText(h($settingFields['name'])).'</label>';
				$html .= '<div class="col-sm-6 required">';
				
				switch(h($settingFields['input_type'])) {
					case'text':
								$html .= '<input 
											type="'.h($settingFields['input_type']).'" 
											id="'.h($settingFields['name']).'" 
											value="'.h($value).'" 
											maxlength="100" 
											placeholder="Please enter '.$this->_humanizeText(h($settingFields['name'])).'" 
											class="form-control" 
											name="data[Setting][value]" />';
					break;
					
					case'file':
								
								$html .='<div class="fileupload fileupload-new" data-provides="fileupload">';	
								$html .='<div class="input-append">';	
								$html .='<div class="uneditable-input form-control" readonly="readonly">';	
								$html .='<i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span>';	
								$html .='</div>';
								$html .='<span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>';
								$html .= '<input 
											type="'.h($settingFields['input_type']).'" 
											id="'.h($settingFields['name']).'" 
											name="data[Setting][value]" />';	
	
								$html .='</span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>';	
								$html .='</div>';	
								$html .='</div>';	

					break;	
					
					case'textarea':
								$html .= '<textarea 
											id="'.h($settingFields['name']).'" 
											rows="6" 
											cols="30"
											placeholder="Please enter '.$this->_humanizeText(h($settingFields['name'])).'" 
											class="form-control" 
											name="data[Setting][value]" />'.h($value).'</textarea>';
					break;	
					
				}
				//check the update right
				if (Configure::read('Action.edit')) {			
					$html .= $this->Form->submit(__('Save'), array(
									'div' => false,
									'class' => 'btn btn-default vertical-align-top',
									'style' => 'margin-top: 5px;'
							));
				}	
				if (isset($settingFields['hints']) && ($settingFields['hints']!='NULL')) {
					$html .= '<p class="form-control hints"><span class="label label-inverse">Hints: </span>&nbsp;<em class="muted">'. h($settingFields['hints']) .'</em></p>';
				}
				$html .= '</div>';
				$html .= '</div>';	

				$html .= $this->Form->end();
			}
			
			$html .= '</div>';
		}
		
		echo $html;

	}
	
	
	
/**
 * Return Selected Theme Path
 * 
 * example: $this->Generic->themePath('vendor/uniform/jquery.uniform.js');
 * output: <script type="text/javascript" href="/edibleoil/theme/EdibleOil/vendor/uniform/jquery.uniform.js"></script>
 * @param $path 
 * @param $options file,image,css,js.
 *
 */
	public function themePath($path, $options = array('type' => null, 'alt'=> '')) {

		if (strpos($path, '//') !== false) {
			$url = $path;
		} else {
			$url = $this->webroot($path);
		}
		
		if (!is_array($options['type'])) {
			$ext = substr(strrchr($path, '.'), 1);
		}

		$out = "\n\t";
		if ($options['type'] == 'js'||$ext=='js') {
			return $out .=  sprintf(
				$this->_GenericTags['js'],
				$url
			);
		}
		
		if ($options['type'] == 'css'||$ext=='css') {
			return $out .= sprintf(
				$this->_GenericTags['css'],
				$url
			);
		}	

		if ($options['type'] == 'image'||$ext=='image') {
			return $out .= sprintf(
				$this->_GenericTags['image'],
				$url,
				$options['alt']
			);
		}		

		return $url;
	}
	
/**
 * Return user's rights in HTML format
 * 
 * @param $Userid 
 *		
 */	
	function loadRights($r='',$view = null) {
		$userRights = ($r)? unserialize($r):'';

		$allRights = (Configure::read('Rights.all'))? Configure::read('Rights.all'): $this->_AllRights;
		
		if(is_array($allRights)){
			$html="";
			$html.='<div class="row-fluid">';
			$html .= '<div id="accordion" class="panel-group" style="padding:10px;">';

			ksort($allRights);
			foreach($allRights as $controller=>$action){

				$html .= '<div class="panel panel-default" style="padding-left:30px;">';
				$html .= '<a style="text-decoration:none;" class="collapsed" href="#' . str_replace(' ', '_', $this->_humanizeText($controller)) .'" data-parent="#accordion" data-toggle="collapse"><h5>'.$this->_humanizeText($controller).'</h5></a>';
				$html .= '<div id="' . str_replace(' ', '_', $this->_humanizeText($controller)) .'" class="panel-collapse collapse" style="height: auto;"';
				if(is_array($action)) {	
				
					$html .= '<ul>';
					
					foreach($action as $key=>$name){
						$checked='';
						
						if (is_array($userRights)) {
							if (isset($userRights[$controller])) {
								$checked = (in_array($name, $userRights[$controller]))? 'checked="checked"': '';
							}
						}
						
						if ($view) {
							if ($checked) {
								$html .= '<li style="list-style-type:none;"><label class="checkbox">&nbsp;'.$this->_humanizeText($this->_indexToListText($name)).'</label></li>';	
							}
						} else {

						$html .= '<li style="list-style-type:none;">
									<label class="checkbox">
									<input class="uniform" type="checkbox" name="data[UserRole][rights]['.$controller.'][]" '.$checked.' value="'.$name.'" />&nbsp;'. 
									$this->_humanizeText($this->_indexToListText($name)).'</label></li>';
						}			
					}
					
					$html .= '</ul>';	
				
				}
				$html .= '</div>';
				$html .= '</div>';
			}
			$html .= '</div>';
			echo $html.="</div>";
		}	
	
	}
/**
 * Humaniz the text
 *
 */	
	protected function _humanizeText($action) {
		return __(Inflector::humanize(Inflector::underscore($action)));
	}

	protected function _indexToListText($action) {
		switch ($action) {
			case 'index': $action = 'list';
			break;
			case 'list': $action = 'index';
			break;
			case 'add': $action = 'add';
			break;
			case 'edit': $action = 'edit';
			break;	
			case 'delete': $action = 'delete';
			break;			
			default: $action;
			break;
		}

		return $action;
	}

/**
 * Return month name
 * 
 * @param $month 
 *		
 */	
	function getMonthName($month){
		return $Month = date('F', $month);
	}	

/**
 * Return html select tag 
 * array(
 *	'label' => '',
 *	'required' => '',
 *	'id' => '',
 *	'placeholder' => '',
 *	'name' => '',
 *	'selected' => '',
 *	'all' => '',
 *	'emply' => '',
 *	)
 *		
 * @param $select 		
 * @param $selectOptions 		
 * 		
 */	
	function getBoostrapSelectOption($select, $selectOptions){
		if (is_array($select)) {
			$options = array(
				'label' => (isset($select['label']))? $select['label']: '',
				'required' => (isset($select['required']))? $select['required']: '',
				'id' => (isset($select['id']))? $select['id']: '',
				'placeholder' => (isset($select['placeholder']))? $select['placeholder']: '',
				'name' => (isset($select['name']))? $select['name']: '[Inspection][inspection_round]',
				'selected' => (isset($select['selected']))? $select['selected']: '',
				'all' => ($select['all']==true)? true : false ,
				'empty' => ($select['empty']==true)? true: false,
			);
		}
		$html ='';
		
		$html .= '<div class="form-group '. $options['required'].'">';
		$html .= '<label class="col-sm-2 control-label" for="'. $options['id'] .'">'. $options['label'] .'</label>';
		$html .= '<div class="col-sm-6 '. $options['required'] .'">';
		$html .= '<select 
			required="'. $options['required'] .'" 
			id="'. $options['id'] .'" 
			placeholder="'. $options['placeholder'] .'" 
			class="form-control" 
			name="data'. $options['name'] .'">';
			
		if ($options['empty']) {
			$html .= '<option value="">Please Select One</option>';
		}
		
		if ($options['all']) {
			$html .= '<option value="all">All</option>';
		}
		if (is_array($selectOptions)) {
			foreach ($selectOptions as $key => $value) {
				$selected = ($options['selected']==$key)? 'selected="selected"':'';
				$html .= '<option value="'. $key .'" '. $selected .'>'. $value .'</option>';
			}
		}
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';		

		echo $html;
	}	
	
}
