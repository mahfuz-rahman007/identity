<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    //
    public function basicinfo(){

        return view('admin.settings.basicinfo');
    }

    public function updateBasicinfo(Request $request){

        $request->validate([
            'website_title' => 'required',
            'base_color' => 'required',
            'header_logo' => 'mimes:jpeg,jpg,png',
            'fav_icon' => 'mimes:jpeg,jpg,png',
            'breadcrumb_image' => 'mimes:jpeg,jpg,png',
            'heroarea_bg' => 'mimes:jpeg,jpg,png',
        ]);

        $basicsettings = Setting::first();

        if($request->hasFile('header_logo')){
            @unlink('assets/front/img/'. $basicsettings->header_logo);
            $file = $request->file('header_logo');
            $extension = $file->getClientOriginalExtension();
            $header_logo = 'header_logo_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $header_logo);
            $basicsettings->header_logo = $header_logo;
        }
        
         if($request->hasFile('fav_icon')){
            @unlink('assets/front/img/'. $basicsettings->fav_icon);
            $file = $request->file('fav_icon');
            $extension = $file->getClientOriginalExtension();
            $fav_icon = 'fav_icon_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $fav_icon);
            $basicsettings->fav_icon = $fav_icon;
        }

         if($request->hasFile('breadcrumb_image')){
            @unlink('assets/front/img/'. $basicsettings->breadcrumb_image);

            $file = $request->file('breadcrumb_image');
            $file->move('assets/front/img/', 'breadcrumb_image.jpg');
        }

         if($request->hasFile('heroarea_bg')){
            @unlink('assets/front/img/'. $basicsettings->heroarea_bg);

            $file = $request->file('heroarea_bg');
            $file->move('assets/front/img/','heroarea_bg.jpg');
        }

        $basicsettings->website_title = $request->website_title;
        $basicsettings->base_color = $request->base_color;

        $basicsettings->save();

        Session::flash('success', 'Basic Setting Updated successfully!');
        return redirect()->route('admin.basicinfo');
    
    }

// section 
    public function sectiontitle(){
        return view('admin.settings.sectiontitle');

     }

     public function updateSectiontitle(Request $request){
      
        $request->validate([
          'education_title' => 'required|max:150',
          'experince_title' => 'required|max:150',
          'service_title' => 'required|max:150',
          'portfolio_title' => 'required|max:150',
          'resume_title' => 'required|max:150',
          'client_title' => 'required|max:150',
          'testimonial_title' => 'required|max:150',
          'blog_title' => 'required|max:150',
          'contact_title' => 'required|max:150',
        ]);
 
        $basicsettings = Setting::first();
 
        $basicsettings->education_title = $request->education_title;
        $basicsettings->experince_title = $request->experince_title;
        $basicsettings->service_title = $request->service_title;
        $basicsettings->portfolio_title = $request->portfolio_title;
        $basicsettings->resume_title = $request->resume_title;
        $basicsettings->client_title = $request->client_title;
        $basicsettings->testimonial_title = $request->testimonial_title;
        $basicsettings->blog_title = $request->blog_title;
        $basicsettings->contact_title = $request->contact_title;
        $basicsettings->save();
 
        Session::flash('success', 'Section title Updated Successfully!');
        return redirect()->route('admin.sectiontitle');
 
     }

      // Update SEO Information
    public function seoinfo(){
        return view('admin.settings.seo');
     }
     public function updateSeoinfo(Request $request){
       
       $basicsettings = Setting::first();
 
       $basicsettings->meta_keywords = $request->meta_keywords;
       $basicsettings->meta_description = $request->meta_description;
       $basicsettings->save();
 
       Session::flash('success', 'SEO Info Updated Successfully!');
       return redirect()->route('admin.seoinfo');
 
    }

    // scripts
    public function scripts(){
        return view('admin.settings.scripts');
    }

    public function updateScripts(Request $request){

        $request->validate([
           'disqus_username' => 'required',
        ]);
  
        $scriptsettings = Setting::first();
        $scriptsettings->disqus_username = $request->disqus_username;
  
        if($request->is_disqus == 'on'){
           $scriptsettings->is_disqus = 1;
        }else{
           $scriptsettings->is_disqus = 0;
        }
  
        $scriptsettings->save();
  
        Session::flash('success', 'Scripts Updated Successfully!');
        return redirect()->route('admin.scripts');
     }
}
