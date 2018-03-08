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
use App\Models\NewPage;
use App\Models\Ebrochure;

use Validator;
use Input;
use Redirect;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ProjectController extends Controller
{
    public static function getModuleFromPosition($position_id,$page_id)
    {
    	$location = Input::get('location');
        $project = NewPage::orderBy('project_order')->get();
        return view("templates.template_1.modules.project_full",compact('project')); 
    }
}