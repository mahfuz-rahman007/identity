<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    public function testimonial(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    //Add Testimonial
    public function add(){
        return view('admin.testimonial.add');
    }

    // Store Testimonial
    public function store(Request $request){
        
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'rating' => 'required',
            'message' => 'required|max:300',
        ]);

        $testimonial = new Testimonial();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $testimonial->image = $image;
        }

        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->rating = $request->rating;
        $testimonial->message = $request->message;
        $testimonial->save();


        Session::flash('success', 'Testimonial Added successfully!');
        return redirect()->route('admin.testimonial');
    }

    //Testimonial Delete
    public function delete($id){
       
        $testimonial = Testimonial::find($id);
        @unlink('assets/front/img/'. $testimonial->featured_image);
        $testimonial->delete();

        Session::flash('success', 'Testimonial Deleted successfully!');
        return redirect()->route('admin.testimonial');
    }

    //Service Delete
    public function edit($id){
       
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    
    }

    // Testimonial Update
    public function update(Request $request, $id){

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:100',
            'position' => 'required|max:100',
            'rating' => 'required',
            'message' => 'required|max:300',
        ]);

        $testimonial = Testimonial::find($id);
        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $testimonial->image);
             
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $testimonial->image = $image;
        }
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->rating = $request->rating;
        $testimonial->message = $request->message;
        $testimonial->save();

        Session::flash('success', 'Testimonial Updated successfully!');
        return redirect()->route('admin.testimonial');

    }
}
