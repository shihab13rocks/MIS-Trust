<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-user"></i> <?php echo Configure::read('currentAction'); ?></li>
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
			//debug(AuthComponent::user());
				echo $this->Form->input('id', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter id'
				));

				echo $this->Form->input('organization_id', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter organization',
					'type' => 'hidden',
					'value' => AuthComponent::user('User.organization_id')
				)); 
				echo $this->Form->input('user_role_id', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter user role',
					'type' => 'hidden',
					'value' => AuthComponent::user('User.user_role_id')
				));
				echo $this->Form->input('member_type_id', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter member type',
					'type' => 'hidden',
					'value' => AuthComponent::user('User.member_type_id')
				));
				echo $this->Form->input('username', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter username',
					'readonly'=>'readonly'
				));
				echo $this->Form->input('email', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter email'
				));
				echo $this->Form->input('password', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter password',
					'value' => false,
				));
				echo $this->Form->input('confirm_password', array(
					'class' => 'form-control',
					'placeholder' => 'Retype your password',
					'type' =>'password',
					'value' => false,
				));				
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
				if(AuthComponent::user('user_role_id')<=2):
				echo $this->Form->input('date_of_birth', array(
					'type'=>'text',
					'class'=>'col-sm-11',
					'style'=>'margin-left:-15px;height:30px',
					'readonly'=>'readonly',			
					'datepickerDiv' =>'col-sm-6 input-append date',
					'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d H:i:s"),'id'=>'datepicker1'),
					'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
				));
				endif;
				if(AuthComponent::user('user_role_id')<=2):
				echo $this->Form->input('code', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter code'
				));
				endif;
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
				if(AuthComponent::user('user_role_id')<=2):
				echo $this->Form->input('joining_date', array(
					'type'=>'text',
					'class'=>'col-sm-11',
					'style'=>'margin-left:-15px;height:30px',
					'readonly'=>'readonly',			
					'datepickerDiv' =>'col-sm-6 input-append date',
					'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d H:i:s"),'id'=>'datepicker1'),
					'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
				));
				endif;
				echo $this->Form->input('remarks', array(
					'class' => 'form-control',
					'placeholder' => 'Please enter remarks'
				));
				if(AuthComponent::user('user_role_id')<=2):
					echo $this->Form->input('status', array(
						'class' => 'form-control',
						'options' => $this->Generic->statusList()
					));
				endif;
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
