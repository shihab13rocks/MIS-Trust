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
						array('action' => 'edit', $userRole['UserRole']['id']),
						array('icon'=>'fa fa-pencil-square-o')); 
				?>
			<?php endif; ?>	
		</h4>
	    </div>
	    <div class="portlet-widgets">
		<a data-toggle="collapse" data-parent="#accordion" href="#userRoleTable"><i class="fa fa-chevron-down"></i></a>
	    </div>
	    <div class="clearfix"></div>
	</div>
	<div id="userRoleTable" class="panel-collapse collapse in">
			<div class="portlet-body" style="height: 2000px;">
				<fieldset class="col-sm-8">
					<dl class="dl-horizontal">
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($userRole['UserRole']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Title'); ?></dt>
						<dd>
							<?php echo h($userRole['UserRole']['title']); ?>
							&nbsp;
						</dd>
						<?php if(AuthComponent::user('user_role_id')==1): ?> 
						<dt><?php echo __('Organization Type'); ?></dt>
						<dd>
							<?php echo $this->Html->link($userRole['OrganizationType']['title'], array('controller' => 'organization_types', 'action' => 'view', $userRole['OrganizationType']['id'])); ?>
							&nbsp;
						</dd>
						<?php endif; ?>
						<dt><?php echo __('User Type'); ?></dt>
						<dd>
							<?php echo h($userRole['UserType']['title']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Status'); ?></dt>
						<dd>
							<?php echo $this->Generic->viewStatus(h($userRole['UserRole']['status'])); ?>
							&nbsp;
						</dd>
					</dl>
				</fieldset>
				<fieldset class="col-sm-4">
					<?php $this->Generic->loadRights($userRole['UserRole']['rights'],$view=1);  ?>
				</fieldset>
			</div>
	</div>

</div>
