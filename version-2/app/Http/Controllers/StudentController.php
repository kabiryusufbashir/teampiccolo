<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
