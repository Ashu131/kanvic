<html>
<head>
<title>Kanvic - @yield('title') </title>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link href="{{url('resources/assets/admin/css/oneui.min.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/style.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/admin-style.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/main.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/font-awesome.css')}}" rel="stylesheet">
@yield('css')
</head>
<body class="md-skin">
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <nav id="sidebar">
                @include('admin.leftnav')
            </nav>
           
<main id="main-container">
                              
                <div class="content content-narrow">
                    @yield('content')
                </div>
 </main>

            @include('admin.footer')
        </div>
</body>
</html>