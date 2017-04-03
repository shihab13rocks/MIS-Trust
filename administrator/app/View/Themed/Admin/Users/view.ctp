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
						array('action' => 'edit', $user['User']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#userTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="userTable" class="panel-collapse collapse in">
		<div class="portlet-body">
			<dl class="dl-horizontal">
                                <!--<dt style="text-align: left;"><?php //echo __('Photo'); ?></dt>-->
				<dd>
					<?php echo $this->Html->image('uploads/users/thumbs/' . $user['User']['upload']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Full Name'); ?></dt>
				<dd>
					<?php echo h($user['User']['first_name'] . " " . $user['User']['last_name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Code'); ?></dt>
				<dd>
					<?php echo h($user['User']['code']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Role'); ?></dt>
				<dd>
					<?php echo $this->Html->link($user['UserRole']['title'], array('controller' => 'user_roles', 'action' => 'view', $user['UserRole']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Class(Member Type)'); ?></dt>
				<dd>
					<?php echo $this->Html->link($user['MemberType']['title'], array('controller' => 'member_types', 'action' => 'view', $user['MemberType']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Username'); ?></dt>
				<dd>
					<?php echo h($user['User']['username']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Email'); ?></dt>
				<dd>
					<?php echo h($user['User']['email']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Mobile'); ?></dt>
				<dd>
					<?php echo h($user['User']['mobile']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Date of Birth'); ?></dt>
				<dd>
					<?php echo h($user['User']['date_of_birth']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Father Name'); ?></dt>
				<dd>
					<?php echo h($user['User']['father_name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Mother Name'); ?></dt>
				<dd>
					<?php echo h($user['User']['mother_name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Present Address'); ?></dt>
				<dd>
					<?php echo h($user['User']['present_address']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Parmanent Address'); ?></dt>
				<dd>
					<?php echo h($user['User']['parmanent_address']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Joining Date'); ?></dt>
				<dd>
					<?php echo h($user['User']['joining_date']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remarks'); ?></dt>
				<dd>
					<?php echo h($user['User']['remarks']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($user['User']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Last Visit'); ?></dt>
				<dd>
					<?php echo CakeTime::format('M d, Y @ H:i a', $user['User']['last_visit']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo CakeTime::format('M d, Y @ H:i a', $user['User']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo CakeTime::format('M d, Y @ H:i a', $user['User']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>	
