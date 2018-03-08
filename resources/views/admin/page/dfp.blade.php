@extends('admin.master')
@section('content')
<div class="text-success">{{Session::get('success')}}</div>
<div class="block block-themed">
    <div class="block-content">
        <form class="form-horizontal page-form push-10-t push-10" action="{{route('post.dfp')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" value="nagendradel">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="page_name" name="name">
                        <label for="page_name">Page Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Save Page</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection

