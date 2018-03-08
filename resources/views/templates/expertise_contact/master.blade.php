<!DOCTYPE HTML>
<html>
    <head>
        @include('templates.template_1.head')
    </head>
<body>
 <div id="page">
        
                @include('templates.template_1.header')
           

            
                @yield('content')
            

            @include('templates.template_1.footer')
            @yield('js')
   </div>    
</body>
</html>
