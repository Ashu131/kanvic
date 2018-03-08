@extends('silver.app')
@section('title','Products')
@section('header')
    @include('silver.header-dark')
@endsection
@section('content')
    <section class="container first" id="login-wrapper">
        <article>
            <div class="content_wrapper row">
                <div class="topbar col-md-12">
                    <div class="back-btn col-md-3"><a href="{{url('/')}}"><i class="fa fa-long-arrow-left"></i> BACK TO
                            STORE</a>
                    </div>

                </div>
                <div class="col-md-6 border-right-1">
                    <h2 class="pur-heading text-left">CREATE VIP ACCOUNT </h2>
                    <span class="text-muted col-md-9 helper-text">REGISTER TO CHECKOUT QUICKER AND TO RECEIVE EXCLUSIVE OFFERS & NEWS</span>
                    <div class="clearfix"></div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-sm{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="fname">FIRST NAME*</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fname" name="first_name">
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('last_name')? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="lname">LAST NAME*</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lname" name="last_name">
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="address">ADDRESS</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address1">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm @if ($errors->has('locality')) has-error @endif">
                            <label class="text-left control-label col-sm-3" for="locality">LOCALITY</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="locality" name="address2">
                                @if ($errors->has('locality'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('locality') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="city">CITY*</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="city" name="city">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm @if ($errors->has('state')) has-error @endif">
                            <label class="text-left control-label col-sm-3" for="state">STATE*</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="state" name="state">
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm @if ($errors->has('pincode')) has-error @endif">
                            <label class="text-left control-label col-sm-3" for="pincode">PINCODE</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="pincode" name="pincode">
                                @if ($errors->has('pincode'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('pincode') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="phone">PHONE*</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="phone" name="mobile">
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('user_email')? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="email">EMAIL*</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" name="user_email">
                                @if ($errors->has('user_email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('user_email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="pwd">PASSWORD*</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="pwd" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="text-left control-label col-sm-3" for="cpwd">CONFIRM PASSWORD*</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="cpwd" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group form-group-sm{{ $errors->has('terms')? ' has-error' : '' }}">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="terms">
                                        I AGREE TO THE <a href="{{url('terms-conditions')}}"> TERMS & CONDITIONS</a></label>
                                    @if ($errors->has('terms'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('terms') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-default">REGISTER</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h2 class="pur-heading text-left">LOGIN </h2>
                    <span class="text-muted col-md-9 helper-text">IF YOU ALREADY HAVE AN ACCOUNT</span>
                    <div class="clearfix"></div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group form-group-sm{{ $errors->has('email')?' has-error' : '' }}">
                            <label class="text-left control-label col-sm-3" for="lemail">EMAIL:</label>
                            <div class="col-md-9 col-lg-6">
                                <input type="email" class="form-control" id="lemail" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="text-left control-label col-sm-3" for="lpass">PASSWORD:</label>
                            <div class="col-md-9 col-lg-6">
                                <input type="password" class="form-control" id="lpass" name="password">
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12 col-lg-9">
                                <span class="pull-right"><a href="{{url('/password/reset')}}">Forgot password</a></span>
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-default">LOGIN</button>
                            </div>

                        </div>
                    </form>
                   <div class="as-guest">
                       <a class="btn btn-default" href="{{url('guest-checkout')}}">CONTINUE SHOPPING AS A GUEST</a>
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
        </article>
    </section>
@endsection