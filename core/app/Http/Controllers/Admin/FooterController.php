<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    //
    public function index(){
        return view('admin.footer.index');
    }

    public function update(Request $request){

        $request->validate([
            'copyright_text' => 'required|max:250',
            'footer_logo' => 'mimes:jpeg,jpg,png',
         ]);

        $basicsettings = Setting::first();

        if($request->hasFile('footer_logo')){
           @unlink('assets/front/img/'. $basicsettings->footer_logo);
           $file = $request->file('footer_logo');
           $extension = $file->getClientOriginalExtension();
           $footer_logo = 'footer_logo_'.time().rand().'.'.$extension;
           $file->move('assets/front/img/', $footer_logo);
           $basicsettings->footer_logo = $footer_logo;
       }

       $basicsettings->copyright_text = $request->copyright_text;
       $basicsettings->save();

       Session::flash('success', 'Footer Info Updated successfully!');
       return redirect()->route('admin.footer.index');
    }
}
