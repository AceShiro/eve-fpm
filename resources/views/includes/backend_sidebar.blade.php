<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
                
                <li class="{{ Request::is('backend') ? "active" : "" }}">
                    <a href="/backend"><i class="fa fa-dashboard fa-fw"></i> Back-End Dashboard</a>
                </li>
                <li>
                    <h5 style="margin-left: 35px;">FEATURES</h5>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> Production Panel<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="">
                            <a href="/prices">Price Lists</a>
                        </li>
                        <li class="">
                            <a href="/stocks">Items Stock</a>
                        </li>
                        <li class="">
                            <a href="/minerals_stocks">Minerals Stock</a>
                        </li>
                        <li class="">
                            <a href="/blueprints">Blueprints</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-gears fa-fw"></i> Admin Panel<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="">
                            <a href="/producers/create">Rights Granting</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="/main"><i class="fa fa-undo fa-fw"></i> Front-End</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->


</nav>