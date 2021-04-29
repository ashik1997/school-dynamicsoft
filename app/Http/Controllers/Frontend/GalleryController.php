<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(12);
        return view('public.gallery')->with(compact('galleries'));
    }
}
