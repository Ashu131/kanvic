<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Menu;
use App\Gallery;
use App\GalleryType;
use App\Page;
use App\MenuItem;
use App\Position;
use App\Template;
use App\TemplatePosition;
use App\Module;

use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class GalleryController extends Controller
{
    
    
    public static function getModuleFromPosition($position_id)
    {

        $gallery= GalleryType::select('gallery_type')->where('gallery_position',$position_id)->first(); //selecting which gallery we want
      
        $gallery_items=Gallery::select('filename')->where('gallery_type',$gallery['gallery_type'])->paginate(5);
        $gallery_items->setPath('press-release');
        return view("templates.template_1.modules.gallery",compact('gallery_items'))->render();
    }
    
    
    
    
    
   
    

}