<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team()
    {
        $teams = Team::paginate(16);
        return view('public.team')->with(compact('teams'));
    }
}
