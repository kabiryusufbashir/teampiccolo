<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMailClient;

use App\Models\Client;
use App\Models\Clientsendmail;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $clients = Client::orderby('id','desc')->paginate(9);
        return view('dashboard.client.index', ['clients'=>$clients]);
    }

    public function create()
    {
        return view('dashboard.client.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'phone_number'=> 'required',
            'website'=> 'required|url',
            'address'=> 'required',
            'company'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contract_description'=> 'required',
            'date_signed'=> 'required'
        ]);

        $imageName = '/images/clients/'.time().'.'.$request->photo->extension();  
        
        try{
            Client::create(
                [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'website'=>$request->website,
                'address'=>$request->address,
                'company'=>$request->company,
                'photo'=>$imageName,
                'contract_description'=>$request->contract_description,
                'date_signed'=>$request->date_signed
                ]);
                
                $request->photo->move('images/clients', $imageName);
                
                return redirect()->route('client.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $client = Client::findOrFail($id);
        return view('dashboard.client.show', ['client'=>$client]);
    }
    
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $clientStatus = $client->status;
        
        if($clientStatus === "1"){
            $clientStatus = 'Active';
        }else{
            $clientStatus = 'De-Active';
        }

        return view('dashboard.client.edit', ['client'=>$client, 'clientStatus'=>$clientStatus]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/clients/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'website'=> 'required|url',
                'address'=> 'required',
                'company'=> 'required',
                'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'contract_description'=> 'required',
                'date_signed'=> 'required'
            ]);
            
            try{
                $client = Client::where('id', $id)->update([
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'phone_number'=> $request->phone_number,
                    'website'=> $request->website,
                    'address'=> $request->address,
                    'company'=> $request->company,
                    'photo'=> $imageName,
                    'contract_description'=> $request->contract_description,
                    'date_signed'=> $request->date_signed
                ]);
                    
                $request->photo->move('images/clients', $imageName);
                return redirect()->route('client.index')->with('success', 'Client Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'website'=> 'required|url',
                'address'=> 'required',
                'company'=> 'required',
                'contract_description'=> 'required',
                'date_signed'=> 'required'
            ]);
            
            try{
                $client = Client::where('id', $id)->update($data);
                return redirect()->route('client.index')->with('success', 'Client Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        
        try{
            $client->delete();
            return back()->with('success', 'Client Deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function composeMail($id){
        $client = Client::findOrFail($id);
        
        return view('dashboard.client.sendmail', ['client'=>$client]);
    }

    public function sendMail(Request $request){
        $data = request()->validate([
            'client_id'=> 'required',
            'message'=> 'required'
        ]);

        try{
            Clientsendmail::create($data);
            try{
                $sendmail = Clientsendmail::latest('id')->first();
                Mail::to($sendmail->client->email)
                    ->cc('kabiryusufbashir@gmail.com')
                    ->bcc('info@teampiccolo.com')
                    ->send(new SendMailClient($sendmail));
                return back()->with('success','Message Sent successfully');    
    
            }catch(Exception $e){
                return back()->with('error', $e->getMessage());    
            }
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());    
        }
    }
}
