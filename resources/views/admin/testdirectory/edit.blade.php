@extends('admin.master')

@section('content')

    
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('failure'))
    <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif

	<div class="block block-themed">

        <div class="block-header bg-primary">                
            <h3 class="block-title">{{$data['test']->test_name}}</h3>
        </div>
            <div class="block-content">
            	<form class="form-horizontal push-10-t push-10 page-form" action="{{route('post.test.edit',$data['test']->test_id)}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                 <input class="form-control" type="text" id="name" name="name" value="{{$data['test']->test_name}}">
                                <label for="name">Name</label>
                            </div>
                        </div>
                    </div>





                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <textarea name="full_content" id="page_content" class="form-control">{!!$data['test']->content!!}</textarea>
                                <label for="page_content">Detail</label>
                            </div>
                        </div>
                    </div>
					



                	<div class="form-group">
	                    <div class="col-xs-12">
	                        <input type="hidden" name="_token" value="{{Session('_token')}}">
	                        <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Save Page</button>
	                    </div>
                	</div>

                </form> 	
            </div>
        </div>



        @endsection


@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/datepicker/moment.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/pages/base_forms_validation.js')}}"></script>

<script>
    tinymce.init({
        selector: "textarea",theme: "modern",width: 680,height: 300,
        plugins: [
            "advlist autolink code link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,
        document_base_url: 'http://www.tinymce.com/tryit/',
        external_filemanager_path:"../../resources/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        verify_html : false,
        external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"}
    });

</script>


<script>jQuery(function(){App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);});</script>
@endsection