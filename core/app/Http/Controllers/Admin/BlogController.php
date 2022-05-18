<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bcategory;
use App\Blog;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function blog(){
        $count = Blog::count();
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('admin.blog.index', compact('blogs', 'count'));
    }

    // Add Blog 
    public function add(){
        $bcategories = Bcategory::where('status', 1)->get();
        return view('admin.blog.add', compact('bcategories'));
    }

    // Store Blog 
    public function store(Request $request){
        $slug = Str::slug($request->title, '-');
        $blogs = Blog::select('slug')->get();


        $request->validate([
            'main_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $blogs){
                    foreach($blogs as $blog){
                        if($blog->slug == $slug){
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'status' => 'required',
            'content' => 'required',
            'bcategory_id' => 'required',
        ]);


        $blog = new Blog();

        if($request->hasFile('main_image')){

            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $main_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $main_image);

            $blog->main_image = $main_image;
        }

        $blog->title = $request->title;
        $blog->status = $request->status;
        $blog->content = $request->content;
        $blog->slug = $slug;
        $blog->bcategory_id = $request->bcategory_id;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->save();


        Session::flash('success', 'Blog Added successfully!');
        return redirect()->route('admin.blog');
    }

    // Blog  Delete
    public function delete($id){

        $blog = Blog::find($id);
        @unlink('assets/front/img/'. $blog->main_image);
        $blog->delete();

        Session::flash('success', 'Blog Category Deleted successfully!');
        return redirect()->route('admin.blog');
    }

    // Blog  Edit
    public function edit($id){

        $blog = Blog::findOrFail($id);
        $bcategories = Bcategory::where('status', 1)->get();
        return view('admin.blog.edit', compact('bcategories', 'blog'));

    }

    // Blog Update
    public function update(Request $request, $id){

        $slug = Str::slug($request->title, '-');
        $blogs = Blog::select('slug')->get();
        $blog = Blog::findOrFail($request->id);
       
        $request->validate([
            'main_image' => 'mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $blogs, $blog){
                    foreach($blogs as $blg){
                        if($blog->slug != $slug){
                            if($blg->slug == $slug){
                                return $fail('Title already taken!');
                            }
                        }
                    }
                }
            ],
            'status' => 'required',
            'content' => 'required',
            'bcategory_id' => 'required',
        ]);

        if($request->hasFile('main_image')){
            @unlink('assets/front/img/'. $blog->main_image);

            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $main_image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $main_image);

            $blog->main_image = $main_image;
            
        }
        
        $blog->title = $request->title;
        $blog->status = $request->status;
        $blog->content = $request->content;
        $blog->slug = $slug;
        $blog->bcategory_id = $request->bcategory_id;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;

        $blog->save();

        Session::flash('success', 'Blog Added successfully!');
        return redirect()->route('admin.blog');
    }
}
