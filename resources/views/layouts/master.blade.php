<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
      @yield('title')
    </title>
    
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="/theme/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="/theme/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="/landtheme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/theme/dist/css/skins/skin-black.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="skin-black">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo"><b>QUICKLEAVE</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(Auth::user()->gender == 'M')
                     <img src="/theme/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                  @else
                    <img src="/theme/dist/img/avatar2.png" class="user-image" alt="User Image"/>
                  @endif
                  <span class="hidden-xs">{!! Auth::user()->username !!}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if(Auth::user()->gender == 'M')
                      <img src="/theme/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                    @else
                      <img src="/theme/dist/img/avatar2.png" class="user-image" alt="User Image"/>
                    @endif
                    <p>
                      {!! Auth::user()->firstname !!} {!! Auth::user()->lastname !!}
                      <small>{!! Auth::user()->role !!} of {!! Auth::user()->team->team_name!!}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/user/profile/{$username}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              @if(Auth::user()->gender == 'M')
                <img src="/theme/dist/img/avatar5.png" class="user-image" alt="User Image"/>
              @else
                <img src="/theme/dist/img/avatar2.png" class="user-image" alt="User Image"/>
              @endif
            </div>
            <div class="pull-left info">
              <p>Hi, {!! Auth::user()->username !!}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          
@if((Auth::user()->role) == 'admin') <!--admin-->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="/admin">
                <i class="fa fa-home"></i> <span>Admin Board</span>
              </a>
            </li>
            <li><a href="/teams/create"><i class="fa fa-users"></i> Create team</a></li>
            <li><a href="/teams"><i class="fa fa-sitemap"></i> Teams</a></li>
            <li>
                    <a href="/admin/showemployees">
                    <i class="fa fa-pencil-square"></i>
                    <span>Employees</span>
                    </a>
            </li>     
            <li><a href="/approved"><i class="fa fa-check-square"></i> All approved requests</a></li>     
            
          </ul>
          @endif <!--admin-->



          @if((Auth::user()->role) <> 'admin') <!--member-->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              @if((Auth::user()->role) == 'member') <!--member-->
              <a href="/user">
                <i class="fa fa-home"></i> <span>User Board</span>
              </a>
               @elseif((Auth::user()->role) == 'manager') <!--manager-->
               <a href="/manager">
                <i class="fa fa-home"></i> <span>Manager Board</span>
              </a>
              @endif
            </li>


            <li>
              <a href="/leaves/create">
                <i class="fa fa-pencil-square"></i> <span>Request a Leave</span>
              </a>
            </li>

            <li>
              <a href="/leaves">
                <i class="fa fa-bars"></i> <span>All Leave Requests</span>
              </a>
            </li> 

            <li>
              <a href="/leaves/pending">
                <i class="fa fa-file-text-o"></i> <span>Edit Pending Requests</span>
              </a>
            </li><!--member-->

            @if((Auth::user()->role) == 'manager') <!--manager-->

            <li class="header">YOUR TEAM</li>
            <li>
            <li><a href="{{ URL::to('manager/' . $managerview . '/members') }}"><i class="fa fa-users"></i>Your Team Members</a></li>

            <li>
              <a href="{{ URL::to('leaves/' . $teamview . '/memberspending') }}">
                <i class="fa fa-question-circle"></i> <span>For Your Approval</span>
              </a>
            </li>
            <li>
              <a href="/leaves/history">
                <i class="fa fa-check-square-o"></i> <span>Approved/Rejected Requests</span>
              </a>
            </li>
          @endif


          </ul>
          @endif


        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('pagetitle')
          </h1>
          <ol class="breadcrumb">
            @yield('breadcrumbs')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Asia Pacific College</b>
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="/">Quickleave.com</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

 <!-- jQuery 2.1.3 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/theme/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="/theme/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="/theme/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='/theme/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="/theme/dist/js/app.min.js" type="text/javascript"></script>
    <script src="/theme/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/theme/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <script src="/theme/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="/theme/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="/theme/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="/theme/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="/theme/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="/theme/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    
    <script>
        $('#from_dt').datepicker(
            {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                todayHighlight: true,
                daysOfWeekDisabled: "0,6",
                autoclose: true,
            });
        $('#to_dt').datepicker(
            {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                todayHighlight: true,
                daysOfWeekDisabled: "0,6",
                autoclose: true,
            });
        $('#date_hired').datepicker(
            {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                todayHighlight: true,
                daysOfWeekDisabled: "0",
                autoclose: true,
            });
    </script> 

    <script type="text/javascript">
            $(function() {
                $("#table").dataTable();
            });
    </script>

    <script type="text/javascript">
      $(".sidebar-menu a").on("click", function(){
      $(".sidebar-menu").find(".active").removeClass("active");
      $(this).parent().addClass("active");
      });
    </script>

  </body>
</html>