<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');    
    }

    public function forgotPassword(){
        return view('auth.forgotPassword');    
    }

    protected function forgotPasswordCheckNumber(Request $request)
    {
        $data = $request->validate([
            'phone_number' => ['required', 'numeric'],
        ]);

        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['phone_number'], "sms");
        
        return redirect()->route('verify.phone')->with(['phone_number' => $data['phone_number']]);
    }

    protected function verifyPhone(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
        if($verification->valid) {
            $user = User::where('phone_number', $data['phone_number'])->first();
            if($user !== null){
                return redirect()->route('change.password')->with(['phone_number' => $data['phone_number']]);
            }else{
                return redirect()->route('forgot.password')->with(['error' => 'Phone Number not matched!']);
            }
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }

    public function changePassword(){
        return view('auth.changepassword');    
    }

    public function confirmChangePassword(Request $request){
        $data = $request->validate([
            'phone_number' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = tap(User::where('phone_number', $data['phone_number']))->update(['password' => Hash::make($data['password'])]);

        return redirect()->route('login')->with(['success' => 'Password Changed Successfully']);    
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
                    return back()->with('error', 'Incorrect Username or Password');
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

    public function logout(Request $request)
    {
        //Auth::logout();
        //$request->session()->invalidate();
        //$request->session()->regenerateToken();
        
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }

}
