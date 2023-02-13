<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MASTER</li>
        <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="{{ route('profile.edit') }}"><i class="fa fa-cogs"></i> <span>Update Profile Information</span></a></li>
        <li><a href="{{ route('settings.index') }}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>
