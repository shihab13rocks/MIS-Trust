<?php
App::uses('FormHelper', 'View/Helper');
App::uses('Set', 'Utility');

class BoostrapFormHelper extends FormHelper {

	public $helpers = array('Html' => array(
		'className' => 'Boostrap'
	));

	protected $_divOptions = array();

	protected $_inputOptions = array();

	protected $_inputType = null;

	protected $_fieldName = null;
	
	// foro picker method
	protected $format = '%Y-%m-%d';	

/**
 * Overwrite FormHelper::input()
 * Generates a form input element complete with label and wrapper div
 *
 * ### Options
 *
 * See each field type method for more information. Any options that are part of
 * $attributes or $options for the different **type** methods can be included in `$options` for input().i
 * Additionally, any unknown keys that are not in the list below, or part of the selected type's options
 * will be treated as a regular html attribute for the generated input.
 *
 * - `type` - Force the type of widget you want. e.g. `type => 'select'`
 * - `label` - Either a string label, or an array of options for the label. See FormHelper::label().
 * - `div` - Either `false` to disable the div, or an array of options for the div.
 *	See HtmlHelper::div() for more options.
 * - `options` - For widgets that take options e.g. radio, select.
 * - `error` - Control the error message that is produced. Set to `false` to disable any kind of error reporting (field
 *    error and error messages).
 * - `errorMessage` - Boolean to control rendering error messages (field error will still occur).
 * - `empty` - String or boolean to enable empty select box options.
 * - `before` - Content to place before the label + input.
 * - `after` - Content to place after the label + input.
 * - `between` - Content to place between the label + input.
 * - `format` - Format template for element order. Any element that is not in the array, will not be in the output.
 *	- Default input format order: array('before', 'label', 'between', 'input', 'after', 'error')
 *	- Default checkbox format order: array('before', 'input', 'between', 'label', 'after', 'error')
 *	- Hidden input will not be formatted
 *	- Radio buttons cannot have the order of input and label elements controlled with these settings.
 *
 * Added options
 * - `wrapInput` - Either `false` to disable the div wrapping input, or an array of options for the div.
 *	See HtmlHelper::div() for more options.
 * - `checkboxDiv` - Wrap input checkbox tag's class.
 * - `beforeInput` - Content to place before the input.
 * - `afterInput` - Content to place after the input.
 * - `errorClass` - Wrap input tag's error message class.
 *
 * @param string $fieldName This should be "Modelname.fieldname"
 * @param array $options Each type of input takes different options.
 * @return string Completed form widget.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#creating-form-elements
 */
	public function input($fieldName, $options = array()) {
		$this->_fieldName = $fieldName;

		$default = array(
			'error' => array(
				'attributes' => array(
					'wrap' => 'span',
					'class' => 'help-block text-danger'
				)
			),
			'wrapInput' => array(
				'tag' => 'div'
			),
			'checkboxDiv' => 'checkbox',
			'beforeInput' => '',
			'afterInput' => '',
			'errorClass' => 'has-error error',
			'datepickerDiv' => '', // added by zahid @ 2013-09-23
			'datepickerDivOption' => array() // added by zahid @ 2013-09-23
		);

		$options = Hash::merge(
			$default,
			$this->_inputDefaults,
			$options
		);

		$this->_inputOptions = $options;

		$options['error'] = false;
		if (isset($options['wrapInput'])) {
			unset($options['wrapInput']);
		}
		// added by zahid @ 2013-09-23
		if (isset($options['datepickerDiv'])) {
			unset($options['datepickerDiv']);
		}	
		// added by zahid @ 2013-09-23
		if (isset($options['datepickerDivOption'])) {
			unset($options['datepickerDivOption']);
		}			
		if (isset($options['checkboxDiv'])) {
			unset($options['checkboxDiv']);
		}
		if (isset($options['beforeInput'])) {
			unset($options['beforeInput']);
		}
		if (isset($options['afterInput'])) {
			unset($options['afterInput']);
		}
		if (isset($options['errorClass'])) {
			unset($options['errorClass']);
		}

		$inputDefaults = $this->_inputDefaults;
		$this->_inputDefaults = array();

		$html = parent::input($fieldName, $options);

		$this->_inputDefaults = $inputDefaults;

		if ($this->_inputType === 'checkbox') {
			if (isset($options['before'])) {
				$html = str_replace($options['before'], '%before%', $html);
			}
			$regex = '/(<label.*?>)(.*?<\/label>)/';
			if (preg_match($regex, $html, $label)) {
				$html = preg_replace($regex, '', $html);
				$html = preg_replace(
					'/(<input type="checkbox".*?>)/',
					$label[1] . '$1 ' . $label[2],
					$html
				);
			}
			if (isset($options['before'])) {
				$html = str_replace('%before%', $options['before'], $html);
			}
		}

		return $html;
	}

/**
 * Overwrite FormHelper::_divOptions()
 * Generate inner and outer div options
 * Generate div options for input
 *
 * @param array $options
 * @return array
 */
	protected function _divOptions($options) {
		$this->_inputType = $options['type'];

		$divOptions = array(
			'type' => $options['type'],
			'div' => $this->_inputOptions['wrapInput'],
		);
		
		$this->_divOptions = parent::_divOptions($divOptions);

		$default = array('div' => array('class' => null));
		$options = Hash::merge($default, $options);
		$divOptions = parent::_divOptions($options);
		if ($this->tagIsInvalid() !== false) {
			$divOptions = $this->addClass($divOptions, $this->_inputOptions['errorClass']);
		}
		return $divOptions;
	}

/**
 * Overwrite FormHelper::_getInput()
 * Wrap `<div>` input element
 * Generates an input element
 *
 * @param type $args
 * @return type
 */
	protected function _getInput($args) {
		$input = parent::_getInput($args);
		if ($this->_inputType === 'checkbox' && $this->_inputOptions['checkboxDiv'] !== false) {
			$input = $this->Html->div($this->_inputOptions['checkboxDiv'], $input);
		}
		

		$beforeInput = $this->_inputOptions['beforeInput'];
		$afterInput = $this->_inputOptions['afterInput'];

		$error = null;
		$errorOptions = $this->_extractOption('error', $this->_inputOptions, null);
		$errorMessage = $this->_extractOption('errorMessage', $this->_inputOptions, true);
		if ($this->_inputType !== 'hidden' && $errorOptions !== false) {
			$errMsg = $this->error($this->_fieldName, $errorOptions);
			if ($errMsg && $errorMessage) {
				$error = $errMsg;
			}
		}

		$html = $beforeInput . $input . $error . $afterInput;
		// added by zahid @ 2013-09-23
		if ($this->_inputType === 'text' && $this->_inputOptions['datepickerDiv'] !== false) {
			$html = $this->Html->div($this->_inputOptions['datepickerDiv'], $html, $this->_inputOptions['datepickerDivOption']);
		}	

		if ($this->_divOptions) {
			$tag = $this->_divOptions['tag'];
			unset($this->_divOptions['tag']);
			$html = $this->Html->tag($tag, $html, $this->_divOptions);
		}

		return $html;
	}

/**
 * Overwrite FormHelper::_selectOptions()
 * If $attributes['style'] is `<input type="checkbox">` then replace `<label>` position
 * Returns an array of formatted OPTION/OPTGROUP elements
 *
 * @param array $elements
 * @param array $parents
 * @param boolean $showParents
 * @param array $attributes
 * @return array
 */
	protected function _selectOptions($elements = array(), $parents = array(), $showParents = null, $attributes = array()) {
		$selectOptions = parent::_selectOptions($elements, $parents, $showParents, $attributes);

		if ($attributes['style'] === 'checkbox') {
			foreach ($selectOptions as $key => $option) {
				$option = preg_replace('/<div.*?>/', '', $option);
				$option = preg_replace('/<\/div>/', '', $option);
				if (preg_match('/>(<label.*?>)/', $option, $match)) {
					$option = $match[1] . preg_replace('/<label.*?>/', ' ', $option);
					if (isset($attributes['class'])) {
						$option = preg_replace('/(<label.*?)(>)/', '$1 class="' . $attributes['class'] . '"$2', $option);
					}
				}
				$selectOptions[$key] = $option;
			}
		}

		return $selectOptions;
	}

/**
 * Creates an HTML link, but access the url using the method you specify (defaults to POST).
 * Requires javascript to be enabled in browser.
 *
 * This method creates a `<form>` element. So do not use this method inside an existing form.
 * Instead you should add a submit button using FormHelper::submit()
 *
 * ### Options:
 *
 * - `data` - Array with key/value to pass in input hidden
 * - `method` - Request method to use. Set to 'delete' to simulate HTTP/1.1 DELETE request. Defaults to 'post'.
 * - `confirm` - Can be used instead of $confirmMessage.
 * - Other options is the same of HtmlHelper::link() method.
 * - The option `onclick` will be replaced.
 * - `block` - For nested form. use View::fetch() output form.
 *
 * @param string $title The content to be wrapped by <a> tags.
 * @param string|array $url Cake-relative URL or array of URL parameters, or external URL (starts with http://)
 * @param array $options Array of HTML attributes.
 * @param bool|string $confirmMessage JavaScript confirmation message.
 * @return string An `<a />` element.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html#FormHelper::postLink
 */
	public function postLink($title, $url = null, $options = array(), $confirmMessage = false) {
		$block = false;
		if (!empty($options['block'])) {
			$block = $options['block'];
			unset($options['block']);
		}
		
		if (isset($options['icon'])) {
			$icon = '<i class="'.$options['icon'].'"></i> ';
		} else {
			$icon = '';
		} 

		$fields = $this->fields;
		$this->fields = array();
		
		// from parents
		$requestMethod = 'POST';
		if (!empty($options['method'])) {
			$requestMethod = strtoupper($options['method']);
			unset($options['method']);
		}
		if (!empty($options['confirm'])) {
			$confirmMessage = $options['confirm'];
			unset($options['confirm']);
		}

		$formName = str_replace('.', '', uniqid('post_', true));
		$formUrl = $this->url($url);
		$formOptions = array(
			'name' => $formName,
			'id' => $formName,
			'style' => 'display:none;',
			'method' => 'post',
		);
		if (isset($options['target'])) {
			$formOptions['target'] = $options['target'];
			unset($options['target']);
		}

		$out = $this->Html->useTag('form', $formUrl, $formOptions);
		$out .= $this->Html->useTag('hidden', '_method', array(
			'value' => $requestMethod
		));
		$out .= $this->_csrfField();

		$fields = array();
		if (isset($options['data']) && is_array($options['data'])) {
			foreach ($options['data'] as $key => $value) {
				$fields[$key] = $value;
				$out .= $this->hidden($key, array('value' => $value, 'id' => false));
			}
			unset($options['data']);
		}
		$out .= $this->secure($fields);
		$out .= $this->Html->useTag('formend');

		$url = '#';
		$onClick = 'document.' . $formName . '.submit();';
		if ($confirmMessage) {
			$options['onclick'] = $this->_confirm($confirmMessage, $onClick, '', $options);
		} else {
			$options['onclick'] = $onClick . ' ';
		}
		$options['onclick'] .= 'event.returnValue = false; return false;';

		$out .= $this->Html->linkIcon($title, $url, $options);
		
		// new
		$this->fields = $fields;

		if ($block) {
			$regex = '/<form.*?>.*?<\/form>/';
			if (preg_match($regex, $out, $match)) {
				$this->_View->append($block, $match[0]);
				$out = preg_replace($regex, '', $out);
			}
		}

		return $out;
	}
	
/**
 * Generates an input element
 *
 * @param array $args The options for the input element
 * @return string The generated input element
 */
     function _setup(){ 
        $format = Configure::read('DatePicker.format'); 
        if($format != null){ 
            $this->format = $format; 
        } 
    } 
    function picker($fieldName, $options = array()) { 
        $this->_setup(); 
        $this->setEntity($fieldName); 
        $htmlAttributes = $this->domId($options);         
        $divOptions['class'] = 'date'; 
        $options['type'] = 'date'; 
        $options['div']['class'] = 'date'; 
		$options['dateFormat'] = 'DMY'; 
        $options['minYear'] = isset($options['minYear']) ? $options['minYear'] : (date('Y') - 20); 
        $options['maxYear'] = isset($options['maxYear']) ? $options['maxYear'] : (date('Y') + 20); 

        $options['after'] = $this->Html->image('calendar.png', array('id'=> $htmlAttributes['id'],'style'=>'cursor:pointer')); 

		if (isset($options['empty'])) { 
			$options['after'] .= $this->Html->image('b_drop.png', array('id'=> $htmlAttributes['id']."_drop",'style'=>'cursor:pointer')); 
		} 
		
       // $output = $this->input($fieldName, $options); 
        //$output .= $this->Javascript->codeBlock("datepick('" . $htmlAttributes['id'] . "','01/01/" . $options['minYear'] . "','31/12/" . $options['maxYear'] . "');");
        //return $output; 
    } 
	
}