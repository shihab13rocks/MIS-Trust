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
				'type' => 'file'
			)); 
			?>		
		
			<fieldset>
			<?php
				echo $this->Form->input('id', array(
					'class' => 'span6',
					'placeholder' => 'Please enter id'
				));
				echo $this->Form->input('title', array(
					'class' => 'span6',
					'placeholder' => 'Please enter title'
				));
				echo $this->Form->input('organization_type_id', array(
					'class' => 'span6',
					'placeholder' => 'Please enter organization type',
					'type' => 'hidden'
				));
				echo $this->Form->input('organization_group_id', array(
					'class' => 'span6',
					'placeholder' => 'Please enter organization group',
					'type' => 'hidden'
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
					'placeholder' => 'Please enter bsti license no',
					'type' => 'hidden'
				));

				?>
				
				<div class="control-group">
					<label class="control-label" for="OrganizationEmail">Logo</label>
					<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload"">
							<div class="input-append">
								<div class="uneditable-input span5" readonly="readonly">
									<i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="data[Organization][logo]" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
							</div>
						</div>		
					</div>
				</div>			
				
				<?php
				
				echo $this->Form->input('remarks', array(
					'class' => 'span6',
					'placeholder' => 'Please enter remarks'
				));
				echo $this->Form->input('status', array(
					'class' => 'span6',
					'type' => 'hidden'
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