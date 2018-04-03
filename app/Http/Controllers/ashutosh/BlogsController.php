<?php

namespace App\Http\Controllers\ashutosh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
        return view('ashutosh/blog');
    }
}
