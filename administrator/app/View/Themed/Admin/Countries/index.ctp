<div class="box box-no-margin countries index">
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
					<th><?php echo __('ISO2'); ?></th>
					<th><?php echo __('Name'); ?></th>
					<th><?php echo __('ISO3'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($countries as $country): ?>
					<tr>
						<td><?php echo h($country['Country']['iso2']); ?>&nbsp;</td>
						<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
						<td><?php echo h($country['Country']['iso3']); ?>&nbsp;</td>
						<td class="actions">
							<div class="btn-group">
								<?php if(Configure::read('Action.view')):?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'view', $country['Country']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-eye-open')); 
									?>
								<?php endif; ?>
								<?php if(Configure::read('Action.edit')):?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'edit', $country['Country']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-edit')); 
									?>
								<?php endif; ?>

								<?php if(  !Configure::read('Action.edit') && 
											Configure::read('Action.profile') && 
											(AuthComponent::user('organization_id')==$country['Country']['id'])
											
										): ?>
									<?php echo $this->Html->linkIcon(
										'', 
										array('action' => 'profile', $country['Country']['id']),
										array('class'=>'btn btn-warning','icon'=>'icon-edit')); 
									?>
								<?php endif; ?>									
								
								
								<?php if(Configure::read('Action.delete')): ?>
									<?php echo $this->Form->postLink(
										'', 
										array('action' => 'delete', $country['Country']['id']), 
										array('class'=>'btn btn-danger delete','icon'=>'icon-remove'),
										__('Are you sure you want to delete "%s"?', $country['Country']['name']));								
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