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
						array('action' => 'edit', $purpose['Purpose']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#purposeTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="purposeTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<dl class="dl-horizontal">

				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($purpose['Purpose']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Title'); ?></dt>
				<dd>
					<?php echo h($purpose['Purpose']['title']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Description'); ?></dt>
				<dd>
					<?php echo h($purpose['Purpose']['description']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($purpose['Purpose']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($purpose['Purpose']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($purpose['Purpose']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>