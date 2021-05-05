<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Record;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        dd('hit');
        $records = Record::orderby('id','desc')->paginate(9);
        return view('dashboard.record.index', ['records'=>$records]);
    }

    public function create()
    {
        return view('dashboard.record.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'transaction_type'=> 'required',
            'amount'=> 'required',
            'transaction_details'=> 'required',
            'date_of_transaction'=> 'required',
            'admin_id'=> 'required'
        ]);

        try{
            Record::create($data);
                return redirect()->route('record.index');
            }catch(Exception $e){
                return redirect('/')->with('error', $e->getMessage());    
            }
    }

    public function show($id){
        $record = Record::findOrFail($id);
        return view('dashboard.record.show', ['record'=>$record]);
    }
    
    public function edit($id)
    {
        $record = Record::findOrFail($id);
        return view('dashboard.record.edit', ['record'=>$record, 'recordStatus'=>$recordStatus]);
    }
    
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'transaction_type'=> 'required',
            'amount'=> 'required',
            'transaction_details'=> 'required',
            'date_of_transaction'=> 'required',
            'admin_id'=> 'required'
        ]);
        
        try{
            $record = Record::where('id', $id)->update($data);
            return redirect()->route('record.index')->with('success', 'Record Updated');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }

    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        
        try{
            $record->delete();
            return back()->with('success', 'Record Deleted');
        }catch(Exception $e){
            return back()->with('error', 'Please try again... '.$e);
        }
    }
}
