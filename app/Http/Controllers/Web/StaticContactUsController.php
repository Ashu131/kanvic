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
use App\Models\ContactUs;


use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class StaticContactUsController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
    	$contact_us  = ContactUs::select('call_us','email_us','visit_us')->first();
        return view("templates.contact_us.modules.static_contact_us",compact('contact_us'));
    }
}