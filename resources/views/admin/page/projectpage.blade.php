@extends('admin.master')

@section('css')
<link href="{{url('resources/assets/css/dropzone.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('resources/assets/js/plugins/nestable/jquery.nestable.css')}}"></script>
@endsection

@section('content')
<form class="form-horizontal page-form push-10-t push-10" action="{{route('post.create.project')}}" method="post" enctype="multipart/form-data">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('failure'))
    <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif

    <div class="block block-themed">
    <div class="block-content">
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                        <input class="form-control" type="text" id="page_name" name="name" >
                        <label for="page_name">Name</label>
                            {{$errors->first('name')}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="short_name" name="short_name">
                    <label for="short_name">Short Name</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="address">
                    <label for="page_name">Address</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="contact">
                    <label for="page_name">Contact Number</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="city">
                    <label for="page_name">City</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="location">
                    <label for="page_name">Location</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="latitude">
                    <label for="page_name">Latitude</label>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="longitude">
                    <label for="page_name">Longitude</label>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <input class="form-control" type="text" id="page_name" name="timing">
                    <label for="page_name">Timing</label>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <label for="product_description">Facilities</label>
                    <textarea name="facilities" class="form-control"></textarea>
                </div>
            </div>
        </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <label class="sr only" for="select_template">Publish</label>

                        <select name="publish" id="templ" class="form-control">
                            <option value="1">yes</option>
                            <option value="0">no</option>            


                        </select>
                    </div>
                </div>
            </div>
          <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Save Page</button>
                </div>
            </div>


        </div>
    </div>
</form>
<div id="baseurl">{{url('')}}</div>
@endsection

@section('js')
<script src="{{url('resources/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<!--<script src="{{url('resources/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>-->
<!--<script src="{{url('resources/assets/js/pages/base_forms_validation.js')}}"></script>
<script src="{{url('resources/assets/js/dropzone.js')}}"></script>-->

<script src="{{url('resources/assets/js/jquery.js')}}"></script>
        <script>
            tinymce.init({
                forced_root_block: false,
                force_br_newlines : true,
                force_p_newlines : false,
                forced_root_block : '',
                selector: "textarea",theme: "modern",width: 680,height: 150,
                plugins: [
                    "advlist autolink code link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager fontawesome noneditable"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fontawesome ",
                image_advtab: true ,
                document_base_url: 'http://www.tinymce.com/tryit/',
                extended_valid_elements:  "i[class],span[class],em[class]",
                content_css: '//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
                external_filemanager_path:"../resources/filemanager/",
                filemanager_title:"Responsive Filemanager" ,
                external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"}
            });
</script>

@endsection