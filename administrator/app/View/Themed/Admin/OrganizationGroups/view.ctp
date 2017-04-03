<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.edit')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'edit', $organizationGroup['OrganizationGroup']['id']),
							array('class'=>'btn btn-primary', 'icon'=>'icon-edit')); 
					?>
				<?php endif; ?>
				<?php if(Configure::read('Action.index')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'index'),
							array('class'=>'btn btn-primary', 'icon'=>'icon-list')); 
					?>
				<?php endif; ?>
				<a href="#data" data-toggle="collapse" class="accordion-toggle minimize-box btn btn-primary">
					<i class="icon-chevron-up"></i>
				</a>
			</div>
		</div>
	</header>
	<div id="data" class="body collapse in">
		<div class="organizationGroups view well">
			<dl class="dl-horizontal">
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($organizationGroup['OrganizationGroup']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Name'); ?></dt>
				<dd>
					<?php echo h($organizationGroup['OrganizationGroup']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remarks'); ?></dt>
				<dd>
					<?php echo h($organizationGroup['OrganizationGroup']['remarks']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($organizationGroup['OrganizationGroup']['status'])); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>	