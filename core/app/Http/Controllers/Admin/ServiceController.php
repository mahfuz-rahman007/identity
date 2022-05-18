<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    //
    public function service(){
        $services = Service::all();

        return view('admin.service.index' , compact('services'));
    }

    //Add Service
    public function add(){
        return view('admin.service.add');
    }

     // Store Service
     public function store(Request $request){

        $slug = Str::slug($request->title, '-');
        $services = Service::select('slug')->get();
      
         
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            'service_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $services) {
                  foreach($services as $service) {
                    if ($service->slug == $slug) {
                      return $fail('Title already taken!');
                    }
                  }
                }
              ],
            'description' => 'required|max:300',
            'status' => 'required',
        ]);

        $service = new Service();

        if($request->hasFile('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $service->image = $image;
        }

        if($request->hasFile('service_image')){

          $file = $request->file('service_image');
          $extension = $file->getClientOriginalExtension();
          $service_image = time().rand().'.'.$extension;
          $file->move('assets/front/img/', $service_image);

          $service->service_image	= $service_image;
      }

        $service->title = $request->title;
        $service->slug = $slug;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();


        Session::flash('success', 'Service Added successfully!');
        return redirect()->route('admin.service');
    }

     //Service Delete
     public function delete($id){
       
        $service = Service::find($id);
        @unlink('assets/front/img/'. $service->image);
        $service->delete();

        Session::flash('success', 'Service Deleted successfully!');
        return redirect()->route('admin.service');
    }

     //Service Edit
     public function edit($id){
       
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    
    }

      // Service Update
      public function update(Request $request, $id){
        

        $slug = Str::slug($request->title, '-');
        $services = Service::select('slug')->get();
        $service = Service::findOrFail($id);
        
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'service_image' => 'required|mimes:jpeg,jpg,png',
            'title' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) use ($slug, $services, $service) {
                  foreach($services as $serv) {
                    if ($service->slug != $slug) {
                      if ($serv->slug == $slug) {
                        return $fail('Title already taken!');
                      }
                    }
                  }
                }
              ],
            'description' => 'required|max:300',
            'status' => 'required',
        ]);

        $service = Service::find($id);
        if($request->hasFile('image')){
            @unlink('assets/front/img/'. $service->image);
             
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time().rand().'.'.$extension;
            $file->move('assets/front/img/', $image);

            $service->image = $image;
        }

        if($request->hasFile('service_image')){
          @unlink('assets/front/img/'. $service->service_image);
           
          $file = $request->file('service_image');
          $extension = $file->getClientOriginalExtension();
          $service_image = time().rand().'.'.$extension;
          $file->move('assets/front/img/', $service_image);

          $service->service_image = $service_image;
      }

        $service->title = $request->title;
        $service->slug = $slug;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save();

        Session::flash('success', 'Service Updated successfully!');
        return redirect()->route('admin.service');

    }
}
