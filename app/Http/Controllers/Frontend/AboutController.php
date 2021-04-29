<?php

namespace App\Http\Controllers\Frontend;
use App\Models\About;
use App\Models\Client;
use App\Models\WorkProcess;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $work_process = WorkProcess::orderBy('id', 'DESC')->get();
        $clients = Client::get();
        $about = About::firstOrFail();
        return view('public.about')->with(compact('work_process','about','clients'));
    }
}
