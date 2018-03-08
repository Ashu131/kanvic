@extends('auth.app.login')

@section('title','Login')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <div class="iboxlogin float-e-margins">
                    <img src="{{ url('images/logo.png') }}" class="img-responsive" alt="investorpo logo" style="margin: 20px auto;"/>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Sign in</h3>
                                <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input name="email" type="email" class="form-control" placeholder="Username">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input name="password" type="password" class="form-control"
                                               placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection