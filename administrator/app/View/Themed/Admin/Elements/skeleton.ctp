<div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div id="temp-name" class="navbar-brand">
                    <li style="list-style-type: none;">
                        <?php 
                                echo $this->Html->linkIcon(
                                                Configure::read('Setting.siteName'), 
                                                array('controller' => 'Dashboards', 'action' => 'index'),
                                                array('style'=>'color:#fff; text-decoration:none;','icon'=>'fa fa-home')
                                        ); 
                        ?>
                    </li>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                            <i class="fa fa-th-large"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">

                    <!-- begin USER ACTIONS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
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
			    <?php if(Configure::read('Controller.Settings')&&Configure::read('Nav.Settings.index')): ?>
			    <li>
				    <?php 
					    echo $this->Html->link(
							    __('<i class="fa fa-gear"></i> Settings'), 
							    array('controller' => 'Settings', 'action' => 'index'),
							    array('escape' => false)
						    ); 
				    ?>				
			    </li>
			    <?php endif; ?>
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
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
		    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
			<div style="padding-left: 30px;">
			<?php
			if($this->Session->read('photo'))
			    echo $this->Html->image('uploads/users/thumbs/' . $this->Session->read('photo'), array('alt' => '', 'class' => 'img-square','style'=>'border:5px solid #16A085;border-radius:0px 10px;'));
			else
			    echo $this->Html->image('uploads/users/thumbs/admin.png', array('alt' => '', 'class' => 'img-square','style'=>'border:5px solid #16A085;border-radius:10px;'));
			?>
			</div>
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
			    <?php echo $this->Session->read('name'); ?>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    <!--<li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>-->
                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
                    <?php if(Configure::read('Controller.Dashboards')&&Configure::read('Nav.Dashboards.index')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-dashboard"></i>Dashboards'), 
                                                        array('controller' => 'Dashboards', 'action' => 'index'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end DASHBOARD LINK -->
                    <!-- begin Members DROPDOWN -->
                    <?php if((Configure::read('Controller.UserRoles')&&Configure::read('Nav.MemberTypes')&&Configure::read('Nav.Users')) || AuthComponent::user('user_role_id')==1): ?>
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#members">
                            <i class="fa fa-male"></i> Members <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="members">
			    <?php if(Configure::read('Controller.UserRoles')&&Configure::read('Nav.UserRoles.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Member Roles'), 
                                                                array('controller' => 'UserRoles', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
			    <?php if(Configure::read('Controller.MemberTypes')&&Configure::read('Nav.MemberTypes.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Member Types'), 
                                                                array('controller' => 'MemberTypes', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
                            <?php if(Configure::read('Controller.Users')&&Configure::read('Nav.Users.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Member Management'), 
                                                                array('controller' => 'Users', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- end Members DROPDOWN -->
		    <!-- begin MESSAGES LINK -->
                    <?php if(Configure::read('Controller.Messages')&&Configure::read('Nav.Messages.index')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-envelope"></i>Messages/Notice'), 
                                                        array('controller' => 'Messages', 'action' => 'index'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end MESSAGES LINK -->
		    <!-- begin Purposes LINK -->
                    <?php if(Configure::read('Controller.Purposes')&&Configure::read('Nav.Purposes.index')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-tags"></i>Purposes/Events'), 
                                                        array('controller' => 'Purposes', 'action' => 'index'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end Purposes LINK -->
		    <!-- begin Payments LINK -->
                    <?php if(Configure::read('Controller.Payments')&&Configure::read('Nav.Payments.index')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-money"></i>Payments'), 
                                                        array('controller' => 'Payments', 'action' => 'index'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end Payments LINK -->
		    <!-- begin Books LINK -->
                    <?php if(Configure::read('Controller.Books')&&Configure::read('Nav.Books.index')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-book"></i>Books'), 
                                                        array('controller' => 'Books', 'action' => 'index'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end Books LINK -->
		    <!-- begin Incomes DROPDOWN -->
		    <?php if(Configure::read('Controller.IncomeTypes') || Configure::read('Controller.Incomes')): ?>
		    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#incomes">
                            <i class="fa fa-indent"></i>Incomes <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="incomes">
                            <?php if(Configure::read('Controller.IncomeTypes')&&Configure::read('Nav.IncomeTypes.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Income Types'), 
                                                                array('controller' => 'IncomeTypes', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
			    <?php if(Configure::read('Controller.Incomes')&&Configure::read('Nav.Incomes.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Income Management'), 
                                                                array('controller' => 'Incomes', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
                        </ul>
                    </li>
		    <?php endif; ?>
                    <!-- end Incomes DROPDOWN -->
		    <!-- begin Expenses DROPDOWN -->
		    <?php if(Configure::read('Controller.ExpenseTypes') || Configure::read('Controller.Expenses')): ?>
		    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#expenses">
                            <i class="fa fa-outdent"></i>Expenses <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="expenses">
                            <?php if(Configure::read('Controller.ExpenseTypes')&&Configure::read('Nav.ExpenseTypes.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Expense Types'), 
                                                                array('controller' => 'ExpenseTypes', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
			    <?php if(Configure::read('Controller.Expenses')&&Configure::read('Nav.Expenses.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Expense Management'), 
                                                                array('controller' => 'Expenses', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
                        </ul>
                    </li>
		    <?php endif; ?>
                    <!-- end Expenses DROPDOWN -->
                    <!-- begin Transactions LINK -->
                    <?php if(Configure::read('Controller.Histories')&&Configure::read('Nav.Histories.transaction')): ?>
                        <li>
                                <?php 
                                        echo $this->Html->link(
                                                        __('<i class="fa fa-list-alt"></i>Transactions'), 
                                                        array('controller' => 'Histories', 'action' => 'transaction'),
                                                        array('escape' => false)
                                                ); 
                                ?>				
                        </li>
                    <?php endif; ?>
                    <!-- end Transactions LINK -->
		    <!-- begin Reports DROPDOWN -->
		    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.balanceReport')): ?>
		    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#reports">
                            <i class="fa fa-file-text"></i> Reports <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="reports">
                            <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.balanceReport')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Balance Summary'), 
                                                                array('controller' => 'Reports', 'action' => 'balanceReport'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
			    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.incomeReport')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Income Report'), 
                                                                array('controller' => 'Reports', 'action' => 'incomeReport'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
			    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.expenseReport')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Expense Report'), 
                                                                array('controller' => 'Reports', 'action' => 'expenseReport'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
			    <?php if(Configure::read('Controller.Reports')&&Configure::read('Nav.Reports.particularReport')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Balance by Particular Items'), 
                                                                array('controller' => 'Reports', 'action' => 'particularReport'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
			    <?php endif; ?>
                        </ul>
                    </li>
		    <?php endif; ?>
                    <!-- end Reports DROPDOWN -->
                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">
	    <div class="page-content page-content-ease-in">

                <!-- begin PAGE TITLE AREA -->
                <!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
                <div class="row">
                    <div class="col-lg-12">
                        <div><?php echo $content_for_layout; ?></div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- end PAGE TITLE AREA -->
            </div>
            <!-- end Page Content -->
        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

</div>
<!-- /#wrapper -->