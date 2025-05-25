 
 <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         
    </ul> 

   
  </nav>-->
  <!-- /.navbar -->
   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <a href="index3.html" class="brand-link" style="text-align: center;">
      <span class="brand-text font-weight-light" style="font-weight: bold ; font-size:20px;">Shule-Quality</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{asset("dist/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <!-- <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard </p>
                </a>
              </li>-->
               @if(Auth::user()->user_type ==1)
               <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard 
                  </p>
                </a>
              </li> 

             <li class="nav-item">
                <a href="{{url('admin/admin/list')}}" class="nav-link  @if(Request::segment(2)=='admin') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>admin </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/student/list')}}" class="nav-link  @if(Request::segment(2)=='student') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Student </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('admin/class/list')}}" class="nav-link  @if(Request::segment(2)=='class') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Class </p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{url('admin/subject/list')}}" class="nav-link  @if(Request::segment(2)=='subject') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Subject </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/assign_subject/list')}}" class="nav-link  @if(Request::segment(2)=='assign_subject') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Assign-Subject </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/change-password')}}" class="nav-link  @if(Request::segment(2)=='change-password') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Change-Password </p>
                </a>
              </li>

             @elseif(Auth::user()->user_type ==2)
                <li class="nav-item">
                <a href="{{url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Teacher</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('teacher/change-password')}}" class="nav-link  @if(Request::segment(2)=='change-password') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Change Password </p>
                </a>
              </li>

               @elseif(Auth::user()->user_type ==3)
                <li class="nav-item">
                <a href="{{url('student/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Student</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('student/change-password')}}" class="nav-link  @if(Request::segment(2)=='change-password') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Change Password </p>
                </a>
              </li>

               @elseif(Auth::user()->user_type ==4)
                 <li class="nav-item">
                <a href="{{url('parent/dashboard')}}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Parent </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('parent/change-password')}}" class="nav-link  @if(Request::segment(2)=='change-password') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Change Password </p>
                </a>
              </li>

               @endif
          
              
        

          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
