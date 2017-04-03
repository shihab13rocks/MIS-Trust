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
		<a data-toggle="collapse" data-parent="#accordion" href="#messageTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="messageTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<?php echo $this->Form->create('Message', array(
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
					echo $this->Form->input('user_id', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter receiver'
					));
					echo $this->Form->input('subject', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter subject'
					));
					echo $this->Form->input('content', array(
						'class' => 'form-control',
						'placeholder' => 'Please enter content'
					));
					echo $this->Form->input('status', array(
						'class' => 'form-control',
						'options' => $this->Generic->statusList()
					));
				?>
					<div class="form-actions">
						<?php echo $this->Form->submit(__('Send'), array(
							'div' => false,
							'class' => 'btn btn-default col-sm-offset-2 col-sm-2'
						)); ?>
					</div>	
				</fieldset>
				
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	
</div>