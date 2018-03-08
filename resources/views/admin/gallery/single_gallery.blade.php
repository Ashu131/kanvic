@extends('admin.master')

@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/nestable/jquery.nestable.css')}}"></script>
@endsection

@section('content')

<div class="block block-themed">
    <div class="block-header bg-primary">                
        <h3 class="block-title">Edit Gallery </h3>
    </div>
    <div class="block-content">
        
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('failure'))
        <div class="alert alert-danger" role="alert">{{Session::get('failure')}}</div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="dd">
                    <ol class="dd-list">
                        @foreach($data['gallery_type']as $gallery_type)
                                <li class='dd-item pb-i-20' data-id='{{$gallery_type->id}}'>
                                        <div class="dd-handle dd3-handle col-md-1">Drag</div>
                                        <div class='effect-1 clearfix'>
                                            <div class="img-style-gallery col-md-3">
                                                @if($gallery_type->filename!="")
                                                <img class="img" src="{{url('resources/assets/img/modules/gallery/thumb/'.$gallery_type->filename)}}">
                                                @else
                                                <span>Image Not Available,Please Upload Image</span>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="col-md-5">
                                                    <div class="view-info">
                                                        <div class="col-md-12">
                                                            Caption : <span>{{$gallery_type->caption}}</span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            Link : <span>{{$gallery_type->link}}</span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            Information : <span>{{$gallery_type->information}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="edit-info">
                                                        <form action="{{route('update.gallery',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 pt15">
                                                                    <div class="form-material">
                                                                       <input type="text" class="form-control" id="caption" name="caption" value="{{$gallery_type->caption}}"/>
                                                                        <label for="caption">Caption</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xs-12 pt15">
                                                                    <div class="form-material">
                                                                       <input type="text" class="form-control" id="link" name="link" value="{{$gallery_type->link}}"/>
                                                                        <label for="link">link</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <div class="col-xs-12 pt15">
                                                                    <div class="form-material">
                                                                       <textarea class="form-control" name="information">{{$gallery_type->information}}</textarea>
                                                                    <label for="information">Information</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <div class="col-xs-12 pt15">
                                                                    <div class="form-material">
                                                                        <input type="file" id="gallery_image" name="gallery_image">
                                                                        <label for="gallery_image">Images</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <div class="col-xs-12 pt15">
                                                                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                                                                    <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i> Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="btn-group btn-group-sm">
                                                            
                                                        @if ($gallery_type->status == "0") 
                                                            <button data-disable-url="{{route('disable.gallery.image',$gallery_type->id)}}" class="btn e-dis-able-btn btn-success" name="status" type="button" value="1">
                                                                <i class="fa fa-send push-5-r"></i>Enable
                                                            </button>
                                                        @else 
                                                            <button data-disable-url="{{route('disable.gallery.image',$gallery_type->id)}}" class="btn e-dis-able-btn btn-success " name="status" type="button" value="0">
                                                                <i class="fa fa-send push-5-r"></i>Disable
                                                            </button>
                                                        @endif

                                                        <a class="btn edit-btn btn-warning" data-edit-url="{{$gallery_type->id}}">
                                                            <i class="fa fa-pencil"></i>Edit
                                                        </a>
                                                        <a class="btn delete-btn btn-danger" data-delete-url="{{route('deleteimage.page',$gallery_type->id)}}">
                                                            <i class="fa fa-times"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </li>   
                        @endforeach
                    </ol>
                </div>
                <form class="form-horizontal push-10-t push-10" action="{{route('order.gallery.single')}}" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="image_order" name="image_order" value="">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit">Submit</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/nestable/jquery.nestable.js')}}"></script>

<script>
    $(document).ready(function(){
        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
                console.log(output)
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        $('.dd').nestable().on('change', updateOutput);        
        updateOutput($('.dd').data('output', $('#image_order')));        

        $('#nestable').nestable({
            group: 1
        })
            .on('change', updateOutput);
        updateOutput($('#nestable').data('output', $('#image_order')));


    });
</script>

<script>
    $(document).on("click",".e-dis-able-btn",function(e){
        e.preventDefault();
        var disableUrl = $(this).attr('data-disable-url');
        token   = "{{Session('_token')}}";
        status  = $(this).val();
        $.ajax({
          method: "POST",
          url: disableUrl,
          data: { 
                    status:status,
                    _token: token
                },
          success:function(data)
          {
           window.location.reload();
          }
        });
    });

    $(document).on("click",".edit-btn",function(e){
        e.preventDefault();
        var editUrl = $(this).attr('data-edit-url');

        $(this).parents('li').find('.view-info').toggleClass('hide');
        $(this).parents('li').find('.edit-info').toggleClass('show');
            
    });

    $(document).on("click",".delete-btn",function(e){
        e.preventDefault();
        var deleteUrl = $(this).attr('data-delete-url');
        token   = "{{Session('_token')}}";
         $.ajax({
          method: "POST",
          url: deleteUrl,
          data: { 
                    _token: token
                },
          success:function(data)
          {
            window.location.reload();
          }
        });
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