<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <p class="text-aqua" style="font-size: 2rem;margin:0 10px 0 0;">{{ Auth::user()->name }}</p>
            </div>
            <div class="pull-left">
                <a href="#" style="line-height: 30px;margin-left: 15px;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{ url('/dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>           
            <li><a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-cog text-aqua"></i>Settings</a></li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-map text-red"></i>
                    <span>Studies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-study-area') }}"><i class="fa fa-circle-o text-aqua"></i>Study Areas</a></li>
                    <li><a class="nav-link" href="{{ route('create-study-area') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Study Area</a></li>
                    <li><hr></li>
                    <li><a class="nav-link" href="{{ route('all-study') }}"><i class="fa fa-circle-o text-aqua"></i>All Studies</a></li>
                    <li><a class="nav-link" href="{{ route('create-study') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Study</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-picture-o text-red"></i>
                    <span>Photo Gallery</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('allPhotos') }}"><i class="fa fa-circle-o text-aqua"></i>All Photos</a></li>
                    <li><a class="nav-link" href="{{ route('createPhoto') }}"><i class="fa fa-circle-o text-aqua"></i>Add Gallery Photo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-book text-aqua"></i>
                    <span>Publication</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-publications') }}"><i class="fa fa-circle-o text-aqua"></i>All Publications</a></li>
                    <li><a class="nav-link" href="{{ route('create-publication') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Publication</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-sitemap text-aqua"></i>
                    <span>Presentations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-presentations') }}"><i class="fa fa-circle-o text-aqua"></i>All Presentations </a></li>
                    <li><a class="nav-link" href="{{ route('create-presentation') }}"><i class="fa fa-circle-o text-aqua"></i>Create New </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-rss-square text-aqua"></i>
                    <span>Research</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-research') }}"><i class="fa fa-circle-o text-aqua"></i>All Research</a></li>
                    <li><a class="nav-link" href="{{ route('createResearch') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Research</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-calendar text-yellow"></i>
                    <span>Events</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-events') }}"><i class="fa fa-circle-o text-aqua"></i>All Events</a></li>
                    <li><a class="nav-link" href="{{ route('createEvent') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Event </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-users text-yellow"></i>
                    <span>Members</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-members') }}"><i class="fa fa-circle-o text-aqua"></i>All Members </a></li>
                    <li><a class="nav-link" href="{{ route('create-member') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Member </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-users text-aqua"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-posts') }}"><i class="fa fa-circle-o text-aqua"></i>All Posts </a></li>
                    <li><a class="nav-link" href="{{ route('create-post') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Post</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);">
                    <i class="fa fa-tasks text-yellow"></i>
                    <span>Partners</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="nav-link" href="{{ route('all-partners') }}"><i class="fa fa-circle-o text-aqua"></i>All Partners</a></li>
                    <li><a class="nav-link" href="{{ route('create-post') }}"><i class="fa fa-circle-o text-aqua"></i>Create New Partner</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-circle-o text-aqua"></i>Create New User </a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>