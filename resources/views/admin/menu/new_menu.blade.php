@extends('admin.master')

@section('content')

<div class="block block-themed">
	 <div class="block-header bg-primary">                
        <h3 class="block-title">Create New Menu</h3>
    </div>
    <div class="block-content">

		@if(Session::has('success'))
	    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
	    @endif
	    @if(Session::has('failure'))
	    <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
	    @endif

        <form class="form-horizontal push-10-t push-10 page-form" action="{{route('create.menu.type')}}" method="post">
	        <div class="form-group">
	           	<div class="col-xs-12">
	                <div class="form-material">
	                    <input class="form-control" type="text" id="menu_type_name" value="" name="menu_type_name">
	                    <label for="menu_type_name">Menu Type Name</label>
	                </div>
	            </div>
	        </div>
	        <div class="form-group">
	           	<div class="col-xs-12">
	                <div class="form-material">
	                    <select class="form-control" name="menu_position">
				        @foreach($data['positions'] as $position)
				            <option value="{{$position->position_id}}">{{$position->position_name}}</option>
				        @endforeach
				    	</select>
	                    <label for="menu_position">Menu Position</label>
	                </div>
	            </div>
	        </div>
	        <div class="form-group">
	           	<div class="col-xs-12">
	                <div class="form-material">
	                    <select class="form-control" name="enable">
				            <option value="1">Yes</option>
				            <option value="0">No</option>
				    	</select>
	                    <label for="menu_position">Enable</label>
	                </div>
	            </div>
	        </div>
	         <div class="form-group">
	            <div class="col-xs-12">
	                <input type="hidden" name="_token" value="{{Session('_token')}}">
	                <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Create</button>
	            </div>
	        </div>
		</form>
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