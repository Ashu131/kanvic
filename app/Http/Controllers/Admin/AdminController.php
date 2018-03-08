<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

class AdminController extends Controller
{
    public function index(){
        $data['pages'] = Page::all();
        return view('admin.page.list_page',compact('data'));
    }

    public function showHomeSlider()
    {
        $homeslides = HomeSlider::orderBy('created_at')->get();
        return view('admin.home-slider.home-slider', compact('homeslides'));
    }
    public function addNewHomeSlide()
    {
        return view('admin.home-slider.add-new-home-slide');
    }
    public function saveNewHomeSlide(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $newslide = new HomeSlider();
        $newslide->title = $request->title;
        $newslide->content = $request->content;
        $newslide->link = $request->link;
        $newslide->publish = $request->publish;
        $files = Input::file('images');
        if (isset($files) && count($files) > 0) {
            foreach ($files as $file) {
                $destinationLarge = 'resources/assets/img/modules/slider'; // upload path
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $fileName = time() . '.' . $extension; // renaming image
                $img = Image::make($file->getRealPath());
                $img->resize(1920,1032);
                $img->save($destinationLarge . '/' . $fileName);
                $newslide->image = $fileName;
                    
            }
        }
        $newslide->save();
        return redirect('admin/home-slider');
    }

    public function editHomeSlide($id)
    {
        $slide = HomeSlider::where('id', $id)->first();
        return view('admin.home-slider.admin-edit-home-slide', compact('slide'));
    }
    public function updateHomeSlide(Request $request)
    {

        $updateslide = HomeSlider::where('id', $request->id)->first();
        //$baseurl = $request->baseurl;
        $updateslide->title = $request->title;
        $updateslide->content = $request->content;
        $updateslide->link = $request->link;
        $updateslide->publish = $request->publish;
        $oldimg = $request->old_img;
        $files = Input::file('images');

        if(isset($files) && count($files)>0) {
            foreach ($files as $file) {
                $destinationLarge = 'resources/assets/img/modules/slider'; // upload path
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $fileName = time() . '.' . $extension; // renaming image
                $img = Image::make($file->getRealPath());
                $img->resize(1920,1032);
                $img->save($destinationLarge.'/'.$fileName);
                File::delete($destinationLarge.'/'.$oldimg);
                $updateslide->image = $fileName;
                
            }
        }
        $updateslide->save();
        return redirect('admin/admin-edit-home-slide/' . $updateslide->id); 
    }
    public function deleteHomeSlide(Request $request)
    {
        $slide = HomeSlider::where('id', $request->id)->first();
        File::delete('images/slider/mobile/'.$slide->image);
        File::delete('images/slider/'.$slide->image);
        $slide->delete();
        return redirect('admin/home-slider');
    }
}
