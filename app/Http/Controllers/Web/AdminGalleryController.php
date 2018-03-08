<?php

namespace App\Http\Controllers\Admin;


use App\Gallery_type;
use App\Position;
use App\Gallery;
use Validator;
use Input;
use File;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Storage;
use DB;
use View;
use App\GalleryType;


class AdminGalleryController extends Controller
{
    public static function getModuleFromPosition($position_id)
    {

        $menu = GalleryType::select('gallery_type')->where('gallery_position',$position_id)->first(); //selecting which menu we want


        $gallery_items =AdminGalleryController::traverseGalleryOrder($menu->id_menu,0);



        return view("templates.template_1.modules.gallery",compact('gallery_items'))->render();
    }
    public function showGalleryType()
    {
        $data['positions'] = Position::all(); 

        $data['gallery_type'] = Gallery::all(); //to bring all data from gallery table,this can be use to make index in view

        //  return view('admin.gallery.gallerytype',compact('data')); // to pass array of data to view //to return view to browser
        return View::make('admin.gallery.gallerytype',$data); //can also be used to return view and pass data through it

    }


    public function showGallery()

    {




        $datas['gallery']=GalleryType::all(); //table gallery
        $gallery_type=Input::get('gallery'); //taking out id
        $data['gallery_type'] = Gallery::where('gallery_type', $gallery_type)->get();




        return view('admin.gallery.singlegallery',compact('data','datas'));

    }

    public function showImage()
    {
        return view('admin.page.gallery',compact('data'));
    }

    public function postGalleryType()
    {   

        $destinationPath = 'resources/assets/img/modules/gallery';
        $image = Input::file('image');
        $gallery_type=Input::get('gallery_type');
        $caption = Input::get('caption');
        $information= Input::get('information');
        $id=Input::get('gallery_id');
        $link=Input::get('link');

        if (Input::hasFile('image'))
        {
            for($a=0;$a<count($image);$a++)
            {   
                $data = [];
                $extension = $image[$a]->getClientOriginalExtension();
                $filename  = str_random(6).'.'.$extension;
                $image[$a]->move($destinationPath, $filename);
                $gallery = new Gallery;
                $gallery->filename=$filename ;
                $gallery->caption=$caption;
                $gallery ->gallery_type=$gallery_type;
                $gallery->information=$information;
                $gallery ->link =$link;
                $gallery->save(); 



            }


        }




        $success = " Success";
        return Redirect::back()->with(compact('success'));
    }
    public function postGallery($gallery_type)
    {
        $destinationPath = 'resources/assets/img/modules/gallery';
        $image = Input::file('image');
        $id=Input::get('gallery_id');

        if (Input::hasFile('image'))
        {
            for($a=0;$a<count($image);$a++)
            {   
                $data = [];
                $extension = $image[$a]->getClientOriginalExtension();
                $filename  = str_random(6).'.'.$extension;
                $image[$a]->move($destinationPath, $filename);


                $gallery = new Gallery;
                $gallery->filename=$filename ;
                $gallery ->gallery_type=$gallery_type;

                $gallery->save(); 



            }

        }






        $success = " Success";
        return Redirect::back()->with(compact('success'));
    }
    public function editGallery($id)
    {

        $data = [];

        $data['gallery_type'] = Gallery::where('id', $id)->get();

        return view('admin.gallery.editgallery',compact('data','datas'));

    }
    public function updateGallery($id)
    {


        $caption = Input::get('caption');
        $information= Input::get('information');
        $gallery = Gallery::find($id);

        $gallery->caption=$caption;
        $gallery->information=$information;
        $gallery->save(); 
        $success = " Success";
        return Redirect::back()->with(compact('success'));

    }


    //    public function deleteImage($id)
    //    {
    //       
    //      
    //       unlink(public_path().'\iiNZz7.jpg');
    //         $gallery = Gallery::find($id);
    //          $data['gallery_type'] = Gallery::where('id', $id)->delete(); 
    //      }
    public function  deleteImage($id)
    {

        $data = [];
        $gallery = Gallery::find($id);

        $file_name = $gallery->filename;

        $destinationPath =  "resources/assets/img/modules/gallery/$file_name";
        File::delete($destinationPath);
        $gallery->delete();


        return Redirect::back()->with(compact('success'));


    }


    public function disableImage($id)

    {
        $status=Input::get('status');
        $gallery = Gallery::find($id);
        $gallery->status=$status;
        $gallery->save();
        return Redirect::back()->with(compact('success'));
    }
    public function enableImage($id)

    {
        $status=Input::get('status');
        $gallery = Gallery::find($id);
        $gallery->status=$status;
        $gallery->save(); 
        return Redirect::back()->with(compact('success'));
    }

    public function showGallery($gallery_type)
    {
        $data['positions'] = Position::all();
        $data['gallery_type'] = Gallery_type::all();
        $data['this_menu'] = Gallery_type::find($gallery_type);

        // $data['gallery'] = AdminGalleryController::traverseGalleryOrderView($gallery_id,0);
        return view('admin.gallery.gallery',compact('data'));
    }
    public function createGallerySingle()
        
    {
       
         $data = [
            'gallery_name' => Input::get('gallery_name'),
            'gallery_position' => Input::get('gallery_position'),
            'gallery_type_id' => Input::get('gallery_type_id'),
            'gallery_page_id' => Input::get('gallery_page_id'),
            'open_in' => Input::get('open_in'),
            'enable' => Input::get('enable'), 
            'gallery_url' => Input::get('gallery_url'),
            'gallery_class' => Input::get('gallery_class'),
            'gallery_id' => Input::get('gallery_id'),
            
        ];

        $gallery_item = new Gallery;
      //  $_item->gallery_name = $data['gallery_name'];
        $gallery_item->gallery_type = $data['gallery_type_id'];
        if(!empty($data['gallery_url'])){
            $gallery_item->gallery_url = $data['gallery_url'];
            $gallery_item->open_in = $data['open_in'];
        }
        if(!empty($data['gallery_page_id']))
            $menu_item->menu_page_id = $data['menu_page_id'];
        if(!empty($data['enable']))
            $menu_item->enable = $data['enable'];
        if(!empty($data['gallery_class']))
            $menu_item->menu_item_class = $data['menu_class'];
        if(!empty($data['gallery_id']))
            $menu_item->menu_item_id = $data['gallery_id'];        
        $gallery_item->parent_id = 0;
        $gallery_item->gallery_order = Gallery::where('gallery_type',$data['gallery_type_id'])->count();
        $gallery_item->save();

        $success = "Menu Created Successfully";
        return Redirect::back()->with(compact('success'));
        
        
        
    }
    









}
