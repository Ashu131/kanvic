@extends('silver.app_login')
@section('title','login')
@section('css')
<style>
    body,html{height:100%;}
</style>
@endsection
@section('header')

@endsection
@section('content')
<div id="loginpg">
<div class="login_container" id="login-wrapper">
    <div class="text-center">
        <a href=""><img src="{{url('images/logo.png')}}" /></a>
    </div>
    <div class="text-center">
        <h2 class="pur-heading">LOGIN IN TO RATAN JAIPUR</h2>
                    <!--<span class="text-muted col-md-9 helper-text">IF YOU ALREADY HAVE AN ACCOUNT</span>-->
        <div class="clearfix"></div>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="login-form">
            {{ csrf_field() }}
            <div class="form-group form-group-sm{{ $errors->has('email')?' has-error' : '' }}">
                <!--<label class="text-left control-label col-sm-3" for="lemail">EMAIL:</label>-->
                <div class="form-material floating col-sm-12 col-lg-9">
                    <input type="email" class="form-control" id="lemail" name="email" required>
                    <label for="lemail">EMAIL*</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group form-group-sm">
                <!--<label class="text-left control-label col-sm-3" for="lpass">PASSWORD:</label>-->
                <div class="form-material floating col-sm-12 col-lg-9">
                    <input type="password" class="form-control" id="lpass" name="password">
                    <label for="lpass">PASSWORD*</label>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-sm-12 col-lg-9 forgotpass">
                    <span class=""><a href="{{url('/password/reset')}}">Forgot password</a></span>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-default">LOG IN</button>
                </div>
            </div>
        </form>

        <div class="form-group form-group-sm">
        <div class="col-sm-12 col-lg-9 register-txt">
            New to Ratan jaipur? <a class="" href="{{url('register')}}">Create Account</a>
        </div>
        </div>
        <div class="form-group form-group-sm">
        <div class="col-sm-12 col-lg-9 divider">
           <div clsss=""><span>or</span></div>
        </div>
        </div>
                   <div class="as-guest">
                       <a class="btn btn-default" href="{{url('guest-checkout')}}">CONTINUE AS A GUEST</a>
                   </div>
                    {{--<div class="clearfix"></div>
                    <div class="row mbt-6">
                        <span class="or-option">or</span>
                        <hr class="hr-w70"/>
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-4">
                            <img src="images/fb.jpg">
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-4">
                            <img src="images/twitter.jpg">
                        </div>
                    </div>--}}
                </div>
</div>
</div>

@endsection