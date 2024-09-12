<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="source/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      @role('admin')
      <li class="active treeview">
        <a href="{{route('students.index')}}">
          <i class="glyphicon glyphicon-user"></i> <span>{{__('Students')}}</span> <i></i>
        </a>
      </li>

      @endrole
      <li class="treeview">
        <a href="{{route('departments.index')}}">
          <i class="glyphicon glyphicon-list-alt"></i>
          <span>{{__('Departments')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('subjects.index')}}">
          <i class="glyphicon glyphicon-education"></i> <span>{{__('Subjects')}}</span>
          <small class="label pull-right bg-green">new</small>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>{{__('Scores')}}</span>
          <i class=""></i>
        </a>
      </li>
      <li>
        <a href="source/pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <small class="label pull-right bg-yellow">12</small>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>