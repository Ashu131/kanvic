@extends('admin.master')
@section('content')


<div class="block block-themed">
     <div class="block-header bg-primary">                
        <h3 class="block-title">Page List</h3>
    </div>
    <div class="pull-right create-new-btn">
        <a href = "{{route('get.page.create')}}" class="btn btn-default">Create New Page</a>
    </div>
    <div class="block-content" style="margin-top:35px;">
        <div class="list-group">
            @foreach($data['pages'] as $page)
            <span class="list-group-item" href="javascript:void(0)">
                {{$page->page_name}} <span class="pull-right">
                <a href="{{route('get.page.edit',$page->id)}}"> <i class="fa fa-lg fa-edit"></i></a>
            </span>
            </span>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

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