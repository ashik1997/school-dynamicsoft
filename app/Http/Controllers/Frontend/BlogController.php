<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $recents = Blog::with('user')->orderBy('id', 'DESC')->limit(10)->get();
        $blogs = Blog::with('user')->orderBy('id', 'DESC')->paginate(12);
        return view('public.blog.blogs')->with(compact('blogs','recents'));
    }
    public function single_blog($id)
    {
        $recents = Blog::with('user')->orderBy('id', 'DESC')->limit(10)->get();
        $blog = Blog::with('user')->find($id);
        return view('public.blog.single-blog')->with(compact('blog','recents'));
    }
}
