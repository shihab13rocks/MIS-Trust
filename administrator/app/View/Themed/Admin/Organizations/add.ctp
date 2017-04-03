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
		<div class="organizations form">
			<?php echo $this->Form->create('Organization', array(
				'inputDefaults' => array(
					'div' => 'control-group',
					'label' => array(
						'class' => 'control-label'
					),
					'wrapInput' => 'controls'
				),
				'class' => 'well form-horizontal',
				'type'	=> 'file'
			)); 
			?>

				<fieldset>
					
				<?php
					echo $this->Form->input('title', array(
						'class' => 'span6',
						'placeholder' => 'Please enter title'
					)); 
					echo $this->Form->input('organization_type_id', array(
						'class' => 'span6',
						'placeholder' => 'Please enter organization type'
					));
					echo $this->Form->input('organization_group_id', array(
						'class' => 'span6',
						'placeholder' => 'Please enter organization group'
					));
					echo $this->Form->input('address', array(
						'class' => 'span6',
						'placeholder' => 'Please enter address'
					));
					echo $this->Form->input('address_optional', array(
						'class' => 'span6',
						'placeholder' => 'Please enter address optional'
					));
					echo $this->Form->input('contact_person', array(
						'class' => 'span6',
						'placeholder' => 'Please enter contact person'
					));
					echo $this->Form->input('phone', array(
						'class' => 'span6',
						'placeholder' => 'Please enter phone'
					));
					echo $this->Form->input('mobile', array(
						'class' => 'span6',
						'placeholder' => 'Please enter mobile'
					));
					echo $this->Form->input('email', array(
						'class' => 'span6',
						'placeholder' => 'Please enter email'
					));
					echo $this->Form->input('bsti_license_no', array(
						'class' => 'span6',
						'placeholder' => 'Please enter bsti license no'
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