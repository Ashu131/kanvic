@extends('silver.app_login')
@section('title','register')
@section('content')
<div id="loginpg">
<div class="login_container" id="login-wrapper">
    <div class="text-center">
        <a href=""><img src="{{url('images/logo.png')}}" /></a>
    </div>
    <div class="text-center">
        <h2 class="pur-heading">SIGNUP TO RATAN JAIPUR</h2>
                    <!--<span class="text-muted col-md-9 helper-text">IF YOU ALREADY HAVE AN ACCOUNT</span>-->
        <div class="clearfix"></div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group form-group-sm{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="text" class="form-control" id="fname" value="{{old('first_name')}}" name="first_name">
                    <label for="fname">Name*</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm{{ $errors->has('address1') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="text" class="form-control" id="address" value="{{old('address1')}}" name="address1">
                    <label for="address">ADDRESS*</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm{{ $errors->has('city') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="text" class="form-control" id="city" value="{{old('city')}}" name="city">
                    <label for="city">City*</label>
                    </div>
                </div>
            </div>
            <?php
              $states = DB::table('states')->get();
             ?>
            <div class="form-group form-group-sm{{ $errors->has('state') ? ' has-error' : '' }}">
            <div class="form-material col-sm-12 col-lg-9">
            <select class="form-control text-uppercase" id="state" name="state">
                <option value="">Select state</option>
                @foreach($states as $state)
                    <option value="{{$state->state_name}}">{{$state->state_name}}</option>
                @endforeach
            </select>
            </div>
            </div>

            <div class="form-group form-group-sm{{ $errors->has('pincode') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="text" class="form-control numeric" id="pincode" value="{{old('pincode')}}" name="pincode">
                    <label for="pincode">Pincode</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="text" class="form-control numeric" id="phone" value="{{old('mobile')}}" name="mobile">
                    <label for="phone">MOBILE NO.</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm{{ $errors->has('user_email')? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="email" class="form-control" id="email" value="{{old('user_email')}}" name="user_email">
                    <label for="email">EMAIL*</label>
                </div>
                </div>
            </div>
            <div class="form-group form-group-sm{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-sm-12 col-lg-9">
                <div class="form-material floating">
                    <input type="password" class="form-control" id="pwd" name="password">
                    <label for="pwd">PASSWORD*</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <div class="col-sm-12 col-lg-9">
                 <div class="form-material floating">
                    <input type="password" placeholder="" class="form-control" id="cpwd" name="password_confirmation">
                    <label for="cpwd">CONFIRM PASSWORD*</label>
                </div>
                </div>
            </div>
            <div class="form-group form-group-sm{{ $errors->has('gender') ? ' has-error' : '' }} gender">
                <div class="col-sm-12 col-lg-9 gender-block">
                    <div class="col-sm-5 col-lg-3">
                        <input type="radio" value="male" name="gender"><label> Male</label>
                    </div>
                    <div class="col-sm-5 col-lg-3">
                        <input type="radio" value="female" name="gender"><label> Female</label>
                    </div>
                    @if ($errors->has('gender'))
                    <span class="help-block col-lg-9">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                                @endif
                </div>
            </div>




            <div class="form-group form-group-sm">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-default">REGISTER</button>
                </div>
            </div>
        </form>
        <!--<div class="form-group form-group-sm">
        <div class="col-sm-12 col-lg-9 divider">
           <div clsss=""><span>or</span></div>
        </div>
        </div> -->
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