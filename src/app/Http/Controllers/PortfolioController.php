<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function __invoke()
    {
        return view('portfolio', [
            'profile' => Profile::first(),
            'skills' => Skill::orderBy('sort_order')->get(),
            'projects' => Project::latest()->get(),
        ]);
    }
}