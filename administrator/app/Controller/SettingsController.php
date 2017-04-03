<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {
/**
 * load components
 *
 */
	public $components = array(
		'FileUpload',
		'SimpleImage'
	);
	
	
/**
 * retrieve configuration data from the DB
 *
 */ 
    public function getSiteSetting(){ 
		$this->Setting->recursive = 0;
		$settings = $this->Setting->find('all',array(
			'order' => array('Setting.sort_order ASC')
		));

		if (count($settings)) { 
			foreach ($settings as $s) {
				$value = (empty($s['Setting']['value']))? $s['Setting']['default'] : $s['Setting']['value'];
				Configure::write("Setting.{$s['Setting']['name']}",$value); 
			}
		} 
    } 	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Setting->recursive = 0;
		$settings = $this->Setting->find('all',array(
			'order' => array('Setting.sort_order ASC')
		));
		
		$option = array(
			'fields' => array('DISTINCT Setting.group'),
			'conditions' => array('Setting.status' => 1),
			'order' => array('Setting.group ASC')
		);
			
		$groups = $this->Setting->find('all', $option);
		$this->set(compact('settings', 'groups'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
		$this->set('setting', $this->Setting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			
			// if the input type is file
			if (is_array($this->request->data['Setting']['value'])) {
				$this->request->data['Setting']['value'] = $this->request->data['Setting']['value']['name'];
			}
			
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved.'),'flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'),'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		
		$settingData = $this->Setting->findById($id);
		 
		if ($this->request->is('post') || $this->request->is('put')) {
			// rename uploaded file
			if (strlen($this->request->data['Setting']['value']['name']) > 1) {
				// if image exist then delete first
				$this->deleteFileByName($settingData['Setting']['value']);
				
				$this->request->data['Setting']['value']['name'] = 'logo'.$this->FileUpload->_ext($this->request->data['Setting']['value']['name']);
				// set new file name for upload 
				$uploadFiles = $this->request->data['Setting']['value']; 

				// set new file name for saving to db 
				$this->request->data['Setting']['value'] = $this->request->data['Setting']['value']['name']; 
			} else {
				$uploadFiles = false; 
				$this->request->data['Setting']['value'] = $this->request->data['Setting']['value'];
			}			

			if ($this->Setting->save($this->request->data)) {
				if ($uploadFiles['tmp_name']) {
					$this->logoUploadAndResize($uploadFiles);
				}			
			
				$this->Session->setFlash(__('The setting has been saved.'),'flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Setting->delete()) {
			$this->Session->setFlash(__('The setting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The setting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
/**
 * deleteFileByName  method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $name
 * @return void
 */
	public function logoUploadAndResize($uploadFiles = null) {
		if ($uploadFiles['tmp_name']) {
			// upload array
			$fileData = array(
				'fileModel' => 'Setting',
				'fileVar' => 'value',
				'uploadDir' => Configure::read('Dir.logo'),
				'isThumbDir' => true,
				'uploadedFile' => $uploadFiles
			);
			// upload file
			$uploadedFiles = $this->FileUpload->upload($fileData);
			
			// resize file
			if (isset($uploadedFiles['file']))
				$this->SimpleImage->imageResize($uploadedFiles['file'], 600, 420);
			if (isset($uploadedFiles['thumb']))
				$this->SimpleImage->imageResize($uploadedFiles['thumb'], 50,50);
		}
	}
	
/**
 * deleteFileByName  method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $name
 * @return void
 */
	public function deleteFileByName($name = null) {
		if ($name) {
			$file = Configure::read('Dir.logo').DS.$name;
			$thumb = Configure::read('Dir.logo').DS.'thumb'.DS.$name;

			if (is_file($file))
				$this->FileUpload->removeFileByPath($file);
				
			if (is_file($thumb))				
				$this->FileUpload->removeFileByPath($thumb);
		}
	}		
	
}
