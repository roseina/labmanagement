 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">

                <!-- /input-group -->
            </li>
            <li>
                <a href="{{url('/admin/home')}}" class="active"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
            </li>

            <li>
                <a href="{{url('admin/organizations')}}"><i class="fa fa-bank fa-2x"></i> Organizations</a>
            </li>

            <li class="">
                <a href="#">
                    <i class="fa fa-users fa-2x">

                    </i> Users profile
                    <span class="fa arrow">

                    </span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>

                        <a href="{{url('admin/admin')}}"> <i class=" fa fa-user-secret"> </i> Admin</a>
                    </li>
                    <li>
                        <a href="{{url('admin/staffs')}}"> <i class=" fa fa-male"> </i>Staff </a>
                    </li>
                    <li>
                        <a href="{{url('admin/users')}}"> <i class=" fa fa-user"> Users </i></a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
        </div>
    </div>
