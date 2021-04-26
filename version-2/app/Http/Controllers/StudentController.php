<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Course;
use App\Models\Video;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function courses(){
        $courses = Course::orderby('id','desc')->paginate(4);
        $videos = Video::orderby('id','desc')->paginate(10);

        return view('courses.index', ['courses'=>$courses, 'videos'=>$videos]);
    }

    public function playVideo($id){
        $video = Video::findOrFail($id);
        $course = Course::where('id', $video->course_id)->first();
        return view('courses.play-video', ['video'=>$video, 'course'=>$course]);
    }

    public function showCourse($id){
        $course = Course::findOrFail($id);
        return view('courses.show-course', ['course'=>$course]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('courses.studentEditProfile', ['user'=>$user]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/students/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'name'=> 'required',
                'phone_number'=> 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            try{
                $user = User::where('id', $id)->update([
                    'name'=> $request->name,
                    'phone_number'=> $request->phone_number,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move(public_path('images/students'), $imageName);
                return redirect()->route('courses')->with('success', 'Profile Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'name'=> 'required',
                'phone_number'=> 'required',
            ]);
            
            try{
                $user = User::where('id', $id)->update($data);
                return redirect()->route('courses')->with('success', 'Profile Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function changePassword($id){
        $user = User::findOrFail($id);
        return view('courses.studentChangePassword', ['user'=>$user]);
    }

    public function passwordUpdate(Request $request, $id){
        
        $data = $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user =  User::findOrFail($id);
        
        if($request->old_password){
            if (Hash::check($request->old_password, $user->password)){
                if ($request->password === $request->password_confirmation){
                    $password = Hash::make($request->password);
                        try{
                            $user = User::where('id', $id)->update(['password'=> $password]);
                            return redirect()->route('courses')->with('success', 'Password Changed');
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

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
