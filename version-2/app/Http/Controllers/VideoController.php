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
        dd('hit');
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
        ]);

        try{
            Video::create(
                [
                'course_id'=>$request->course_id,
                'name'=>$request->name,
                'url'=>$request->url,
                'slug'=>$request->slug,
                'description'=>$request->description,
                ]);
                
                return redirect()->route('all-video');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }
    
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('dashboard.video.edit',['video'=>$video]);
    }
    
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'course_id'=> 'required',
            'name'=> 'required',
            'url'=> 'required|url',
            'slug'=> 'required',
            'description'=> 'required',
        ]);
        
        try{
            $video = Video::where('id', $id)->update([
                'course_id'=> $request->course_id,
                'name'=> $request->name,
                'url'=> $request->url,
                'slug'=> $request->slug,
                'description'=> $request->description,
                ]);
                
            return redirect()->route('all-video')->with('success', 'video Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        
        try{
            $video->delete();
            return back()->with('success', 'video deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
