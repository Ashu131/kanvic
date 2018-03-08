<?php
namespace App\Http\Controllers\Admin;
use Validator;
use Input;
use File;
use Redirect;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Storage;
use DB;
use View;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class AdminTestimonialController extends Controller
{
    public function getTestimonial()
    {
        $data['testimonial'] = Testimonial::orderBy('order_no','ASC')->get();
        $data['active'] = "testimonial";
        return view('admin.testimonial.testimonial_list',compact('data'));
    }

    public function CreateTestimonial()
    {
       // $data['testimonial'] = Testimonial::orderBy('order_no','ASC')->get();
        $data['active'] = "testimonial";
        return view('admin.testimonial.create',compact('data'));

    }

    public function	postTestimonial(Request $request)
    {
    	$author 		= 	$request->author;
    	$news_desc 		= 	$request->news_desc;
        $data = [
            'author'=>$author,
            'news_desc'=>$news_desc,
        ];
        $rules = [
            'author'=>'required',
            'news_desc'=>'required',
        ];

        $validator =  Validator::make($data,$rules);

        if($validator->passes()){

    	$testimonial = new Testimonial;
    	$testimonial->author=$author;
    	$testimonial->news_desc=$news_desc;
        $testimonial->order_no=0;

         $alltesti = Testimonial::get();
            foreach($alltesti as $testi)
            {
                $c_order = $testi->order_no;
                $existcentre = Testimonial::where('order_no', $c_order)->first();
                $existcentre->order_no =  $c_order+1;
                $existcentre->save();
            }
    	$testimonial->save();
    	
        $success = "Testimonial Saved Successfully";
        return Redirect::back()->with(compact('success'));
         }
        else
        {
            $failure = "Page cannot be created";
            return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure'));
        }
    }



    public function UpadateTestimonial(Request $request)
    {
        //$title            =   Input::get('title');
        $author         =   $request->author;
        $news_desc      =   $request->news_desc;
        $data = [
            //'title'=>$title,
            'author'=>$author,
            'news_desc'=>$news_desc,
        ];
        $rules = [
           // 'title'=>'required',
            'author'=>'required',
            'news_desc'=>'required',
        ];
        $validator =  Validator::make($data,$rules);
        if($validator->passes()){

        $testimonial = Testimonial::where('testimonial_id',$request->id)->first();
        //$testimonial->title=$title;
        $testimonial->author=$author;
        $testimonial->news_desc=$news_desc;
        $testimonial->order_no=0;

         $alltesti = Testimonial::get();
            foreach($alltesti as $testi)
            {
                $c_order = $testi->order_no;
                $existcentre = Testimonial::where('order_no', $c_order)->first();
                $existcentre->order_no =  $c_order+1;
                $existcentre->save();
            }
        $testimonial->save();
        
        $success = "Testimonial Update Successfully";
        return Redirect::back()->with(compact('success'));
         }
        else
        {
            $failure = "Page cannot be created";
            return Redirect::back()->withErrors($validator)->withInput()->with(compact('failure'));
        }
    }



    public function TestimonialSort()
    {
    // Get the JSON string
    $jsonstring = stripslashes($_GET['jsonstring']);
    
    // Decode it into an array
    $jsonDecoded = json_decode($jsonstring, true);
    

    /* Function to parse the multidimentional array into a more readable array 
     * Got help from stackoverflow with this one:
     *    http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
    */
    function parseJsonArray($jsonArray, $parentID = 0)
    {
      $return = array();
      foreach ($jsonArray as $subArray) {
         $returnSubSubArray = array();
         if (isset($subArray['children'])) {
           $returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
         }
         $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
         $return = array_merge($return, $returnSubSubArray);
      }

      return $return;
    }

    // Dump the array to debug
    //var_dump(parseJsonArray($jsonDecoded));
    
    // Run the function above
    $readbleArray = parseJsonArray($jsonDecoded);
    
    
    // Loop through the "readable" array and save changes to DB
    foreach ($readbleArray as $key => $value) {
        
        
        // $value should always be an array, but we do a check
        if (is_array($value)) {
        
            //$result = mysql_query("UPDATE task SET 
                                    //pgorder='". $key ."', 
                                    //taskid='".$value['parentID']."' 
                                    //WHERE id='".$value['id']."'"); 
    DB::table('testimonials')
            ->where('testimonial_id', $value['id'])->update(array('order_no'=>$key));
            
        
        }
    }
    }


    public function EditTestmonial($id)
    {
        $data['testimonial'] = Testimonial::where('testimonial_id',$id)->first();
        $data['active'] = "testimonial";
        return view('admin.testimonial.edit',compact('data'));

    }

    public function DeleteTesti($id)
    {
        Testimonial::where('testimonial_id', $id)->delete();
        $success = 'Testimonial deleted Successfully';
        return Redirect::back()->with(compact('success'));
    } 

}