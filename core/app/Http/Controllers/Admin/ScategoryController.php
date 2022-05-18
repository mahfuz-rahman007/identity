<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Scategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScategoryController extends Controller
{
    //
    public function skillCategory(){
        $scategories = Scategory::all();

        return view('admin.skill.skill-category.index',compact('scategories'));
    }

    public function add(){
        return view('admin.skill.skill-category.add');
    }

      // Store Skill Category
      public function store(Request $request){
    
        $request->validate([
            'name' => 'required|max:150',
        ]);

        $scategory = new Scategory();
        
        $scategory->name = $request->name;
        $scategory->save();


        Session::flash('success', 'Skill Category Added successfully!');
        return redirect()->route('admin.scategory');
    }

        // Skill Category Delete
        public function delete($id){
    
            $scategory = Scategory::find($id);
            $scategory->delete();
    
            Session::flash('success', 'Skill Category Deleted successfully!');
            return redirect()->route('admin.scategory');
        }
    
        // Skill Category Edit
        public function edit($id){
        
            $scategory = Scategory::find($id);
            return view('admin.skill.skill-category.edit', compact('scategory'));
        
        }
    
        // Update Skill Category
        public function update(Request $request, $id){
    
            $id = $request->id;
            $request->validate([
                'name' => 'required|max:150',
            ]);
    
            $scategory = Scategory::find($id);
            $scategory->name = $request->name;
            $scategory->save();
    
            Session::flash('success', 'Skill Category Updated successfully!');
            return redirect()->route('admin.scategory');
        }
}
