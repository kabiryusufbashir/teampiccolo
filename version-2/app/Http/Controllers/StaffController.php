<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::orderby('id','desc')->paginate(9);
        dd('hit');
        return view('dashboard.staff.index', ['admins'=>$admins]);
    }

    public function create()
    {
        return view('dashboard.staff.create');
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

        $imageName = '/images/staffs/'.time().'.'.$request->photo->extension();  
        
        try{
            Admin::create(
                [
                'title'=>$request->title,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'category'=>$request->category,
                'photo'=>$imageName,
                'password' => Hash::make('1234567890')
                ]);
                
                $request->photo->move(public_path('images/staffs'), $imageName);
                
                return redirect()->route('staff.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $admin = Admin::findOrFail($id);
        return view('dashboard.staff.show', ['admin'=>$admin]);
    }
    
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $adminStatus = $admin->status;
        
        if($adminStatus === "1"){
            $adminStatus = 'Active';
        }else{
            $adminStatus = 'De-Active';
        }

        return view('dashboard.staff.edit', ['admin'=>$admin, 'adminStatus'=>$adminStatus]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = '/images/staffs/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'title'=> 'required',
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'category'=> 'required',
                'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            try{
                $admin = admin::where('id', $id)->update([
                    'title'=> $request->title,
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'phone_number'=> $request->phone_number,
                    'category'=> $request->category,
                    'status'=> $request->status,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move(public_path('images/staffs'), $imageName);
                return redirect()->route('staff.index')->with('success', 'admin Updated');
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
                $admin = admin::where('id', $id)->update($data);
                return redirect()->route('staff.index')->with('success', 'admin Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $admin = admin::findOrFail($id);
        
        try{
            $admin->delete();
            return back()->with('success', 'admin deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
