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
use App\Models\Testimonial;


use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class TestimonialController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
        $testimonials       = Testimonial::orderBy('order_no','ASC')->get();
        return view("templates.template_1.modules.testimonial",compact('testimonials'))->render();
    }
    
}