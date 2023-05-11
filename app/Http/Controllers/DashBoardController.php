<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function logout(Request $request)
    {
        session()->forget('session_id');
        return to_route('home');
    }
}
