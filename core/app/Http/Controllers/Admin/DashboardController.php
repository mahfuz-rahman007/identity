<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Blog;
use App\Service;
use App\Client;
use App\Portfolio;
use App\Scategory;
use App\About;

class DashboardController extends Controller
{
    //
    public function dashboard(){

        $services = Service::where('status',1)->orderby('id','DESC')->limit(6)->get();
        // $blogs = Blog::where('status',1)->orderby('id','DESC')->limit(5)->get();
        $services_count = Service::where('status', 1)->get();
        $blogs_count = Blog::where('status', 1)->get();
        $clients = Client::all();
        $portfolios = Portfolio::all();
        $about = About::first();
        // $scategories = Scategory::with('skills')->get();


        return view('admin.dashboard', compact('services','clients', 'portfolios', 'about', 'services_count', 'blogs_count'));
    }

}
