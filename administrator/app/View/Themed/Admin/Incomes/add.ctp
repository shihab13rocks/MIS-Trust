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
		<a data-toggle="collapse" data-parent="#accordion" href="#incomeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="incomeTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<?php echo $this->Form->create('Income', array(
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
					echo $this->Form->input('income_type_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter income type'
					));
					echo $this->Form->input('date', array(
						'type'=>'text',
						'class'=>'col-sm-11',
						'style'=>'margin-left:-15px;height:30px',
						'readonly'=>'readonly',
						'value'=>date("Y-m-d"),
						'datepickerDiv' =>'col-sm-6 input-append date',
						'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d H:i:s"),'id'=>'datepicker1'),
						'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
					));
					echo $this->Form->input('book_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter book id'
					));
					echo $this->Form->input('receipt_no', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter receipt no'
					));
					echo $this->Form->input('user_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter user id'
					));
					echo $this->Form->input('name', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter name of payer (Not applicable if User/Member is the Payer)'
					));
					echo $this->Form->input('payable_amount', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter payable amount'
					));
					echo $this->Form->input('paid', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter paid'
					));
					echo $this->Form->input('payment_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter payment id'
					));
					echo $this->Form->input('purpose_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter purpose id'
					));
					//echo $this->Form->input('monthly_fee', array(
					//	'class' => 'form-control',
					//	'placeholder' => 'Please enter monthly fee'
					//));
					//echo $this->Form->input('yearly_charge', array(
					//	'class' => 'form-control',
					//	'placeholder' => 'Please enter yearly charge'
					//));
					//echo $this->Form->input('fooding_fee', array(
					//	'class' => 'form-control',
					//	'placeholder' => 'Please enter fooding fee'
					//));
					//echo $this->Form->input('admission_fee', array(
					//	'class' => 'form-control',
					//	'placeholder' => 'Please enter admission fee'
					//));
					//echo $this->Form->input('other_fee', array(
					//	'class' => 'form-control',
					//	'placeholder' => 'Please enter other fee'
					//));
					echo $this->Form->input('payment_for', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter payment for'
					));
					echo $this->Form->input('remark', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter remark'
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