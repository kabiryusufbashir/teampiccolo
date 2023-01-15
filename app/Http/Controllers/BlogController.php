<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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

    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('images/blogs', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            
            $url = '/images/blogs/'.$fileName; 
            
            $msg = 'Image successfully uploaded'; 
            
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title'=> 'required',
            'author'=> 'required',
            'caption'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=> 'required',
            'category'=> 'required',
            'status'=> 'required',
        ]);

        $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
        
        $slug = Str::slug($request->title, '-');

        try{
            Blog::create(
                [
                'title'=>$request->title,
                'caption'=>$request->caption,
                'slug'=>$slug,
                'author'=>$request->author,
                'photo'=>$imageName,
                'content'=>$request->content,
                'category'=>$request->category,
                'status'=>$request->status
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
        
        return view('dashboard.blog.edit', ['blog'=>$blog]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/blogs/'.time().'.'.$request->photo->extension();  
            
            $slug = Str::slug($request->title, '-');

            $data = request()->validate([
                'title'=> 'required',
                'caption'=> 'required',
                'content'=> 'required',
                'category'=> 'required',
                'status'=> 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            try{
                $blog = Blog::where('id', $id)->update([
                    'title'=> $request->title,
                    'caption'=> $request->caption,
                    'slug'=> $slug,
                    'content'=> $request->content,
                    'category'=> $request->category,
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
                'caption'=> 'required',
                'status'=> 'required',
                'content'=> 'required',
                'category'=> 'required'
            ]);
            
            $slug = Str::slug($request->title, '-');

            try{
                $blog = Blog::where('id', $id)->update([
                    'title'=> $request->title,
                    'caption'=> $request->caption,
                    'slug'=> $slug,
                    'content'=> $request->content,
                    'category'=> $request->category,
                    'status'=> $request->status,
                    ]);

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
