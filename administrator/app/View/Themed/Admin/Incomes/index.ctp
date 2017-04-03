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
		<a data-toggle="collapse" data-parent="#accordion" href="#incomeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="incomeTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataTable">
				<thead>
					<tr>
							<th><?php echo __('Income Type'); ?></th>
							<th><?php echo __('Date'); ?></th>
							<th><?php echo __('Book'); ?></th>
							<th><?php echo __('Receipt No'); ?></th>
							<th><?php echo __('User'); ?></th>
							<th><?php echo __('Payer Name'); ?></th>
							<th><?php echo __('Payable Amount'); ?></th>
							<th><?php echo __('Paid'); ?></th>
							<th><?php echo __('Due'); ?></th>
							<th style="width: 100px;"><?php echo __('Status'); ?></th>
							<th class="actions" style="width: 140px;"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $totalPayable=0; $totalPaid=0; $totaldue=0; foreach ($incomes as $income):
							$totalPayable += $income['Income']['payable_amount'];
							$totalPaid += $income['Income']['paid'];
							$totaldue += $income['Income']['due'];
					?>
							<tr>
								<td><?php echo $this->Html->link($income['IncomeType']['title'], array('controller' => 'income_types', 'action' => 'view', $income['IncomeType']['id'])); ?> &nbsp;</td>
								<td><?php echo h($income['Income']['date']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['Book']['id'], array('controller' => 'books', 'action' => 'view', $income['Book']['id'])); ?> &nbsp;</td>
								<td><?php echo h($income['Income']['receipt_no']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['User']['username'], array('controller' => 'users', 'action' => 'view', $income['User']['id'])); ?> &nbsp;</td>
								<td><?php echo h($income['Income']['name']); ?> &nbsp;</td>
								<td><div class="right"><?php echo h($income['Income']['payable_amount']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($income['Income']['paid']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($income['Income']['due']); ?> &nbsp;</div></td>
								<td><?php echo $this->Generic->viewStatus(h($income['Income']['status'])); ?>&nbsp;</td>
								
								<td class="actions">
									<div class="btn-group">
										<?php if(Configure::read('Action.view')): ?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => 'view', $income['Income']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-eye')); 
											?>
										<?php endif; ?>
										
										<?php if(Configure::read('Action.edit') || (AuthComponent::user('id') == $income['Income']['id'])): 
											
												$actionMethod = (AuthComponent::user('id') == $income['Income']['id'])? 'profile':'edit';
										?>
											<?php echo $this->Html->linkIcon(
												'', 
												array('action' => $actionMethod, $income['Income']['id']),
												array('class'=>'btn btn-warning','icon'=>'fa fa-pencil-square-o')); 
											?>
										<?php endif; ?>	
										
										<?php if(Configure::read('Action.delete')): ?>
											<?php if (AuthComponent::user('id')!=$income['Income']['id']): ?>
	
												<?php echo $this->Form->postLink(
													'', 
													array('action' => 'delete', $income['Income']['id']), 
													array('class'=>'btn btn-danger delete','icon'=>'fa fa-bitbucket-square'),
													__('Are you sure you want to delete "%s"?', $income['Income']['receipt_no']));								
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
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><b><div class="right">Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</div></td>
						<td><b><div class="right"><?php echo h($totalPayable); ?></b> &nbsp;</div></td>
						<td><b><div class="right"><?php echo h($totalPaid); ?></b> &nbsp;</div></td>
						<td><b><div class="right"><?php echo h($totaldue); ?></b> &nbsp;</div></td>
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