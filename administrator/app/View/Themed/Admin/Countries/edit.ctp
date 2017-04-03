<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.add')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'add'),
							array('class'=>'btn btn-primary', 'icon'=>'icon-plus')); 
					?>
				<?php endif; ?>
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
		<div class="countries form">
			<?php echo $this->Form->create('Country', array(
				'inputDefaults' => array(
					'div' => 'control-group',
					'label' => array(
						'class' => 'control-label'
					),
					'wrapInput' => 'controls'
				),
				'class' => 'well form-horizontal',
				'type'  => 'file'
			)); 
			?>		
		
			<fieldset>
			<?php
				echo $this->Form->input('id', array(
					'class' => 'span6',
					'placeholder' => 'Please enter id'
				));
				echo $this->Form->input('iso2', array(
					'class' => 'span6',
					'placeholder' => 'Please enter ISO2'
				)); 
				echo $this->Form->input('name', array(
					'class' => 'span6',
					'placeholder' => 'Please enter Country name'
				)); 
				echo $this->Form->input('iso3', array(
					'class' => 'span6',
					'placeholder' => 'Please enter ISO3'
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