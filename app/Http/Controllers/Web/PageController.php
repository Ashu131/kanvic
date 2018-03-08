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
use App\Models\GlobalSetting;
use App\Models\Newsletter;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\Gallery;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\MenuController;
use App\Http\Controllers\Web\SocialInfoController;
use App\Models\PressRelease;
use App\Models\CaseStudies;


class PageController extends Controller
{

    public function getPage($id)
    {
        $searchquery = '';
        $searchdata = '';
        // $searchdata['fulldata']='';

        $searchstatus = '';

        if($id==154)
        {
           $searchstatus = 1;
           $searchquery = Input::get('query');
           $searchdata['pd_title'] =  Page::where('title','LIKE','%'.$searchquery.'%')->get(); 
           $searchdata['pd_content'] =  Page::where('content','LIKE','%'.$searchquery.'%')->get(); 
           $searchdata['article_data_title'] =  PressRelease::where('title','LIKE','%'.$searchquery.'%')->get(); 
           $searchdata['article_data_content'] =  PressRelease::where('content','LIKE','%'.$searchquery.'%')->get(); 
           $searchdata['cs_data_title'] =  CaseStudies::where('title','LIKE','%'.$searchquery.'%')->get(); 
           $searchdata['cs_data_content'] =  CaseStudies::where('content','LIKE','%'.$searchquery.'%')->get(); 

           if(Input::has('tab'))
           {
                $searchstatus = 2;
                $searchquery = Input::get('q');
                $tabname = Input::get('tab');
                $searchdata['tabname'] = $tabname;
                if($tabname=='page')
                {
                  $searchdata['fulldata_title'] =  Page::where('title','LIKE','%'.$searchquery.'%')->get();
                  $searchdata['fulldata_content'] =  Page::where('content','LIKE','%'.$searchquery.'%')->get();

                }
                if($tabname=='article')
                {
                  $searchdata['fulldata_title'] =  PressRelease::where('title','LIKE','%'.$searchquery.'%')->get();
                  $searchdata['fulldata_content'] =  PressRelease::where('content','LIKE','%'.$searchquery.'%')->get();

                }
                if($tabname=='cs')
                {
                  $searchdata['fulldata_title'] =  CaseStudies::where('title','LIKE','%'.$searchquery.'%')->get();
                  $searchdata['fulldata_content'] =  CaseStudies::where('content','LIKE','%'.$searchquery.'%')->get();

                }
           }
        }
       $page  = Page::find($id); //find id from page table
       $globalsetting = GlobalSetting::first();
             

        $template = Template::find($page->page_template); //find template from $page
        
        $template_positions = TemplatePosition::where('id_template',$page->page_template)->get();  //select id template from templateposition where id_template is coming from page table
       
        $show['active'] = $page->id;
        $show['child'] = $page->id;

        $data = PageController::getDataFromPositions($template_positions,$page->id);

        $sub_menu_parent_id = 0;
        $sub_menu=[];
        $sub_menu_parent_id = MenuItem::where('menu_page_id',$page->id)->first();
        if($sub_menu_parent_id){
            if($sub_menu_parent_id->parent_id==0)
                $sub_menu = MenuItem::where('menu_type_id',$sub_menu_parent_id->menu_type_id)->where('parent_id',$sub_menu_parent_id->id_menu_item)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->get();
            else{
                $sub_menu = MenuItem::where('menu_type_id',$sub_menu_parent_id->menu_type_id)->where('parent_id',$sub_menu_parent_id->parent_id)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->get();
                $sub_menu_parent_page = MenuItem::where('id_menu_item',$sub_menu_parent_id->menu_type_id)->leftJoin('pages','pages.id','=','menu_items.menu_page_id')->first();
                $show['active'] = $sub_menu_parent_page->id;
            }
        }
        return view("templates.$template->template_name.$template->template_template",compact('data','page','sub_menu','show','globalsetting','searchdata','searchquery','searchstatus'));

    }
    
    public function showHome()
    {
        $page_controller = new PageController;
        return $page_controller->showPageBySlug('home');
    }
    
