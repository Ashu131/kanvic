
@extends('admin.master')
@section('content')
<div class="block block-themed">

    <div class="block-content">
        <div class="list-group">
           @foreach($data['emailsList'] as $emailsList)
            <span class="list-group-item" href="javascript:void(0)">
                {{$emailsList->email}} <span class="pull-right">
                
                </span>
            </span>
             @endforeach
        </div>
    </div>
     <a href = "{{url('/admin')}}">BACK TO Home</a>
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