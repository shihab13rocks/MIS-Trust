<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-search"></i> <?php echo Configure::read('currentAction').' Search'; ?></li>
</ol>
</div>
<div class="portlet portlet-green">
	<div class="portlet-body">
		<?php echo $this->Form->create('Balance', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-2 control-label'
					),
					'wrapInput' => 'col-sm-6'
				),
				'class' => 'form-horizontal'
			));
			echo $this->Form->input('from_date', array(
				'type'=>'text',
				'class'=>'col-sm-10',
				'style'=>'margin-left:-15px;height:30px',
				'readonly'=>'readonly',			
				'value'=> (!empty($searchParams['Balance']['from_date']))? $searchParams['Balance']['from_date']:false,
				'datepickerDiv' =>'col-sm-6 input-append date',
				'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d"),'id'=>'datepicker1'),
				'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
			));
			echo $this->Form->input('to_date', array(
				'type'=>'text',
				'class'=>'col-sm-10',
				'style'=>'margin-left:-15px;height:30px',
				'readonly'=>'readonly',			
				'value'=> (!empty($searchParams['Balance']['to_date']))? $searchParams['Balance']['to_date']:false,
				'datepickerDiv' =>'col-sm-6 input-append date',
				'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d"),'id'=>'datepicker2'),
				'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
			));
			echo $this->Form->submit(__('Search'), array(
				'div' => array('class'=>'form-actions col-sm-offset-2'),
				'class' => 'btn btn-success',
			)); 
			echo $this->Form->end();
		?>
	</div>
