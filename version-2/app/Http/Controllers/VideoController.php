<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $videos = Video::orderby('id','desc')->paginate(9);
        return view('dashboard.video.index', ['videos'=>$videos]);
    }

    public function create()
    {
        $courses = Course::get();
        return view('dashboard.video.create', ['courses'=>$courses]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'course_id'=> 'required',
            'name'=> 'required',
            'url'=> 'required|url',
            'slug'=> '',
            'description'=> 'required',    
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
        $imageName = '/images/videos/'.time().'.'.$request->photo->extension();  
            

        try{
            Video::create(
                [
                'course_id'=>$request->course_id,
                'name'=>$request->name,
                'url'=>$request->url,
                'slug'=>$request->slug,
                'description'=>$request->description,
                'photo'=>$imageName
                ]);
                
                $request->photo->move(public_path('images/videos'), $imageName);
        
                return redirect()->route('video.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $video = Video::findOrFail($id);
        $course = Course::where('id', $video->course_id)->first();
        
        return view('dashboard.video.show', ['video'=>$video, 'course'=>$course]);
    }
    
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        $courseSelect = Course::where('id', $video->course_id)->first();
        $courses = Course::get();
        return view('dashboard.video.edit',['video'=>$video, 'courses'=>$courses, 'courseSelect'=>$courseSelect]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/videos/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'course_id'=> 'required',
                'name'=> 'required',
                'url'=> 'required|url',
                'slug'=> '',
                'description'=> 'required',    
                'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            try{
                $video = Video::where('id', $id)->update([
                    'course_id'=>$request->course_id,
                    'name'=>$request->name,
                    'url'=>$request->url,
                    'slug'=>$request->slug,
                    'description'=>$request->description,
                    'photo'=>$imageName
                ]);
                    
                $request->photo->move(public_path('images/videos'), $imageName);
                return redirect()->route('video.index')->with('success', 'Video Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'course_id'=> 'required',
                'name'=> 'required',
                'url'=> 'required|url',
                'slug'=> '',
                'description'=> 'required',    
            ]);
            
            try{
                $video = Video::where('id', $id)->update($data);
                return redirect()->route('video.index')->with('success', 'Video Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        
        try{
            $video->delete();
            return back()->with('success', 'Video deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
