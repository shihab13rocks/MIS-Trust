<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->meta('icon', '/admin/theme/admin/favicon.ico'); ?>
	<?php
		echo $this->element('css');
		
		echo $this->element('js.header');
		
		echo $this->Html->script(array(
			'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'
		    ));
	?>
	<!--<script language="javascript">
		$(function() {
			// Setup drop down menu
			$('.dropdown-toggle').dropdown();
		       
			// Fix input element click problem
			$('.dropdown input, .dropdown label').click(function(e) {
			  e.stopPropagation();
			});
		});
	</script>-->
</head>
<body>
	<div id="container">
		<div><?php echo $this->element('skeleton'); ?></div>
		<div><?php //echo $this->element('footer'); ?></div>
	</div>
	<?php echo $this->element('js.footer'); ?>
</body>
</html>
