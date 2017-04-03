<?php  
/*************************************************** 
* FileUpload Component 
* 
* Manages uploaded files to be saved to the file system. 
* 
* @copyright    Copyright 2009, Webtechnick 
* @link         http://www.webtechnick.com 
* @author       Nick Baker 
* @version      1.4 
* @license      MIT 
*/
App::uses('SimpleImage', 'Component');
 
class FileUploadComponent extends Object{ 
	/*************************************************** 
	* fileModel is the name of the model used if we want to  
	*  keep records of uploads in a database. 
	*  
	* if you don't wish to use a database, simply set this to null 
	*  $this->FileUpload->fileModel = null; 
	* 
	* @var mixed 
	* @access public 
	*/ 
	var $fileModel = 'Upload'; 

	/*************************************************** 
	* uploadDir is the directory name in the webroot that you want 
	* the uploaded files saved to.  default: files which means 
	* webroot/files must exist and set to chmod 777 
	* 
	* @var string 
	* @access public 
	*/ 
	var $uploadDir = 'files'; 
	var $thumbDir = 'thumb'; 
	var $isThumbDir = false; 

	/*************************************************** 
	* fileVar is the name of the key to look in for an uploaded file 
	* For this to work you will need to use the 
	* $form-input('file', array('type'=>'file));  
	* 
	* If you are NOT using a model the input must be just the name of the fileVar 
	* input type='file' name='file' 
	* 
	* @var string 
	* @access public 
	*/ 
	var $fileVar = 'file'; 

	/*************************************************** 
	* allowedTypes is the allowed types of files that will be saved 
	* to the filesystem.  You can change it at anytime without 
	* $this->FileUpload->allowedTypes = array('text/plain',etc...); 
	* 
	* @var array 
	* @access public 
	*/ 
	var $allowedTypes = array( 
		'image/jpeg', 
		'image/gif', 
		'image/png', 
		'image/pjpeg', 
		'image/x-png' 
	);	
	
	/*************************************************** 
	* allowedSize is the allowed size of files that will be saved 
	* to the filesystem.  You can change it at anytime without 
	* $this->FileUpload->allowedSize = 1 * 1024 * 1024; // 2MB 
	* 
	* @var integer 
	* @access public 
	*/ 
	var $allowedSize = '1048576'; 

	/*************************************************** 
	* fields are the fields relating to the database columns 
	* 
	* @var array 
	* @access public 
	*/ 
	var $fields = array('name'=>'name','type'=>'type','size'=>'size'); 

	/*************************************************** 
	* This will be true if an upload is detected even 
	* if it can't be processed due to misconfiguration 
	* 
	* @var boolean 
	* @access public 
	*/ 
	var $uploadDetected = false; 

	/*************************************************** 
	* This will hold the uploadedFile array if there is one 
	* 
	* @var boolean|array 
	* @access public 
	*/ 
	var $uploadedFile = false; 

	/*************************************************** 
	* data and params are the controller data and params 
	* 
	* @var array 
	* @access public 
	*/ 
	var $data = array(); 
	var $params = array(); 

	/*************************************************** 
	* Final file is set on move_uploadedFile success. 
	* This is the file name of the final file that was uploaded 
	* to the uploadDir directory. 
	* 
	* @var string 
	* @access public 
	*/ 
	var $finalFile = array(
		'file' => null,
		'thumb' => null
 	); 

	/*************************************************** 
	* success is set if we have a fileModel and there was a successful save 
	* or if we don't have a fileModel and there was a successful file uploaded. 
	* 
	* @var boolean 
	* @access public 
	*/ 
	var $success = false; 

	/*************************************************** 
	* errors holds any errors that occur as string values. 
	* this can be access to debug the FileUploadComponent 
	* 
	* @var array 
	* @access public 
	*/
	var $errors = array(); 

	/*************************************************** 
	* Initializes FileUploadComponent for use in the controller 
	* 
	* @param object $controller A reference to the instantiating controller object 
	* @return void 
	* @access public 
	*/ 
	function initialize(&$controller){ 
		$this->data = $controller->data; 
		$this->params = $controller->params; 
	} 

	function beforeRedirect() {}
	function beforeRender() {}
	function shutdown() {}		

