<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:Client');
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
            'title'=> 'required',
            'name'=> 'required',
            'email'=> 'required|email',
            'phone_number'=> 'required',
            'category'=> 'required',
            'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = '/images/clients/'.time().'.'.$request->photo->extension();  
        
        try{
            Client::create(
                [
                'title'=>$request->title,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'category'=>$request->category,
                'photo'=>$imageName,
                'password' => Hash::make('1234567890')
                ]);
                
                $request->photo->move(public_path('images/clients'), $imageName);
                
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
                'title'=> 'required',
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'category'=> 'required',
                'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            try{
                $client = Client::where('id', $id)->update([
                    'title'=> $request->title,
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'phone_number'=> $request->phone_number,
                    'category'=> $request->category,
                    'status'=> $request->status,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move(public_path('images/clients'), $imageName);
                return redirect()->route('client.index')->with('success', 'Client Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }else{
            $data = request()->validate([
                'title'=> 'required',
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'category'=> 'required',
                'status'=> '',
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
}
