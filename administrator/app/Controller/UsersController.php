<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
/** 
 * default components
 *
 */	
	public $components = array('Generic');
	
/**
 * login method
 *
 * @return void
 */ 
	public function login() {
		$this->theme = 'Website';
		$this->layout = 'login';		
	}
	
/**
 * logout method
 *
 * @return void
 */ 
	public function logout() {   
		//insert last visit info
		if (AuthComponent::user('id')) {
			$this->request->data['User']['id'] = AuthComponent::user('id');
			$this->request->data['User']['last_visit'] =  date('Y-m-d H:i:s');
			$this->User->save($this->request->data);	
		}		
		
		$this->Auth->logout();
		$this->theme = 'Website';
		$this->redirect('/home');
	}
	
/**
 * validateLogin method
 *
 * @return void
 */	
	public function validateLogin()  {   
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if (AuthComponent::user('status')==1) {
					$this->Session->write('name', AuthComponent::user('first_name') . ' ' . AuthComponent::user('last_name'));
					$this->Session->write('photo', AuthComponent::user('upload'));
					// set flash if success
					$this->Session->setFlash(__('Welcome to Admin Panel'),'flash/default');
					$this->redirect($this->Auth->redirectUrl());
				} else {
					// redirect if not success
					$this->Session->setFlash(__('You account is inactivated!'),'flash/warning');
					$this->redirect($this->Auth->logout());				
				}
			} else {
				// redirect if not success
				$this->Session->setFlash(__('You are not valid user'),'flash/warning');
				$this->redirect($this->Auth->logout());
			}
		} else {
			throw new NotFoundException(__('Invalid user'),'flash/error');
		}
	}
	
/** TODO
 * forgot password method
 *
 * @return void
 */
	public function forgotPassword() {
		if( $this->request->is('post') ) {
			$user = $this->User->findByEmail( $this->request->data['User']['email'] );

			if( empty($user['User']['email']) ) {
				$this->Session->setFlash(__('The E-mail address is not valid!'),'flash/warning');
				//$this->redirect(array('controller'=>'user','action'=>'login'));
				echo "<div style='text-align: center; margin-top: 100px;'>";
				echo "<h3 style='color: #FF0000; margin-bottom: -20px;'>The mail is failed. Please try again!</h3><br>";
				echo "<a style='text-decoration: none; margin-top: -100px;' href='http://ummahatultrust.com/administrator'><button>Go Back</button></a>";
				echo "</div>";
				exit();	
			}
			else{
			        echo "<div style='text-align: center; margin-top: 100px;'>";
				echo "<h3 style='color: #009933; margin-bottom: -20px;'>The mail is successfully sent to you with new password!</h3><br>";
				echo "<a style='text-decoration: none; margin-top: -100px;' href='http://ummahatultrust.com/administrator'><button>Go Back</button></a>";
				echo "</div>";
				exit();
			}
			// generate password
			$password = $this->Generic->generateRandomNumber(8);
			
			// mail data
			$mailData = array(
				'mailData' => array(
					'name' => $user['User']['full_name'],
					'password' => $password
				),
				'siteName' => Configure::read('Setting.siteName')
			);	
			
			// data to save	
			$data = array(
				'User' => array(
					'id' => $user['User']['id'],
					'password' => $password
				)
			);			

			if ($this->User->save($data)) { 
				$email = new CakeEmail();
				$email->template('forgot_password', 'default')
					->sender(Configure::read('Setting.adminEmail'), Configure::read('Setting.siteName'))
					->emailFormat('html')
					->helpers(array('Html','Text'))					  
					->from(Configure::read('Setting.adminEmail'))
					->to( $user['User']['email'] )
					->subject(__(Configure::read('Setting.siteName').': Forgot password'))					  
					->viewVars($mailData);
					
				if($email->send()) {
					$this->Session->setFlash(__('The mail is successfully sent to you with new password!'), 'flash/success');
					$this->theme = 'Website';
					$this->redirect('/home');
				} else {
					$this->Session->setFlash(__('The mail is failed. Please try again!'), 'flash/warning');				
				}
			} else {
				$this->Session->setFlash(__('The mail is failed. Please try again!'),'flash/error');
			}
		}
	}	
	
