<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Alexander Pierce</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="treeview @if(Request::segment(2) == "users") active @endif">
        <a href="{{URL::route('admin.users.index')}}"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{URL::route('admin.users.index')}}"><i class="fa fa-circle-o"></i> List users</a></li>
            <li><a href="{{URL::route('admin.users.create')}}"><i class="fa fa-user"></i> Create a user</a></li>
        </ul>
    </li>
    <li class="treeview @if(Request::segment(2) == "categories") active @endif">
        <a href="{{URL::route('admin.users.index')}}"><i class="fa fa-tags"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{URL::route('admin.categories.index')}}"><i class="fa fa-circle-o text-red"></i> List categories</a></li>
            <li><a href="{{URL::route('admin.categories.create')}}"><i class="fa fa-tag"></i> Create a category</a></li>
        </ul>
    </li>    
    <li class="hidden">
      <a href="#">
        <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">Hot</small>
      </a>
    </li>
    <li class="hidden">
      <a href="../mailbox/mailbox.html">
        <i class="fa fa-envelope"></i> <span>Mailbox</span>
        <small class="label pull-right bg-yellow">12</small>
      </a>
    </li>
    <li class="treeview hidden">
      <a href="#">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu hidden">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
          <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
      </ul>
    </li>
    <li class="header hidden">LABELS</li>
    <li class="hidden"><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li class="hidden"><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li class="hidden"><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>