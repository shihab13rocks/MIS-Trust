<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-list"></i> <?php echo Configure::read('currentAction'); ?></li>
</ol>
</div>
<div class="portlet portlet-green">
	<div class="portlet-body">
		<?php echo $this->Form->create('User', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-2 control-label'
					),
					'wrapInput' => 'col-sm-6'
				),
				'class' => 'form-horizontal'
			));
			if ($memberTypes) {
				$options = array(
					'label' => 'Member Type',
					'required' => 'required',
					'id' => 'MemberTypeId',
					'placeholder' => 'Please select a member type',
					'name' => '[User][member_type_id]',
					'selected' => (!empty($searchParams['User']['member_type_id']))? $searchParams['User']['member_type_id']:'',
					'all' => true,
					'empty' => false
				);

				$this->Generic->getBoostrapSelectOption($options, $memberTypes);
			}
			echo $this->Form->submit(__('Search'), array(
				'div' => array('class'=>'form-actions col-sm-offset-2'),
				'class' => 'btn btn-success',
			)); 
			echo $this->Form->end();
		?>
	</div>
</div>
<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>
			<?php if(Configure::read('Action.add')): ?>
				<?php echo $this->Html->linkIcon(
						'', 
						array('action' => 'add'),
						array('icon'=>'fa fa-plus')); 
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
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataTable">
				<thead>
					<tr>	
							<?php if(AuthComponent::user('user_role_id')==1): ?> 
								<th><?php echo __('Organization'); ?></th>
							<?php endif; ?>
							<th><?php echo __('Code'); ?></th>
							<th><?php echo __('Photo'); ?></th>
							<th><?php echo __('Name'); ?></th>
							<th><?php echo __('Mobile'); ?></th>
							<th><?php echo __('Email'); ?></th>
							<th style="width: 100px;"><?php echo __('Status'); ?></th>
							<th class="actions" style="width: 140px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
							<tr>
								<?php if(AuthComponent::user('user_role_id')==1): ?>
									<td><?php echo h($user['Organization']['title']); ?></td>
								<?php endif; ?>
								<td><?php echo h($user['User']['code']); ?>&nbsp;</td>
								<td style="text-align: center;"><?php echo $this->Html->image('uploads/users/thumbs/' . $user['User']['upload']); ?>&nbsp;</td>
								<td><?php echo h($user['User']['full_name']); ?> &nbsp;</td>
								<td><?php echo h($user['User']['mobile']); ?>&nbsp;</td>
								<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
								<td><?php echo $this->Generic->viewStatus(h($user['User']['status'])); ?>&nbsp;</td>
								
								<td class="actions">
									<div class="btn-group">
										<?php if(Configure::read('Action.view')): ?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => 'view', $user['User']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-eye')); 
											?>
										<?php endif; ?>
										
										<?php if(Configure::read('Action.edit') || (AuthComponent::user('id') == $user['User']['id'])): 
											
												$actionMethod = (AuthComponent::user('id') == $user['User']['id'])? 'profile':'edit';
										?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => $actionMethod, $user['User']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-pencil-square-o')); 
											?>
										<?php endif; ?>	
										
										<?php if(Configure::read('Action.delete')): ?>
											<?php if (AuthComponent::user('id')!=$user['User']['id']): ?>
	
												<?php echo $this->Form->postLink(
													'', 
													array('action' => 'delete', $user['User']['id']), 
													array('class'=>'btn btn-danger delete','icon'=>'fa fa-bitbucket-square'),
													__('Are you sure you want to delete "%s"?', $user['User']['first_name']));								
												?>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								</td>
							</tr>
					<?php endforeach; ?>
	
					
					
				</tbody>
			</table>
		</div>
		<!-- /.table-responsive -->
	    </div>
	    <!-- /.portlet-body -->
	</div>
	<!-- /.portlet -->
</div>
