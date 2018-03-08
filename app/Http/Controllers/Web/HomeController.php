<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ShopCategory;
use App\Models\CategoryProducts;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Variant;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\States;
use App\Models\Visitor;
use App\Models\Events_Remind;
use App\Mail\NewContact;
use App\Models\HomeSlider;
use App\Models\Blogs;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $homesliders = HomeSlider::where('publish',1)->get();
        $newcollections = NewCollection::where('publish',1)->orderBy('sort')->take(4)->get();
        return view('silver.index',compact('stores','homesliders','newcollections'));
    }


    public function showEvents()
    {
        $events = Events::where('status',1)->paginate(15);
        return view('silver.events',compact('events'));
    }

    public function showBlog()
    {
        $blogs = Blogs::where('publish',1)->paginate(10);
        return view('silver.blogs',compact('blogs'));
    }
    public function contact()
    {
        $stores = Store::all();
        return view('silver.contact',compact('stores'));
    }

    public function thankYouContact(){
        return view('silver.contact-thank-you');
    }

    public function submitContact(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'message'=>'required',
            ]);

        $visitor = new Visitor();
        $visitor->name = $request->name;
        $visitor->email = $request->email;
        //$visitor->mobile = $request->mobile;
        $visitor->message = $request->message;
        $visitor->save();
        //Mail::to('info@codesilver.in')->cc('sales@codesilver.in')->send(new NewContact($request));
        Mail::to('nagendra@mr-p.in')->send(new NewContact($request));
        return redirect('thank-you-contact');
    }


    public function submitEventRemind(Request $request)
    {
       $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required|digits:10',
            ]);

        $remind = new Events_Remind();
        $remind->event_id = $request->event_id;
        $remind->name = $request->name;
        $remind->email = $request->email;
        $remind->mobile = $request->mobile;
        $remind->save();

        $success = 'success';
        //Mail::to('info@codesilver.in')->cc('sales@codesilver.in')->send(new NewContact($request));
        //Mail::to('nagendra@mr-p.in')->send(new NewContact($request));
        return redirect('events')->with(compact('success'));
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
  
   
    
    
    
}
