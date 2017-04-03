<?php
/*
 * File: SimpleImage.php
 * Author: Simon Jarvis
 * Copyright: 2006 Simon Jarvis
 * Date: 08/11/06
 * Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
 * 
 * This program is free software; you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License 
 * as published by the Free Software Foundation; either version 2 
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
 * GNU General Public License for more details: 
 * http://www.gnu.org/licenses/gpl.html
 *
 */
class SimpleImageComponent extends Object {
    var $image;
    var $image_type;
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
    /*     * *************************************************
     * Main execution method.  Handles file upload automatically upon detection and verification.
     *
     * @param object $controller A reference to the instantiating controller object
     * @return void
     * @access public
     */
    function startup(Controller $controller) {
    }
    function imageResize($destination, $width, $height) {
        $this->load($destination);
        $this->resize($width, $height);
        $this->save($destination);
        return true;
    }
    function load($filename) {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }
    function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }
    function output($image_type=IMAGETYPE_JPEG) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }
    function getWidth() {
        return imagesx($this->image);
    }
    function getHeight() {
        return imagesy($this->image);
    }
    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }
    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }
    function scale($scale) {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }
    function resize($width, $height) {
		$ratio = min(($width / $this->getWidth()), ($height / $this->getHeight()));

		if($ratio < 1){
				$width = round($this->getWidth() * $ratio);
				$height = round($this->getHeight() * $ratio);
		} else {
				$width = $this->getWidth();
				$height = $this->getHeight();
		}
		

		
		/* Check if this image is PNG or GIF, then set if Transparent*/  
		if(($this->image_type == IMAGETYPE_GIF) || ($this->image_type==IMAGETYPE_PNG)){
			if($this->image_type == IMAGETYPE_GIF){
				$new_image = imagecreate( $width, $height ); // for gif files
			} else{
				$new_image = imagecreatefrompng($width, $height); // for all other files
			}
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			$transparent = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
			imagefilledrectangle($new_image, 0, 0, $width, $height, $transparent);
			//imagefill($new_image, 0, 0, $transparent);
		} else {	
			$new_image = imagecreatetruecolor($width, $height);	  
		}
	
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;
    }
}
?>