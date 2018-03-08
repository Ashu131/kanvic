@extends('admin.master')


@section('content')
<div class="block block-themed">
        <div class="block-header bg-primary">                
                <h3 class="block-title">Create New Article</h3>
        </div>

        <div class="block-content">

             @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('failure'))
            <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
            @endif

            <form class="form-horizontal page-form push-10-t push-10" action="{{route('press-release.post')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="author" name="author" >
                            <label for="author">Author</label>
                        </div>
                    </div>
                </div>
 <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="title" name="title" >
                            <label for="title">Title Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material floating">
                            <input class="form-control" type="text" id="sub_title" name="sub_title" >
                            <label for="title">Sub title</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="news_image">Thumb Image</label>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="outerimg">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="news_image">Inner image</label>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="innerimg">
                                </div>
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
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Save Page</button>
                    </div>
                </div>

            @endsection
            </form>
@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{url('resources/assets/admin/js/plugins/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",theme: "modern",height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"http://kanvic.com/resources/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "http://kanvic.com/resources/filemanager/plugin.min.js"}
 });
</script>



@endsection