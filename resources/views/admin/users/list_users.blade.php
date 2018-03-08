
@extends('admin.master')
@section('content')
<div class="block block-themed">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>UserName</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                
            </tr>
        </thead>
    <tbody>
     
        @foreach($data['list_Users'] as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>@if($users->user_type == 1) Admin  @endif @if($users->user_type == 2) Front User @endif</td>
                <td title="{{$users->extra_days}} days" data-id="{{$users->id}}" class="pop-btnactive" data-status="{{$users->status}}">@if($users->status == 1) <button  class="btn-success" data-toggle="modal" data-target="#myModal">Active</button>  @endif @if($users->status == 2)<button class="btn-info" data-toggle="modal" data-target="#myModal">Pending </button> @endif
                    @if($users->status == 0)<button class="btn-danger" data-toggle="modal" data-target="#myModal"> Block</button> @endif
                    @if($users->status == 3)<button class="btn-warning" data-toggle="modal" data-target="#myModal" >Temp Active</button> @endif
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
   
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

