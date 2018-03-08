<?php

namespace App\Http\Controllers\Admin;


use App\Menu;
use App\Gallery;
use App\GalleryType;
use App\Page;
use App\MenuItem;
use App\Position;
use App\Template;
use App\TemplatePosition;
use App\Module;
use Auth;
use App\User;
use Hash;
use Hashids;
use Validator;
use Input;
use Redirect;
use Mail;
use App\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;





class AdminLoginController extends Controller {

	
    public function showLogin()
	{
		
		$data = [];
		$i=1;
        // return 1;
		// return Hash::make('admin');
		$data['admin'] = Admin::all();
        return view('admin.login',compact('data'));
	}

    public function showForgotView()
    {
        return view('admin.forgot_view');
    }
    
    public function resetPasswordView()
    {
        $data['user'] = User::first();
        return view('admin.reset_password',compact('data'));   
    }
    public function resetPassword()
    {
        
        $user_id            = Input::get('user_id');
        $emailid            = Input::get('emailid');
        $current_password   = Input::get('current_password');
        $password           = Input::get('password');
        $confirm_password   = Input::get('confirm_password');

        $data=[
            'Email_id'          => $emailid,
            'password'          => $password,
            'confirm_password' => $confirm_password
        ];


        $valid=[
            'Email_id'          => 'required|email',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ];

        $validator = Validator::make($data, $valid);
        if($validator->fails())
        {
            $failure = "Please enter same password!!";
            return Redirect::back()->with(compact('failure'));
        }

        $user            =  User::where('id',$user_id)->first(); 
        $user->password  =  Hash::make($password);
        $user->email  =  $emailid;
        $user->save();

        $success = "Password change Successfully!!";
        return Redirect::back()->with(compact('success'));

    }



    public function getPassword()
    {
        $email           =  Input::get('email');
        $valid           =  User::where('email',$email)->count();
        $user            =  User::where('email',$email)->first();  
        if($valid>0)
        {
            $to      =  $email;
            $from    =  "forgotpassword@dhanuka.com";
            $subject =  "Please Click Below Link To Change Your Password";
          // return  $id = Hashids::encode($user['id']);
            $id = $user['id'];
            Mail::send('admin.reset_password_link', compact('id','from','subject'), function ($message) use ($email,$from,$subject,$id) {
                  $message->from($from,'Dhanuka Group');
                  $message->to($email);
                  $message->subject($subject);
                },true);

            $success = "Please check you Email";
            return Redirect::back()->with(compact('success'));
        }
        return $user;
    }
    
   public function adminLogin()
    {
        
  $email = Input::get('email');
        
        $password = Input::get('password');
    //  $new= User::where('id',3)->update(['email'=>$email]);
   // $new=User::where('id',3)->increment('id');
      
       
        $data = [
            'email'=>$email,
            'password'=>$password,
            
                       
        ];
        $rules = [
            'email'=>'required',
            'password'=>'required',
        ];
         
        $validator =  Validator::make($data,$rules);
   
        
        if($validator->passes()){
           
                  

            if (Auth::attempt($data))
            {

                $admin = User::find($email);
               return Redirect::route('get.page.list');  
            }
  
                else
                {
                     $failure = "Wrong admin id or password";

            return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure'));
                }
            }
        

	}
}