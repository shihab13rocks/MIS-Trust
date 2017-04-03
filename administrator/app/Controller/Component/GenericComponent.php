<?php
/**
 * Generic component 
 *
 * Manages user access to controllers/methods .
 *
 * By zahidul.islam@grameensolutions.com at 2013-10-29
 *
 */

class GenericComponent extends Object {
    function beforeRedirect() {
    }
    function beforeRender() {
    }
    function shutdown() {
    }
    function initialize(Controller $controller) {
        $this->data = $controller->data;
        $this->params = $controller->params;
    }	
    function startup(Controller $controller) {
    }
	
	/**
	 * Random String generator 
	 *
	 */
	public function generateString($length=20, $strength=7) {
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	}	

	/**
	 * Random number generator 
	 *
	 */
	public function generateRandomNumber($length=20, $prefix='') {
		$number = '';
		if ($prefix)
			$number .= $prefix;
		else 
			$number .= time();

		if ( strlen($number) < $length ) { 
			$length = $length - strlen($number);
				
			for ($i = 0; $i < $length; $i++) {
					$number .= rand(0, 9);
			}
		} elseif ( strlen($number) > $length ) { 
			$number = substr($number, -$length, $length);  
		}
		
		return $number;
	}		

}

