<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index(){
        return view('welcome');    
    }

    public function setup(){
        return view('auth.setup');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try{
            Admin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            try{
                if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard'); 
                }else{
                    return back()->with(['error' => 'Please try again later! ('.$e.')']);
                }
            }catch(Exception $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);
            }
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }
}
