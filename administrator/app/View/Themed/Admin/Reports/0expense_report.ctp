<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-search"></i> <?php echo Configure::read('currentAction').' Search'; ?></li>
</ol>
</div>
<div class="portlet portlet-green">
	<div class="portlet-body">
		<?php echo $this->Form->create('Expense', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-2 control-label'
					),
					'wrapInput' => 'col-sm-6'
				),
				'class' => 'form-horizontal'
			));
			if ($expenseTypes) {
				$options = array(
					'label' => 'Expense Type',
					'required' => 'required',
					'id' => 'ExpenseTypeId',
					'placeholder' => 'Please select an expense type',
					'name' => '[Expense][expense_type_id]',
					'selected' => (!empty($searchParams['Expense']['expense_type_id']))? $searchParams['Expense']['expense_type_id']:'',
					'all' => true,
					'empty' => false
				);

				$this->Generic->getBoostrapSelectOption($options, $expenseTypes);
			}
			if ($purposes) {
				$options = array(
					'label' => 'Purpose',
					'required' => 'required',
					'id' => 'PurposeId',
					'placeholder' => 'Please select a purpose',
					'name' => '[Expense][purpose_id]',
					'selected' => (!empty($searchParams['Expense']['purpose_id']))? $searchParams['Expense']['purpose_id']:'',
					'all' => true,
					'empty' => false
				);

				$this->Generic->getBoostrapSelectOption($options, $purposes);
			}
			echo $this->Form->input('from_date', array(
				'type'=>'text',
				'class'=>'col-sm-10',
				'style'=>'margin-left:-15px;height:30px',
				'readonly'=>'readonly',			
				'value'=> (!empty($searchParams['Expense']['from_date']))? $searchParams['Expense']['from_date']:false,
				'datepickerDiv' =>'col-sm-6 input-append date',
				'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d"),'id'=>'datepicker1'),
				'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
			));
			echo $this->Form->input('to_date', array(
				'type'=>'text',
				'class'=>'col-sm-10',
				'style'=>'margin-left:-15px;height:30px',
				'readonly'=>'readonly',			
				'value'=> (!empty($searchParams['Expense']['to_date']))? $searchParams['Expense']['to_date']:false,
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
			<table class="table table-striped table-bordered table-hover table-green dataReportTable">
				<thead>
					<tr>
							<th><?php echo __('Date'); ?></th>
							<th><?php echo __('Expense Type'); ?></th>
							<th><?php echo __('Vouchar No'); ?></th>
							<th><?php echo __('Purpose'); ?></th>
							<th><?php echo __('Payable Amount'); ?></th>
							<th><?php echo __('Paid'); ?></th>
							<th><?php echo __('Due'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $totalPayable=0; $totalPaid=0; $totaldue=0; foreach ($expenses as $expense):
							$totalPayable += $expense['Expense']['payable_amount'];
							$totalPaid += $expense['Expense']['paid'];
							$totaldue += $expense['Expense']['due'];
					?>
							<tr>
								<td><?php echo h($expense['Expense']['date']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($expense['ExpenseType']['title'], array('controller' => 'income_types', 'action' => 'view', $expense['ExpenseType']['id'])); ?> &nbsp;</td>
								<td><?php echo h($expense['Expense']['vouchar_no']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($expense['Purpose']['title'], array('controller' => 'purposes', 'action' => 'view', $expense['Purpose']['id'])); ?> &nbsp;</td>
								<td><div class="right"><?php echo h($expense['Expense']['payable_amount']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($expense['Expense']['paid']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($expense['Expense']['due']); ?> &nbsp;</div></td>
							</tr>
					<?php endforeach; ?>
					
				</tbody>
				<tfoot>
				    <tr>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td>&nbsp;</td>
					    <td><b><div class="right">Total <?php echo Configure::read('Setting.currency'); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totalPayable); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totalPaid); ?></b> &nbsp;</div></td>
					    <td><b><div class="right"><?php echo h($totaldue); ?></b> &nbsp;</div></td>
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
<?php endif;?>