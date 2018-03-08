@extends('admin.master')
@section('content')
<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Testimonial</h3>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('failure'))
    <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
    @endif
    <div class="block-content">
        <form class="form-horizontal push-10-t push-10" action="{{route('testimonial')}}" method="post">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material floating">
                        <input class="form-control" type="text" id="author" name="author" value="{{Input::old('author')}}">
                        <label for="author">Author</label>
                            {{$errors->first('author')}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <textarea class="form-control" id="news_desc" name="news_desc">{{Input::old('news_desc')}}</textarea>
                        <label for="news_desc">News Description</label>
                        {{$errors->first('news_desc')}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{url('resources/assets/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>

        <script>
            tinymce.init({
                forced_root_block: false,
                force_br_newlines : true,
                force_p_newlines : false,
                forced_root_block : '',
                selector: "textarea",theme: "modern",width: 680,height: 200,
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
