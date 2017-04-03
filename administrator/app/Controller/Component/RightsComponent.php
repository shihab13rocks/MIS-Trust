<?php
/**
 * Rights component 
 *
 * Manages user access to controllers/methods .
 *
 * By zahidul.islam@grameensolutions.com at 2013-09-25
 *
 */
App::uses('Component', 'Controller');
App::uses('SessionComponent', 'Controller/Component');
App::uses('AuthComponent', 'Controller/Component');


class RightsComponent extends Component {
	/**
	 * Other components utilized by RightsComponent
	 *
	 * @var array
	 */
    public $components = array('Session','Auth');

	/**
	 * Current Controller Object
	 *
	 * @var current Controller
	 */
	protected $_controller;
	
	/**
	 * Constructor
	 *
	 * @param ComponentCollection $collection A ComponentCollection this component can use to lazy load its components
	 * @param array $settings Array of configuration settings.
	 */
	public function __construct(ComponentCollection $collection, $settings = array()) {
		$this->_controller = $collection->getController();
		parent::__construct($collection, $settings);
	}

   /**
	* retrieving authorized person's rights
	*
	*/
	public function isAuthorizedActions() {
		$r = AuthComponent::user('UserRole.rights');
		if ($r) {
			$r = ($r)? unserialize($r): null;
			if (is_array($r)) {
				foreach ($r as $rKey => $rActions) {
					if ($this->_controller->name == $rKey) {
						foreach($rActions as $rValue) {
							// actions those are accessible by logged in user
							Configure::write("Action.{$rValue}", true);
						}
						return $rActions;
					}
				}
			} else { 
				return false;
			}			
		} else { 
			return false;
		}		
	}
	
   /**
	* retrieving authorized controller for nav menu
	*
	*/
	public function isAuthorizedController() {
		$r = AuthComponent::user('UserRole.rights');
		if ($r) {
		
			$r = ($r)? unserialize($r): null;
			if (is_array($r)) {
				foreach ($r as $rKey => $rActions) {
					if ($rKey) {
						Configure::write("Controller.{$rKey}", true);
						
						foreach($rActions as $rValue) {
							Configure::write("Nav.{$rKey}.{$rValue}", true);
						}
					}
				}
			} else { 
				return false;
			}				
		} else {
			return false;
		}		
	} 

}

