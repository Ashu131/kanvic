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
            <h3 class="block-title">{{$data['event']->title}}</h3>
        </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10 page-form" action="{{route('post.press-release.edit',$data['event']->id)}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                 <input class="form-control" type="text" id="author" name="author" value="{{$data['event']->author}}">
                                <label for="author">Author</label>
                            </div>
                        </div>
                    </div>                    
<div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                 <input class="form-control" type="text" id="title" name="title" value="{{$data['event']->title}}">
                                <label for="title">Title</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                 <input class="form-control" type="text" id="sub_title" name="sub_title" value="{{$data['event']->sub_title}}">
                                <label for="title">Sub title</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <textarea name="content" id="page_content" class="form-control">{!!$data['event']->content!!}</textarea>
                                <label for="page_content">Detail</label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group pt15">
                        <div class="col-xs-12 pt15">
                            <div class="form-material">
                                <label for="news_thumb_image">Outer Image</label>
                                <div class="row pt15">
                                    <div class="col-xs-12">
                                        <div style="position:relative;float: left;">
                                        @if($data['event']->imgname!="")
                                            <img class="single-image img" src="{{url('resources/assets/img/modules/article/'.$data['event']->imgname)}}" style="width:200px;">
                                            <!--<a class="delete btn btn-danger delete-btn"  data-toggle="modal" data-target="#modal-popout-image-thumb" ><i class="fa fa-times"></i></a>-->
                                        @else
                                            <span>Thumb Image not Available, Please Upload Image </span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="outerimg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt15">
                        <div class="col-xs-12 pt15">
                            <div class="form-material">
                                <label for="news_thumb_image">Inner Image</label>
                                <div class="row pt15">
                                    <div class="col-xs-12">
                                        <div style="position:relative;float: left;">
                                        @if($data['event']->inner_banner!="")
                                            <img class="single-image img" src="{{url('resources/assets/img/modules/article/banner/'.$data['event']->inner_banner)}}" style="width:300px;">
                                            <!--<a class="delete btn btn-danger delete-btn"  data-toggle="modal" data-target="#modal-popout-image-thumb" ><i class="fa fa-times"></i></a>-->
                                        @else
                                            <span>Thumb Image not Available, Please Upload Image </span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 pt15">
                                    <input type="file" name="innerimg">
                                </div>
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


<div class="modal fade" id="modal-popout-image-thumb" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-popout">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                            <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                            </ul>
                            <h3 class="block-title">delete</h3>
                        </div>
                        <div class="block-content">
                            Are you really want to delete thumb of news
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                            <a href="{{route('admin.delete.image.event',$data['event']->event_id)}}" class="btn btn-sm btn-primary" > <i class="fa fa-check"></i> Yes</a>
                        </div>
                </div>
            </div>
        </div>

        @endsection


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