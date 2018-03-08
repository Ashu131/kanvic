<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanvic @yield('title') </title>
    <link rel="stylesheet" href="{!! asset('resources/assets/admin/css/bootstrap.min.css') !!}"/>
    <link rel="stylesheet" href="{!! asset('resources/assets/admin/css/app.css') !!}"/>
    {!! Html::style('plugins/iCheck/custom.css') !!}
    {!! Html::style('plugins/toastr/toastr.min.css') !!}
    {!! Html::style('resources/assets/admin/css/style.css') !!}
    {!! Html::style('plugins/validationengine/validationEngine.jquery.css') !!}
</head>
<body class="login-bg md-skin">

@yield('content')

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
{!! Html::script('plugins/toastr/toastr.min.js') !!}
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
{!! Html::script('resources/assets/admin/js/jquery-3.1.1.min.js') !!}
{!! Html::script('resources/assets/admin/js/bootstrap.min.js') !!}
{!! Html::script('plugins/validationengine/languages/jquery.validationEngine-en.js') !!}
{!! Html::script('plugins/validationengine/jquery.validationEngine.js') !!}

@yield('js')

</body>
</html>