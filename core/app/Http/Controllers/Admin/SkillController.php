<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use App\Scategory;
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
{
    //
    public function skill(){
        $skills = Skill::orderBy('id', 'DESC')->paginate(10);
        return view('admin.skill.index', compact('skills'));
    }
    
    // Add Skill 
    public function add(){
        $scategories = Scategory::all();
        return view('admin.skill.add', compact('scategories'));
    }

    // Store Skill 
    public function store(Request $request){
    
        $request->validate([
            'name' => 'required|max:225',
            'scategory_id' => 'required',
            'level' => 'required',
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->scategory_id = $request->scategory_id;
        $skill->save();


        Session::flash('success', 'Skill Added successfully!');
        return redirect()->route('admin.skill');
    }

    // Skill  Delete
    public function delete($id){
    
        $skill = Skill::find($id);
        $skill->delete();

        Session::flash('success', 'Skill Deleted successfully!');
        return redirect()->route('admin.skill');
    }

    // Skill  Edit
    public function edit($id){
        $scategories = Scategory::all();
        $skill = Skill::find($id);
        return view('admin.skill.edit', compact('skill', 'scategories'));
    
    }

    // Update Skill Category
    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'name' => 'required|max:225',
            'scategory_id' => 'required',
            'level' => 'required',
        ]);

        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->scategory_id = $request->scategory_id;
        $skill->level = $request->level;
        $skill->save();

        Session::flash('success', 'Skill Updated successfully!');
        return redirect()->route('admin.skill');
    }
}
