<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-eye"></i> <?php echo Configure::read('currentAction'); ?></li>
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
			<?php if(Configure::read('Action.edit')): ?>
				<?php echo $this->Html->linkIcon(
						'', 
						array('action' => 'edit', $expense['Expense']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
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
			<dl class="dl-horizontal">

				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Expense Type'); ?></dt>
				<dd>
					<?php echo $this->Html->link($expense['ExpenseType']['title'], array('controller' => 'expense_types', 'action' => 'view', $expense['ExpenseType']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Date'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['date']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Vouchar No'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['vouchar_no']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Payment'); ?></dt>
				<dd>
					<?php echo $this->Html->link($expense['Payment']['title'], array('controller' => 'payments', 'action' => 'view', $expense['Payment']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Purpose'); ?></dt>
				<dd>
					<?php echo $this->Html->link($expense['Purpose']['title'], array('controller' => 'purposes', 'action' => 'view', $expense['Purpose']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Payable Amount'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['payable_amount']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Paid'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['paid']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Due'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['due']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Payment For'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['payment_for']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remark'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['remark']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($expense['Expense']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($expense['Expense']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>