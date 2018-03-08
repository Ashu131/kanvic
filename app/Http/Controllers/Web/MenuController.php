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

class MenuController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
        $menu = Menu::select('id_menu')->where('menu_position',$position_id)->first(); //selecting which menu we want
        $menu_items =MenuController::traverseMenuOrder($menu->id_menu,'0',$page_id);
        return view("templates.template_1.modules.main_menu",compact('menu_items'))->render();
    }
    
    public static function traverseMenuOrder($menu_item_order,$parent,$page_id){
        $menu = MenuItem::where('menu_type_id',$menu_item_order)->where('parent_id',$parent)->where('enable',1)->orderBy('menu_order')->get()->toArray();
        $menu_big = [];
        foreach($menu as $menu_child){
            $menu_inner = [];
            $menu_inner['content'] =  MenuItem::where('id_menu_item',$menu_child['id_menu_item'])->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();
$menu_inner['active'] = 0;         
if($menu_inner['content']['menu_page_id']==$page_id)    
$menu_inner['active'] = 1;         
            $menu_child_count = MenuItem::where('parent_id',$menu_child['id_menu_item'])->where('enable',1)->count();
            if($menu_child_count>0){
                $menu_inner['has_child'] = 1;
                $menu_inner['children'] = MenuController::traverseMenuOrder($menu_item_order,$menu_child['id_menu_item'],$page_id);
            }else
            
            {
                $menu_inner['has_child'] = 0;
                $menu_inner['children'] = [];
            }
            array_push($menu_big,$menu_inner);
        }
        return $menu_big;
    }

}