<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.edit')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'edit', $organization['Organization']['id']),
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
		<div class="organizations view well">
			<dl class="dl-horizontal">
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Title'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['title']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Organization Type'); ?></dt>
				<dd>
					<?php echo $this->Html->link($organization['OrganizationType']['title'], array('controller' => 'OrganizationTypes', 'action' => 'view', $organization['OrganizationType']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Organization Group'); ?></dt>
				<dd>
					<?php echo $this->Html->link($organization['OrganizationGroup']['name'], array('controller' => 'OrganizationGroups', 'action' => 'view', $organization['OrganizationGroup']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Address'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['address']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Address Optional'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['address_optional']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Contact Person'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['contact_person']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Phone'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['phone']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Mobile'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['mobile']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Email'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['email']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Bsti License No'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['bsti_license_no']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Logo'); ?></dt>
				<dd>
					<?php 
						echo $this->Html->image(
							Configure::read('Path.logo').'/thumb/'.$organization['Organization']['logo'], 
							array(
								'alt'=>Configure::read('Setting.siteName'),
								'url' => array('controller' => 'Dashboards', 'action' => 'index'),
								'class' => array('class' => 'brand brand-logo')
							)); 
					?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remarks'); ?></dt>
				<dd>
					<?php echo h($organization['Organization']['remarks']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($organization['Organization']['status'])); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Created'); ?></dt>
				<dd>
					<?php echo CakeTime::format('M d, Y @ H:i a', $organization['Organization']['created']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Modified'); ?></dt>
				<dd>
					<?php echo CakeTime::format('M d, Y @ H:i a', $organization['Organization']['modified']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>	