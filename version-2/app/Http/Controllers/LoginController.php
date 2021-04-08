<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');    
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->email;

        $user = User::where('email', $email)->first();
        $admin = Admin::where('email', $email)->first();
        
        if($user !== null){
            try{
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('courses');
                }else{
                    return back()->with('error', 'Incorrect username or password');
                }
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());
            }
        }else if($admin !== null){
            try{
                if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard');
                }else{
                    return back()->with('error', 'Incorrect username or password');
                }
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());
            }
        }else if($user !== null && $admin !== null){
            return back()->with('error', 'Please cross check your email address and try again');
        }else{
            return back()->with('error', 'Try again after 30 minutes!');
        }
    }

}
