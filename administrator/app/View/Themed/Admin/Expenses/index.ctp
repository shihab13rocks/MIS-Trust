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
		<a data-toggle="collapse" data-parent="#accordion" href="#expenseTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="expenseTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataTable">
				<thead>
					<tr>
							<th><?php echo __('Expense Type'); ?></th>
							<th><?php echo __('Date'); ?></th>
							<th><?php echo __('Vouchar No'); ?></th>
							<th><?php echo __('Payable Amount'); ?></th>
							<th><?php echo __('Paid'); ?></th>
							<th><?php echo __('Due'); ?></th>
							<th><?php echo __('Payment'); ?></th>
							<th><?php echo __('Purpose'); ?></th>
							<th><?php echo __('Remark'); ?></th>
							<th style="width: 100px;"><?php echo __('Status'); ?></th>
							<th class="actions" style="width: 140px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $totalPayable=0; $totalPaid=0; $totaldue=0; foreach ($expenses as $expense):
							$totalPayable += $expense['Expense']['payable_amount'];
							$totalPaid += $expense['Expense']['paid'];
							$totaldue += $expense['Expense']['due'];
					?>
							<tr>
								<td><?php echo $this->Html->link($expense['ExpenseType']['title'], array('controller' => 'income_types', 'action' => 'view', $expense['ExpenseType']['id'])); ?> &nbsp;</td>
								<td><?php echo h($expense['Expense']['date']); ?> &nbsp;</td>
								<td><?php echo h($expense['Expense']['vouchar_no']); ?> &nbsp;</td>
								<td><div class="right"><?php echo h($expense['Expense']['payable_amount']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($expense['Expense']['paid']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($expense['Expense']['due']); ?> &nbsp;</div></td>
								<td><?php echo $this->Html->link($expense['Payment']['title'], array('controller' => 'payments', 'action' => 'view', $expense['Payment']['id'])); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($expense['Purpose']['title'], array('controller' => 'purposes', 'action' => 'view', $expense['Purpose']['id'])); ?> &nbsp;</td>
								<td><?php echo h($expense['Expense']['remark']); ?> &nbsp;</td>
								<td><?php echo $this->Generic->viewStatus(h($expense['Expense']['status'])); ?>&nbsp;</td>
								
								<td class="actions">
									<div class="btn-group">
										<?php if(Configure::read('Action.view')): ?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => 'view', $expense['Expense']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-eye')); 
											?>
										<?php endif; ?>
										
										<?php if(Configure::read('Action.edit') || (AuthComponent::user('id') == $expense['Expense']['id'])): 
											
												$actionMethod = (AuthComponent::user('id') == $expense['Expense']['id'])? 'profile':'edit';
										?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => $actionMethod, $expense['Expense']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-pencil-square-o')); 
											?>
										<?php endif; ?>	
										
										<?php if(Configure::read('Action.delete')): ?>
											<?php if (AuthComponent::user('id')!=$expense['Expense']['id']): ?>
	
												<?php echo $this->Form->postLink(
													'', 
													array('action' => 'delete', $expense['Expense']['id']), 
													array('class'=>'btn btn-danger delete','icon'=>'fa fa-bitbucket-square'),
													__('Are you sure you want to delete "%s"?', $expense['Expense']['vouchar_no']));								
												?>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								</td>
							</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
				    <tr>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td><b><div class="right">Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totalPayable); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totalPaid); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totaldue); ?></b> &nbsp;</div></td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
				    </tr>
				</tfoot>
			</table>
		</div>
		<!-- /.table-responsive -->
	    </div>
	    <!-- /.portlet-body -->
	</div>
	<!-- /.portlet -->
</div>