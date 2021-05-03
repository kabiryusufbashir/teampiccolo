<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\User;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
        $admin = Auth::guard('admin')->user();
        $students = User::get();
        $staff = Admin::get();
        $blog = Blog::get();

        return view('dashboard.index', ['admin'=>$admin, 'students'=>$students, 'staff'=>$staff, 'blog'=>$blog]);
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        return view('dashboard.editProfile', ['user'=>$user]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/admin/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'name'=> 'required',
                'phone_number'=> 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            try{
                $user = Admin::where('id', $id)->update([
                    'name'=> $request->name,
                    'phone_number'=> $request->phone_number,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move(public_path('images/admin'), $imageName);
                return redirect()->route('dashboard')->with('success', 'Profile Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'name'=> 'required',
                'phone_number'=> 'required',
            ]);
            
            try{
                $user = Admin::where('id', $id)->update($data);
                return redirect()->route('dashboard')->with('success', 'Profile Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function changePassword($id){
        $user = Admin::findOrFail($id);
        return view('dashboard.changePassword', ['user'=>$user]);
    }

    public function passwordUpdate(Request $request, $id){
        
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user =  Admin::findOrFail($id);
        
        if($request->old_password){
            if (Hash::check($request->old_password, $user->password)){
                if ($request->password === $request->password_confirmation){
                    $password = Hash::make($request->password);
                        try{
                            $user = Admin::where('id', $id)->update(['password'=> $password]);
                            return redirect()->route('dashboard')->with('success', 'Password Changed');
                        }catch(Exception $e){
                            return back()->with('error', 'Please try again... '.$e);
                        }
                }else{
                    return back()->with('error', 'Password does not match');
                }
            }else{
                return back()->with('error', 'Please Check Your Password and Try Again');
            }
        }
    }

    public function allStudent(){
        $students = User::orderby('id','desc')->paginate(9);
        return view('dashboard.student.index', ['students'=>$students]);
    }
}
