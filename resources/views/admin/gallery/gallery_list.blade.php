
@extends('admin.master')
@section('content')


<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Gallery List nagendra</h3>
    </div>
    <!--<div class="pull-right create-new-btn">
        <a href = "{{route('new.gallery.type')}}" class="btn btn-default">Create New GalleryType</a>
    </div>-->
    <div class="block-content">
        <div class="list-group">
            @foreach($data['gallery_type'] as $gallery_type)
            <span class="list-group-item" href="javascript:void(0)">
                {{$gallery_type->name}} <span class="pull-right">
                <a href="{{route('admin.edit.gallery',$gallery_type->gallery_type)}}"> <i class="fa fa-lg fa-edit"></i></a>
                <a href="{{route('admin.show.gallery.type',$gallery_type->gallery_type)}}"> <i class="fa fa-lg fa-plus"></i></a>
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