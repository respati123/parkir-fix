<!DOCTYPE html>



<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>AdminLTE 2 | Starter</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->

    <link rel="stylesheet" href="{{ asset('/bower_components/Ionicons/css/ionicons.min.css') }}">

    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('/dist/css/AdminLTE.min.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">

    <!-- Morris chart -->

    <link rel="stylesheet" href="{{ asset('/bower_components/morris.js/morris.css') }}">

    <!-- jvectormap -->

    <link rel="stylesheet" href="{{ asset('/bower_components/jvectormap/jquery-jvectormap.css') }}">

    <!-- Date Picker -->

    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Daterange picker -->

    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

    <!-- bootstrap wysihtml5 - text editor -->

    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css" media="screen" title="no title" charset="utf-8">



    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">





    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>



<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <header class="main-header">
        <a href="index2.html" class="logo">
            <span class="logo-mini"><b>MIKA</b></span>
            <span class="logo-lg"><b>MIKA</b>parking</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

                            <span class="hidden-xs">Alexander Pierce</span>

                        </a>

                        <ul class="dropdown-menu">

                            <li class="user-header">

                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">



                                <p>

                                    Alexander Pierce - Web Developer

                                    <small>Member since Nov. 2012</small>

                                </p>

                            </li>

                            <li class="user-body">

                                <div class="row">

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Followers</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Sales</a>

                                    </div>

                                    <div class="col-xs-4 text-center">

                                        <a href="#">Friends</a>

                                    </div>

                                </div>

                            </li>

                            <li class="user-footer">

                                <div class="pull-left">

                                    <a href="#" class="btn btn-default btn-flat">Profile</a>

                                </div>

                                <div class="pull-right">

                                    <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>

                                </div>

                            </li>

                        </ul>

                    </li>

                    <li>

                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

                    </li>

                </ul>

            </div>

        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">

                    <p>Alexander Pierce</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

                </div>

            </div>



            <form action="#" method="get" class="sidebar-form">

                <div class="input-group">

                    <input type="text" name="q" class="form-control" placeholder="Search...">

                    <span class="input-group-btn">

                          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                          </button>

                        </span>

                </div>

            </form>



            <ul class="sidebar-menu" data-widget="tree">

                <li class="header">HEADER</li>

                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i> <span>Customers</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="{{ route('listcustomer.index') }}">List Customers</a></li>

                        <li><a href="{{ route('loyalty.index') }}">Loyalty Customers</a></li>

                    </ul>

                </li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i> <span>Parking</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="{{ route('location.index') }}">Locations</a></li>

                        <li><a href="{{ route('category.index') }}">Categories</a></li>

                        <li><a href="{{ route('classes.index') }}">Classes</a></li>

                        <li><a href="{{ route('building.index') }}">Buildings</a></li>

                    </ul>

                </li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i><span>Vehicles</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="{{ route('vehicletypes.index') }}">Vehicle Types</a></li>

                        <li><a href="{{ route('vehiclebrands.index') }}">Vehicle Brands</a></li>

                    </ul>

                </li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i><span>Financial</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="#">Currencies</a></li>

                        <li><a href="#">Tax</a></li>

                        <li><a href="{{ route('tariff.index') }}">Tariff</a></li>

                    </ul>

                </li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i><span>User Accounts</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="#">Employees</a></li>

                        <li><a href="#">Time Shift</a></li>

                    </ul>

                </li>

                <li class="treeview">

                    <a href="#"><i class="fa fa-link"></i> <span>Users</span>

                        <span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>

                    </a>

                    <ul class="treeview-menu">

                        <li><a href="{{ route('users.index') }}">Users</a></li>

                        <li><a href="{{ route('roles.index') }}">Roles</a></li>

                        <li><a href="{{ route('permissions.index') }}">Permissions</a></li>

                        <li><a href="{{ route('menus.index') }}">Menus</a></li>

                    </ul>

                </li>

            </ul>

        </section>

    </aside>



    <div class="content-wrapper">

        <section class="content container-fluid" id="app">

            <router-view name="componentsIndex"></router-view>

            <router-view :key="$route.fullPath"></router-view>

        </section>

    </div>





    <aside class="control-sidebar control-sidebar-dark">

        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="control-sidebar-home-tab">

                <h3 class="control-sidebar-heading">Recent Activity</h3>

                <ul class="control-sidebar-menu">

                    <li>

                        <a href="javascript:;">

                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>



                            <div class="menu-info">

                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>



                                <p>Will be 23 on April 24th</p>

                            </div>

                        </a>

                    </li>

                </ul>



                <h3 class="control-sidebar-heading">Tasks Progress</h3>

                <ul class="control-sidebar-menu">

                    <li>

                        <a href="javascript:;">

                            <h4 class="control-sidebar-subheading">

                                Custom Template Design

                                <span class="pull-right-container">

                                    <span class="label label-danger pull-right">70%</span>

                                  </span>

                            </h4>



                            <div class="progress progress-xxs">

                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>

                            </div>

                        </a>

                    </li>

                </ul>



            </div>

            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

            <div class="tab-pane" id="control-sidebar-settings-tab">

                <form method="post">

                    <h3 class="control-sidebar-heading">General Settings</h3>



                    <div class="form-group">

                        <label class="control-sidebar-subheading">

                            Report panel usage

                            <input type="checkbox" class="pull-right" checked>

                        </label>



                        <p>

                            Some information about this general settings option

                        </p>

                    </div>

                </form>

            </div>

        </div>

    </aside>



    <div class="control-sidebar-bg">



    </div>

</div>

<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>








<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js" charset="utf-8"></script>

<!-- Bootstrap 3.3.7 -->

<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- DataTables -->



<script src="{{ asset('/bower_components/chart.js/Chart.js') }}"></script>

<!-- FastClick -->

<script src="{{ asset('/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
<!--
<script src="{{ asset('/dist/js/demo.js') }}"></script> -->



<script src="{{ asset('/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- SlimScroll -->

<script src="{{ asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('/bower_components/jquery-knob/js/jquery.knob.js') }}"></script>


<script src="{{ asset('/js/custome.js') }}"></script>

<script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>