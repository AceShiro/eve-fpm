<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
                
                <li class="{{ Request::is('main') ? "active" : "" }}">
                    <a href="/main"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <h5 style="margin-left: 35px;">FEATURES</h5>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Shop<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ Request::is('ships') ? "active" : "" }}">
                            <a href="/ships">Hull Only</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-tasks fa-fw"></i> Utilities - Corp Only<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="{{ Request::is('minerals') ? "active" : "" }}">
                            <a href="/minerals">Minerals Buyback</a>
                        </li>
                        <li class="{{ Request::is('ice') ? "active" : "" }}">
                            <a href="/salvage">Ice Buyback</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="/backend"><i class="fa fa-wrench fa-fw"></i> Back-End</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->




</nav>