<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Menu;
use App\Models\Gallery;
use App\Models\GalleryType;
use App\Models\Page;
use App\Models\MenuItem;
use App\Models\Position;
use App\Models\Template;
use App\Models\TemplatePosition;
use App\Models\Module;
use App\Models\FormType;
use App\Models\FormField;
use Auth;
use Validator;
use Input;
use Redirect;
use App\Models\Cart;
use App\Models\ProductsImages;
use App\Models\Categories;
use App\Models\Products;
use DB;
use Session;
use GeoIP;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ProductsController extends Controller
{

    public function getListproducts($slug)
    {

        $categories = Categories::where('slug',$slug)->first();
        $catId      = $categories->id;
        $data['catName'] = $categories->category_name;
        $allproductsList = array();
        $childId = Categories::select('id')->where('pareent_id',$catId)->get();
        if(!empty($childId[0]))
        {
            $idsArray = array();
            foreach ($childId as $key => $value) {
                $idsArray[$key] = $value['id'];
            }
            $key = $key+1;
            $idsArray[$key] = $catId;
            $productsList = Products::whereIn('product_categorie',$idsArray)->where('lookbuy_status','=','1')->orderBy('product_order', 'ASC')->get();    
        }
        else
        {
            //$data['productsList'] = Products::where('product_categorie',$catId)->get();
            $productsList = Products::where('product_categorie',$catId)->where('lookbuy_status','=','1')->orderBy('product_order', 'ASC')->get();    
        }

        
        foreach ($productsList as $key => $value) {
            $productImages = ProductsImages::where('product_id',$value->id)->where('cover_photo','1')->first();
            
            if(!empty($productImages))
            {
                $value['productImage'] = $productImages['image_path'];
            }

            $allproductsList[$key] = $value;
        }

        $data['productsList'] = $allproductsList;
		
        return view('shobha.productview',compact('data'));
    }
    
    
    
    public function geLookBookproducts($slug)
    {
        $categories = Categories::where('slug',$slug)->first();
        $catId      = $categories->id;
        $data['catName'] = $categories->category_name;
        $allproductsList = array();
        $childId = Categories::select('id')->where('pareent_id',$catId)->get();
        if(!empty($childId[0]))
        {
            $idsArray = array();
            foreach ($childId as $key => $value) {
                $idsArray[$key] = $value['id'];
            }
            $key = $key+1;
            $idsArray[$key] = $catId;
          $productsList = Products::whereIn('product_categorie',$idsArray)->where('lookbuy_status','=','0')->orderBy('product_order', 'ASC')->get(); 
        
        }
        else
        {
            
            //$data['productsList'] = Products::where('product_categorie',$catId)->get();
           $productsList = Products::where('product_categorie',$catId)->where('lookbuy_status','=','0')->orderBy('product_order', 'ASC')->get();    
        }

        
        foreach ($productsList as $key => $value) {
            $productImages = ProductsImages::where('product_id',$value->id)->where('cover_photo','1')->first();
            
            if(!empty($productImages))
            {
              $value['productImage'] = $productImages['image_path'];
            }

            $allproductsList[$key] = $value;
        }

       $data['productsList'] = $allproductsList;
		
        return view('shobha.lookbookproduct',compact('data'));
    }  
    
    
    
    
    
    

    
    
    
      public function ProductCompareShow()
    {
   
          if(Input::has('productcompareid'))
          {
            $productid = Input::get('productcompareid');  
            Session::put('compareproid', $productid);
            }
          else{
            $productid = Session::get('compareproid');
              
          }
            //$data['productsList'] = Products::where('product_categorie',$catId)->get();
           $productsList = Products::whereIn('id',$productid)->orderBy('product_order', 'ASC')->get();    
        
          
          
          
          foreach ($productsList as $key => $value) {
            $productImages = ProductsImages::where('product_id',$value->id)->where('cover_photo','1')->first();
            
            $categories     = Categories::where('id',$value->product_categorie)->first();
            
            $data['category'] = $categories; 
            
            if(!empty($productImages))
            {
                $value['productImage'] = $productImages['image_path'];
            }

            $allproductsList[$key] = $value;
        }

        $data['productsList'] = $allproductsList;
		
        return view('shobha.compareproducts',compact('data'));
    }    
    
    
    
    
    
    
    
    
    

    public function productDetils($id)
    {
    
        $country = Session::get('country');
    
        $productDelits = Products::find($id);
        $productImages  = ProductsImages::where('product_id',$id)->get();
        $categories     = Categories::where('id',$productDelits['product_categorie'])->first();
       $categorieid  = $categories->id;
        
        $data['catdata'] = $categories;
        $productImagesCover = ProductsImages::where('product_id',$id)->where('cover_photo','1')->first();
        $data['productImagesCover'] = $productImagesCover;
        
        $data['productDelits'] = $productDelits;
        $data['productImages'] = $productImages;
        
        
      $productsList = Products::select('products.id')->where('product_categorie',$categorieid)->join('products_images','products_images.product_id','=','products.id')->where('cover_photo','1')->orderByRaw("RAND()")->take(4)->get();  
      foreach ($productsList as $key => $value) {
            $productImages = ProductsImages::where('product_id',$value->id)->where('cover_photo','1')->first();
            $single_product = Products::where('id',$value->id)->first()->toArray();
            $categories     = Categories::where('id',$value->product_categorie)->first();
            
            $data['category'] = $categories; 
            $value['productImage'] = "";
            if(!empty($productImages))
            {
                $single_product['productImage'] = $productImages['image_path'];
            }

            $allproductsList[$key] = $single_product;
        }
        $data['productsList'] = $allproductsList;     
        return view('shobha.productdetils',compact('data'));
    }

    public function productAddcart()
    {
        $country = Session::get('country');
       $productid = Input::get('productId');

        $userData = array();
       // $postData = Input::all();
        $userData = Auth::user();
        $userId  = '';
        $str = '';
        if(!empty($userData) && $userData['user_type'] != 1);
        {
            $userId = $userData['id'];
        }
        if(Session::has('product_incart'))
        {
            $productincart = Session::get('product_incart');
            if(!in_array($productid, $productincart))
            {
           Session::push('product_incart',$productid);
                $status ='success';
           }
           
        }
        else
        { 
            Session::push('product_incart',$productid);
            $status ='success';
        }
    
        //$cart = new Cart;
       // $cart->user_id = $userId;
       // $cart->product_id = $postData['productid'];
       // $cart->save();
       // if(!empty($cart->id))
        //{
           $productDelits = Products::find($productid);
        
        if($country=="India")
        {
            $price = $productDelits['price_inr'];
        }
        else
        {
           $price = $productDelits['price_dollar'];  
        }
        
            $productImagesCover = ProductsImages::where('product_id',$productid)->first();
        $qty = $productDelits['min_order_qty'];
        
            $str = '<div class="item pull-left">
                        <img height="60" width="60" src="'.url('').'/uploads/'.$productImagesCover['image_path'].'" alt="'.$productDelits['product_name'].'" class="pull-left">
                        <div class="pull-left">
                            <p>'.$productDelits['product_name'].'</p>
                            <p>'.$price.'<strong>x '.$qty.'</strong></p>
                        </div>
                        <a href="'.url('').'/remove-cartproduct/'.$productid.'" class="pull-right"><i class="icon-trash icon-large pull-left"></i></a>
                    </div>';

           
       // }
    return json_encode(array("detail"=>$str,"unitprice"=>$price,"qty"=>$qty,"status"=>$status));    
        
        
        
        
       // return $str;

    }

    public function removeProductAddcart($id)
    {
       // $userData = Auth::user();
        //$userId = $userData['id'];
        //DB::table('cart')->where('id', '=', $id)->delete();
        $cartitems = Session::get('product_incart');

        foreach ($cartitems as $index => $product) {
            if ($product == $id) {
                unset($cartitems[$index]);
            }
        }
        session(['product_incart' => $cartitems]);    
       
        //$success = "product remove Successfully";
        return Redirect::back()->with(compact('success delete'));
    }

    public function productInquery()
    {
        $userData = Auth::user();
        $userId = $userData['id'];
        $data['productList'] = DB::table('cart')->where('user_id', '=', $userId)->get();
        return view('shobha.inquery',compact('data'));
    }
    
    
 public function AddCompare()
 {
    $productid = Input::get('productId');
    $pro_detail = Products::where('id',$productid)->first();
    $productImages = ProductsImages::where('product_id',$pro_detail->id)->where('cover_photo','1')->first(); 
    $productname =  $pro_detail->product_name;
     $pronamelength = strlen($productname);
     if($pronamelength>20)
     {
     $newproname = substr($productname, 0, 20).'...';
     }
     else
         $newproname = $productname;
     
     
    $compareprodetail = '<div class="product com_pro_block" id="pro_'.$productid.'">
    <figure class="figure-hover-overlay">                                                                        
         
              <img src="'.url('').'/uploads/'.$productImages->image_path.'" alt="Image" class="img-responsive">
              <span class="bar"></span>
      </figure>
    
    
    
   
                            <div class="product-caption">'.$newproname.'</div>
                            <span class="deletecompare" data-id="'.$productid.'">X</span>
                           
                            
                            </div>
                            '; 
     
     return $compareprodetail; 
     
     
 }
    
    
    public function ViewCartDetails()
    {
        
       $country = Session::get('country');
            
        $productid = Session::get('product_incart');
    
        if(count($productid)>0)
        {
            $productsList = Products::whereIn('id',$productid)->orderBy('product_order', 'ASC')->get();    
      foreach ($productsList as $key => $value) {
          
          
          if($country=='India')
          {
              $productprice = Products::where('id',$value->id)->first();
               $value['price'] = $productprice->price_inr;
          }
          else
          {
              $productprice = Products::where('id',$value->id)->first();
              $value['price'] = $productprice->price_dollar;
          }
            $productImages = ProductsImages::where('product_id',$value->id)->where('cover_photo','1')->first();
            $categories     = Categories::where('id',$value->product_categorie)->first();
            $data['category'] = $categories; 
            $value['productImage'] = $productImages['image_path'];
           $allproductsList[$key] = $value;
        }
        $data['productsList'] = $allproductsList;
            
        }
       else
       {
         $data['productsList'] = '';
       }
        return view('shobha.viewcart',compact('data'));
    }
    
    
    
    
    
}