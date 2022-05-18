<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PortfolioController extends Controller
{
    //
    public function portfolio(){
        $count = Portfolio::count();
        $portfolios = Portfolio::orderBy('id', 'DESC')->paginate(10); 

        return view('admin.portfolio.index',compact('portfolios','count'));
    }

    public function add(){
        $services = Service::where('status',1)->get();

        return view('admin.portfolio.add',compact('services'));
    }

    public function store(Request $request){
        $slug = Str::slug($request->title,'-');
        $portfolios =  Portfolio::select('slug')->get();

        $request->validate([
            'title' => [
                'required',
                'max:225',
                function($attribute, $value, $fail) use ($slug, $portfolios){
                    foreach($portfolios as $portfolio){
                        if($portfolio->slug == $slug){
                            return $fail('Title already taken!');
                        }
                    }
                }
            ],
            'featured_image' => 'required|mimes:jpeg,png,jpg',
            'client_name' => 'required|max:300',
            'service_id' => 'required',
            'start_date' => 'required',
            'submission_date' => 'required',
            'status' => 'required',
            'content' => 'required',
        ]);

        $portfolio = new Portfolio();

        if($request->hasFile('featured_image')){

            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $featured_image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $featured_image);

            $portfolio->featured_image = $featured_image;
        }

        $portfolio->title = $request->title;
        $portfolio->client_name = $request->client_name;
        $portfolio->service_id = $request->service_id;
        $portfolio->start_date = $request->start_date;
        $portfolio->submission_date = $request->submission_date;
        $portfolio->status = $request->status;
        $portfolio->slug = $slug;
        $portfolio->content = $request->content;
        $portfolio->save();


        Session::flash('success', 'Portfolio Added successfully!');
        return redirect()->route('admin.portfolio');
    }

    public function edit($id){
        $portfolio = Portfolio::find($id);
        $categories = Service::all();
        $portfolio_category = Service::find($portfolio->service_id);

        return view('admin.portfolio.edit',compact('portfolio','categories','portfolio_category'));
    }

      // Update Portfolio
      public function update(Request $request, $id){

       

        $slug = Str::slug($request->title, '-');
        $portfolios = Portfolio::get();
        $portfolio = Portfolio::findOrFail($request->id);
       
        $request->validate([
            'title' => [
                'required',
                'max:225',
                function($attribute, $value, $fail) use ($slug, $portfolios, $portfolio){
                    foreach($portfolios as $port){
                        if($portfolio->slug != $slug){
                            if($port->slug == $slug){
                                return $fail('Title already taken!');
                            }
                        }
                    }
                }
            ],
            'client_name' => 'required|max:300',
            'service_id' => 'required',
            'start_date' => 'required',
            'submission_date' => 'required',
            'status' => 'required',
            'content' => 'required',
        ]);
  

        if($request->hasFile('featured_image')){

            @unlink('assets/front/img/'. $portfolio->featured_image);

            $file = $request->file('featured_image');
            $extension = $file->getClientOriginalExtension();
            $featured_image = 'portfolio_'.time().rand().'.'.$extension;
            $file->move('assets/front/img/', $featured_image);

            $portfolio->featured_image = $featured_image;
            
        }
      
        $portfolio->title = $request->title;
        $portfolio->client_name = $request->client_name;
        $portfolio->service_id = $request->service_id;
        $portfolio->start_date = $request->start_date;
        $portfolio->submission_date = $request->submission_date;
        $portfolio->status = $request->status;
        $portfolio->slug = $slug;
        $portfolio->content = $request->content;
        $portfolio->save();

        Session::flash('success', 'Portfolio Updated successfully!');
        return redirect()->route('admin.portfolio');

    }
       // Portfolio Delete
       public function delete($id){

        $portfolio = Portfolio::find($id);
        @unlink('assets/front/img/'. $portfolio->featured_image);
        $portfolio->delete();

        Session::flash('success', 'Portfolio Deleted successfully!');
        return redirect()->route('admin.portfolio');
    }
}
