<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
        $admin = Auth::guard('admin')->user();
        return view('dashboard.index', ['admin'=>$admin]);
    }
}
