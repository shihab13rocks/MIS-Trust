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
						array('action' => 'edit', $income['Income']['id']),
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
					<?php echo h($income['Income']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Income Type'); ?></dt>
				<dd>
					<?php echo $this->Html->link($income['IncomeType']['title'], array('controller' => 'income_types', 'action' => 'view', $income['IncomeType']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Date'); ?></dt>
				<dd>
					<?php echo h($income['Income']['date']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Book'); ?></dt>
				<dd>
					<?php echo $this->Html->link($income['Book']['id'], array('controller' => 'books', 'action' => 'view', $income['Book']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Receipt No'); ?></dt>
				<dd>
					<?php echo h($income['Income']['receipt_no']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('User'); ?></dt>
				<dd>
					<?php echo $this->Html->link($income['User']['username'], array('controller' => 'users', 'action' => 'view', $income['User']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Name of Payer'); ?></dt>
				<dd>
					<?php echo h($income['Income']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Payable Amount'); ?></dt>
				<dd>
					<?php echo h($income['Income']['payable_amount']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Paid'); ?></dt>
				<dd>
					<?php echo h($income['Income']['paid']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Due'); ?></dt>
				<dd>
					<?php echo h($income['Income']['due']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Payment'); ?></dt>
				<dd>
					<?php echo $this->Html->link($income['Payment']['title'], array('controller' => 'payments', 'action' => 'view', $income['Payment']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Purpose'); ?></dt>
				<dd>
					<?php echo $this->Html->link($income['Purpose']['title'], array('controller' => 'purposes', 'action' => 'view', $income['Purpose']['id'])); ?>
					&nbsp;
				</dd>
				<!--<dt><?php //echo __('Monthly Fee'); ?></dt>
				<dd>
					<?php //echo h($income['Income']['monthly_fee']); ?>
					&nbsp;
				</dd>
				<dt><?php //echo __('Yearly Charge'); ?></dt>
				<dd>
					<?php //echo h($income['Income']['yearly_charge']); ?>
					&nbsp;
				</dd>
				<dt><?php //echo __('Fooding Fee'); ?></dt>
				<dd>
					<?php //echo h($income['Income']['fooding_fee']); ?>
					&nbsp;
				</dd>
				<dt><?php //echo __('Admission Fee'); ?></dt>
				<dd>
					<?php //echo h($income['Income']['admission_fee']); ?>
					&nbsp;
				</dd>
				<dt><?php //echo __('Other Fee'); ?></dt>
				<dd>
					<?php //echo h($income['Income']['other_fee']); ?>
					&nbsp;
				</dd>-->
				<dt><?php echo __('Payment For'); ?></dt>
				<dd>
					<?php echo h($income['Income']['payment_for']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remark'); ?></dt>
				<dd>
					<?php echo h($income['Income']['remark']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($income['Income']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($income['Income']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($income['Income']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>