<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $courses = Course::orderby('name','desc')->paginate(9);

        return view('dashboard.course.index', ['courses'=>$courses]);
    }

    public function create()
    {
        return view('dashboard.course.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=> 'required',
            'slug'=> '',
            'description'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'images/courses/'.time().'.'.$request->photo->extension();  
        
        try{
            Course::create([
                'name'=>$request->name,
                'slug'=>$request->slug,
                'description'=>$request->description,
                'photo'=>$imageName
                ]);

                $request->photo->move(public_path('images/courses'), $imageName);
                
                return redirect()->route('all-course');
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());    
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        
        try{
            $course->delete();
            return back()->with('success', 'Course deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
