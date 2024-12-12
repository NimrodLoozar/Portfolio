<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;

class WelcomeController extends Controller
{
    public function index()
    {
        $projects = Projects::all();
        return view('welcome', compact('projects'));
    }
}
