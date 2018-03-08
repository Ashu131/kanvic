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
use App\Models\Slider;
use App\Models\SliderType;


use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SliderController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
        //$gallery    = SliderType::select('slider_type')->where('slider_position',$position_id)->first(); //selecting which gallery we want
        $gallery_items = Slider::orderBy('created_at', 'ASC')->get();
        //$gallery_items->setPath('press-release');
        return view("templates.template_1.modules.slider",compact('gallery_items'))->render();
    }
    
}