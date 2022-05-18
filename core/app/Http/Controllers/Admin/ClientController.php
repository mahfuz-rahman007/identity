<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Client;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function client(){
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }

    //Add Client
    public function add(){
        return view('admin.client.add');
    }

    // Store Client
    public function store(Request $request){
        
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
         
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'url' => 'regex:' . $regex,
        ]);


        $client = new Client();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $client->image = $image;
        }
        $client->url = $request->url;
        $client->save();


        Session::flash('success', 'Client Added successfully!');
        return redirect()->route('admin.client');
    }

    //Client Delete
    public function delete($id){
       
        $client = Client::find($id);
        @unlink('assets/front/img/'. $client->image);
        $client->delete();

        Session::flash('success', 'Client Deleted successfully!');
        return redirect()->route('admin.client');
    }

    //Client Delete
    public function edit($id){
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
    
    }

    // Client Update
    public function update(Request $request, $id){

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
         
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'url' => 'regex:' . $regex,
        ]);

        $client = Client::find($id);
        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $client->image);
             
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $client->image = $image;
        }
        $client->url = $request->url;
        $client->save();

        Session::flash('success', 'Client Updated successfully!');
        return redirect()->route('admin.client');

    }
}
