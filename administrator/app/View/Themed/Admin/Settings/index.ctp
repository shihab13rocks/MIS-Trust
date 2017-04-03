<div class="page-title">
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-plus"></i> <?php echo Configure::read('currentAction'); ?></li>
</ol>
</div>
<div class="portlet portlet-default">
	<div class="portlet-heading">
	    <div class="portlet-title">
		<h4>System Settings</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#settingTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="settingTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<div class="settings index">
				<?php $this->Generic->settingFields($groups,$settings); ?>
			</div>					
		</div>
	</div>
	
</div>	
