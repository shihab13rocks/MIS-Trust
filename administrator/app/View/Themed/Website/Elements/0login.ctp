<?php
if (!$this->Session->read('Auth.User.id')): ?>	
	<?php
		echo $this->Form->create ('User', 
			array ( 
				'id' => 'navLogin',
				'url' => array ( 
					'controller' => 'Users', 
					'action' => 'validateLogin'),
				)); 
	?> 
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-user"></i> Admin Panel</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Admin</strong>
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                        <input  type="text" required="required" id="UserUsername" class="form-control" placeholder="Username" name="data[User][username]">
                                </div>
                                <div class="form-group">
                                    <input type="password" required="required" id="UserPassword" class="form-control" placeholder="Password" name="data[User][password]">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-lg btn-green btn-block">Sign in</button>
                            </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
		echo $this->Form->end(); 
	?>
<?php else: ?>	
	<div class="btn-group pull-right">
		<?php 
			echo $this->Html->linkIcon(	'', 
					array('controller' => 'Dashboards', 'action' => 'index'),
					array('class'=>'btn btn-info', 'icon'=>'fa fa-th-large','title'=>'Dashboard')
				); 
		?>	

		<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
			<i class="icon-user"></i> <?php echo AuthComponent::user('username'); ?>
			<span class="caret"></span>
		</a>
		
		<ul class="dropdown-menu pull-right">
			<li>                                    
				<?php 
					echo $this->Html->linkIcon(
							__('My Profile'), 
							array('controller' => 'Users', 'action' => 'profile', AuthComponent::user('id')),
							array('icon'=>'fa fa-user')
						); 
				?>	
				
			</li>
			<li class="divider"></li>
			<li>
				<?php 
					echo $this->Html->linkIcon(
							__('Logout'), 
							array('controller' => 'Users', 'action' => 'logout'),
							array('icon'=>'fa fa-sign-out')
						); 
				?>			
			</li>
		</ul>			
	</div>
<?php endif; ?>	
