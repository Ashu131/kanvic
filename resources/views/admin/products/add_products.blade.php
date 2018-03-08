
@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="block block-themed">
            <div class="block-header bg-primary"> 
             <h3 class="block-title">Add New Products </h3>
            </div>
            <div class="block-content">
                <form enctype="multipart/form-data" class="form-horizontal push-10-t push-10 page-form" action="{{url('admin/addproducts')}}" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" required="required" type="text" id="product_name"  name="product_name">
                                <label for="product_name">Products Name</label>
                            </div>
                        <div id="product_name-error" class="help-block animated fadeInDown errormsg">{{$errors->first('product_name')}}</div>    
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="" value="" name="product_weight"> 
                                <label for="product_weight">Product Weight</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="" value="" name="product_hight"> 
                                <label for="product_hight">Product Hight</label>
                            </div>
                        </div>
                    </div>
                                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="" type="text" id=""  name="price_inr"> 
                                <label for="product_hight">Price in INR</label>
                            </div>
                            <div id="price_inr-error" class="help-block animated fadeInDown errormsg">{{$errors->first('price_inr')}}</div>        
                        </div>
                    </div>
                    
                  <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" value="" type="text" id=""  name="price_dollar"> 
                                <label for="product_hight">Price in USD</label>
                            </div>
                        <div id="price_inr-error" class="help-block animated fadeInDown errormsg">{{$errors->first('price_dollar')}}</div>
                        </div>
                    </div>    
                    
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" required="required" type="text" id="" placehodler="20 in stock" value="" name="availability"> 
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
                                    
                            @foreach($parent_category as $value)
                                                       
                                    @foreach($subcategory[$value->id] as $sublist)
                                
                                  <option value="{{$sublist['id']}}">{{$sublist['category_name']}}</option>
                                    @endforeach
                                    @if(count($subcategory[$value->id])==0)
                                    <option value="{{$value['id']}}">{{$value['category_name']}}</option>
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
                                <option value="0" selected>Lookbook</option>
                                <option value="1">Buy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <label for="product_description">Product Description</label>
                               <textarea required="required" name="product_description" class="form-control"> Product Description</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material" id="pro_images">
                            <!--<input class="form-control" multiple type="file" id=""  value=""
                             name="productImages">-->
                             
                            <input multiple="true" name="productImages[]" type="file">
                             <label for="product_description">Product Images</label>
                             
                             <span class="adduploadfile">Add</span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="hidden" name="_token" value="{{Session('_token')}}">
                            <button class="btn btn-sm btn-info" type="submit"><i class="fa fa-send push-5-r"></i>Add Product</button>
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