	/*************************************************** 
	* Main execution method.  Handles file upload automatically upon detection and verification. 
	* 
	* @param object $controller A reference to the instantiating controller object 
	* @return void 
	* @access public 
	*/ 
	function startup(&$controller){} 
	
	/*************************************************** 
	* Main execution method.  Handles file upload automatically upon detection and verification. 
	* 
	* @param object $controller A reference to the instantiating controller object 
	* @return void 
	* @access public 
	*/ 
	function upload($data = null){ 
		$this->uploadDetected = ($this->_multiArrayKeyExists("tmp_name", $data['uploadedFile'])); 
		
		$this->fileModel = (isset($data['fileModel'])) ? $data['fileModel'] : $this->fileModel;
		$this->fileVar = (isset($data['fileVar'])) ? $data['fileVar'] : $this->fileVar;
		$this->uploadDir = (isset($data['uploadDir'])) ? $data['uploadDir'] : $this->uploadDir;
		$this->thumbDir = (isset($data['thumbDir'])) ? $data['thumbDir'] : $this->thumbDir;
		$this->isThumbDir = (isset($data['isThumbDir'])) ? $data['isThumbDir'] : false;
		$this->uploadedFile = (isset($data['uploadedFile'])) ? $data['uploadedFile'] : $this->_uploadedFileArray();;
		
		if($this->_checkFile() && $this->_checkType() && $this->_checkSize($this->_multiArrayKeyExists("size", $data))){ 
			return $this->_processFile(); 
		} 
	} 

	/************************************************* 
	* removeFile removes a specific file from the uploaded directory 
	* 
	* @param string $name A reference to the filename to delete from the uploadDirectory 
	* @return boolean 
	* @access public 
	*/ 
	function removeFile($name = null){ 
		if(!$name) return false; 
		 
		$up_dir = $this->uploadDir; 
		$target_path = $up_dir . DS . $name; 
		if(unlink($target_path)) return true; 
		else return false; 
	} 
	function removeFileByPath($path = null){ 
		if(!$path) return false; 
 
		if(unlink($path)) return true; 
		else return false; 
	} 	

	/************************************************* 
	* showErrors itterates through the errors array 
	* and returns a concatinated string of errors sepearated by 
	* the $sep 
	* 
	* @param string $sep A seperated defaults to <br /> 
	* @return string 
	* @access public 
	*/ 
	function showErrors($sep = "<br />"){ 
		$retval = ""; 
		foreach($this->errors as $error){ 
			$retval .= "$error $sep"; 
		} 
		return $retval; 
	} 


	/************************************************** 
	* _processFile takes the detected uploaded file and saves it to the 
	* uploadDir specified, it then sets success to true or false depending 
	* on the save success of the model (if there is a model).  If there is no model 
	* success is meassured on the success of the file being saved to the uploadDir 
	* 
	* finalFile is also set upon success of an uploaded file to the uploadDir 
	* 
	* @return void 
	* @access private 
	*/ 
	function _processFile(){ 
		//$up_dir = WWW_ROOT . $this->uploadDir; 
		$up_dir = $this->uploadDir; 
		$target_path = $up_dir . DS . $this->uploadedFile['name']; 
		$temp_path = substr($target_path, 0, strlen($target_path) - strlen($this->_ext())); //temp path without the ext 
	
		//make sure the file doesn't already exist, if it does, delete it first 
		if (file_exists($target_path)){ 
			$this->removeFile( $this->uploadedFile['name'] );
		} 
	 
		if(move_uploaded_file($this->uploadedFile['tmp_name'], $target_path)){ 
			$this->finalFile['file'] = $target_path;
			
			@chdir($up_dir);
			chmod($this->uploadedFile['name'],0644);
			
			if ($this->isThumbDir == true) {
				if (!is_dir($this->thumbDir))
					mkdir($up_dir.DS.$this->thumbDir, 0777);
					
				copy($this->uploadedFile['name'],$this->thumbDir.DS.$this->uploadedFile['name']);
				chmod($this->thumbDir.DS.$this->uploadedFile['name'],0644);
				
				$this->finalFile['thumb'] = $up_dir.DS.$this->thumbDir.DS.$this->uploadedFile['name'];
			} 
			
			return $this->finalFile; 
		} 
		else{ 
			$this->_error('FileUpload::processFile() - Unable to save temp file to file system.'); 
		} 
	} 

