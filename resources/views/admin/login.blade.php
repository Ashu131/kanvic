
<html>
    <head>
        <link rel="stylesheet" href="{{url('resources/assets/admin/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('resources/assets/admin/css/login.css')}}">
    </head>
    <body>
        <div class="container">
        <div class="row">
        <div class = "testbox">
            <form action="{{route('admin.login')}}" method="post"> 
                <div align="center">
                    <h1> LOGIN</h1>
                </div>
                @if(Session::has('success'))

            <div align="center">
                {{Session::get('success')}}
            </div>

            @else(Session::has('failure'))
            <div align="center">
                {{Session::get('failure')}}
            </div>
            @endif
                <br>


                <div align="center">
             
                    <input class="textboxone" type="text" name="email" placeholder="email">
                    
                    @if(!empty($errors->first('email')))<div class="alert alert-danger"> <button type='button' class='close' data-dismiss='alert'>×</button> {{ $errors->first('email') }} </div> @endif
                </div>  
                <br>
                <div align ="center">
                    <div class="inputwrapper animate2 bounceIn">
                        <label class="sr only" for="password"></label>
                        <input class="textboxone" type="password" name="password" placeholder="password">
                        @if(!empty($errors->first('password')))<div class="alert alert-danger"> <button type='button' class='close' data-dismiss='alert'>×</button> {{ $errors->first('password') }} </div> @endif
                    </div>
                    <br>

                    <div align="center">


                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <button type="submit" class="btn" >LOGIN</button>
                    </div>
                    <div class="link">

                        </form>
                        </div>
         </div>
         </div>

           <script src="{{url()}}/resources/assets/js/vendor/jquery.js"></script>
        <script src="{{url()}}/resources/assets/js/vendor/jquery.easing.1.3.js"></script>
        <script src="{{url()}}/resources/assets/js/vendor/bootstrap.js"></script>
    </body>
</html>
