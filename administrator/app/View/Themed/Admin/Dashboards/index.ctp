<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard<?php //echo Configure::read('currentAction'); ?></li>
</ol>
</div>
<div>
    <?php if(Configure::read('Controller.Users')&&Configure::read('Nav.Users.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-male fa-4x"></i><br>Member Management'), 
			    array('controller' => 'Users', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Books')&&Configure::read('Nav.Books.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-book fa-4x"></i><br>Register Book'), 
			    array('controller' => 'Books', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Incomes')&&Configure::read('Nav.Incomes.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-indent fa-4x"></i><br>Income Management'), 
			    array('controller' => 'Incomes', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Expenses')&&Configure::read('Nav.Expenses.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-outdent fa-4x"></i><br>Expense Management'), 
			    array('controller' => 'Expenses', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.balanceReport')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-file-text fa-4x"></i><br>Balance Summary'), 
			    array('controller' => 'Reports', 'action' => 'balanceReport'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Messages')&&Configure::read('Nav.Messages.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-clipboard fa-4x"></i><br>Notice Board'), 
			    array('controller' => 'Messages', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.backup')): ?>
    <?php 

	    echo $this->Html->link(
			    __('<i class="fa fa-download fa-4x"></i><br>Backup'), 
			    array('controller' => 'Reports', 'action' => 'backup'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    );
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Settings')&&Configure::read('Nav.Settings.index')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-gear fa-4x"></i><br>Settings'), 
			    array('controller' => 'Settings', 'action' => 'index'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
    <?php if(Configure::read('Controller.Histories')&&Configure::read('Nav.Histories.transaction')): ?>
    <?php 
	    echo $this->Html->link(
			    __('<i class="fa fa-list-alt fa-4x"></i><br>Transactions'), 
			    array('controller' => 'Histories', 'action' => 'transaction'),
			    array('class' => 'btn btn-green', 'escape' => false, 'style' => 'width:22%; margin-left:2%; margin-bottom:2%; min-width: 160px;')
		    ); 
    ?>
    <?php endif; ?>
</div>

<div class="row">

    <!--<div class="col-lg-8">
	<div class="portlet portlet-default">
	    <div class="portlet-heading">
		<div class="portlet-title">
		    <h4>Calendar</h4>
		</div>
		<div class="clearfix"></div>
	    </div>
	    <div class="portlet-body">
		<div class="table-responsive">
		    <div id="calendar"></div>
		</div>
	    </div>
	</div>
    </div>-->
    <!-- /.col-lg-8 -->
</div>
                <!-- /.row -->
<!--<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>
			<?php //if(Configure::read('Action.add')): ?>
				<?php /*echo $this->Html->linkIcon(
						'', 
						array('action' => 'add'),
						array('icon'=>'fa fa-plus'));*/ 
				?>
			<?php //endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#dashTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>	
	<div id="dashTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<h1><center>Welcome to Ummah Trust</center></h1>
		</div>
	</div>
</div>-->
<div class="row">
    <div class="col-lg-7">
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
				<dt><?php echo __('My Donation ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php echo h($balances[1]); ?> &nbsp;</div>
				</dd>
				<!--<dt><?php //echo __('Total Expense ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php //echo h($balances[2]); ?> &nbsp;</div>
				</dd>
				<dt><?php //echo __('Net Balance ' . Configure::read('Setting.currency')); ?></dt>
				<dd>
					<div class="right"><?php //echo h($balances[3]); ?> &nbsp;</div>
				</dd>-->
			</dl>
		    	</div>
		    <!-- /.portlet-body -->
		</div>
		<!-- /.portlet -->
	</div>
	<?php endif;?>
    </div>
    <div class="col-lg-5">
	<div class="portlet portlet-default">
		<div class="portlet-heading">
		    <div class="portlet-title">
			<div class="portlet-title">
			<h4><i class="fa fa-envelope"></i>&nbsp; Notice Board</h4>
		    </div>
		    </div>
		    <div class="portlet-widgets">
			<a data-toggle="collapse" data-parent="#accordion" href="#messageTable"><i class="fa fa-chevron-down"></i></a>
		    </div>
		    <div class="clearfix"></div>
		</div>
		<div id="messageTable" class="panel-collapse collapse in">
			    <div class="table-responsive">
				
				<table class="table table-striped table-bordered table-hover table-green dataDashTable">
					<tbody>
						<?php foreach ($messages as $message): ?>
								<tr class="unread-message">
								    <td class="msg-col" style="max-width: 200px;">
									<?php echo h($message['Message']['subject']); ?> &nbsp;
									<span class="text-muted">- <?php echo h($message['Message']['content']); ?> &nbsp;</span>
								    </td>
								    <td class="date-col"><i class="fa fa-male"></i> 
									    <?php echo h($users[$message['Message']['from']]); ?> &nbsp;<br>
									    <?php echo h($message['Message']['created']); ?>
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
    </div>
</div>