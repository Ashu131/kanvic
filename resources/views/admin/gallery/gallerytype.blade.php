@extends('admin.master')
@section('content')
@section('css')
<link rel="stylesheet" href="{{url('resources/assets/admin/css/gallery.css')}}"></script>
@endsection
<div class="col-md-12">
<div class="block block-themed">
    <div class="block-content">
        <form class="form-horizontal page-form push-10-t push-10" action="{{route('gallery.post.page')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-xs-12">

            <select name="gallery_type" id="gallery_type" class="form-control">
               <!-- <option value="1">gallery 1</option>
                <option value="2">gallery 2</option>
                <option value="3">gallery 3</option>-->

                @foreach($data['gallery_type'] as $gallerytype)
                <option value="{{$gallerytype->gallery_type}}" @if($gallerytype->gallery_type==$galleryid)selected @endif>{{$gallerytype->name}}</option>
                @endforeach

            </select>
            </div></div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input type="file" name="image[]" id="image" multiple />
                        <label for="image">Image</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material floating">
                        <input type="text" name="caption"  class="form-control">
                        <label for="caption">Caption</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material floating">
                        <textarea type="text" name="information" class="form-control"></textarea>
                        <label for="information">Image Information</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material floating">
                         <input type="text" name="link" class="form-control">
                        <label for="link">Link</label>
                    </div>
                </div>
            </div>


                    



      
                 
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="hidden" name="_token" value="{{Session('_token')}}">
                         <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Submit</button>
                </div>
            </div>
             
        </form>
    </div>
</div>
@endsection
            
 