<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ebook;

class EbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $ebooks = Ebook::orderby('id','desc')->paginate(9);
        dd('hit');
        return view('dashboard.ebook.index', ['ebooks'=>$ebooks]);
    }

    public function create()
    {
        return view('dashboard.ebook.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=> 'required',
            'path'=> 'file|required',
        ]);

        $bookName = '/docs/ebooks/'.time().'.'.$request->path->extension();  
        
        try{
            Ebook::create(
                [
                'name'=>$request->name,
                'path'=>$bookName,
                ]);
                
                $request->path->move(public_path('docs/ebooks'), $bookName);
                
                return redirect()->route('ebook.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $ebook = Ebook::findOrFail($id);
        return view('dashboard.ebook.show', ['ebook'=>$ebook]);
    }
    
    public function edit($id)
    {
        $ebook = Ebook::findOrFail($id);
        
        return view('dashboard.ebook.edit', ['ebook'=>$ebook, 'ebookStatus'=>$ebookStatus]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->path !== null){

            $bookName = '/docs/ebooks/'.time().'.'.$request->path->extension();  
            
            $data = request()->validate([
                'name'=> 'required',
                'path' => 'file|required|doc,pdf,docx',
            ]);
            
            try{
                $ebook = ebook::where('id', $id)->update([
                    'name'=> $request->name,
                    'path'=> $bookName
                    ]);
                    
                $request->path->move(public_path('docs/ebooks'), $bookName);
                return redirect()->route('ebook.index')->with('success', 'Ebook Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'name'=> 'required',
                'content'=> 'required',
            ]);
            
            try{
                $ebook = Ebook::where('id', $id)->update($data);
                return redirect()->route('ebook.index')->with('success', 'Ebook Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $ebook = Ebook::findOrFail($id);
        
        try{
            $ebook->delete();
            return back()->with('success', 'Ebook deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
