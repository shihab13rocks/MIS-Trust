<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Organization $Organization
 * @property UserRole $UserRole
 * @property Inspection $Inspection
 */
class User extends AppModel {
/**
 * Virtual Fields
 *
 * @var array
 */
	public $virtualFields = array(
		'full_name' => 'CONCAT(User.first_name, " ", User.middle_name, " ",  User.last_name)'
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'organization_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'user_role_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
                'member_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'The value you have entered is already exists',
			),			
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),			
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'The value you have entered is already exists',				
			),	
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'on' => 'create',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'allowEmpty' => true,
				'on' => 'update'
			),				
			'between' => array(
				'rule'    =>  array('between', 6, 50),
				'message' => 'Password must be between 6 to 50 characters',
				'last' => true
			)/*,
			'equaltofield' => array(
				'rule' => array('equaltofield','confirm_password'),
				'message' => 'Retype Password and Confirm it!',
				'on' => 'update',
				'allowEmpty' => true,			
			),*/
		),
		'confirm_password' => array(
			'equalTo' => array(
				'rule' => array('equalTo','password'),
				'message' => 'Password does not match!',
				'on' => 'create',
			),
			'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Password does not match!',
				'allowEmpty' => true,
				'on' => 'update',
			),
		),		
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'last_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mobile' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'father_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
			),
		)/*,
		'last_visit' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Organization.title ASC'
		),
		'UserRole' => array(
			'className' => 'UserRole',
			'foreignKey' => 'user_role_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'UserRole.title ASC'
		),
                'MemberType' => array(
			'className' => 'MemberType',
			'foreignKey' => 'member_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'MemberType.title ASC'
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(

	);
	
/**
 * HASHING password
 *
 * @var array
 */	
	public function beforeSave($options = array()) {
		// password hasshing
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		// no password hashing when updating profile
		if (isset($this->data[$this->alias]['confirm_password']) && empty($this->data[$this->alias]['confirm_password'])) {
			if (isset($this->data[$this->alias]['id'])) {
				$UsersData = $this->findById($this->data[$this->alias]['id']);

				$this->data[$this->alias]['password'] = $UsersData[$this->alias]['password'];	
				$this->data[$this->alias]['confirm_password'] = $UsersData[$this->alias]['password'];	
			}
		}

		return true;
	}
	
/**
 * equaltofield validation
 *
 * @var array
 */	
	public function equaltofield($check,$otherfield) {
        $fname = ''; $result = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }

		$p =   $this->data[$this->alias][$otherfield];
		$rp  = $this->data[$this->alias][$fname];

		if($p === $rp) {
			$result = true;
		} 
		if (($p == '' && $rp != '')||($p != '' && $rp == '')) {
			$result = false;			
		}

        return $result;
	}	

}
