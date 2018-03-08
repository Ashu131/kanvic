
@extends('admin.master')
@section('content')
<div class="block block-themed">

    <div class="block-content">
        <div class="list-group">
        <table width="900">
        <tr><th>Number</th><th> Name</th> <th> email </th><th> message</th></tr>

        <?php $a = 1; ?>
        @foreach($data['list_inquiry'] as $list_inquiry)
        <tr><td>{{$a}}</td><td> {{$list_inquiry['name']}}</td> <td>{{$list_inquiry['email']}} </td> <td> {{$list_inquiry['message']}}</td></tr>
        <?php $a = $a+1; ?>
        @endforeach

        </table>
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