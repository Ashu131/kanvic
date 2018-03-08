@extends('admin.master')
@section('content')

<div class="block block-themed">
    <div class="block-content">
        <form class="form-horizontal page-form push-10-t push-10" action="{{route('postuploadimage.page')}}" method="post" enctype="multipart/form-data">

<select name="gallery_type" id="gallery_type" class="form-control">
             <option value="g1">gallery 1</option>
  <option value="2gg">gallery 2</option>
  <option value="3ggg">gallery 3</option>
  <option value="4ggg">gallery 4</option>
</select>
            
           

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
                     <a href = "{{route('viewoptions.page')}}">BACK TO VIEW PAGE</a>
                </div>
            </div>
             
        </form>
    </div>
</div>
@endsection