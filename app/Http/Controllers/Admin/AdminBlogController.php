<?php
namespace App\Http\Controllers\Admin;
use App\Models\Gallery_type;
use App\Models\Position;
use App\Models\Gallery;
use Validator;
use Input;
use File;
use Redirect;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Storage;
use DB;
use View;
use App\Models\Page;
use App\Models\Template;
use App\Models\TemplatePosition;
use App\Models\ProjectGallery;
use App\Http\Controllers\Web\MenuController;
use App\Http\Controllers\Web\PageController;
use App\Models\GlobalSetting;
use App\Models\PressRelease;
use App\Models\Gallerylist;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{

    public function createPress()
    {
       return view('admin.PressRelease.create');
    }
    public function postPress(Request $request)
    {
$author=$request->author;
        $title=$request->title;
        $sub_title=$request->sub_title;   
        $content=$request->full_content;

        $outerimg=$request->outerimg; 
        $innerimg=$request->innerimg;
        $slug = str_replace(' ', '-', $title);
        $slug = str_replace('/', '-', $slug);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.

         $data = [
            'title'=>$title,
        ];
        $rules = [
            'title'=>'required',
        ];

       $validator =  Validator::make($data,$rules);
        if($validator->passes()){
            $new_article = new PressRelease;


        $outerpath = 'resources/assets/img/modules/article/';
        $banner_path = 'resources/assets/img/modules/article/banner/';
        $filename="";
        if(Input::hasFile('outerimg'))
        {   
            $extension =  $outerimg->getClientOriginalExtension();
            $outer_file = str_random(6).'.'.$extension;
            $outerimg->move($outerpath,$outer_file);
        }
        if (Input::hasFile('innerimg'))
        {   
            $extension =  $innerimg->getClientOriginalExtension();
            $inner_file = str_random(6).'.'.$extension;
            $innerimg->move($banner_path,$inner_file);
        }
$new_article->author = $author;
        $new_article->title = $title;
        $new_article->sub_title = $sub_title;
        $new_article->slug=$slug;
        $new_article->content=$content;
        $new_article->imgname= $outer_file;
        $new_article->inner_banner= $inner_file;
        $new_article->save();
        $success = "Packaged Created Successfully";
        return Redirect::back()->with(compact('success'));  
    }
    else
    {
       $failure = "Page cannot be created";
       return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure'));
    }
    }
    public function viewGallery($id)
    {
         $globalsetting = GlobalSetting::first();
        $page_template_id = 3;
        $template = Template::find($page_template_id); //find template from $page
        $template_positions = TemplatePosition::where('id_template',$page_template_id)->get();  //select id template from templateposition where id_template is coming from page table
        $show['active'] = 118;
        $show['child'] = 118;
        $data = PageController::getDataFromPositions($template_positions,118);
        $pagedata = Page::where('id_page',118)->first();
        $data['event']=Gallerylist::where('event_id',$id)->first();
        $page['page_banner'] = $pagedata->banner;
        $page['footer_text'] = $pagedata->footer_text;
        $page['page_title'] = '';
        $page['meta_description'] = '';
        $page['meta_keywords'] = '';

        return view('templates.news_template.single_gallery',compact('data','show','page','globalsetting'));
    }
 
    public function getGallery($slug)
    {
        if(Gallerylist::where('slug', $slug)->count()>0){
            $event = Gallerylist::where('slug', $slug)->first();
            $event_controller = new AdminBlogController;
            return $event_controller->viewGallery($event->event_id);
        }

    }


    public function getPress($slug)
    {
        if(PressRelease::where('slug', $slug)->count()>0){
            $event = PressRelease::where('slug', $slug)->first();
            $id =   $event->press_id;
             $globalsetting = GlobalSetting::first();
            $page_template_id = 3;
        $template = Template::find($page_template_id); //find template from $page
        $template_positions = TemplatePosition::where('id_template',$page_template_id)->get();  //select id template from templateposition where id_template is coming from page table
        $show['active'] = 94;
        $show['child'] = 94;
        $data = PageController::getDataFromPositions($template_positions,94);
        $pagedata = Page::where('id_page',94)->first();

        $data['event']=PressRelease::where('press_id',$id)->first();
        $page['page_banner'] = $pagedata->banner;
        $page['footer_text'] = $pagedata->footer_text;
        $page['page_title'] = '';
        $page['meta_description'] = '';
        $page['meta_keywords'] = '';

        return view('templates.news_template.single_press',compact('data','show','page','globalsetting'));
        }
    }



    public function editPressRelease($id)
    {
        $data['event']=PressRelease::where('id',$id)->first();   
        return view('admin.PressRelease.edit',compact('data'));
    }

    public function UpdatePress(Request $request)
    {
$author=$request->author;
        $title=$request->title;
        $sub_title=$request->sub_title;   
        $content=$request->content; 
        $outerimg =$request->outerimg;
        $innerimg =$request->innerimg;  
        $slug = str_replace(' ', '-', $title);
        $slug = str_replace('/', '-', $slug);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.
        $sourcepath = 'resources/assets/img/modules/article';
        $inner_path = 'resources/assets/img/modules/article/banner';

         $data = [
            'title'=>$title,
        ];
        $rules = [
            'title'=>'required',
        ];

        $validator =  Validator::make($data,$rules);

        if($validator->passes()){
        $update = PressRelease::where('id', $request->id)->first();
        $oldfile = $update->imgname;
        $oldinnerfile = $update->innerimg;
$update->author=$author;
        $update->title=$title;
        $update->sub_title=$sub_title;
        $update->slug=$slug;
        $update->content=$content;
        $filename="";

        if (Input::hasFile('outerimg'))
        {  
            File::delete($sourcepath."/".$oldfile); 
            $extension =  $outerimg->getClientOriginalExtension();
            $outer_file  = str_random(6).'.'.$extension;
            $outerimg->move($sourcepath,$outer_file);
            $update->imgname= $outer_file;
           
        }
        if (Input::hasFile('innerimg'))
        {  
            File::delete($inner_path."/".$oldinnerfile); 
            $extension =  $innerimg->getClientOriginalExtension();
            $inner_file  = str_random(6).'.'.$extension;
            $innerimg->move($inner_path,$inner_file);
            $update->inner_banner= $inner_file;
           
        }
        $update->save();
        $success = "News Updated Successfully";
        return Redirect::back()->with(compact('success'));
    }
    else
    {
         $failure = "Page not updated,Please try again!";
         return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure'));
    }
}



    public function PressList()
    {
        $data['events'] = PressRelease::orderBy('created_at', 'DESC')->get();
        $data['active'] = "press_release";
        return view('admin.PressRelease.list',compact('data'));

    }

   
}