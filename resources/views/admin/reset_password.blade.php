@extends('admin.master')

@section('content')

<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Reset Password</h3>
    </div>
    <div class="block-content">
            
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
        @if(Session::has('failure'))
        <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif
            <div class="list-group">
                <div class="row">
                    <form action="{{route('reset.password')}}" class="form-horizontal push-10-t push-10" method="post"> 
                        <input class="form-control" type="hidden" name="user_id" value="{{$data['user']->id}}">
                    <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" name="emailid" value="{{$data['user']->email}}" >
                                    <label for="current_password">Email id</label>
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    
                                    <input class="form-control" type="password" name="current_password" >
                                    <label for="current_password">Current Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="password" name="password">
                                    <label for="password">New Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="password" name="confirm_password">
                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt15">
                            <div class="col-xs-8 col-xs-offset-5 pt15">
                                <input type="hidden" name="_token" value="{{Session('_token')}}">
                                <button type="submit" class="btn btn-info" >Reset</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')


@if(Session::has('success'))
<script>
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-check',
            title: 'Success: ',
            message: '{{Session::get('success')}}', 
        },{
            allow_dismiss: true,
            type: 'success',
            placement: {
                from: "top",
                align: "center"
            },
        });
    });
</script>
@endif
@endsection
