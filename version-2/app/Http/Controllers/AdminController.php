<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin;
use App\Models\Contact;
use App\Mail\ContactMail;

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

    public function contact(Request $request){
        $data = request()->validate([
            'name'=> ['required'],
            'email'=> ['required', 'email'],
            'phone'=> ['required'],
            'enquiry'=> ['required'],
        ]);

        try{
            Contact::create($data);
            try{
                $sendmail = Contact::latest('id')->first();
                Mail::to('info@teampiccolo.com')
                    ->cc('kabiryusufbashir@gmail.com')
                    ->send(new ContactMail($sendmail));
                return redirect('/')->with('success','Thanks for Contacting, We will get back you soon!');    
    
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());    
        }
    }
}
