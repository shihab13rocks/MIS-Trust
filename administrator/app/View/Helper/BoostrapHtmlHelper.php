<?php
App::uses('HtmlHelper', 'View/Helper');
App::uses('Inflector', 'Utility');

class BoostrapHtmlHelper extends HtmlHelper {

	
protected $_tags = array(
		'meta' => '<meta%s/>',
		'metalink' => '<link href="%s"%s/>',
		'link' => '<a href="%s"%s>%s</a>',
		'linkIcon' => '<a href="%s"%s>%s %s</a>', // newly added
		'mailto' => '<a href="mailto:%s" %s>%s</a>',
		'form' => '<form action="%s"%s>',
		'formend' => '</form>',
		'input' => '<input name="%s"%s/>',
		'textarea' => '<textarea name="%s"%s>%s</textarea>',
		'hidden' => '<input type="hidden" name="%s"%s/>',
		'checkbox' => '<input type="checkbox" name="%s" %s/>',
		'checkboxmultiple' => '<input type="checkbox" name="%s[]"%s />',
		'radio' => '<input type="radio" name="%s" id="%s"%s />%s',
		'selectstart' => '<select name="%s"%s>',
		'selectmultiplestart' => '<select name="%s[]"%s>',
		'selectempty' => '<option value=""%s>&nbsp;</option>',
		'selectoption' => '<option value="%s"%s>%s</option>',
		'selectend' => '</select>',
		'optiongroup' => '<optgroup label="%s"%s>',
		'optiongroupend' => '</optgroup>',
		'checkboxmultiplestart' => '',
		'checkboxmultipleend' => '',
		'password' => '<input type="password" name="%s" %s/>',
		'file' => '<input type="file" name="%s" %s/>',
		'file_no_model' => '<input type="file" name="%s" %s/>',
		'submit' => '<input %s/>',
		'submitimage' => '<input type="image" src="%s" %s/>',
		'button' => '<button%s>%s</button>',
		'image' => '<img src="%s" %s/>',
		'tableheader' => '<th%s>%s</th>',
		'tableheaderrow' => '<tr%s>%s</tr>',
		'tablecell' => '<td%s>%s</td>',
		'tablerow' => '<tr%s>%s</tr>',
		'block' => '<div%s>%s</div>',
		'blockstart' => '<div%s>',
		'blockend' => '</div>',
		'hiddenblock' => '<div style="display:none;">%s</div>',
		'tag' => '<%s%s>%s</%s>',
		'tagstart' => '<%s%s>',
		'tagend' => '</%s>',
		'tagselfclosing' => '<%s%s/>',
		'para' => '<p%s>%s</p>',
		'parastart' => '<p%s>',
		'label' => '<label for="%s"%s>%s</label>',
		'fieldset' => '<fieldset%s>%s</fieldset>',
		'fieldsetstart' => '<fieldset><legend>%s</legend>',
		'fieldsetend' => '</fieldset>',
		'legend' => '<legend>%s</legend>',
		'css' => '<link rel="%s" type="text/css" href="%s" %s/>',
		'style' => '<style type="text/css"%s>%s</style>',
		'charset' => '<meta http-equiv="Content-Type" content="text/html; charset=%s" />',
		'ul' => '<ul%s>%s</ul>',
		'ol' => '<ol%s>%s</ol>',
		'li' => '<li%s>%s</li>',
		'error' => '<div%s>%s</div>',
		'javascriptblock' => '<script%s>%s</script>',
		'javascriptstart' => '<script>',
		'javascriptlink' => '<script type="text/javascript" src="%s"%s></script>',
		'javascriptend' => '</script>',
	);

/**
 * Overwrite HtmlHelper::useTag()
 * If $tag is `<input type="radio">` then replace `<label>` position
 * Returns a formatted existent block of $tags
 *
 * @param string $tag Tag name
 * @return string Formatted block
 */
	public function useTag($tag) {
		$args = func_get_args();

		if ($tag === 'radio') {
			$class = (isset($args[3]['class'])) ? $args[3]['class'] : 'radio';
			unset($args[3]['class']);
		}

		$html = call_user_func_array(array('parent', 'useTag'), $args);

		if ($tag === 'radio') {
			$regex = '/(<label)(.*?>)/';
			if (preg_match($regex, $html, $match)) {
				$html = $match[1] . ' class="' . $class . '"' . $match[2] . preg_replace($regex, ' ', $html);
			}
		}

		return $html;
	}

/**
 * Creates a formatted IMG element.
 *
 * This method will set an empty alt attribute if one is not supplied.
 *
 * ### Usage:
 *
 * Create a regular image:
 *
 * `echo $this->Html->image('cake_icon.png', array('alt' => 'CakePHP'));`
 *
 * Create an image link:
 *
 * `echo $this->Html->image('cake_icon.png', array('alt' => 'CakePHP', 'url' => 'http://cakephp.org'));`
 *
 * ### Options:
 *
 * - `url` If provided an image link will be generated and the link will point at
 *   `$options['url']`.
 * - `fullBase` If true the src attribute will get a full address for the image file.
 * - `plugin` False value will prevent parsing path as a plugin
 * - `data-src` For holder.js options. If `$path` is not empty, then unset `$options['data-src']`.
 *
 * @param string $path Path to the image file, relative to the app/webroot/img/ directory.
 * @param array $options Array of HTML attributes. See above for special options.
 * @return string completed img tag
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::image
 */
	public function image($path, $options = array()) {
		if (empty($path)) {
			$path = '/';
		} else {
			if (isset($options['data-src'])) {
				unset($options['data-src']);
			}
		}
		return parent::image($path, $options);
	}


/**
 * Creates an HTML link.
 *
 * If $url starts with "http://" this is treated as an external link. Else,
 * it is treated as a path to controller/action and parsed with the
 * HtmlHelper::url() method.
 *
 * If the $url is empty, $title is used instead.
 *
 * ### Options
 *
 * - `escape` Set to false to disable escaping of title and attributes.
 * - `escapeTitle` Set to false to disable escaping of title. (Takes precedence over value of `escape`)
 * - `confirm` JavaScript confirmation message.
 *
 * @param string $title The content to be wrapped by <a> tags.
 * @param string|array $url Cake-relative URL or array of URL parameters, or external URL (starts with http://)
 * @param array $options Array of options and HTML attributes.
 * @param string $confirmMessage JavaScript confirmation message.
 * @return string An `<a />` element.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::link
 */
	public function linkIcon($title, $url = null, $options = array(), $confirmMessage = false) {
		$escapeTitle = true;
		if ($url !== null) {
			$url = $this->url($url);
		} else {
			$url = $this->url($title);
			$title = htmlspecialchars_decode($url, ENT_QUOTES);
			$title = h(urldecode($title));
			$escapeTitle = false;
		}

		if (isset($options['escapeTitle'])) {
			$escapeTitle = $options['escapeTitle'];
			unset($options['escapeTitle']);
		} elseif (isset($options['escape'])) {
			$escapeTitle = $options['escape'];
		}

		if ($escapeTitle === true) {
			$title = h($title);
		} elseif (is_string($escapeTitle)) {
			$title = htmlentities($title, ENT_QUOTES, $escapeTitle);
		}

		if (!empty($options['confirm'])) {
			$confirmMessage = $options['confirm'];
			unset($options['confirm']);
		}
		if ($confirmMessage) {
			$options['onclick'] = $this->_confirm($confirmMessage, 'return true;', 'return false;', $options);
		} elseif (isset($options['default']) && !$options['default']) {
			if (isset($options['onclick'])) {
				$options['onclick'] .= ' ';
			} else {
				$options['onclick'] = '';
			}
			$options['onclick'] .= 'event.returnValue = false; return false;';
			unset($options['default']);
		}
		
		if (isset($options['icon'])) {
			$icon = '<i class="'.$options['icon'].'"></i> ';
		} else {
			$icon = '';
		} 
		
		return sprintf($this->_tags['linkIcon'], $url, $this->_parseAttributes($options),$icon, $title);
	}
	
}