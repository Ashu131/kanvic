@extends('admin.master')


@section('content')
<div class="block block-themed">
        <div class="block-header bg-primary">                
                <h3 class="block-title">Create New Event</h3>
        </div>

        <div class="block-content">

             @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('failure'))
            <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
            @endif

            <form class="form-horizontal page-form push-10-t push-10" action="{{route('event.post')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="name" name="name" >
                            <label for="name">Event Name</label>
                        </div>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <textarea id="pagecontent" name="full_content" ></textarea>
                            <label for="pagecontent">Detail</label>

                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="news_image">Image</label>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="news_thumb_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="news_image">Inner Image</label>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="innerimg[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Save Page</button>
                    </div>
                </div>

            @endsection
            </form>
@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<!--<script src="{{url('resources/assets/admin/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/pages/base_forms_validation.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/datepicker/moment.min.js')}}"></script>-->
 <script>
            tinymce.init({
                forced_root_block: false,
                force_br_newlines : true,
                force_p_newlines : false,
                forced_root_block : '',
                selector: "textarea",theme: "modern",width: 680,height: 300,
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