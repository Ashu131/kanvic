@extends('admin.master')
@section('title', 'Main page')
@section('page_title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Home slider</h5>
                    <div class="ibox-tools">
                        <a href="{{route('add.new.home.slide')}}" class="btn btn-primary btn-xs">Add new slide</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($homeslides as $slide)
                                <tr>
                                    <td>
                                    <img src="{{url('resources/assets/img/modules/slider/'.$slide->image)}}" width="100" height="auto">
                                    </td>
                                    <td>{!!$slide->title!!}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            {{--<button class="btn-white btn btn-xs">View</button>--}}
                                            <a href="{{url('admin/admin-edit-home-slide/'.$slide->id)}}" class="btn-white btn btn-xs">Edit</a>
                                            <a href="javascript:delete_id({{$slide->id}})" class="btn-white btn btn-xs">Delete</a>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
<script type="text/javascript">
function delete_id(id)
{
    var baseurl = window.location.origin;
    baseurl = 'http://localhost/kanvic';
     if(confirm('Sure To Remove This slide ?'))
     {
        window.location.href=baseurl+'/admin/home-slide-delete/'+id;
    }
}
</script>

@stop
