<?php

namespace App\Http\Controllers\ashutosh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Application;

class CareerController extends Controller
{
    public function index()
    {
        return view('ashutosh/career');
    }

    /**
     * Show Application Form | Career Page
     */
    public function showApplicationForm()
    {
        return view('ashutosh.career_application_form');
    }

    /**
     * Store Application Form
     */
    protected function storeApplicationForm(Request $request)
    {
        //------------Validate before submitting-------------//
            $this->validate($request,[
                'fname'             => 'required|string|max:100',
                'lname'             => 'required|max:100',
                'gender'            => 'required|max:10',
                'nationality'       => 'required|max:100',
                'email'             => 'required|max:100',
                'phone_code'        => 'required|max:5',
                'phone'             => 'required|max:20',
                'career_role'       => 'required|max:100',
                'interest'          => 'required|max:50',
                'location'          => 'required|max:50',
                'start_date'        => 'required|max:30',
                'end_date'          => 'max:30',
                'duration'          => 'max:20',
                'occupation'        => 'required|max:250',
                'experience'        => 'required|max:10',
                'recent_education'  => 'required|max:250',
                'high_education'    => 'required|max:40',
                'other_education'   => 'max:250',
                'question1'         => 'required|max:250',
                'question2'         => 'required|max:250',
                'cv'                => 'required|max:5120',
                'portfolio'         => 'max:5120'
                               
                
            ]);

        /*+++++++++++++++++++++++++++++++++++++++++++
        | Handle Files Uploading
        |   -Portfolio
        |   -CV
        | +++++++++++++++++++++++++++++++++++++++++++
        */
        if ($request->hasFile('portfolio')) {
            $filenameWithExt=   $request->file('portfolio')->getClientOriginalName();

            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $fileExt= $request->file('portfolio')->getClientOriginalExtension();

            $filenameToStore= $filename.'_'.time().'.'.$fileExt;

            $path=$request->file('portfolio')->storeAs('public/ashutosh/career', $filenameToStore);
        }else {
            $filenameToStore=NULL;
        }
        //>>>>>>>>>>>CV<<<<<<<<<<<<//
        if ($request->hasFile('cv')) {
            $CvfilenameWithExt=   $request->file('cv')->getClientOriginalName();

            $Cvfilename= pathinfo($CvfilenameWithExt, PATHINFO_FILENAME);

            $CvfileExt= $request->file('cv')->getClientOriginalExtension();

            $CvfilenameToStore= $Cvfilename.'_'.time().'.'.$CvfileExt;

            $path=$request->file('cv')->storeAs('public/ashutosh/career', $CvfilenameToStore);
        }else {
            $CvfilenameToStore=NULL;
        }
        

        //-------Store value if validated---------//
        $data = new Application;
        $data->fname            = $request->fname;
        $data->lname            = $request->lname;
        $data->gender           = $request->gender;
        $data->nationality      = $request->nationality;
        $data->email            = $request->email;
        $data->phone_code       = $request->phone_code;
        $data->phone            = $request->phone;
        $data->career_role      = $request->career_role;
        $data->interest         = $request->interest;
        $data->location         = $request->location;
        $data->start_date       = $request->start_date;
        $data->end_date         = $request->end_date;
        $data->duration         = $request->duration;
        $data->occupation       = $request->occupation;
        $data->experience       = $request->experience;
        $data->recent_education = $request->recent_education;
        $data->high_education   = $request->high_education;
        $data->other_education  = $request->other_education;
        $data->question1        = $request->question1;
        $data->question2        = $request->question2;
        $data->cv               = $filenameToStore;
        $data->portfolio        = $CvfilenameToStore;
        $data->link             = $request->link;

        $data->save();

        return redirect()->route('career.page')->with('success', 'updated');
    }
}

