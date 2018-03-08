<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Position;
use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminMenuController extends Controller
{
    public $tra_level = 0;

    public function showMenuType()
    {
        $data['positions'] = Position::all();  
        $data['menu_type'] = Menu::where('enable',0)->get();  
        $data['active'] = "menu";
        return view('admin.menu.menu_type',compact('data'));
    }

    public function newMenu()
    {
        $data['positions'] = Position::all();  
        $data['menu_type'] = Menu::all(); 
        $data['menu_item'] = MenuItem::all();
        $data['active'] = "menu";  
        return view('admin.menu.new_menu',compact('data'));
    }

    

    public function createMenuType()
    {
        $menu_position = Input::get('menu_position');
        
        $enable = Input::get('enable');

        $data = [
            'menu_type_name' => Input::get('menu_type_name')
        ];

        $rules = [
            'menu_type_name' => 'required'
        ];

        $validator = Validator::make($data, $rules);
        if($validator->fails())
        {
            $failure = "Please enter menu type name";
            return Redirect::back()->with(compact('failure'));
        }


        $menu = new Menu;
        $menu->menu_type_name = $data['menu_type_name'];
        $menu->menu_position  = $menu_position;

        if(Input::has('desktop'))
        $menu->desktop = Input::get('desktop');

        if(Input::has('tablet'))
        $menu->tablet =  Input::get('tablet');

        if(Input::has('mobile'))
        $menu->mobile =  Input::get('mobile');

        $menu->enable =  $enable;
        $menu->save();
        $success = "Menu Type Created Successfully";
        return Redirect::back()->with(compact('success'));
    }

    public function showMenu($menu_id)
    {
        $data['positions'] = Position::all();
        $data['menu_type'] = Menu::all();
        $data['active'] = "menu";

        //  $menu_name= Menu::where('id_menu',$menu_id)->pluck('menu_type_name');
        
        // $project_slug = strtolower(str_replace(' ','_',$project_name));
        // return $menu_name;
       
        $data['this_menu'] = Menu::find($menu_id);
        $data['page'] = Page::all();
        $data['menu'] = AdminMenuController::traverseMenuOrderView($menu_id,0);
        return view('admin.menu.menu',compact('data'));
    }

    public function getEditMenu($id)
    {
        $data['menu_item'] = MenuItem::where('id_menu_item',$id)->first();  
        $data['page'] = Page::all();

        $data['this_menu'] = Menu::find($data['menu_item']->menu_type_id);
        $data['view'] = view('admin.menu.create_menu_item',compact('data'))->render();
        return $data;
    }

    public function editMenu($id)
    {
        $data = [
            'menu_name' => Input::get('menu_name'),
            'menu_position' => Input::get('menu_position'),
            'menu_type_id' => Input::get('menu_type_id'),
            'menu_page_id' => Input::get('menu_page_id'),
            'open_in' => Input::get('open_in'),
            'enable' => Input::get('enable'), 
            'menu_url' => Input::get('menu_url'),
            'menu_class' => Input::get('menu_class'),
            'menu_id' => Input::get('menu_id'),
        ];

        $rules = [
            'menu_name' => 'required'
        ];

         $validator = Validator::make($data, $rules);
        if($validator->fails())
        {
            $failure = "Please fill name of menu";
            return Redirect::back()->with(compact('failure'));
        }
        $menu_item  = MenuItem::find($id);
        
        $menu_item->menu_name = $data['menu_name'];
        $menu_item->menu_type_id = $data['menu_type_id'];
        if(!empty($data['menu_url'])){
            $menu_item->menu_url = $data['menu_url'];
            $menu_item->open_in = $data['open_in'];
        }
        if(!empty($data['menu_page_id']))
            $menu_item->menu_page_id = $data['menu_page_id'];
        if(!empty($data['enable']))
            $menu_item->enable = $data['enable'];
        if(!empty($data['menu_class']))
            $menu_item->menu_item_class = $data['menu_class'];
        if(!empty($data['menu_id']))
            $menu_item->menu_item_id = $data['menu_id'];        

        $menu_item->save();
        
        $success = "Menu Iteam Update Successfully";
        return Redirect::back()->with(compact('success'));
    }


    public function createMenuSingle($id)
    {
        $data = [
            'menu_name' => Input::get('menu_name'),
            'menu_position' => Input::get('menu_position'),
            'menu_type_id' => Input::get('menu_type_id'),
            'menu_page_id' => Input::get('menu_page_id'),
            'open_in' => Input::get('open_in'),
            'enable' => Input::get('enable'), 
            'menu_url' => Input::get('menu_url'),
            'menu_class' => Input::get('menu_class'),
            'menu_id' => Input::get('menu_id'),
        ];

        $rules = [
            'menu_name' => 'required'
        ];

         $validator = Validator::make($data, $rules);
        if($validator->fails())
        {
            $failure = "Please fill name of menu";
            return Redirect::back()->with(compact('failure'));
        }

        $menu_item = new MenuItem;
        $menu_item->menu_name = $data['menu_name'];
        $menu_item->menu_type_id = $data['menu_type_id'];
        if(!empty($data['menu_url'])){
            $menu_item->menu_url = $data['menu_url'];
            $menu_item->open_in = $data['open_in'];
        }
        if(!empty($data['menu_page_id']))
            $menu_item->menu_page_id = $data['menu_page_id'];
        if(!empty($data['enable']))
            $menu_item->enable = $data['enable'];
        if(!empty($data['menu_class']))
            $menu_item->menu_item_class = $data['menu_class'];
        if(!empty($data['menu_id']))
            $menu_item->menu_item_id = $data['menu_id'];        
        $menu_item->parent_id = 0;
        $menu_item->menu_order = MenuItem::where('menu_type_id',$data['menu_type_id'])->count();
        $menu_item->save();

        $success = "Menu Created Successfully";
        return Redirect::back()->with(compact('success'));
    }

    public function orderMenuSingle($menu_id){
        $menu_item_order = json_decode(Input::get('menu_order'));
        AdminMenuController::traverseMenuOrder($menu_item_order,0,0);
        $success = "Menu Order Changes Successfully";
        return Redirect::back()->with(compact('success'));
    }

    public static function traverseMenuOrder($menu_item_order,$parent,$tra_level){
        $j=0;
        foreach($menu_item_order as $order){
            $j++;
            $menu_item_item = MenuItem::find($order->id);
            $menu_item_item->parent_id = $parent;
            if(isset($order->children)){
                AdminMenuController::traverseMenuOrder($order->children,$order->id,$j);
            }
            $menu_item_item->menu_order = $j;
            $menu_item_item->save();

        }
    }

    public static function traverseMenuOrderView($menu_item_order,$parent)
    {
        $menu = MenuItem::where('menu_type_id',$menu_item_order)->where('parent_id',$parent)->orderBy('menu_order')->get()->toArray();
        $menu_big = [];
        foreach($menu as $menu_child){
            $menu_inner = [];
            $menu_inner['content'] =  MenuItem::where('id_menu_item',$menu_child['id_menu_item'])->first();
          
            $menu_child_count = MenuItem::where('parent_id',$menu_child['id_menu_item'])->count();
            if($menu_child_count>0){
                $menu_inner['has_child'] = 1;
                $menu_inner['children'] = AdminMenuController::traverseMenuOrderView($menu_item_order,$menu_child['id_menu_item']);
            }else{
                $menu_inner['has_child'] = 0;
                $menu_inner['children'] = [];
            }
            array_push($menu_big,$menu_inner);
        }
        return $menu_big;
    }
}
