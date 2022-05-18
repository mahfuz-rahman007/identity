<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Experince;
use Illuminate\Support\Facades\Session;

class ExperinceController extends Controller
{
    //
    public function experince(){
      
        $experinces = Experince::orderBy('id', 'DESC')->get();
        return view('admin.experince.index', compact('experinces'));
    }

    //Add Experience
    public function add(){
        return view('admin.experince.add');
    }

    // Store Experience
    public function store(Request $request){
        
        $request->validate([
            'company' => 'required|max:225',
            'field' => 'required|max:225',
            'description' => 'required|max:300',
            'from_date' => 'required',
        ]);


        $experince = new Experince();
        
    
        $experince->company = $request->company;
        $experince->field = $request->field;
        $experince->description = $request->description;
        $experince->from_date = $request->from_date;
        $experince->date_to = $request->date_to;
        $experince->current = $request->current;

        $experince->save();


        Session::flash('success', 'Experince Added successfully!');
        return redirect()->route('admin.experince');
    }

    //Experince Delete
    public function delete($id){
       
        $service = Experince::find($id);
        $service->delete();

        Session::flash('success', 'Experince Deleted successfully!');
        return redirect()->route('admin.experince');
    }

    //Experince Edit
    public function edit($id){
       
        $experince = Experince::find($id);

        return view('admin.experince.edit', compact('experince'));
    
    }

    // Experience Update
    public function update(Request $request, $id){

        $request->validate([
            'company' => 'required|max:225',
            'field' => 'required|max:225',
            'description' => 'required|max:300',
            'from_date' => 'required',
        ]);

        $experince = Experince::findOrFail($id);
    
        $experince->company = $request->company;
        $experince->field = $request->field;
        $experince->description = $request->description;
        $experince->from_date = $request->from_date;
        $experince->date_to = $request->date_to;
        $experince->current = $request->current;

        $experince->save();


        Session::flash('success', 'Experience Added successfully!');
        return redirect()->route('admin.experince');

    }
}
