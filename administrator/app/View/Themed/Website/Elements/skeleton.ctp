<div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div id="temp-name" class="navbar-brand">
                    <a href="index.html">
                        <h3 style="margin-top: 0">Temp Base <small>ver 1.0</small></h3>
                        <!--<img src="img/flex-admin-logo.png" class="img-responsive" alt="">-->
                    </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                            <i class="fa fa-windows"></i>
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
                                <a href="profile.html">
                                    <i class="fa fa-user"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> My Messages
                                    <span class="badge green pull-right">4</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-bell"></i> My Alerts
                                    <span class="badge orange pull-right">9</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-tasks"></i> My Tasks
                                    <span class="badge blue pull-right">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-gear"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong>John Smith</strong>
                                </a>
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
                    <!-- begin SIDE NAV SEARCH -->
                    <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
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
                    <!-- begin CHARTS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#charts">
                            <i class="fa fa-bar-chart-o"></i> Charts <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="charts">
                            <li>
                                <a href="flot.html">
                                    <i class="fa fa-angle-double-right"></i> Flot Charts
                                </a>
                            </li>
                            <li>
                                <a href="morris.html">
                                    <i class="fa fa-angle-double-right"></i> Morris.js
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end CHARTS DROPDOWN -->
                    <!-- begin FORMS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms">
                            <i class="fa fa-edit"></i> Forms <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="forms">
                            <li>
                                <a href="basic-form-elements.html">
                                    <i class="fa fa-angle-double-right"></i> Basic Elements
                                </a>
                            </li>
                            <li>
                                <a href="advanced-form-elements.html">
                                    <i class="fa fa-angle-double-right"></i> Advanced Elements
                                </a>
                            </li>
                            <li>
                                <a href="validation.html">
                                    <i class="fa fa-angle-double-right"></i> Validation
                                </a>
                            </li>
                            <li>
                                <a href="wysiwyg-editor.html">
                                    <i class="fa fa-angle-double-right"></i> WYSIWYG Editor
                                </a>
                            </li>
                            <li>
                                <a href="dropzone-uploader.html">
                                    <i class="fa fa-angle-double-right"></i> Dropzone Uploader
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end FORMS DROPDOWN -->
                    <!-- begin CALENDAR LINK -->
                    <li>
                        <a href="calendar.html">
                            <i class="fa fa-calendar"></i> Calendar
                        </a>
                    </li>
                    <!-- end CALENDAR LINK -->
                    <!-- begin TABLES DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#tables">
                            <i class="fa fa-table"></i> Tables <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="tables">
                            <li>
                                <a href="basic-tables.html">
                                    <i class="fa fa-angle-double-right"></i> Basic Tables
                                </a>
                            </li>
                            <li>
                                <a href="advanced-tables.html">
                                    <i class="fa fa-angle-double-right"></i> Advanced Tables
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end TABLES DROPDOWN -->
                    <!-- begin UI ELEMENTS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#ui-elements">
                            <i class="fa fa-wrench"></i> Settings <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="ui-elements">
                            <?php if(Configure::read('Controller.Users')&&Configure::read('Nav.Users.index')): ?>
                                <li>
                                        <?php 
                                                echo $this->Html->link(
                                                                __('<i class="fa fa-angle-double-right"></i>Users'), 
                                                                array('controller' => 'Users', 'action' => 'index'),
                                                                array('escape' => false)
                                                        ); 
                                        ?>				
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="buttons.html">
                                    <i class="fa fa-angle-double-right"></i> Buttons
                                </a>
                            </li>
                            <li>
                                <a href="tabs-accordions.html">
                                    <i class="fa fa-angle-double-right"></i> Tabs &amp; Accordions
                                </a>
                            </li>
                            <li>
                                <a href="notifications.html">
                                    <i class="fa fa-angle-double-right"></i> Popups &amp; Notifications
                                </a>
                            </li>
                            <li>
                                <a href="sliders.html">
                                    <i class="fa fa-angle-double-right"></i> Sliders
                                </a>
                            </li>
                            <li>
                                <a href="typography.html">
                                    <i class="fa fa-angle-double-right"></i> Typography
                                </a>
                            </li>
                            <li>
                                <a href="icons.html">
                                    <i class="fa fa-angle-double-right"></i> Icons
                                </a>
                            </li>
                            <li>
                                <a href="grid.html">
                                    <i class="fa fa-angle-double-right"></i> Grid
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end UI ELEMENTS DROPDOWN -->
                    <!-- begin MESSAGE CENTER DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#message-center">
                            <i class="fa fa-inbox"></i> Message Center <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="message-center">
                            <li>
                                <a href="mailbox.html">
                                    <i class="fa fa-angle-double-right"></i> Mailbox
                                </a>
                            </li>
                            <li>
                                <a href="compose-message.html">
                                    <i class="fa fa-angle-double-right"></i> Compose Message
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <i class="fa fa-angle-double-right"></i> Chat
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end MESSAGE CENTER DROPDOWN -->
                    <!-- begin PAGES DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#pages">
                            <i class="fa fa-files-o"></i> Pages <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav" id="pages">
                            <li>
                                <a href="profile.html">
                                    <i class="fa fa-angle-double-right"></i> User Profile
                                </a>
                            </li>
                            <li>
                                <a href="invoice.html">
                                    <i class="fa fa-angle-double-right"></i> Invoice
                                </a>
                            </li>
                            <li>
                                <a href="pricing.html">
                                    <i class="fa fa-angle-double-right"></i> Pricing Tables
                                </a>
                            </li>
                            <li>
                                <a href="faq.html">
                                    <i class="fa fa-angle-double-right"></i> FAQ Page
                                </a>
                            </li>
                            <li>
                                <a href="search-results.html">
                                    <i class="fa fa-angle-double-right"></i> Search Results
                                </a>
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="fa fa-angle-double-right"></i> Login Basic
                                </a>
                            </li>
                            <li>
                                <a href="login-social.html">
                                    <i class="fa fa-angle-double-right"></i> Login Social
                                </a>
                            </li>
                            <li>
                                <a href="404.html">
                                    <i class="fa fa-angle-double-right"></i> 404 Error
                                </a>
                            </li>
                            <li>
                                <a href="500.html">
                                    <i class="fa fa-angle-double-right"></i> 500 Error
                                </a>
                            </li>
                            <li>
                                <a href="blank.html">
                                    <i class="fa fa-angle-double-right"></i> Blank Page
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end PAGES DROPDOWN -->
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