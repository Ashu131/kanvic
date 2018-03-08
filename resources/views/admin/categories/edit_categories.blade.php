
@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="block block-themed">
            <div class="block-header bg-primary"> 
             <h3 class="block-title">{{$data['categories']->category_name}} </h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10 page-form" action="{{route('post.categories.edit',$data['categories']->id)}}" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="category_name" value="{{$data['categories']->category_name}}" value="{{$data['categories']->category_name}}" name="category_name">
                                <label for="category_name">Category Name</label>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <!-- <input class="form-control" type="text" id="" value="" name="category_description"> -->
                                <textarea class="form-control" name="category_description">{{$data['categories']->category_description}}</textarea>
                                <label for="meta_title">Category Description</label>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="meta_keywords">Parrent Category</label>
                                <select name="pareent_id">
                                <option value="0"> Select Parrent Id </option>
                                    @foreach($data['categoriesList'] as $key => $value)
                                    <?php $select = ''; if($data['categories']->pareent_id == $value['id']) { $select = 'selected="selected"';} ?>
                                    <option {{$select}} value="{{$value['id']}}">{{$value['category_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 <a href = "{{url('/admin')}}">BACK TO VIEW PAGE</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/pages/base_forms_validation.js')}}"></script>
@endsection