<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Education;
use Illuminate\Support\Facades\Session;

class EducationController extends Controller
{
    //
    public function education(){
        $educations = Education::orderBy('id', 'DESC')->get();
        return view('admin.education.index', compact('educations'));
    }

    //Add Education
    public function add(){
        return view('admin.education.add');
    }

        // Store Education
        public function store(Request $request){

            $request->validate([
                'school' => 'required|max:225',
                'field' => 'required|max:225',
                'description' => 'required|max:300',
                'from_date' => 'required',
            ]);
    
    
            $education = new Education();
    
    
            $education->school = $request->school;
            $education->field = $request->field;
            $education->description = $request->description;
            $education->from_date = $request->from_date;
            $education->date_to = $request->date_to;
            $education->current = $request->current;
    
            $education->save();
    
    
            Session::flash('success', 'Education Added successfully!');
            return redirect()->route('admin.education');
        }

            //Education Delete
    public function delete($id){

        $service = Education::find($id);
        $service->delete();

        Session::flash('success', 'Education Deleted successfully!');
        return redirect()->route('admin.education');
    }

    
    //Education Edit
    public function edit($id){

        $education = Education::find($id);

        return view('admin.education.edit', compact('education'));

    }

    // Education Update
    public function update(Request $request, $id){

        $request->validate([
            'school' => 'required|max:225',
            'field' => 'required|max:225',
            'description' => 'required|max:300',
            'from_date' => 'required',
        ]);


        $education = Education::findOrFail($id);


        $education->school = $request->school;
        $education->field = $request->field;
        $education->description = $request->description;
        $education->from_date = $request->from_date;
        $education->date_to = $request->date_to;
        $education->current = $request->current;

        $education->save();


        Session::flash('success', 'Education Added successfully!');
        return redirect()->route('admin.education');

    }

}
