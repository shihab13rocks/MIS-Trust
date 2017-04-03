<?php
App::uses('AppController', 'Controller');
/**
 * Organizations Controller
 *
 * @property Organization $Organization
 */
class OrganizationsController extends AppController {
/**
 * load components
 *
 */
	public $components = array(
		'FileUpload',
		'SimpleImage'
	);


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
		$this->set('organization', $this->Organization->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Organization->create();
			if ($this->Organization->save($this->request->data)) {
				$this->Session->setFlash(__('The organization has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'),'flash/error');
			}
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$organizationGroups = $this->Organization->OrganizationGroup->find('list');
		$this->set(compact('organizationTypes', 'organizationGroups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$organizationData = $this->Organization->findById($id);
			
			// rename uploaded file
			if ($this->request->data['Organization']['logo']['name']) {
				// if image exist then delete first
				$this->deleteFileByName($organizationData['Organization']['logo']);
				
				$this->request->data['Organization']['logo']['name'] = $id.'_logo'.$this->FileUpload->_ext($this->request->data['Organization']['logo']['name']);
				// set new file name for uploading 
				$uploadFiles = $this->request->data['Organization']['logo']; 
				// set new file name for saving to db 
				$this->request->data['Organization']['logo'] = $this->request->data['Organization']['logo']['name']; 
			} else {
				$uploadFiles = false; 
				$this->request->data['Organization']['logo'] = $organizationData['Organization']['logo'];			
			}	
			
			// Save Organization
			if ($this->Organization->save($this->request->data)) {
				// resize logo
				if ($uploadFiles['tmp_name']) {
					$this->logoUploadAndResize($uploadFiles);
				}
			
				$this->Session->setFlash(__('The organization has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$organizationGroups = $this->Organization->OrganizationGroup->find('list');
		$this->set(compact('organizationTypes', 'organizationGroups'));
	}
	

/**
 * profile method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile($id = null) {
		if (!$this->Organization->exists($id)) {
			throw new NotFoundException(__('Invalid organization'));
		}
		
		if (AuthComponent::user('organization_id') != $id) {
			$this->Session->setFlash(__('You don\'t have access right!'),'flash/error');
			$this->redirect(array('action' => 'index'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$organizationData = $this->Organization->findById($id);			
			// rename uploaded file
			if ($this->request->data['Organization']['logo']['name']) {
				// if image exist then delete first
				$this->deleteFileByName($organizationData['ProductBrand']['logo']);
				
				$this->request->data['Organization']['logo']['name'] = $id.'_logo'.$this->FileUpload->_ext($this->request->data['Organization']['logo']['name']);
				// set new file name for upload 
				$uploadFiles = $this->request->data['Organization']['logo']; 
				// set new file name for saving to db 
				$this->request->data['Organization']['logo'] = $this->request->data['Organization']['logo']['name']; 
			} else {
				$uploadFiles = false; 
				$this->request->data['Organization']['logo'] = $organizationData['Organization']['logo'];
			}			
		
			if ($this->Organization->save($this->request->data)) {
				if ($uploadFiles['tmp_name']) {
					$this->logoUploadAndResize($uploadFiles);
				}
			
				$this->Session->setFlash(__('The organization has been saved'),'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.'),'flash/error');
			}
		} else {
			$options = array('conditions' => array('Organization.' . $this->Organization->primaryKey => $id));
			$this->request->data = $this->Organization->find('first', $options);
		}
		$organizationTypes = $this->Organization->OrganizationType->find('list');
		$organizationGroups = $this->Organization->OrganizationGroup->find('list');
		$this->set(compact('organizationTypes', 'organizationGroups'));
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
		$this->Organization->id = $id;
		$organizationData = $this->Organization->findById($id);

		if (!$this->Organization->exists()) {
			throw new NotFoundException(__('Invalid organization'),'flash/warning');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Organization->delete()) {
			
			// delete file from logofolder
			if (isset($organizationData['Organization']['logo']))
				$this->deleteFileByName($organizationData['Organization']['logo']);
			
			$this->Session->setFlash(__('Organization deleted'),'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organization was not deleted'),'flash/error');
		$this->redirect(array('action' => 'index'));
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
				'fileModel' => 'Organization',
				'fileVar' => 'logo',
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
