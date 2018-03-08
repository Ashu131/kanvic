<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Menu;
use App\Models\Page;
use App\Models\MenuItem;
use App\Models\Position;
use App\Models\Template;
use App\Models\TemplatePosition;
use App\Models\Module;

use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class FooterMenuController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
        $menu = Menu::select('id_menu')->where('menu_position',$position_id)->first(); 
        $menu_items =MenuItem::where('menu_type_id',$menu->id_menu)->orderBy('menu_order')->get();
        return view("templates.template_1.modules.footer_menu",compact('menu','menu_items'));
    }
}