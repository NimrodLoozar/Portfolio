<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Projects;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($user = Auth::user('admin')) {
            $projects = Projects::all();
            return view('dashboard', compact('projects'));
        } else {
            return redirect()->route('login');
        }
    }
}
