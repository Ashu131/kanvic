<!DOCTYPE HTML>
<html>
<head>
@include('templates.inner_template.head')
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-5660971-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-5660971-2');
</script>
</head>
<body class="">

    @include('templates.inner_template.header')
    @yield('content')
    @include('templates.template_1.footer')
    @yield('js')
 <script src="{{url('resources/assets/js/custom.js')}}" type="text/javascript"></script> 
</body>
</html>
