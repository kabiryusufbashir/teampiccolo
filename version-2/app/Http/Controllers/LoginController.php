<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        $users = User::where('category', 1)->get();

        if($users->count() === 0){
            return redirect()->route('setup');    
        }else{
            return redirect()->route('home');    
        }
    }
}
