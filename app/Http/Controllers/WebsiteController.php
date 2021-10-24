<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $courses = course::all();

        return response()->view('website.index', compact('courses'));
    }

    public function contact()
    {
        return response()->view('website.contact-us');
    }

    public function about()
    {
        return response()->view('website.about-us');
    }
}
