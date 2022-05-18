<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function editProfile(){
    

        return view('admin.profile.editprofile');

    }

    public function updateProfile(Request $request){

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'first_name' => 'required',
            'position' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $adminProfile=Admin::first();

        if($request->hasFile('image')){
            @unlink('assets/front/img'.$adminProfile->image);
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $image='adminProfile_'.time().rand().'.'.$extension;
            $file->move('assets/front/img',$image);
            $adminProfile->image=$image;
        }

        $adminProfile->username = $request->username;
        $adminProfile->email = $request->email;
        $adminProfile->first_name = $request->first_name;
        $adminProfile->last_name = $request->last_name;
        $adminProfile->position = $request->position;
        $adminProfile->save();

        Session::flash('success', 'Admin Profile Updated successfully!');
        return redirect()->route('admin.editProfile');
    }

     // Edit Admin Password
     public function editPassword(){
        return view('admin.profile.changepass');
    }

    public function updatePassword(Request $request) {
        $messages = [
            'password.required' => 'The new password field is required',
            'password.confirmed' => "Password doesn't match"
        ];
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ], $messages);
        // if given old password matches with the password of this authenticated user...
        if(Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
            $oldPassMatch = 'matched';
        } else {
            $oldPassMatch = 'not_matched';
        }
        if ($validator->fails() || $oldPassMatch =='not_matched') {
            if($oldPassMatch == 'not_matched') {
              $validator->errors()->add('oldPassMatch', true);
            }
            return redirect()->route('admin.editPassword')
                        ->withErrors($validator);
        }
  
        // updating password in database...
        $user = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
  
        Session::flash('success', 'Password changed successfully!');
  
        return redirect()->back();
      }
}
