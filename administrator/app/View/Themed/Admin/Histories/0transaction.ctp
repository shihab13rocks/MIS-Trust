<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-search"></i> <?php echo Configure::read('currentAction').' Search'; ?></li>
</ol>
</div>
<div class="portlet portlet-green">
	<div class="portlet-body">
		<?php echo $this->Form->create('Income', array(
				'inputDefaults' => array(
					'div' => 'form-group',
					'label' => array(
						'class' => 'col-sm-2 control-label'
					),
					'wrapInput' => 'col-sm-6'
				),
				'class' => 'form-horizontal'
			));
			if ($incomeTypes) {
				$options = array(
					'label' => 'Transaction Type',
					'required' => 'required',
					'id' => 'IncomeTypeId',
					'placeholder' => 'Please select an income type',
					'name' => '[Income][income_type_id]',
					'selected' => (!empty($searchParams['Income']['income_type_id']))? $searchParams['Income']['income_type_id']:'',
					'all' => true,
					'empty' => false
				);

				$this->Generic->getBoostrapSelectOption($options, $incomeTypes);
			}
			if ($books) {
				$options = array(
					'label' => 'Book',
					'required' => 'required',
					'id' => 'BookId',
					'placeholder' => 'Please select a book',
					'name' => '[Income][book_id]',
					'selected' => (!empty($searchParams['Income']['book_id']))? $searchParams['Income']['book_id']:'',
					'all' => true,
					'empty' => false
				);

				$this->Generic->getBoostrapSelectOption($options, $books);
			}
			if ($purposes) {
				$options = array(
					'label' => 'Purpose',
					'required' => 'required',
					'id' => 'PurposeId',
					'placeholder' => 'Please select a purpose',
					'name' => '[Income][purpose_id]',
					'selected' => (!empty($searchParams['Income']['purpose_id']))? $searchParams['Income']['purpose_id']:'',
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
				'value'=> (!empty($searchParams['Income']['from_date']))? $searchParams['Income']['from_date']:false,
				'datepickerDiv' =>'col-sm-6 input-append date',
				'datepickerDivOption'=> array ('data-date-format'=> 'yyyy-mm-dd', 'data-date'=> date("Y-m-d"),'id'=>'datepicker1'),
				'afterInput' => '<span class="add-on"><i class="fa fa-calendar fa-2x"></i></span>'	
			));
			echo $this->Form->input('to_date', array(
				'type'=>'text',
				'class'=>'col-sm-10',
				'style'=>'margin-left:-15px;height:30px',
				'readonly'=>'readonly',			
				'value'=> (!empty($searchParams['Income']['to_date']))? $searchParams['Income']['to_date']:false,
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

<?php if(!empty($incomes)):?>
<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>Transaction Report</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#incomeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="incomeTable" class="panel-collapse collapse in">
		    <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-green dataReportTable">
				<thead>
					<tr>
							<th><?php echo __('Date'); ?></th>
							<th><?php echo __('Transaction Type'); ?></th>
							<th><?php echo __('Book'); ?></th>
							<th><?php echo __('Receipt No'); ?></th>
							<th><?php echo __('User'); ?></th>
							<th><?php echo __('Payer Name'); ?></th>
							<th><?php echo __('Purpose'); ?></th>
							<th><?php echo __('Payable Amount'); ?></th>
							<th><?php echo __('Paid'); ?></th>
							<th><?php echo __('Due'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $totalPayable=0; $totalPaid=0; $totaldue=0; foreach ($incomes as $income):
							$totalPayable += $income['Income']['payable_amount'];
							$totalPaid += $income['Income']['paid'];
							$totaldue += $income['Income']['due'];
					?>
							<tr>
								<td><?php echo h($income['Income']['date']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['IncomeType']['title'], array('controller' => 'income_types', 'action' => 'view', $income['IncomeType']['id'])); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['Book']['number'], array('controller' => 'books', 'action' => 'view', $income['Book']['id'])); ?> &nbsp;</td>
								<td><?php echo h($income['Income']['receipt_no']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['User']['first_name'], array('controller' => 'users', 'action' => 'view', $income['User']['id'])); ?> &nbsp;</td>
								<td><?php echo h($income['Income']['name']); ?> &nbsp;</td>
								<td><?php echo $this->Html->link($income['Purpose']['title'], array('controller' => 'purposes', 'action' => 'view', $income['Purpose']['id'])); ?> &nbsp;</td>
								<td><div class="right"><?php echo h($income['Income']['payable_amount']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($income['Income']['paid']); ?> &nbsp;</div></td>
								<td><div class="right"><?php echo h($income['Income']['due']); ?> &nbsp;</div></td>
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