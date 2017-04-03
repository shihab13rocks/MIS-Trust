<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php echo $this->Html->linkIcon(
						'', 
						array('action' => 'index'),
						array('class'=>'btn btn-primary', 'icon'=>'icon-list')); 
				?>				
				<a href="#data" data-toggle="collapse" class="accordion-toggle minimize-box btn btn-primary">
					<i class="icon-chevron-up"></i>
				</a>
			</div>
		</div>
	</header>
	
	<div id="data" class="body collapse in">
		<div class="settings form">
			<?php echo $this->Form->create('Setting', array(
				'inputDefaults' => array(
					'div' => 'control-group',
					'label' => array(
						'class' => 'control-label'
					),
					'wrapInput' => 'controls with-tooltip'
				),
				'class' => 'well form-horizontal'
			)); 
			?>

				<fieldset>
					
				<?php
					echo $this->Form->input('group', array(
						'class' => 'span6',
						'placeholder' => 'Please enter group name of the setting field'
					)); 				
					echo $this->Form->input('name', array(
						'class' => 'span6',
						'placeholder' => 'Please enter field name'
					)); 
					echo $this->Form->input('hints', array(
						'class' => 'span6',
						'placeholder' => 'Please enter hints'
					)); 
					
					echo $this->Form->input('default', array(
						'class' => 'span6',
						'placeholder' => 'Please enter default value'
					)); 
					echo $this->Form->input('value', array(
						'class' => 'span6',
						'placeholder' => 'Please enter value'
					)); 

					echo $this->Form->input('input_type', array(
						'class' => 'span6',
						'options' => $this->Generic->inputTypeArray()
					)); 				
			
				?>
					<div class="form-actions">
						<?php echo $this->Form->submit(__('Submit'), array(
							'div' => false,
							'class' => 'btn btn-primary'
						)); ?>
					</div>	
				</fieldset>
				
				
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	
</div>	

