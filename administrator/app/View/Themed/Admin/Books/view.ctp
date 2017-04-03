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
						array('action' => 'edit', $book['Book']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#bookTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="bookTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<dl class="dl-horizontal">

				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($book['Book']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Number'); ?></dt>
				<dd>
					<?php echo h($book['Book']['number']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Edition'); ?></dt>
				<dd>
					<?php echo h($book['Book']['edition']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Start Page'); ?></dt>
				<dd>
					<?php echo h($book['Book']['start_page']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('End Page'); ?></dt>
				<dd>
					<?php echo h($book['Book']['end_page']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($book['Book']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo h($book['Book']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo h($book['Book']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>