<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="apple-touch-icon" href="{{ asset('backend') }}/apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('backend') }}/favicon.ico">

    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('backend') }}/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('backend') }}/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">CMS</h3><!-- /.menu-title -->
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-user"></i>User</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <a href=""><i class="fa fa-home"></i>Home</a>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('backend') }}/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('backend') }}/vendors/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/main.js"></script>


    <script src="{{ asset('backend') }}/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('backend') }}/assets/js/widgets.js"></script>
    <script src="{{ asset('backend') }}/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{ asset('backend') }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="{{ asset('backend') }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
