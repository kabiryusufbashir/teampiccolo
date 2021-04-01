<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function index(){
        return view('enroll');
    }

    protected function create(Request $request)
    {
        dd('hited');
        // $data = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'email'],
        //     'phone_number' => ['required', 'numeric', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // /* Get credentials from .env */
        // $token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_sid = getenv("TWILIO_SID");
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // $twilio = new Client($twilio_sid, $token);
        // $twilio->verify->v2->services($twilio_verify_sid)
        //     ->verifications
        //     ->create($data['phone_number'], "sms");
        
        //     User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone_number' => $data['phone_number'],
        //     'password' => Hash::make($data['password']),
        //     'category' => 2,
        // ]);

        // return redirect()->route('verify')->with(['phone_number' => $data['phone_number']]);
    
    }
}
