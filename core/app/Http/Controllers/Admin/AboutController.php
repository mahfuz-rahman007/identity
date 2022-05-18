<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Funfact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    //

    public function about_me(){

        $about=About::findOrFail(1);
        
        return view('admin.about.about_me' , compact('about'));

    }

    public function update_about_me(Request $request){


        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'residence' => 'required',
            'freelance' => 'required',
            'about_title' => 'required',
            'about_text' => 'required',
            'position_type' => 'required',
            'resume' => 'mimes:pdf',

        ]);

        $aboutMe = About::first();

        if($request->hasFile('avatar')){
            @unlink('assets/front/img'.$aboutMe->avatar);

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $avatar = 'avatar_'.time().rand().'.'.$extension;
            $file->move('assets/front/img',$avatar);
            $aboutMe->avatar = $avatar;
        }

        if($request->hasFile('profile_image')){
            @unlink('assets/front/img'.$aboutMe->profile_image);

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $profile_image = 'profile_image_'.time().rand().'.'.$extension;
            $file->move('assets/front/img',$profile_image);
            $aboutMe->profile_image = $profile_image;
        }

        if($request->hasFile('resume')){
            @unlink('assets/front/file'.$aboutMe->resume);
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $resume = 'resume_'.time().rand().'.'.$extension;
            $file->move('assets/front/file',$resume);
            $aboutMe->resume = $resume;
        }

        $aboutMe->name = $request->name;
        $aboutMe->age = $request->age;
        $aboutMe->residence = $request->residence;
        $aboutMe->position_type = $request->position_type;
        $aboutMe->about_title = $request->about_title;
        $aboutMe->about_text = $request->about_text;
        $aboutMe->freelance = $request->freelance;
       
        $aboutMe->save();

        Session::flash('success', 'About Updated successfully!');
        return redirect()->route('admin.about_me');

    }


    // Contact-infoo
    public function contact_info(){

        $about=About::findOrFail(1);
        
        return view('admin.about.contact-info' , compact('about'));

    }

    // contact info update
    public function contact_info_update(Request $request){

        $request->validate([

            'address' => 'required',
            'mail' => 'required',
            'phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

        ]);

        $contact_info = About::first();
        $contact_info->address = $request->address;
        $contact_info->mail = $request->mail;
        $contact_info->phone = $request->phone;
        $contact_info->latitude = $request->latitude;
        $contact_info->longitude = $request->longitude;

        $contact_info->save();

        Session::flash('success', 'Contact Info Updated successfully!');
        return redirect()->route('admin.contact_info');

    }

    // funfact
    public function funfact(){

        $funfacts = Funfact::all();

        return view('admin.about.funfact.index',compact('funfacts'));

    }

    public function funfact_add(){
        return view('admin.about.funfact.add');
    }

    // funfact store
    public function funfact_store(Request $request){
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        $funfact = new Funfact();
        $funfact->name = $request->name;
        $funfact->value = $request->value;
        $funfact->save();

        Session::flash('success','Funfact Added Successfully');
        return redirect()->route('admin.funfact');
    }

    public function funfact_edit($id){

        $funfact = Funfact::findOrFail($id);
        return view('admin.about.funfact.edit', compact('funfact'));
    }

    public function funfact_update(Request $request, $id){
        $funfact = Funfact::findOrFail($id);

        $funfact->name = $request->name;
        $funfact->value = $request->value;

        $funfact->save();

        Session::flash('success', ' Fun Fact Update successfully!');
        return redirect()->route('admin.funfact');
    }

    public function funfact_delete($id){
       
        $funfact = Funfact::findOrFail($id);
        $funfact->delete();

        Session::flash('success', ' Fun Fact Deleted successfully!');
        return redirect()->route('admin.funfact');
    }
}


