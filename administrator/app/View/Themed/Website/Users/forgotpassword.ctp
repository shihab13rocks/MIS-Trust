<div class="span4"></div>
	<div class="span4">
		<div class="tab-content">
			<div id="login" class="tab-pane">
				<?php echo $this->Form->create ('User', 
					array ( 
						'url' => array ( 
							'controller' => 'users', 
							'action' => 'validateLogin' ), 
						'class' => 'well form-signin', 
						'inputDefaults' => array ( 
							'label' => false, 
							'error' => false ) 
						 ) 
				);
				
				echo $this->Form->input('username',
					array('placeholder' => __('Username'),'class' => 'span12')); 		
				
				echo $this->Form->input('password',
					array('placeholder' => __('Password'),'type' => 'password','class' => 'span12'));
				?>

				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">
							<?php echo __('Sign in'); ?> 
						</button>
					</div>
				</div>		
				<?php	
					echo $this->Form->end();	
				?>		
			</div>
			<div id="forgot" class="tab-pane active">
				<?php echo $this->Form->create ('User', 
					array ( 
						'url' => array ( 
							'controller' => 'users', 
							'action' => 'forgotPassword'
						), 
						'class' => 'form-signin well', 
						'inputDefaults' => array ( 
							'label' => false, 
							'error' => false 
						) 
					) 
				);	
				
				echo $this->Form->input('email',
					array('placeholder' => __('mail@domain-name.com'),'class' => 'span12')); 		
				?>	
				
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-danger">
							<?php echo __('Recover Password'); ?>
						</button>
					</div>
				</div>		
				<?php	
					echo $this->Form->end();	
				?>	
			</div>
		</div>
		<div class="login-nav text-center">
			<ul class="inline">
				<li><a class="muted" href="#login" data-toggle="tab"><?php echo __('Login'); ?></a></li>
				<li><a class="muted active" href="#forgot" data-toggle="tab"><?php echo __('Forgot Password'); ?></a></li>
				<li><a class="muted" href="<?php echo $this->Html->url( '/', true ) ?>"><?php echo __('Home'); ?></a></li>
			</ul>
		</div>
		
	</div>
<div class="span4"></div>
	