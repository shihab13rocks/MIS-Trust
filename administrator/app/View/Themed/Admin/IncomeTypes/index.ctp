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
		<a data-toggle="collapse" data-parent="#accordion" href="#incomeTypeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="incomeTypeTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataTable">
				<thead>
					<tr>
							<th><?php echo __('Title'); ?></th>
							<th><?php echo __('Remark'); ?></th>
							<th style="width: 100px;"><?php echo __('Status'); ?></th>
							<th class="actions" style="width: 140px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($incomeTypes as $incomeType): ?>
							<tr>
								<td><?php echo h($incomeType['IncomeType']['title']); ?> &nbsp;</td>
								<td><?php echo h($incomeType['IncomeType']['remark']); ?> &nbsp;</td>
								<td><?php echo $this->Generic->viewStatus(h($incomeType['IncomeType']['status'])); ?>&nbsp;</td>
								
								<td class="actions">
									<div class="btn-group">
										<?php if(Configure::read('Action.view')): ?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => 'view', $incomeType['IncomeType']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-eye')); 
											?>
										<?php endif; ?>
										
										<?php if(Configure::read('Action.edit') || (AuthComponent::user('id') == $incomeType['IncomeType']['id'])): 
											
												$actionMethod = (AuthComponent::user('id') == $incomeType['IncomeType']['id'])? 'profile':'edit';
										?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => $actionMethod, $incomeType['IncomeType']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-pencil-square-o')); 
											?>
										<?php endif; ?>	
										
										<?php if(Configure::read('Action.delete')): ?>
											<?php if (AuthComponent::user('id')!=$incomeType['IncomeType']['id']): ?>
	
												<?php echo $this->Form->postLink(
													'', 
													array('action' => 'delete', $incomeType['IncomeType']['id']), 
													array('class'=>'btn btn-danger delete','icon'=>'fa fa-bitbucket-square'),
													__('Are you sure you want to delete "%s"?', $incomeType['IncomeType']['title']));								
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