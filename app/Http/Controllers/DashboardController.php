<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($user = Auth::user('admin')) {
            return view('dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