    public function showPageBySlug($slug)
    {

        if(Page::where('slug',$slug)->count()>0){
        $page = Page::where('slug',$slug)->first(); //find id from page table
            
        $page_controller = new PageController;
           
        return $page_controller->getPage($page['id']);
        }
        else{
            $data = PageController::show404();
            return $data;
        }
    }
    public static function show404(){
        $data = '';
         $menu_controller = new MenuController;
         $data['main_menu'] = $menu_controller->getModuleFromPosition(1,1);
        $si_controller = new SocialInfoController;
            $data['social_info'] = $si_controller->getModuleFromPosition(17,1);
             $page['page_title'] = '';
            $page['meta_description'] = '';
            $page['meta_keywords'] = '';
        return view('errors.404',compact('data','social_info','page'))->render();
    }
    public static function getDataFromPositions($template_positions,$page_id)
    {

        $data = [];
        foreach($template_positions as $key => $template){
        $position = Position::find($template->id_position);
        $data[$position->position_slug] = PageController::getDataFromModulePosition($position->id_module,$position->id_position,$page_id);
        }
       return $data;
    }

    public static function getDataFromModulePosition($id_module,$id_position,$page_id){
        $module = Module::find($id_module);  //find module from modules   table...module is menu module.
        $module_modal = ucwords($module->module_name); //to find the controller in which ucwords means first word is capital
        $module_controller = "App\Http\Controllers\Web\\".$module_modal."Controller"; //now name nenu controller is ready
        $module_data = $module_controller::getModuleFromPosition($id_position,$page_id);   //calling function of menucontroller
        return $module_data;
    }

    public static function viewOptionsPage()
    {
        return view('admin.page.list_page',compact('data'));
    }
    public function subscribeNewsLetter(Request $request)
    {
        $email = $request->email;
        $count = Newsletter::where('email', $email)->count();
        if ($count > 0) {
            return response()->json(['status' => 0, 'msg' => 'You have already subscribed to our newsletter!']);
        } else {
            $news = new Newsletter();
            $news->email = $email;
            $news->save();
            return response()->json(['status' => 1, 'msg' => 'Thank you for subscribing to our newsletter!']);
        }
    }

    
    public function getPress($slug)
    {
        $searchquery = '';
        if(PressRelease::where('slug', $slug)->count()>0){
            $event = PressRelease::where('slug', $slug)->first();
            $id =   $event->id;
             $globalsetting = GlobalSetting::first();
            $page_template_id = 3;
        $template = Template::find($page_template_id); //find template from $page
        $template_positions = TemplatePosition::where('id_template',$page_template_id)->get();  //select id template from templateposition where id_template is coming from page table
        $show['active'] = 114;
        $show['child'] = 114;
        $data = PageController::getDataFromPositions($template_positions,114);
        $pagedata = Page::where('id',114)->first();

        $data['event']=PressRelease::where('id',$id)->first();
        $page['page_banner'] = $pagedata->banner;
        $page['footer_text'] = $pagedata->footer_text;
        $page['meta_title'] = $event->meta_title;
        $page['meta_description'] = $event->meta_description;
        $page['meta_keywords'] = $event->meta_keywords;

        return view('templates.news_template.single_press',compact('data','show','page','globalsetting','searchquery'));
               //$event_controller = new AdminBlogController;
            //return $event_controller->viewEvent($event->event_id);
        }

    }
        public function ShowCaseStudies($slug)
    {
        $searchquery = '';
        if(CaseStudies::where('slug', $slug)->count()>0){
            $event = CaseStudies::where('slug', $slug)->first();
            $id =   $event->id;
             $globalsetting = GlobalSetting::first();
            $page_template_id = 10;
        $template = Template::find($page_template_id); //find template from $page
        $template_positions = TemplatePosition::where('id_template',$page_template_id)->get();  //select id template from templateposition where id_template is coming from page table
        $show['active'] = 101;
        $show['child'] = 101;
        $data = PageController::getDataFromPositions($template_positions,101);
        $pagedata = Page::where('id',101)->first();

        $data['event']=CaseStudies::where('id',$id)->first();
        $page['page_banner'] = $pagedata->banner;
        $page['meta_title'] = $event->meta_title;
        $page['meta_description'] = $event->meta_description;
        $page['meta_keywords'] = $event->meta_keywords;

        return view('templates.case_studies.single_press',compact('data','show','page','globalsetting','searchquery'));
               //$event_controller = new AdminBlogController;
            //return $event_controller->viewEvent($event->event_id);
        }

    }


    public function SearchQuery()
    {
       $slug = 'search';
        if(Page::where('slug',$slug)->count()>0){
        $page = Page::where('slug',$slug)->first(); //find id from page table
            
        $page_controller = new PageController;
        return $page_controller->getPage($page['id']);


        }
        
    }


}