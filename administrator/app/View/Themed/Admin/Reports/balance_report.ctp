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
    <div class="col-sm-6">
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
								<th><?php echo __('Income Type'); ?></th>
								<th><?php echo __('Paid'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $totalPaid=0; foreach ($incomes as $income):
								$totalPaid += $income['Income']['paid'];
						?>
								<tr>
									<td><?php echo h($income['Income']['date']); ?> &nbsp;</td>
									<td><?php echo $this->Html->link($income['IncomeType']['title'], array('controller' => 'income_types', 'action' => 'view', $income['IncomeType']['id'])); ?> &nbsp;</td>
									<td><div class="right"><?php echo h($income['Income']['paid']); ?> &nbsp;</div></td>
								</tr>
						<?php endforeach; ?>
						
					</tbody>
					<tfoot>
					    <tr>
							<td>&nbsp;</td>
							<td><b><div class="right">Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</div></td>
							<td><b><div class="right"><?php echo h($totalPaid); ?></b> &nbsp;</div></td>
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
    <div class="col-sm-6">
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
								<th><?php echo __('Expense Type'); ?></th>
								<th><?php echo __('Paid'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $totalPaid=0; foreach ($expenses as $expense):
								$totalPaid += $expense['Expense']['paid'];
						?>
								<tr>
									<td><?php echo h($expense['Expense']['date']); ?> &nbsp;</td>
									<td><?php echo $this->Html->link($expense['ExpenseType']['title'], array('controller' => 'income_types', 'action' => 'view', $expense['ExpenseType']['id'])); ?> &nbsp;</td>
									<td><div class="right"><?php echo h($expense['Expense']['paid']); ?> &nbsp;</div></td>
								</tr>
						<?php endforeach; ?>
						
					</tbody>
					<tfoot>
					    <tr>
						    <td>&nbsp;</td>
						    <td><b><div class="right">Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</div></td>
						    <td><b><div class="right"><?php echo h($totalPaid); ?></b> &nbsp;</div></td>
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
</div>

<?php if(!empty($balances)):?>
<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>Balance Summary</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#balanceTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="balanceTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataSummaryTable">
				<thead>
					<tr>
						<th style="width: 300px;"><?php echo __('Timeframe'); ?></th>
						<th><?php echo __('Total Income ' . Configure::read('Setting.currency')); ?></th>
						<th><?php echo __('Total Expense ' . Configure::read('Setting.currency')); ?></th>
						<th><?php echo __('Net Balance ' . Configure::read('Setting.currency')); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo h($balances[0]); ?> &nbsp;</td>
						<td><div class="right"><?php echo h($balances[1]); ?> &nbsp;</div></td>
						<td><div class="right"><?php echo h($balances[2]); ?> &nbsp;</div></td>
						<td><div class="right"><?php echo h($balances[3]); ?> &nbsp;</div></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /.table-responsive -->
	    </div>
	    <!-- /.portlet-body -->
	</div>
	<!-- /.portlet -->
</div>
<?php endif;?>