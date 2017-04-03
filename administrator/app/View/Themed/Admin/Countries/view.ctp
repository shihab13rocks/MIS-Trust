<div class="box box-no-margin">
	<header>
		<div class="icons"><i class="icon-move"></i></div>
		<h5><?php echo Configure::read('currentAction'); ?></h5>
		
		<div class="toolbar">
			<div class="btn-group">
				<?php if(Configure::read('Action.edit')):?>
					<?php echo $this->Html->linkIcon(
							'', 
							array('action' => 'edit', $country['Country']['id']),
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
		<div class="countries view well">
			<dl class="dl-horizontal">
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($country['Country']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('ISO2'); ?></dt>
				<dd>
					<?php echo h($country['Country']['iso2']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Name'); ?></dt>
				<dd>
					<?php echo h($country['Country']['name']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('ISO3'); ?></dt>
				<dd>
					<?php echo h($country['Country']['iso3']); ?>
					&nbsp;
				</dd>
			</dl>
		</div>
	</div>

</div>