<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $blogs = Blog::orderby('id','desc')->paginate(9);
        return view('dashboard.blog.index', ['blogs'=>$blogs]);
    }

    public function create()
    {
        return view('dashboard.blog.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title'=> 'required',
            'author'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=> 'required',
        ]);

        $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
        
        try{
            Blog::create(
                [
                'title'=>$request->title,
                'author'=>$request->author,
                'photo'=>$imageName,
                'content'=>$request->content,
                ]);
                
                $request->photo->move('images/blogs', $imageName);
                
                return redirect()->route('blog.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $blog = Blog::findOrFail($id);
        return view('dashboard.blog.show', ['blog'=>$blog]);
    }
    
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blogStatus = $blog->status;
        
        if($blogStatus === "1"){
            $blogStatus = 'Active';
        }else{
            $blogStatus = 'De-Active';
        }

        return view('dashboard.blog.edit', ['blog'=>$blog, 'blogStatus'=>$blogStatus]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'title'=> 'required',
                'content'=> 'required',
                'status'=> '',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            try{
                $blog = Blog::where('id', $id)->update([
                    'title'=> $request->title,
                    'content'=> $request->content,
                    'status'=> $request->status,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move('images/blogs', $imageName);
                return redirect()->route('blog.index')->with('success', 'Blog Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'title'=> 'required',
                'status'=> '',
                'content'=> 'required',
            ]);
            
            try{
                $blog = Blog::where('id', $id)->update($data);
                return redirect()->route('blog.index')->with('success', 'Blog Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        try{
            $blog->delete();
            return back()->with('success', 'Blog deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
