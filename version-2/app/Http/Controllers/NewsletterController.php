<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Weeklyletter;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $weeklyletters = Weeklyletter::orderby('id','desc')->paginate(9);
        return view('dashboard.weeklyletter.index', ['weeklyletters'=>$weeklyletters]);
    }

    public function create()
    {
        return view('dashboard.weeklyletter.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title'=> 'required',
            'content'=> 'required',
            'status'=> 'required',
            'author_id'=> 'required',
        ]);

        try{
            Weeklyletter::create($data);
            return redirect()->route('weeklyletter.index');
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());    
        }
    }

    public function show($id){
        $weeklyletter = Weeklyletter::findOrFail($id);
        return view('dashboard.weeklyletter.show', ['weeklyletter'=>$weeklyletter]);
    }

    public function send(Request $request){
        dd('hit');
        $data = request()->validate([
            'letter_id'=> 'required',
        ]);
    }
    
    public function edit($id)
    {
        $weeklyletter = Weeklyletter::findOrFail($id);
        return view('dashboard.weeklyletter.edit', ['weeklyletter'=>$weeklyletter]);
    }
    
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'title'=> 'required',
            'content'=> 'required',
            'status'=> 'required',
        ]);
        
        try{
            $weeklyletter = Weeklyletter::where('id', $id)->update([
                'title'=> $request->title,
                'content'=> $request->content,
                'status'=> $request->status,
                ]);
            return redirect()->route('weeklyletter.index')->with('success', 'Weekly letter Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function destroy($id)
    {
        $weeklyletter = Weeklyletter::findOrFail($id);
        
        try{
            $weeklyletter->delete();
            return back()->with('success', 'Weekly letter Deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
