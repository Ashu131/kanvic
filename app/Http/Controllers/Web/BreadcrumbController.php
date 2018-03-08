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
use Response;
use Validator;
use Input;
use Redirect;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class BreadcrumbController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id){

        $menu = MenuItem::where('menu_page_id',$page_id)->first();
        
        $bread = [];
        $bread_count = 0;
        $pgname = $menu->menu_name;
        while($menu->parent_id != 0){
            
            $sub_menu = MenuItem::where('id_menu_item',$menu->id_menu_item)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();
            $menu = MenuItem::where('id_menu_item',$sub_menu->parent_id)->first();
            $bread[$bread_count++] = "$sub_menu->id_menu_item";

            if($sub_menu!='')
                $pgname = $menu->menu_name;
            
    
        }
            $bread[$bread_count] = "$menu->id_menu_item";
        $bread_count_li = $bread_count;



        $bread_list ='<div class="breadcrum-left"><span>'.$pgname.'</span></div><div class="breadCrumb">';
        
        $bread_list .='<a href="'.url('').'">Home</a>';
        
        while($bread_count_li >=0){
            
            $sub_menu = MenuItem::where('id_menu_item',$bread[$bread_count_li])->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();         
            
            $url = '';
            if($sub_menu->page_slug !="")
            $url = 'href="'.url($sub_menu->page_slug).'"';
            
            $bread_list .= ' > <a '.$url.'>'.$sub_menu->menu_name.'</a>';
            $bread_count_li--;
        }
        $bread_list .= '</div>';
        
        
        
        return $bread_list;
        
        
        $sub_menu = MenuItem::where('menu_page_id',$menu->menu_page_id)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();
        $menu = MenuItem::where('id_menu_item',$sub_menu->parent_id)->first();


//        
//        
        
        return $menu->menu_name;
        
        
        
        
        
        
        
        
        $parent = $menu->parent_id;

        $menu_page_id = $page_id;
        $flag = true;
        $bread_count = 0;
        $bread = [];
        do{
            $bread[$bread_count] = $page_id;

            $parentpage = MenuItem::where('id_menu_item',$menu->parent_id)->first();
            $parent = $parentpage->parent_id;
            $menu = MenuItem::where('menu_page_id',$parentpage->menu_page_id)->first();

            $bread_count++;
        }while($parent!=0);

        $bread[$bread_count] = 0;

        $bread_list = "<ol>";      
        $bread_count_li = $bread_count;

        do{
            $bread_list .= "<li>$bread[$bread_count]</li>";
            $bread_count_li--;
        }while($bread_count_li != 0);
        
        $bread_list .= "</ol>";
            echo $bread_list;
            return 1;
        for($bread_count_li = 0;$bread_count_li = $bread_count;$bread_count_li++){
//            $sub_menu = Page::where('id',$menu->menu_page_id)->first();
//            $pagename = $sub_menu->page_slug;
            $bread_list .= '<li>$bread_count_li</li>';
        }

        $bread_list .= "</ol>";

        echo $bread_list;
        return $bread_list;

        if($menu->parent_id==0)
        {
            $sub_menu = MenuItem::where('menu_page_id',$page_id)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();
            $pagename = $sub_menu->page_slug;	
            $bread = '<a href="'.url($pagename).'">'.$menu->menu_name.'</a>';		
        }
        else
        {
            $sub_menu = Page::where('id',$menu->menu_page_id)->first();
            $pagename = $sub_menu->page_slug;
            $parentpage = MenuItem::where('id_menu_item',$menu->parent_id)->first();
            $bread = '<a href="'.url($pagename).'">'.$parentpage->menu_name.' > ' .$menu->menu_name.'</a>';
        }
        $result = '<div class="breadCrumb"><a href="'.url('').'">Home</a> > '.$bread.'</div>';
        return $result;
    }   








}