/**
 * index method
 *
 * @return void
 */

	public function index() {
		/*$this->theme = 'Admin';
		$this->User->recursive = 0;

		if (AuthComponent::user('id') == 1) {
			$option = array('conditions' => array('UserRole.user_type_id =' => 2, 'User.organization_id >' => 0));
		} else {
			$UserStatus = array(0,1);
			if (AuthComponent::user('UserRole.user_type_id') > 2) {
				$UserStatus = 1;
			}
			
			$option = array(
				'conditions' => array(
					'UserRole.user_type_id >=' => 2, 
					'User.organization_id' => AuthComponent::user('organization_id'), 
					'User.id !=' => 1,
					'User.status' => $UserStatus
				)
			);		
		}
		$userTypes = $this->User->find('all',$option);		
		$this->set('users', $userTypes);*/
		
		$searchParams = array();
		$where = array();		
		
		$this->theme = 'Admin';
		$this->User->recursive = 1;
		
		if (AuthComponent::user('id') == 1) {
						
			$where['UserRole.user_type_id ='] = 2;
			$where['User.organization_id >'] = 0;
			if($this->request->data){
				$searchParams = array(
					'User' => array(
						'member_type_id' =>$this->request->data['User']['member_type_id']
						)
				);		
				
				if($searchParams['User']['member_type_id'] != 'all' && $searchParams['User']['member_type_id'] != false){
					$where['User.member_type_id'] = $searchParams['User']['member_type_id'];
				}			
			}
			
		} else {
			$UserStatus = array(0,1);
			if (AuthComponent::user('UserRole.user_type_id') > 2) {
				$UserStatus = 1;
			}
			
			$where['UserRole.user_type_id >='] = 2;
			$where['User.id !='] = 1;
			$where['User.organization_id'] = AuthComponent::user('organization_id');
			$where['User.status ='] = $UserStatus;
			
			if($this->request->data){
				$searchParams = array(
					'User' => array(
						'member_type_id' =>$this->request->data['User']['member_type_id']
						)
				);		
			
				if($searchParams['User']['member_type_id'] != 'all' && $searchParams['User']['member_type_id'] != false){
					$where['User.member_type_id'] = $searchParams['User']['member_type_id'];
				}
			}
		}
		$userTypes = $this->User->find('all', array( 'conditions' => $where ));
		$memberTypes = $this->User->MemberType->find('list');
		$this->set('users', $userTypes);
		$this->set('memberTypes', $memberTypes);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'),'flash/error');
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$userView = $this->User->find('first', $options);
		
		if ( AuthComponent::user('organization_id') == 1 || 
			(AuthComponent::user('organization_id') == $userView['User']['organization_id'])) {
			$this->set('user', $userView);
		} else {
			$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');	
			$this->redirect(array('action' => 'index'));			
		}
	}
	function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ) 
	{
		// open the directory
		$dir = opendir( $pathToImages );
		//debug($dir);die;
		// loop through it, looking for any/all JPG files:
		while (false !== ($fname = readdir( $dir ))) {
			// parse path for the extension
			$info = pathinfo($pathToImages . $fname);
			// continue only if this is a JPEG image
			//debug($info);
			if($info['basename'] != 'thumbs')
			{
				if (strtolower($info['extension']) == 'jpg') 
				{
					//echo "Creating thumbnail for {$fname} <br />";
				  
					// load image and get image size
					$img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
					$width = imagesx( $img );
					$height = imagesy( $img );
				  
					// calculate thumbnail size
					$new_width = $thumbWidth;
					$new_height = floor( $height * ( $thumbWidth / $width ) );
				  
					// create a new temporary image
					$tmp_img = imagecreatetruecolor( $new_width, $new_height );
				  
					// copy and resize old image into new image 
					imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
				  
					// save thumbnail into a file
					imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
				}
			}
		}
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (AuthComponent::user('id') > 1) {
				$this->request->data['User']['organization_id'] = AuthComponent::user('organization_id');
				
				// get user roles by organization
				$userRolesOfAnOrganization = $this->User->UserRole->find('list',array(
					'fields' => 'id',
					'conditions' => array( 
						'UserRole.organization_type_id' => AuthComponent::user('UserRole.organization_type_id'),
						'UserRole.id >' => 1
					)
				));
				// check if the role is exist or not in the selected organization
				if (!in_array($this->request->data['User']['user_role_id'],$userRolesOfAnOrganization)) {
					$this->request->data['User']['user_role_id'] = AuthComponent::user('user_role_id');
				}
			}	

			$this->User->create();
			if(!empty($this->request->data))
			{
				//Check if image has been uploaded
				if(!empty($this->request->data['User']['upload']['name']))
				{
					$file = $this->request->data['User']['upload']; //put the data into a var for easy use
					
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
		
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is 
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
						$this->createThumbs(WWW_ROOT . 'img/uploads/users/',WWW_ROOT . 'img/uploads/users/thumbs/',80);
		
						//prepare the filename for database entry
						$this->request->data['User']['upload'] = $file['name'];
					}
				}
				else
				{
					$this->request->data['User']['upload'] = 'admin.png';
				}
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flash/error');
			}
		}
		
		$organizations = $this->User->Organization->find('list', array(
			'conditions' => array(
				'Organization.status' => 1, 
			),
			'order' => 'Organization.title ASC'
		));

		if (AuthComponent::user('id')==1) {
			$option = array(
				'conditions' => array(
					'UserRole.id !=' => 1, 
					'UserRole.user_type_id =' => 2, 
					'UserRole.status' => 1
				),
				'order' => 'UserRole.title ASC'
			);
		} else {
			$option = array(
				'conditions' => array(
					'UserRole.organization_type_id' => AuthComponent::user('UserRole.organization_type_id'), 
					'UserRole.id !=' => 1, 
					'UserRole.status' => 1
				),
				'order' => 'UserRole.title ASC'
			);		
		}
		$userRoles = $this->User->UserRole->find('list', $option);
		$memberTypes = $this->User->MemberType->find('list');
		$this->set(compact('organizations', 'userRoles', 'memberTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'),'flash/warning');
		}		
		if ($this->request->is('post') || $this->request->is('put')) {
			if (AuthComponent::user('id') > 1) {
				// organization id user session
				$this->request->data['User']['organization_id'] = AuthComponent::user('organization_id');
				
				// get user roles by organization
				$userRolesOfAnOrganization = $this->User->UserRole->find('list',array(
					'fields' => 'id',
					'conditions' => array( 
						'UserRole.organization_type_id' => AuthComponent::user('UserRole.organization_type_id'),
						'UserRole.id >' => 1
					)
				));

				// check if the role is exist or not in the selected organization
				if (!in_array($this->request->data['User']['user_role_id'],$userRolesOfAnOrganization)) {
					$this->request->data['User']['user_role_id'] = AuthComponent::user('user_role_id');
				}
			}
			//Check if image has been uploaded
			if(!empty($this->request->data['User']['upload']['name']))
			{
				$file = $this->request->data['User']['upload']; //put the data into a var for easy use
				
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
	
				//only process if the extension is valid
				if(in_array($ext, $arr_ext))
				{
					//do the actual uploading of the file. First arg is the tmp name, second arg is 
					//where we are putting it
					move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
					
					$this->createThumbs(WWW_ROOT . 'img/uploads/users/',WWW_ROOT . 'img/uploads/users/thumbs/',80);
	
					//prepare the filename for database entry
					$this->request->data['User']['upload'] = $file['name'];
				}
			}
			else
			{
				$this->request->data['User']['upload'] = 'admin.png';
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$userView = $this->User->find('first', $options);

			if ((AuthComponent::user('organization_id') == $userView['User']['organization_id'])||
				(AuthComponent::user('id') == 1)) {
				$this->request->data = $userView;
			} else {
				$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');	
				$this->redirect(array('action' => 'index'));			
			}
		}
		
		$organizations = $this->User->Organization->find('list', array(
			'conditions' => array(
				'Organization.status' => 1, 
			),
			'order' => 'Organization.title ASC'
		));
		
		if (AuthComponent::user('id')==1) {
			$option = array(
				'conditions' => array(
					'UserRole.id !=' => 1, 
					'UserRole.user_type_id =' => 2, 
					'UserRole.status' => 1
				),
				'order' => 'UserRole.title ASC'
			);
		} else {
			$option = array(
				'conditions' => array(
					'UserRole.organization_type_id' => AuthComponent::user('UserRole.organization_type_id'), 
					'UserRole.id !=' => 1, 
					'UserRole.status' => 1
				),
				'order' => 'UserRole.title ASC'
			);		
		}
		$userRoles = $this->User->UserRole->find('list', $option);
		$memberTypes = $this->User->MemberType->find('list');
		$this->set(compact('organizations', 'userRoles', 'memberTypes'));
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'),'flash/warning');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {

			if (AuthComponent::user('id') == $this->request->data['User']['id']) {
				$this->request->data['User']['organization_id'] = AuthComponent::user('organization_id');
				$this->request->data['User']['user_role_id'] = AuthComponent::user('user_role_id');

				//Check if image has been uploaded
				if(!empty($this->request->data['User']['upload']['name']))
				{
					$file = $this->request->data['User']['upload']; //put the data into a var for easy use
					
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions
		
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is 
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/users/' . $file['name']);
						
						$this->createThumbs(WWW_ROOT . 'img/uploads/users/',WWW_ROOT . 'img/uploads/users/thumbs/',80);
		
						//prepare the filename for database entry
						$this->request->data['User']['upload'] = $file['name'];
					}
				}
				else
				{
					$this->request->data['User']['upload'] = 'admin.png';
				}
				
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The profile has been updated'),'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flash/error');
				}
			}
			else {
				$this->redirect(array('action' => 'index'));
				$this->Session->setFlash(__('You don\'t have any access to view this page!'),'flash/error');			
			}

		} else {
			
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);

			if (AuthComponent::user('id') != $this->request->data['User']['id']) {
				$this->Session->setFlash(__('You don\'t have any access to edit other\'s profile!'),'flash/error');	
				$this->redirect(array('action' => 'index'));				
			}			
		}
			
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;

		$userInfo = $this->User->findById($this->User->id);

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'),'flash/warning');
		}
		$this->request->onlyAllow('post', 'delete');
		if(AuthComponent::user('id') != $this->User->id) {
			if (
				   ((AuthComponent::user('id') < $this->User->id) 
				&& (AuthComponent::user('organization_id') == $userInfo['User']['organization_id']))
				|| (AuthComponent::user('id') == 1)
					
			) {
				if ($this->User->delete()) {
					$this->Session->setFlash(__('User deleted'),'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('User was not deleted'),'flash/error');
					$this->redirect(array('action' => 'index'));			
				}
			} else {
				$this->Session->setFlash(__('You can\'t delete your own admin!'),'flash/error');
				$this->redirect(array('action' => 'index'));			
			}
		} else {
			$this->Session->setFlash(__('You can\'t delete your own profile!'),'flash/error');
			$this->redirect(array('action' => 'index'));	
		}
		$this->Session->setFlash(__('User was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function comparePassword($data) {
	}	
	
}
