@extends('admin.master')
@section('content')
{{Session::get('success')}}

<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Menu Type</h3>
    </div>
  <!--   <div class="pull-right create-new-btn">
        <a href="{{route('new.menu')}}" class="btn btn-default">Create New Menu</a>
    </div> -->
    <div class="block-content">
        <div class="list-group">
           @foreach($data['menu_type'] as $menu_type)
            <span class="list-group-item" href="javascript:void(0)">
                {{$menu_type->menu_type_name}} 
                <span class="pull-right">
                    <a href="{{route('show.menu.single',$menu_type->id_menu)}}"> <i class="fa fa-lg fa-edit"></i></a>
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