</div>
<div class="row">
    <div class="col-sm-12">
	<?php if(!empty($incomes)):?>
	<div class="portlet portlet-default">
		<div class="portlet-heading">
		    <div class="portlet-title">
			<h4>Income Report</h4>
		    </div>
		    <div class="portlet-widgets">
			<a data-toggle="collapse" data-parent="#accordion" href="#incomeTable"><i class="fa fa-chevron-down"></i></a>
		    </div>
		    <div class="clearfix"></div>
		</div>
		<div id="incomeTable" class="panel-collapse collapse in">
			    <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover table-green dataSummaryTable">
					<thead>
						<tr>
								<th><?php echo __('Date'); ?></th>
								<?php $totalPayable=array(); foreach ($incomeTypes as $incomeType):
								    $totalPayable[$incomeType] = 0;
								?>
								    <th><?php echo h($incomeType); ?></th>
								<?php endforeach; ?>
								<th><?php echo __('Total'); ?></th>
								<th><?php echo __('Paid'); ?></th>
								<th><?php echo __('Due'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $footerTotal = 0; $footerPaid = 0; $footerDue = 0; foreach ($incomes as $income): ?>
								<tr>
									<td><?php echo h($income['Income']['date']); ?> &nbsp;</td>
									<?php $totalPaid = 0; $totalPayableAmount = 0; foreach ($incomeTypes as $incomeType):?>
									<?php if ($incomeType == $income['IncomeType']['title']){
									    $totalPayableAmount += $income['Income']['payable_amount'];
									    $totalPaid += $income['Income']['paid'];
									    $totalPayable[$incomeType] += $income['Income']['payable_amount'];
									?>
									    <td><div class="right"><?php echo h($income['Income']['payable_amount']); ?> &nbsp;</div></td>
									<?php
									    }
									    else{ ?>
										<td><div class="right"><?php echo "0"; ?> &nbsp;</div></td>
									<?php    }
									?>
									<?php endforeach; ?>
									<td><div class="right"><?php echo h($totalPayableAmount); ?> &nbsp;</div></td>
									<td><div class="right"><?php echo h($totalPaid); ?> &nbsp;</div></td>
									<td><div class="right"><?php echo h($totalPayableAmount - $totalPaid); ?> &nbsp;</div></td>
								</tr>
						<?php
						    $footerTotal += $totalPayableAmount;
						    $footerPaid += $totalPaid;
						    $footerDue += $totalPayableAmount - $totalPaid;
						endforeach; ?>
						
					</tbody>
					<tfoot>
					    <tr>
							<td><b>Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</td>
							<?php foreach ($incomeTypes as $incomeType):?>
							    <td><b><div class="right"><?php echo h($totalPayable[$incomeType]); ?></b> &nbsp;</div></td>
							<?php endforeach; ?>
							<td><b><div class="right"><?php echo h($footerTotal); ?></b> &nbsp;</div></td>
							<td><b><div class="right"><?php echo h($footerPaid); ?></b> &nbsp;</div></td>
							<td><b><div class="right"><?php echo h($footerDue); ?></b> &nbsp;</div></td>
						</tr>
					</tfoot>
					
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.portlet -->
	</div>
	<?php endif;?>
    </div>
    <div class="col-sm-12">
	<?php if(!empty($expenses)):?>
	<div class="portlet portlet-default">
		<div class="portlet-heading">
		    <div class="portlet-title">
			<h4>Expense Report</h4>
		    </div>
		    <div class="portlet-widgets">
			<a data-toggle="collapse" data-parent="#accordion" href="#expenseTable"><i class="fa fa-chevron-down"></i></a>
		    </div>
		    <div class="clearfix"></div>
		</div>
		<div id="expenseTable" class="panel-collapse collapse in">
			    <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover table-green dataSummaryTable">
					<thead>
						<tr>
								<th><?php echo __('Date'); ?></th>
								<?php $totalPayable=array(); foreach ($expenseTypes as $expenseType):
								    $totalPayable[$expenseType] = 0;
								?>
								    <th><?php echo h($expenseType); ?></th>
								<?php endforeach; ?>
								<th><?php echo __('Total'); ?></th>
								<th><?php echo __('Paid'); ?></th>
								<th><?php echo __('Due'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $footerTotal = 0; $footerPaid = 0; $footerDue = 0; foreach ($expenses as $expense): ?>
								<tr>
									<td><?php echo h($expense['Expense']['date']); ?> &nbsp;</td>
									<?php $totalPaid = 0; $totalPayableAmount = 0; foreach ($expenseTypes as $expenseType):?>
									<?php if ($expenseType == $expense['ExpenseType']['title']){
									    $totalPayableAmount += $expense['Expense']['payable_amount'];
									    $totalPaid += $expense['Expense']['paid'];
									    $totalPayable[$expenseType] += $expense['Expense']['payable_amount'];
									?>
									    <td><div class="right"><?php echo h($expense['Expense']['payable_amount']); ?> &nbsp;</div></td>
									<?php
									    }
									    else{ ?>
										<td><div class="right"><?php echo "0"; ?> &nbsp;</div></td>
									<?php    }
									?>
									<?php endforeach; ?>
									<td><div class="right"><?php echo h($totalPayableAmount); ?> &nbsp;</div></td>
									<td><div class="right"><?php echo h($totalPaid); ?> &nbsp;</div></td>
									<td><div class="right"><?php echo h($totalPayableAmount - $totalPaid); ?> &nbsp;</div></td>
								</tr>
						<?php
						    $footerTotal += $totalPayableAmount;
						    $footerPaid += $totalPaid;
						    $footerDue += $totalPayableAmount - $totalPaid;
						endforeach; ?>
						
					</tbody>
					<tfoot>
					    <tr>
							<td><b>Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</td>
							<?php foreach ($expenseTypes as $expenseType):?>
							    <td><b><div class="right"><?php echo h($totalPayable[$expenseType]); ?></b> &nbsp;</div></td>
							<?php endforeach; ?>
							<td><b><div class="right"><?php echo h($footerTotal); ?></b> &nbsp;</div></td>
							<td><b><div class="right"><?php echo h($footerPaid); ?></b> &nbsp;</div></td>
							<td><b><div class="right"><?php echo h($footerDue); ?></b> &nbsp;</div></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.portlet -->
	</div>
	<?php endif;?>
    </div>
    
    <div class="col-lg-6">
	<?php if(!empty($balances)):?>
	<div class="portlet portlet-default">
		<div class="portlet-heading">
		    <div class="portlet-title">
			<h4><i class="fa fa-file-text"></i>&nbsp; Balance Summary</h4>
		    </div>
		    <div class="portlet-widgets">
			<a data-toggle="collapse" data-parent="#accordion" href="#balanceTable"><i class="fa fa-chevron-down"></i></a>
		    </div>
		    <div class="clearfix"></div>
		</div>
		<div id="balanceTable" class="panel-collapse collapse in">
			<div class="portlet-body">
			<dl class="dl-horizontal" style="width:85%;">
				<dt><?php echo __('Total Income ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php echo h($balances[1]); ?> &nbsp;</div>
				</dd>
				<dt><?php echo __('Total Expense ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php echo h($balances[2]); ?> &nbsp;</div>
				</dd>
				<dt><?php echo __('Net Balance ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php echo h($balances[3]); ?> &nbsp;</div>
				</dd>
			</dl>
			</div>
		    <!-- /.portlet-body -->
		</div>
		<!-- /.portlet -->
	</div>
	<?php endif;?>
    </div>
</div>