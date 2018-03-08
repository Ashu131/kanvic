@extends('admin.master')
@section('content')
<div class="text-success">{{Session::get('success')}}</div>
<div class="block block-themed">
    <div class="block-content">
        <form class="form-horizontal page-form push-10-t push-10" action="{{route('post.page.create')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="page_name" name="page_name">
                        <label for="page_name">Page Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="file" id="page_banner" name="page_banner[]" multiple>
                        <label for="page_name">Page Banner</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="page_title" name="page_title">
                        <label for="page_title">Browser Title</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="meta_title" name="meta_title">
                        <label for="meta_title">Meta Title</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="meta_keywords" name="meta_keywords">
                        <label for="meta_keywords">Meta Keywords</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="meta_description" name="meta_description">
                        <label for="meta_description">Meta Description</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="page_header" name="page_header">
                        <label for="page_header">Page Header</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <textarea name="page_content" id="page_content" class="content" class="form-control"></textarea>
                        <label for="page_content">Page Text</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <select name="template_id" id="template_id" class="form-control">
                            <option value="0">Default</option>
                            <option value="1">1</option>
                            <option value="2">2</option>            
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">investor</option>
                              <option value="6">contact us</option>
                            
                        </select>
                        <label for="template_id">Select Template</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="file" id="image" name="image">
                        <label for="meta_description">Images</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Save Page</button>
                </div>
            </div>
            <a href = "{{route('viewoptions.page')}}">BACK TO VIEW PAGE</a>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
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
        external_filemanager_path:"../resources/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"}
    });
</script>


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