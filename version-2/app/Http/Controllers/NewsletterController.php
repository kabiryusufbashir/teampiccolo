<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendLetterSubscribers;

use App\Models\Weeklyletter;
use App\Models\Newsletter;

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
        $data = request()->validate([
            'letter_id'=> 'required',
        ]);

        try{
            try{
                $weeklyletter = Weeklyletter::where('id', $request->letter_id)->first();
                $subscribers = Newsletter::select('emails')->get();
                    foreach([$subscribers] as $subscriber){
                        Mail::to($subscriber)
                        ->cc('kabiryusufbashir@gmail.com')
                        ->bcc('info@teampiccolo.com')
                        ->send(new SendLetterSubscribers($weeklyletter));
                    }
                
                return back()->with('success','New Letter Sent successfully');    
    
            }catch(Exception $e){
                return back()->with('error', $e->getMessage());    
            }
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());    
        }
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
