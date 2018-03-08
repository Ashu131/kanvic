@extends('admin.master')


<script type="text/javascript" src="resources/jquery/jquery.js"></script>
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.min.js"></script>


@section('content')
<h3>Filenames</h3><br>
<form class="form-horizontal page-form push-10-t push-10" action="{{route('editgallery.page')}}" method="get" enctype="multipart/form-data">

    <select name="gallery">
        <option>Select gallery</option>
        @foreach($datas['gallery'] as $gallery)
        <option value="{{$gallery->gallery_type}}">{{$gallery->name}}</option>
        @endforeach
    </select>
    <button type="submit">Go</button>
</form>
<div class="row items-push js-gallery-advanced">

    @foreach($data['gallery_type']as $gallery_type)
    <form action="{{route('updategallery.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data"> 


        <div class="col-sm-6 col-md-4 col-lg-3 animated fadeIn">

            <div class="img-container fx-img-rotate-r" style="max-height:270px";>
                <img class="img img-responsive" src="{{url('resources/assets/admin/img/modules/gallery/'.$gallery_type->filename)}}">
                <div class="img-options">
                    <div class="img-options-content">
                        <h1 class="font-w400 text-white push-5">
                            <label class="" style="font-size:24px;    font-family:Times New Roman;">{{$gallery_type->caption}}</label></h3>

                        <h4 class="h6 font-w400 text-white-op push-15">Some Extra Info</h4>

                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="javascript:void(0)" data-toggle="modal" data-target="#myModalview{{$gallery_type->id}} "style="margin-right: 10px"; ><i class="fa fa-search-plus"></i> View</a> &nbsp;
                            <a class="btn btn-default" href="javascript:void(0)" data-toggle="modal" data-target="#myModaledit{{$gallery_type->id}}"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger" href="javascript:void(0)  " data-toggle="modal" data-target="#myModal{{$gallery_type->id}}"><i class="fa fa-times"></i> Delete</a>

                        </div>
                    </div>

                </div>
            </div>

            <input type="hidden" name="_token" value="{{Session('_token')}}">
            </form>



        <form action="{{route('disableimage.page',$gallery_type->id)}}" method="post">
            <input type="hidden" name="_token" value="{{Session('_token')}}">


            <?php



if ($gallery_type->status == "0") 
{

    echo     '<button class="btn btn-sm btn-info" name="status" type="submit" value="1"><i class="fa fa-send push-5-r"></i>Enable</button>';

}
else 
{

    echo     '<button class="btn btn-sm btn-info" name="status" type="submit" value="0"><i class="fa fa-send push-5-r"></i>Disable</button>';

}

            ?>




            </div> 
    </form>

    @endforeach

</div>


@foreach( $data['gallery_type'] as $gallery_type)
<div class="form-group">

    <form action="{{route('show.post.single',$gallery_type->gallery_type)}}" method="post" enctype="multipart/form-data">


        <div class="form-group">
            <div class="col-xs-12">
                <div class="form-material">
                    <div class="col-md-10" id="image">
                        @endforeach

                        <input type="file" name="image[]" multiple  />

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Submit</button>
                    </div>
                </div>
                </form>

        @foreach($data['gallery_type']as $gallery_type)   
            <form action="{{route('deleteimage.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="myModal{{$gallery_type->id}}" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want delete?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="_token" value="{{Session('_token')}}">
                                <button type="submit">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                            </div>
                        </div>

                    </div>
                </div>

                </div>
            </form>
        @endforeach 
        @foreach($data['gallery_type']as $gallery_type)   
        <form action="{{route('updategallery.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="myModaledit{{$gallery_type->id}}" role="dialog">

                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-body">
                                <p>Update</p>
                            </div>
                            <label  for= "title">Caption</label>

                            <input type="text" name="caption" placeholder="title" class="post_input title form-control" value="{{$gallery_type->caption}}">

                        </div>
                        <div class="col-lg-12">

                            <label class="">Image information</label>
                            <textarea type="text" name="information" >{{$gallery_type->information}}</textarea>

                            <input type="hidden" name="_token" value="{{Session('_token')}}">


                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button type="submit">ok</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>

            </div>
            </div>

        </div>
    </form>
		@endforeach
		@foreach($data['gallery_type']as $gallery_type)   
<form action="{{route('updategallery.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="myModalview{{$gallery_type->id}}" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body">
                        <p></p>

                    </div>
                    <label  for="title">Caption</label>

                    <input type="text" name="caption" placeholder="title" class="post_input title form-control" value="{{$gallery_type->caption}}" readonly>

                </div>
                <div class="image" style="width:600px;height:500px; padding-left:20px;padding-right:20px;">
                    <img class="img img-responsive" src="{{url('resources/assets/admin/img/modules/gallery/'.$gallery_type->filename)}}">

                </div>


                <div class="col-lg-12">

                    <label class="">Image information</label>
                    <textarea type="text" name="information" readonly >{{$gallery_type->information}}</textarea>

                    <input type="hidden" name="_token" value="{{Session('_token')}}">


                </div>
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>
    </div>

</div>
</form>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/ZWAGn4yyRMM" frameborder="0" allowfullscreen></iframe>
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    
@endforeach
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gallery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>



    </body>
</html>

<script>
    function myFunction() {
        alert("Are you sure?");
    }
</script>         




@endsection



