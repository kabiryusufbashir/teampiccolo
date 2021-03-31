<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newsletter;

use App\Mail\NewsLetterMail;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request){
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
