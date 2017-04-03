<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.edit')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'edit', $organizationType['OrganizationType']['id']),
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
		<div class="organizationTypes view well">
			<dl class="dl-horizontal">
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($organizationType['OrganizationType']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Title'); ?></dt>
				<dd>
					<?php echo h($organizationType['OrganizationType']['title']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Remarks'); ?></dt>
				<dd>
					<?php echo h($organizationType['OrganizationType']['remarks']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $this->Generic->viewStatus(h($organizationType['OrganizationType']['status'])); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>	