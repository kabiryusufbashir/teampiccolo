<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


use App\Models\Admin;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Ebook;
use App\Models\Newsletter;

use App\Mail\ContactMail;
use App\Mail\NewsLetterMail;

class AdminController extends Controller
{
    public function index(){
        return view('welcome');    
    }

    public function contactPage(){
        return view('contact');    
    }

    public function setup(){
        return view('auth.setup');
    }

    public function aboutUs(){
        $staffs = Admin::orderby('name', 'asc')->get();
        return view('about', ['staffs'=>$staffs]);  
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try{
            Admin::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            try{
                if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
                    $request->session()->regenerate();
                    return redirect()->route('dashboard'); 
                }else{
                    return back()->with(['error' => 'Please try again later! ('.$e.')']);
                }
            }catch(Exception $e){
                return back()->with(['error' => 'Please try again later! ('.$e.')']);
            }
        }catch(Expection $e){
            return back()->with(['error' => 'Please try again later! ('.$e.')']);
        }
    }

    public function contact(Request $request){
        $data = request()->validate([
            'name'=> ['required'],
            'email'=> ['required', 'email'],
            'phone'=> ['required'],
            'enquiry'=> ['required'],
        ]);

        try{
            Contact::create($data);
            try{
                $sendmail = Contact::latest('id')->first();
                Mail::to('info@teampiccolo.com')
                    ->cc('kabiryusufbashir@gmail.com')
                    ->send(new ContactMail($sendmail));
                return redirect('/')->with('success','Thanks for Contacting, We will get back you soon!');    
    
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());    
        }
    }

    public function blog(){
        $blogs = Blog::where('status', 'publish')->orderby('id', 'desc')->paginate(9);
        return view('blog', ['blogs'=>$blogs]); 
    }

    public function webDevelopment(){
        $blogs = Blog::where('status', 'publish')->where('category', 'web development')->orderby('id', 'desc')->paginate(9);
        return view('webDevelopment', ['blogs'=>$blogs]); 
    }

    public function mobileDevelopment(){
        $blogs = Blog::where('status', 'publish')->where('category', 'mobile development')->orderby('id', 'desc')->paginate(9);
        return view('mobileDevelopment', ['blogs'=>$blogs]); 
    }

    public function computerApplication(){
        $blogs = Blog::where('status', 'publish')->where('category', 'computer application')->orderby('id', 'desc')->paginate(9);
        return view('mobileDevelopment', ['blogs'=>$blogs]); 
    }

    public function readBlog($id){
        $blog = Blog::findOrFail($id);
        $views = $blog->views + 1;
        $updateView = Blog::where('id', $id)->update(['views'=> $views]);
        
        $blog = Blog::findOrFail($id);
        
        return view('readBlog', ['blog'=>$blog]);

    }

    public function ebook(){
        $ebooks = Ebook::orderby('id', 'desc')->paginate(10);
        return view('ebook', ['ebooks'=>$ebooks]);  
    }

    public function ebookDownload($id){
        $ebook = Ebook::findOrFail($id);
        $downloads = $ebook->download + 1;
        $updateDownload = Ebook::where('id', $id)->update(['download'=> $downloads]);
        
        $ebook = Ebook::findOrFail($id);
        
        return view('ebookDownload', ['ebook'=>$ebook]);

    }

    public function subscribeToNewLetter(Request $request){
        $data = request()->validate([
            'emails'=> ['required', 'email'],
        ]);

        try{
            Newsletter::create($data);
            try{
                $sendmail = Newsletter::latest('id')->first();
                Mail::to($sendmail->emails)
                    ->cc('kabiryusufbashir@gmail.com')
                    ->bcc('info@teampiccolo.com')
                    ->send(new NewsLetterMail($sendmail));
                return redirect('/')->with('success','Thanks for subscribing to our newsletter');    
    
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
        }catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());    
        }
    }
}
