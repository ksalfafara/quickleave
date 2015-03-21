<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
    @if((Auth::user()->role) === 'admin')
      Admin Dashboard
    @endif

    @if((Auth::user()->role) === 'manager')
      Manager Dashboard
    @endif

    @if((Auth::user()->role) === 'member')
      User Dashboard
    @endif
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="/theme/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


    <link href="/theme/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="/landtheme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @if((Auth::user()->role) === 'admin')
    <link href="/theme/dist/css/skins/skin-red.css" rel="stylesheet" type="text/css" />
    @endif

    @if((Auth::user()->role) === 'manager')
    <link href="/theme/dist/css/skins/skin-blue.css" rel="stylesheet" type="text/css" />
    @endif

    @if((Auth::user()->role) === 'member')
    <link href="/theme/dist/css/skins/skin-green.css" rel="stylesheet" type="text/css" />
    @endif


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  @if((Auth::user()->role) === 'admin')
  <body class="skin-red">
  @endif

  @if((Auth::user()->role) === 'manager')
  <body class="skin-blue">
  @endif

  @if((Auth::user()->role) === 'member')
  <body class="skin-green">
  @endif


    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="#" class="logo"><b>Quick</b>Leave</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/img/blossom.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{!! Auth::user()->username !!}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/img/blossom.png" class="img-circle" alt="User Image" />
                    <p>
                      {!! Auth::user()->username !!}
                      <small>{!! Auth::user()->role !!} of {!! Auth::user()->team->team_name!!}</small>
                    </p>
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

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/img/blossom.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Hi, {!! Auth::user()->username !!}</p>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>

          @if((Auth::user()->role) === 'admin') <!--admin-->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="/admin">
                <i class="fa fa-home"></i> <span>Admin Board</span>
              </a>
            </li>
            <li><a href="/teams/create"><i class="fa fa-user-plus"></i> Create team</a></li>
            <li><a href="/teams"><i class="fa fa-sitemap"></i> View all teams</a></li>
            <li>
                    <a href="/balances">
                    <i class="fa fa-pencil-square"></i>
                    <span>Leave Balances</span>
                    </a>
            </li>          
            
          </ul>
          @endif <!--admin-->



          @if((Auth::user()->role) <> 'admin') <!--member-->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="/user">
                <i class="fa fa-home"></i> <span>User Board</span>
              </a>
            </li>

            <li>
              <a href="/leaves/create">
                <i class="fa fa-pencil-square"></i> <span>Request a Leave</span>
              </a>
            </li>

            <li>
              <a href="/leaves">
                <i class="fa fa-file-text-o"></i> <span>Pending request</span>
              </a>
            </li>

            <li>
              <a href="/leaves/allrequest">
                <i class="fa fa-bars"></i> <span>Requests</span>
              </a>
            </li>

            @if((Auth::user()->role) === 'manager') <!--manager-->

            <li class="header">YOUR TEAM</li>
            <li>
            <li><a href="/manager/members"><i class="fa fa-users"></i> View all employees</a></li>

            <li>
              <a href="/pending">
                <i class="fa fa-check-square-o"></i> <span>For Your Approval</span>
              </a>
            </li>
            <li>
              <a href="/teamrequest">
                <i class="fa fa-check-square-o"></i> <span>Approved/Rejected Requests</span>
              </a>
            </li>
          @endif


          </ul>
          @endif


        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('pagetitle')
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          @if((Auth::user()->role) === 'admin')
            <div class="box box-danger">
          @endif

          @if((Auth::user()->role) === 'manager')
            <div class="box box-primary">
          @endif

          @if((Auth::user()->role) === 'member')
            <div class="box box-success">
          @endif

            <div class="box-header with-border">
              <h3 class="box-title">@yield('boxname')</h3>
              <div class="box-tools pull right">
                @yield('right')
              </div>
            </div>
            <div class="box-body table-responsive">
              @yield('content')
            </div><!-- /.box-body -->
          </div><!-- /.box -->

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
                format: "yyyy/mm/dd",
                todayBtn: "linked",
                todayHighlight: true,
                daysOfWeekDisabled: "0",
                autoclose: true,
            });
        $('#to_dt').datepicker(
            {
                format: "yyyy/mm/dd",
                todayBtn: "linked",
                todayHighlight: true,
                daysOfWeekDisabled: "0",
                autoclose: true,
            });
    </script> 

    <script type="text/javascript">
            $(function() {
                $("#members").dataTable();
                $("#teams").dataTable();
                $("#balances").dataTable();
                $("#allrequest").dataTable();
                $("#teamrequest").dataTable();
                $("#pending").dataTable();
            });
    </script>

  </body>
</html>