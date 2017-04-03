<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h3><?php echo Configure::read('currentAction'); ?></h3>
<?php

$content = explode("\n", $content);
foreach ($content as $line):
	echo '<p> ' . $line . "</p>\n";
endforeach;
?>
<div>
	<p>Name: <?php echo $Contact['name']; ?></p>
	<p>Email: <?php echo $Contact['email']; ?></p>
	<p>Subject: <?php echo $Contact['subject']; ?></p>
	<p>Message: <?php echo $Contact['message']; ?></p>
	<p>&nbsp;</p>
	<p>			
	<?php
		echo $this->Html->link(
				__($siteName), 
				Router::url('/', true)
			); 		
	?>
	</p>
</div>