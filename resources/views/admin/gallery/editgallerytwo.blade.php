@extends('admin.master')

@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/js/plugins/nestable/jquery.nestable.css')}}"></script>
@endsection





@section('content')
<h3>Filenames</h3><br>
  
      
    
<div class="row items-push js-gallery-advanced">
    @foreach($data['gallery_type']as $gallery_type)
   
    <div class="col-sm-6 col-md-4 col-lg-3 animated fadeIn">
        <div class="img-container fx-img-rotate-r">
            <img class="img img-responsive" src="{{url('resources/assets/admin/img/modules/gallery/'.$gallery_type->filename)}}">
            <div class="img-options">
                <div class="img-options-content">
                    <h3 class="font-w400 text-white push-5">Image Caption</h3>
                    <h4 class="h6 font-w400 text-white-op push-15">Some Extra Info</h4>
                    <a class="btn btn-sm btn-default img-lightbox" href="{{url('resources/assets/admin/img/modules/gallery/'.$gallery_type->filename)}}">
                        <i class="fa fa-search-plus"></i> View
                    </a>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                        
                        <a class="btn btn-default" href="javascript:void(0)"><i class="fa fa-times"></i> Delete</a>
                      
                    </div>
                </div>
                
            </div>
        </div>
          <div class="col-lg-6">
               <form action="{{route('updategallery.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
        <label  for= "title">Caption</label>
              
                    <input type="text" name="caption" placeholder="title" class="post_input title form-control" value="{{$gallery_type->caption}}">
                    
                </div>
         <div class="col-lg-6">
           <label class="">Image information</label>
                        <textarea type="text" name="information" > {{$gallery_type->information}}
                    </textarea>
                        </div>
         <input type="hidden" name="_token" value="{{Session('_token')}}">
    
       <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>update</button>
    </div> 
    
   
    @endforeach

</div>
 
<div class="form-group">

    

    
            
        <div class="form-group">
      <div class="col-xs-12">
                <div class="form-material">
                    <div class="col-md-10" id="image">

                        <input type="file" name="image[]" multiple  />

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="hidden" name="_token" value="{{Session('_token')}}">
                       
                    </div>
                </div>
 </form>
            </form>
        </div>
        </div>


 <form action="{{route('deleteimage.page',$gallery_type->id)}}" method="post" enctype="multipart/form-data">
    
        <input type="hidden" name="_token" value="{{Session('_token')}}">
    
       <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Delete</button>
</form>
<form action="{{route('disableimage.page',$gallery_type->id)}}" method="post">
     @foreach($data['gallery_type']as $gallery_type)
    
        
            <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" name="status" type="submit" value="0"><i class="fa fa-send push-5-r"></i>enable</button>

                      
  @endforeach
</form>
  <form action="{{route('disableimage.page',$gallery_type->id)}}" method="post">
     @foreach($data['gallery_type']as $gallery_type)
    
        
            <input type="hidden" name="_token" value="{{Session('_token')}}">
                        <button class="btn btn-sm btn-info" name="status" type="submit" value="1" ><i class="fa fa-send push-5-r"></i>Enable</button>

  @endforeach
    
</form>
    @endsection



