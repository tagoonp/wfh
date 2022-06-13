<div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                <li class=" nav-item  <?php if($page == 'home'){ echo "active"; }?>"><a href="./"><i class="menu-livicon" data-icon="home"></i><span class="menu-title text-truncate" data-i18n="First page">Home</span></a></li>

                
                <li class=" navigation-header text-truncate"><span data-i18n="Apps">Your account</span></li>
                <li class=" nav-item <?php if($page == 'page-user-profile'){ echo "active"; }?>"><a href="page-user-profile"><i class="menu-livicon" data-icon="user"></i><span class="menu-title text-truncate" data-i18n="User Profile">User Profile</span></a></li>

                <li class=" nav-item <?php if($page == 'app-your-wp-list'){ echo "active"; }?>"><a href="app-your-wp-list"><i class="menu-livicon" data-icon="pencil"></i><span class="menu-title text-truncate" data-i18n="Calendar">Your work plan</span></a>
                

                
                <?php 
                if(($role == 'admin') || ($role == 'staff')){
                    ?>
                    <li class=" navigation-header text-truncate"><span data-i18n="Apps">Management</span></li>
                    <li class=" nav-item <?php if($page == 'app-api'){ echo "active"; }?>"><a href="app-api"><i class="menu-livicon" data-icon="clock"></i><span class="menu-title text-truncate" data-i18n="Calendar">Wait for approval</span></a>
                    <li class=" nav-item <?php if($page == 'app-api'){ echo "active"; }?>"><a href="app-api"><i class="menu-livicon" data-icon="check-alt"></i><span class="menu-title text-truncate" data-i18n="Calendar">Wait for work result check</span></a>
                    <li class=" nav-item <?php if($page == 'app-api'){ echo "active"; }?>"><a href="app-api"><i class="menu-livicon" data-icon="list"></i><span class="menu-title text-truncate" data-i18n="list">All work plan</span></a>
                    <li class=" nav-item <?php if($page == 'app-api'){ echo "active"; }?>"><a href="app-report"><i class="menu-livicon" data-icon="line-chart"></i><span class="menu-title text-truncate" data-i18n="line-chart">Report</span></a>
                    <li class=" nav-item <?php if($page == 'app-user'){ echo "active"; }?>"><a href="app-user"><i class="menu-livicon" data-icon="user"></i><span class="menu-title text-truncate" data-i18n="line-chart">Users</span></a>
                    <?php
                }
                ?>




                
                <li class=" navigation-header text-truncate"><span data-i18n="Support">Support</span>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/documentation" target="_blank"><i class="menu-livicon" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Documentation">Documentation</span></a>
                </li>
            </ul>
        </div>