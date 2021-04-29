<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Models\Employee;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Employee::paginate(8);
        $sliders = Slider::all();
        $galleries = Gallery::paginate(8);
        $about = About::firstOrFail();
        $blogs = Blog::paginate(3);
        return view('public.home')->with(compact('about','teams','sliders','blogs','galleries'));
    }
}
