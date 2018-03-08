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
        <h3 class="block-title">{{$data['event']->event_name}}</h3>
    </div>
    <div class="block-content">
        <form class="form-horizontal push-10-t push-10 page-form" action="{{route('blog.update',$data['event']->id)}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="name" name="name" value="{{$data['event']->event_name}}">
                        <label for="name">Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <textarea name="full_content" id="page_content" class="form-control">{!!$data['event']->content!!}</textarea>
                        <label for="page_content">Detail</label>
                    </div>
                </div>
            </div>
            <div class="form-group pt15">
                <div class="col-xs-12 pt15">
                    <div class="form-material">
                        <label for="news_thumb_image">Inner image</label>
                        <div class="row pt15">
                            <div class="col-xs-12">
                                <div style="position:relative;float: left;">
                                    @if($data['event']->innerimg!="")
                                    <?php 
                                    $allimg = explode(",",$data['event']->innerimg);
                                    ?>

                                    @for($i=0;$i<count($allimg)-1;$i++)
                                    <div style="position:relative;float: left;">
                                    <img class="single-image img" src="{{url('resources/assets/img/modules/events/'.$allimg[$i])}}">
                                    <a class="delete btn btn-danger delete-btn" href="javascript:delete_id({{$data['event']->event_id}},'{{$allimg[$i]}}')">
                                        <i class="fa fa-lg fa-times"></i>
                                    </a>
                                    </div>
                                    @endfor
                                
                                    @else
                                    <span>Thumb Image not Available, Please Upload Image </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 pt15">
                            <input type="file" name="innerimg[]" multiple>
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
                            <a href="{{route('delete.image.blog',$data['event']->id)}}" class="btn btn-sm btn-primary" > <i class="fa fa-check"></i> Yes</a>
                        </div>
                </div>
            </div>
        </div>

<div id="baseurl">{{url('')}}</div>
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

<script type="text/javascript">
function delete_id(id,imgname)
{
    baseurl = $('#baseurl').text();
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href=baseurl+'/admin/event-inner-img/delete/'+id+'/'+imgname;
    }
}
</script>



@endsection