<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bcategory;
use Illuminate\Support\Facades\Session;

class BcategoryController extends Controller
{
    //
    public function bcategory(){
        $bcategories = Bcategory::all();
        return view('admin.blog.blog-category.index', compact('bcategories'));
    }
    
    // Add Blog Category
    public function add(){
        return view('admin.blog.blog-category.add');
    }

    // Store Blog Category
    public function store(Request $request){
    
        $request->validate([
            'name' => 'required|max:150', 
            'status' => 'required', 
        ]);
         
        $bcategory = new Bcategory();
        
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->save();


        Session::flash('success', 'Blog Category Added successfully!');
        return redirect()->route('admin.bcategory');
    }

    // Blog Category Delete
    public function delete($id){
    
        $bcategory = Bcategory::find($id);
        $bcategory->delete();

        Session::flash('success', 'Blog Category Deleted successfully!');
        return redirect()->route('admin.bcategory');
    }

    // Blog Category Edit
    public function edit($id){
    
        $bcategory = Bcategory::find($id);
        return view('admin.blog.blog-category.edit', compact('bcategory'));
    
    }

    // Blog Skill Category
    public function update(Request $request, $id){

        $id = $request->id;
        $request->validate([
            'name' => 'required|max:150', 
            'status' => 'required',
        ]);

        $bcategory = Bcategory::find($id);
        $bcategory->name = $request->name;
        $bcategory->status = $request->status;
        $bcategory->save();

        Session::flash('success', 'Blog Category Updated successfully!');
        return redirect()->route('admin.bcategory');
    }
}
