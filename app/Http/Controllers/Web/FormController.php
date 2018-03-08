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
use App\Models\ContactReceive;
use App\Models\CareerFormReceive;
use App\Models\ProjectEnquiry;
use App\Models\SmallEnquiry;
use App\Models\GlobalSetting;
use Validator;
use Mail;
use Input;
use Redirect;
use File;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class FormController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
        $form = FormType::select('form_id','form_template')->where('form_position',$position_id)->first(); //selecting which gallery we want
       
        //        $form_field = FormField::where('form_id',$form->form_id)->get(); //selecting which gallery we want
        $form_field =FormController::traverseFormOrder($form['form_id'],0);
        //        return print_r($form_field);
        //        echo view("templates.template_1.modules.form",compact('form_field'))->render();
        return view('templates.template_1.modules.'.$form['form_template'],compact('form_field','form'))->render();
        
        //        $gallery_items=Gallery::select('filename')->where('gallery_type',$gallery['gallery_type'])->paginate(5);
        //        $gallery_items->setPath('press-release');
        //  
        //  
    }


    public static function traverseFormOrder($form_id,$parent){
        $form = FormField::where('form_id',$form_id)->where('form_field_group',$parent)->where('publish','0')->orderBy('form_field_order')->get()->toArray();
        $form_big = [];
        foreach($form as $form_child){
            $form_inner = [];
            $form_inner['content'] =  FormField::where('form_field_id',$form_child['form_field_id'])->first();
            $form_field_child_count = FormField::where('form_field_group',$form_child['form_field_id'])->count();
            if($form_field_child_count>0){
                $form_inner['has_child'] = 1;
                $form_inner['children'] = FormController::traverseFormOrder($form_id,$form_child['form_field_id']);
            }else

            {
                $form_inner['has_child'] = 0;
                $form_inner['children'] = [];
            }
            array_push($form_big,$form_inner);
        }
        return $form_big;
    }



    public function submitForm($form_id)
    {
        $form = FormType::find($form_id);
        $form_fields = FormField::where('form_id',$form_id)->where('publish','=',0)->get();
        $input_fields = Input::all();
        $validation = [];

        foreach ($form_fields as $form_field):
            $validation[$form_field->form_field_name] = $form_field->form_field_rule;
        endforeach;

        $old = [];
        foreach ($form_fields as $form_field):
        $pos = strpos($form_field->form_field_type, 'file');
        if($pos===false)
            $old[$form_field->form_field_name] = Input::get($form_field->form_field_name);
        else{
            if (Input::hasFile($form_field->form_field_name))
            {
                
                $destinationPath = "resources/uploads";
                $fileName = time().".".Input::file($form_field->form_field_name)->getClientOriginalExtension();;
                Input::file($form_field->form_field_name)->move($destinationPath, $fileName);
                echo $old[$form_field->form_field_name] = url($destinationPath."/".$fileName);
            }
        }
        endforeach;
        $messages = [
            'captcha' => 'The :attribute field is not match.',
        ];

        $validator = Validator::make($input_fields,$validation,$messages);
        $failure = "OOPS! Form Couldn't submitted.";
        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure','form_id'));
        }

        Mail::send('emails.'.$form->form_table, compact('old'), function ($m) use ($form) {
            $m->to($form->form_forward_to, "ME")->subject('Contact form');
        });

        /*if(!empty($form->form_reply_to))
        {
            $reply = [];
            $reply['subject'] = $form->form_subject;
            $reply['message'] = $form->form_message;

            Mail::queue('emails.reply.'.$form->form_table, compact('reply','old'), function ($m) use ($old,$form,$reply) {
            $m->to($old[$form->form_reply_to], "Blal")->subject($reply['subject']);
            });
        } */
        
        if($form_id=='4')
        {
        $contactsave = new ContactReceive;
        $contactsave->name = $input_fields['name']; 
        $contactsave->email_address = $input_fields['email'];
        $contactsave->message = $input_fields['your-message'];
$contactsave->phone= $input_fields['phone'];
$contactsave->company= $input_fields['company'];
        $contactsave->save();
        }
        

         $success = "Form Submitted Successfully";
        
        return Redirect::back()->with(compact('success','form_id'));
    }

}