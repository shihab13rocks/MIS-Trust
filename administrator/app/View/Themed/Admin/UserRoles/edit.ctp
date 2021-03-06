<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-plus"></i> <?php echo Configure::read('currentAction'); ?></li>
</ol>
</div>
<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>
			<?php if(Configure::read('Action.index')): ?>
				<?php echo $this->Html->linkIcon(
						'', 
						array('action' => 'index'),
						array('icon'=>'fa fa-list')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#userRoleTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="userRoleTable" class="panel-collapse collapse in">
		<div class="portlet-body" style="height: 1000px;">
			<?php echo $this->Form->create('UserRole', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-3 control-label'
					),
					'wrapInput' => 'col-sm-8'
				),
				'class' => 'form-horizontal'
			)); 
			?>
				<fieldset class="col-sm-8">

				<?php
					echo $this->Form->input('id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter id'
					));
					echo $this->Form->input('title', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter title'
					)); 
					echo $this->Form->input('organization_type_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please select organization type'
					));
					echo $this->Form->input('user_type_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please select user type'
					));
					echo $this->Form->input('status', array(
						'class' => 'form-control',
						'options' => $this->Generic->statusList()
					));
				?>
					<div class="form-actions">
						<?php echo $this->Form->submit(__('Submit'), array(
							'div' => false,
							'class' => 'btn btn-default col-sm-offset-3 col-sm-2'
						)); ?>
					</div>	
				</fieldset>
				<fieldset class="col-sm-4">
					<?php $this->Generic->loadRights($this->request->data['UserRole']['rights']);  ?>
					<div class="form-actions" style="padding-left: 0;">
						<?php echo $this->Form->submit(__('Update'), array(
							'div' => false,
							'class' => 'btn btn-default col-sm-offset-1 col-sm-4'
						)); ?>
					</div>
				</fieldset>
				
				
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	
</div>	

		