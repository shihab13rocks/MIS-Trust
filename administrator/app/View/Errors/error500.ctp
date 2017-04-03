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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row-fluid">
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h1><span class="label label-important"><?php echo $name; ?></span></h1>
		<h4><span class="label label-important"><?php echo __d('cake', 'Error'); ?>:</span></h4>
		<div class="message">
			<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
			<?php if (isset($message)): ?>
				<?php echo $message ?>
			<?php endif; ?>
		</div>
		<div class="message">			
			<?php
				if (Configure::read('debug') > 0):
					echo $this->element('exception_stack_trace');
				endif;
			?>			
		</div>
	</div>
</div>
