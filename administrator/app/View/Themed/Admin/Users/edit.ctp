<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-pencil-square-o"></i> <?php echo Configure::read('currentAction'); ?></li>
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
		<a data-toggle="collapse" data-parent="#accordion" href="#userTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="userTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<?php echo $this->Form->create('User', array(
				'enctype' => 'multipart/form-data',
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-2 control-label'
					),
					'wrapInput' => 'col-sm-6'
				),
				'class' => 'form-horizontal'
			)); 
			?>
				<fieldset>

				<?php
					echo $this->Form->input('id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter id'
					));
					
					if (AuthComponent::user('id') > 1) {

						echo $this->Form->input('organization_id', array(
							'class' => 'form-control',
							'placeholder' => 'Please enter organization',
							'type' => 'hidden',
							'value' => AuthComponent::user('User.organization_id')
						)); 
				
					} else {
					
						echo $this->Form->input('organization_id', array(
							'class' => 'form-control',
							'placeholder' => 'Please enter organization'
						)); 
				
				
					} 	
					echo $this->Form->input('user_role_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter user role'
					)); 					
					echo $this->Form->input('member_type_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter member type'
					));
					echo $this->Form->input('username', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter username'
					));
					echo $this->Form->input('email', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter email'
					));					
					?>
					
					<?php
					echo $this->Form->input('last_name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter last name'
					));
					echo $this->Form->input('first_name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter first name'
					));
					echo $this->Form->input('middle_name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter middle name'
					));
					echo $this->Form->input('date_of_birth', array(
						'type'=>'text',
						'class'=>'col-sm-11',
						'style'=>'margin-left:-15px;height:30px',
						'readonly'=>'readonly',			
						'datepickerDiv' =>'col-sm-6 input-append date',
						'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d H:i:s"),'id'=>'datepicker1'),
						'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
					));
					echo $this->Form->input('code', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter code'
					));
					echo $this->Form->input('mobile', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter mobile'
					));
					echo $this->Form->input('phone', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter phone'
					));
					echo $this->Form->input('upload', array(
						'type' => 'file',
						'style'=>'height:30px;'
					));
					echo $this->Form->input('father_name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter father name'
					));
					echo $this->Form->input('mother_name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter mother name'
					));
					echo $this->Form->input('present_address', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter present address'
					));
					echo $this->Form->input('parmanent_address', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter parmanent address'
					));
					echo $this->Form->input('joining_date', array(
						'type'=>'text',
						'class'=>'col-sm-11',
						'style'=>'margin-left:-15px;height:30px',
						'readonly'=>'readonly',			
						'datepickerDiv' =>'col-sm-6 input-append date',
						'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d H:i:s"),'id'=>'datepicker1'),
						'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
					));
					echo $this->Form->input('remarks', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter remarks'
					));
					
				?>
					<div class="form-actions">
						<?php echo $this->Form->submit(__('Submit'), array(
							'div' => false,
							'class' => 'btn btn-default col-sm-offset-2 col-sm-2'
						)); ?>
					</div>	
				</fieldset>
				
				
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	
</div>	
