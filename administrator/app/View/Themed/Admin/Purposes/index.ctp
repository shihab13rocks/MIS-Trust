<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-list"></i> <?php echo Configure::read('currentAction'); ?></li>
</ol>
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
		<a data-toggle="collapse" data-parent="#accordion" href="#purposeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="purposeTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataTable">
				<thead>
					<tr>
							<th><?php echo __('Title'); ?></th>
							<th><?php echo __('Description'); ?></th>
							<th style="width: 100px;"><?php echo __('Status'); ?></th>
							<th class="actions" style="width: 140px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($purposes as $purpose): ?>
							<tr>
								<td><?php echo h($purpose['Purpose']['title']); ?> &nbsp;</td>
								<td><?php echo h($purpose['Purpose']['description']); ?> &nbsp;</td>
								<td><?php echo $this->Generic->viewStatus(h($purpose['Purpose']['status'])); ?>&nbsp;</td>
								
								<td class="actions">
									<div class="btn-group">
										<?php if(Configure::read('Action.view')): ?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => 'view', $purpose['Purpose']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-eye')); 
											?>
										<?php endif; ?>
										
										<?php if(Configure::read('Action.edit') || (AuthComponent::user('id') == $purpose['Purpose']['id'])): 
											
												$actionMethod = (AuthComponent::user('id') == $purpose['Purpose']['id'])? 'profile':'edit';
										?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => $actionMethod, $purpose['Purpose']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-pencil-square-o')); 
											?>
										<?php endif; ?>	
										
										<?php if(Configure::read('Action.delete')): ?>
											<?php if (AuthComponent::user('id')!=$purpose['Purpose']['id']): ?>
	
												<?php echo $this->Form->postLink(
													'', 
													array('action' => 'delete', $purpose['Purpose']['id']), 
													array('class'=>'btn btn-danger delete','icon'=>'fa fa-bitbucket-square'),
													__('Are you sure you want to delete "%s"?', $purpose['Purpose']['title']));								
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