<!DOCTYPE HTML>
<html>
    <head>
        @include('templates.template_1.head')
    </head>
<body class="home page page-template page-template-page-simple page-template-page-simple-php layout-wide pattern-none sticky-header wpb-js-composer js-comp-ver-4.7.4 vc_responsive">
 <div id="page">
        
                @include('templates.template_1.header')
           
            
                @yield('content')
            

            @include('templates.template_1.footer')
            @yield('js')
   </div>    
</body>
</html>
