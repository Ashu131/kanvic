@extends('admin.master')

@section('content')
<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Global Setting</h3>
    </div>
    <div class="block-content">
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
@endif
@if(Session::has('failure'))
    <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
@endif
    <div class="list-group">
       <form class="form-horizontal push-10-t push-10" action="{{route('globalupdate')}}" method="post" enctype="multipart/form-data">
            <h2 class="heading">Email settings</h2>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="contact_email" name="contact_email" value="{{$formdata[2]->form_forward_to}}">
                        <label for="contact_email">Contact email id*</label>
                        <span class="errormsg">{{$errors->first('contact_email_address')}}</span>
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="career_email" name="career_email" value="{{$formdata[3]->form_forward_to}}">
                        <label for="career_email">Career email id*</label>
                        <span class="errormsg">{{$errors->first('career_email_address')}}</span>
                    </div>
                </div>
            </div>
 
          <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Update</button>
                </div>
            </div>
                       
                    </form>
                
            </div>
        </div>
    </div>

@endsection

@section('js')
<style>
.heading{margin-bottom: 10px;
    padding-bottom: 10px;
    float: left;
    font-size: 18px;
}
</style>

@endsection
