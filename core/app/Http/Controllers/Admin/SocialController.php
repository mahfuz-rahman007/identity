<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Social;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    //
       //  Social Links
       public function slinks(){
        $slinks = Social::all();
        return view('admin.settings.social.index', compact('slinks'));
    }

    // Store Social Link
    public function storeSlinks(Request $request){
        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $slink = new Social();
        $slink->icon = $request->icon;
        $slink->url = $request->url;
        $slink->save();

        Session::flash('success', 'Social Link Added Successfully!');
       return redirect()->route('admin.slinks');
    }

      // Edit Social Links
      public function editSlinks($id){
        $slink = Social::findOrFail($id);
        return view('admin.settings.social.edit', compact('slink'));
    }

    // Update Social Links
    public function updateSlinks(Request $request, $id){

        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $slink = Social::findOrFail($id);
        $slink->icon = $request->icon;
        $slink->url = $request->url;
        $slink->save();

        Session::flash('success', 'Social Link Updated Successfully!');
       return redirect()->route('admin.slinks');
    }    

    // Delete Social Links
    public function deleteSlinks($id){

        $slink = Social::findOrFail($id);
        $slink->delete();

        Session::flash('success', 'Social Link Delete Successfully!');
        return redirect()->route('admin.slinks');
    }

}