	/*************************************************** 
	* Returns a reference to the model object specified, and attempts 
	* to load it if it is not found. 
	* 
	* @param string $name Model name (defaults to FileUpload::$fileModel) 
	* @return object A reference to a model object 
	* @access public 
	*/ 
	function &getModel($name = null) { 
		$model = null; 
		if (!$name) { 
			$name = $this->fileModel; 
		} 
	 
		if($name){ 
			if ('PHP5') { 
				$model = ClassRegistry::init($name); 
			} else { 
				$model =& ClassRegistry::init($name); 
			} 

			if (empty($model) && $this->fileModel) { 
				$this->_error('FileUpload::getModel() - Model is not set or could not be found'); 
				return null; 
			} 
		} 
		return $model; 
	} 

	/*************************************************** 
	* Adds error messages to the component 
	* 
	* @param string $text String of error message to save 
	* @return void 
	* @access protected 
	*/ 
	function _error($text){ 
		$message = __($text,true); 
		$this->errors[] = $message; 
		trigger_error($message,E_USER_WARNING); 
	} 

	/*************************************************** 
	* Checks if the uploaded type is allowed defined in the allowedTypes 
	* 
	* @return boolean if type is accepted 
	* @access protected 
	*/ 
	function _checkType(){ 
		foreach($this->allowedTypes as $value){ 
			if(strtolower($this->uploadedFile['type']) == strtolower($value)){ 
				return true; 
			} 
		} 
		$this->_error("FileUpload::_checkType() {$this->uploadedFile['type']} is not in the allowedTypes array."); 
		return false; 
	} 

	/*************************************************** 
	* Checks if there is a file uploaded 
	* 
	* @return void 
	* @access protected 
	*/ 
	function _checkFile(){ 
		if($this->uploadedFile && $this->uploadedFile['error'] == UPLOAD_ERR_OK ) return true; 
		else return false; 
	} 
	
	/*************************************************** 
	* Checks if the uploaded size is allowed defined in the allowedSize 
	* 
	* @return boolean if type is accepted 
	* @access protected 
	*/ 
	function _checkSize($size){ 
		$size = (isset($size))? $size : $this->uploadedFile['size'];

		if($size <= $this->allowedSize){ 
			return true; 
		} 
 
		$this->_error("FileUpload::_checkSize() {$size} is not in the allowedSize."); 
		return false; 
	} 

	/*************************************************** 
	* Returns the extension of the uploaded filename. 
	* 
	* @return string $extension A filename extension 
	* @access protected 
	*/ 
	function _ext($name = null){
		if ($name) // TODO:: added by zahidul.islam@grameensolutions.com
			return strtolower(strrchr($name,".")); 
		else 
			return strtolower(strrchr($this->uploadedFile['name'],".")); 
	} 

	/*************************************************** 
	* Returns an array of the uploaded file or false if there is not a file 
	* 
	* @param string $text String of error message to save 
	* @return array|boolean Array of uploaded file, or false if no file uploaded 
	* @access protected 
	*/ 
	function _uploadedFileArray(){ 
		if($this->fileModel){ 
			$retval = isset($this->data[$this->fileModel][$this->fileVar]) ? $this->data[$this->fileModel][$this->fileVar] : false; 
		}  

		if($this->uploadDetected && $retval === false){ 
			$this->_error("FileUpload: A file was detected, but was unable to be processed due to a misconfiguration of FileUpload. Current config -- fileModel:'{$this->fileModel}' fileVar:'{$this->fileVar}'"); 
		} 
		return $retval; 
	} 

	/*************************************************** 
	* Searches through the $haystack for a $key. 
	* 
	* @param string $needle String of key to search for in $haystack 
	* @param array $haystack Array of which to search for $needle 
	* @return boolean true if given key is in an array 
	* @access protected 
	*/ 
	function _multiArrayKeyExists($needle, $haystack) { 
		if(is_array($haystack)){ 
		  foreach ($haystack as $key=>$value) { 
			if ($needle==$key) { 
			  return true; 
			} 
			if (is_array($value)) { 
			  if($this->_multiArrayKeyExists($needle, $value)){ 
				return true; 
			  } 
			} 
		  } 
		} 
		return false; 
	} 
} 
