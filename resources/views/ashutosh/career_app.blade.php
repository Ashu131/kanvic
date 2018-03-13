<!DOCTYPE HTML>
<html>
<head>

    
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <title>{{$page['meta_title']}} - kanvic</title>  --}}
    {{--  <meta name="description" content="{{$page['meta_description']}}"/>
    <meta name="keywords" content="{{$page['meta_keywords']}}"/>  --}}


    <link rel="shortcut icon" href="{{url('resources/assets/images/favicon.png')}}" />
    <link rel='stylesheet' href="{{url('resources/assets/css/bootstrap.min.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{url('resources/assets/css/font-awesome.css')}}" type='text/css' media='all' />
    
    <link rel='stylesheet' href="{{url('resources/assets/css/custom.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{url('resources/assets/css/career_ashu.css')}}" type='text/css' media='all' />
    
    {{--  <script src="{{url('resources/assets/js/career_tab_modernizr.custom.js')}}" type="text/javascript"></script>   --}}
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-5660971-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-5660971-2');
    </script>
</head>
<body class="">

    @include('ashutosh.career_header')
    @yield('content')
    @include('templates.template_1.footer')
    @yield('js')
    <script src="{{url('resources/assets/js/career_tabs.js')}}" type="text/javascript"></script> 
    <script src="{{url('resources/assets/js/custom.js')}}" type="text/javascript"></script> 
    <script>
        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();
    </script>
</body>
</html>
