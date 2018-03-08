@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="block block-themed">
            <div class="block-header bg-primary"> 
             <h3 class="block-title">Edit {{$data['product']->product_name}} </h3>
            </div>
            <div class="block-content">
                <form enctype="multipart/form-data" class="form-horizontal push-10-t push-10 page-form" action="{{url('products/edit')}}/{{$data['product']->id}}" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            
                            <div class="form-material">
                                 
                                <!--<input required="required" value="{{$data['product']->product_name}}" 
                                class="form-control" type="text" id="product_name"  name="product_name">-->
                                <input value="{{$data['product']->product_name}}" 
                                class="form-control" type="text" id="product_name"  name="product_name">
                                <label for="product_name">Products Name</label>
                            </div>
                        <div id="product_name-error" class="help-block animated fadeInDown errormsg">{{$errors->first('product_name')}}</div>    
                            
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="product_description">Product Description</label>
                               <textarea required="required" name="product_description" class="form-control">{{$data['product']->product_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="{{$data['product']->product_weight}}" 
                                 type="text" id=""  name="product_weight"> 
                                <label for="product_weight">Product Weight</label>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="{{$data['product']->product_hight}}" 
                                 type="text" id=""  name="product_hight"> 
                                <label for="product_hight">Product Height</label>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="{{$data['product']->price_inr}}" type="text" id=""  name="price_inr"> 
                                <label for="product_hight">Price in INR</label>
                            </div>
                            <div id="price_inr-error" class="help-block animated fadeInDown errormsg">{{$errors->first('price_inr')}}</div>        
                        </div>
                    </div>
                    
                  <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="{{$data['product']->price_dollar}}" type="text" id=""  name="price_dollar"> 
                                <label for="product_hight">Price in USD</label>
                            </div>
                        <div id="price_inr-error" class="help-block animated fadeInDown errormsg">{{$errors->first('price_dollar')}}</div>
                        </div>
                    </div>
                
                    
                    
                    
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="{{$data['product']->availability}}"
                                 required="required" type="text" id="" 
                                 placehodler="20 in stock"  name="availability"> 
                                <label for="product_hight">Availability</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="product_hight">Product Category</label>
                                <select required="required" name="product_categorie">
                                <option value="0"> Select Category </option>
                                @foreach($categoriesList as $value)
                                                       
                                    @foreach($subcategory[$value->id] as $sublist)
                                <?php $select = ''; if($data['product']->product_categorie == $sublist['id']) { $select = 'selected="selected"';} ?>
                                  <option {{$select}} value="{{$sublist['id']}}">{{$sublist['category_name']}}</option>
                                    @endforeach
                                                                        
                                    <?php $select = ''; if($data['product']->product_categorie == $value['id']) { $select = 'selected="selected"';} ?>
                                    @if(count($subcategory[$value->id])==0)
                                    <option {{$select}} value="{{$value['id']}}">{{$value['category_name']}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                        <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="product_status">Product show status</label>
                                <select required="required" name="lookbuy_status">
                                <option value="0" @if($data['product']->lookbuy_status)==0) selected="selected" @endif>Lookbook</option>
                                <option value="1" @if($data['product']->lookbuy_status)==1) selected="selected" @endif>Buy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="product_hight">Product Status</label>
                                <select required="required" name="status">
                                    <option <?php if($data['product']->status == 0) { echo'selected="selected"';} ?> value="0">Hidden</option>
                                    <option <?php if($data['product']->status == 1) { echo'selected="selected"';} ?> value="1">Public</option>
                                    <option <?php if($data['product']->status == 2) { echo'selected="selected"';} ?> value="2">Private</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material" id="pro_images">
                                                  
                            <input multiple="true" name="productImages[]" type="file">
                                <label for="product_description">Product Images</label>
                                
                                 <span class="adduploadfile">Add</span>
								<div class="thumbimglist">
                                @foreach($data['productImages'] as $images)
                                <div class="imagebox">
                                	@if($images['cover_photo'] == 1)
                                    <i class="fa fa-check coverphoto"></i>
                                    @endif
                                
                                
                                	<div class="btnbox">
                                	@if($images['cover_photo'] != 1)
                                	<a href="imageCoverImage/{{$images['id']}}">Make It Cover</a>
                                	@endif
                                    <a href="imageDelete/{{$images['id']}}" class="del">Delete</a>
                               		</div>
                                <img src="{{url('uploads/'.$images['image_path'])}}"  height="200" width="300" />
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 <a href = "{{url('/admin')}}">BACK TO VIEW PAGE</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{url('resources/assets/admin/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/pages/base_forms_validation.js')}}"></script>
<script>
$(".adduploadfile")	.click(function(){
	
	$('#pro_images').prepend('<input multiple="true" name="productImages[]" type="file">');
	
});

</script>


@endsection