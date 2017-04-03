<div class="box box-no-margin organizations index">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.add')):?>
				<?php echo $this->Html->linkIcon(
						'', 
						array('action' => 'add'),
						array('class'=>'btn btn-primary', 'icon'=>'icon-plus')); 
				?>
				<?php endif; ?>
				<a href="#data" data-toggle="collapse" class="accordion-toggle minimize-box btn btn-primary">
					<i class="icon-chevron-up"></i>
				</a>
			</div>
		</div>
	</header>
	<div id="data" class="body collapse in">
		
		<table class="dataListTable table table-bordered table-condensed table-hover table-striped">
			<thead>
				<tr>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Organization Type'); ?></th>
					<th><?php echo __('Organization Group'); ?></th>
					<th><?php echo __('Address'); ?></th>
					<th><?php echo __('Contact Person'); ?></th>
					<th><?php echo __('Phone'); ?></th>
					<th><?php echo __('Mobile'); ?></th>
					<th><?php echo __('Email'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($organizations as $organization): ?>
					<tr>
						<td><?php echo h($organization['Organization']['title']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($organization['OrganizationType']['title'], array('controller' => 'organization_types', 'action' => 'view', $organization['OrganizationType']['id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($organization['OrganizationGroup']['name'], array('controller' => 'organization_groups', 'action' => 'view', $organization['OrganizationGroup']['id'])); ?>
						</td>
						<td><?php echo h($organization['Organization']['address']); ?>&nbsp;</td>
						<td><?php echo h($organization['Organization']['contact_person']); ?>&nbsp;</td>
						<td><?php echo h($organization['Organization']['phone']); ?>&nbsp;</td>
						<td><?php echo h($organization['Organization']['mobile']); ?>&nbsp;</td>
						<td><?php echo h($organization['Organization']['email']); ?>&nbsp;</td>
						<td class="actions">
							<div class="btn-group">
								<?php if(Configure::read('Action.view')):?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'view', $organization['Organization']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-eye-open')); 
									?>
								<?php endif; ?>
								<?php if(Configure::read('Action.edit')):?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'edit', $organization['Organization']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-edit')); 
									?>
								<?php endif; ?>

								<?php if(  !Configure::read('Action.edit') && 
											Configure::read('Action.profile') && 
											(AuthComponent::user('organization_id')==$organization['Organization']['id'])
											
										): ?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'profile', $organization['Organization']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-edit')); 
									?>
								<?php endif; ?>									
								
								
								<?php if(Configure::read('Action.delete')): ?>
									<?php echo $this->Form->postLink(
										'', 
										array('action' => 'delete', $organization['Organization']['id']), 
										array('class'=>'btn btn-danger delete','icon'=>'icon-remove'),
										__('Are you sure you want to delete "%s"?', $organization['Organization']['title']));								
									?>
								<?php endif; ?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		
		
	</div>
</div>