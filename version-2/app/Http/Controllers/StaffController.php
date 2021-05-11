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
        $staffs = Admin::orderby('id','desc')->paginate(9);
        return view('dashboard.staff.index', ['staffs'=>$staffs]);
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

        $imageName = 'images/staffs/'.time().'.'.$request->photo->extension();  
        
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
        $staff = Admin::findOrFail($id);
        return view('dashboard.staff.show', ['staff'=>$staff]);
    }
    
    public function edit($id)
    {
        $staff = Admin::findOrFail($id);
        $staffStatus = $staff->status;
        $staffCategory = $staff->category;
        
        if($staffStatus === "1"){
            $staffStatus = 'Active';
        }else{
            $staffStatus = 'De-Active';
        }

        if($staffCategory === "1"){
            $staffCategory = 'Super User';
        }else{
            $staffCategory = 'Regular User';
        }

        return view('dashboard.staff.edit', ['staff'=>$staff, 'staffStatus'=>$staffStatus, 'staffCategory'=>$staffCategory]);
    }
    
    public function update(Request $request, $id)
    {
        if($request->photo !== null){

            $imageName = 'images/staffs/'.time().'.'.$request->photo->extension();  
            
            $data = request()->validate([
                'title'=> 'required',
                'name'=> 'required',
                'email'=> 'required|email',
                'phone_number'=> 'required',
                'category'=> 'required',
                'photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            try{
                $staff = Admin::where('id', $id)->update([
                    'title'=> $request->title,
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'phone_number'=> $request->phone_number,
                    'category'=> $request->category,
                    'status'=> $request->status,
                    'photo'=> $imageName
                    ]);
                    
                $request->photo->move(public_path('images/staffs'), $imageName);
                return redirect()->route('staff.index')->with('success', 'Staff Updated');
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
                $staff = Admin::where('id', $id)->update($data);
                return redirect()->route('staff.index')->with('success', 'Staff Updated');
            }catch(Exception $e){
                return back()->with('error', 'Please try again... '.$e);
            }
        }
    }

    public function destroy($id)
    {
        $staff = Admin::findOrFail($id);
        
        try{
            $staff->delete();
            return back()->with('success', 'Staff deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
