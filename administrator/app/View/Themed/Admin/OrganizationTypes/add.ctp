<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.index')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'index'),
							array('class'=>'btn btn-primary', 'icon'=>'icon-list')); 
					?>
				<?php endif; ?>
				<a href="#data" data-toggle="collapse" class="accordion-toggle minimize-box btn btn-primary">
					<i class="icon-chevron-up"></i>
				</a>
			</div>
		</div>
	</header>
	
	<div id="data" class="body collapse in">
		<div class="organizationTypes form">
			<?php echo $this->Form->create('OrganizationType', array(
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
					echo $this->Form->input('title', array(
						'class' => 'span6',
						'placeholder' => 'Please enter title'
					)); 
				    
					echo $this->Form->input('remarks', array(
						'class' => 'span6',
						'placeholder' => 'Please enter remarks'
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