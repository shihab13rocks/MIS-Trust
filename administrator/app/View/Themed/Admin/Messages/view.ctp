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
						array('action' => 'edit', $message['Message']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#messageTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="messageTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<dl class="dl-horizontal">

				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($message['Message']['id']); ?>
					&nbsp;
				</dd>
				<!--<dt><?php //echo __('User'); ?></dt>
				<dd>
					<?php //echo $this->Html->link($message['Message']['user_id'], array('controller' => 'users', 'action' => 'view', $message['User']['id'])); ?>
					&nbsp;
				</dd>-->
				<dt><?php echo __('From'); ?></dt>
				<dd>
					<?php echo h($users[$message['Message']['from']]); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Subject'); ?></dt>
				<dd>
					<?php echo h($message['Message']['subject']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Content'); ?></dt>
				<dd>
					<?php echo h($message['Message']['content']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($message['Message']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($message['Message']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($message['Message']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>