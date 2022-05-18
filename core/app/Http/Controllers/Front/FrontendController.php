<?php

namespace App\Http\Controllers\Front;

use App\Education;
use App\Experince;
use App\Http\Controllers\Controller;
use App\Scategory;
use App\Service;
use App\Portfolio;
use App\Funfact;
use App\Testimonial;
use App\Client;
use App\Blog;
use App\Archive;
use App\Bcategory;
use App\About;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $educations = Education::orderBy('id', 'DESC')->get();
        $experinces = Experince::orderBy('id', 'DESC')->get();
        $scategories = Scategory::with('skills')->orderBy('id', 'DESC')->get();
        $services = Service::where('status', 1)->orderBy('id', 'DESC')->get();
        $portfolios = Portfolio::orderBy('id', 'DESC')->limit(9)->get();
        $funfacts = Funfact::orderBy('id', 'DESC')->get();
        $testimonials = Testimonial::orderBy('id', 'DESC')->limit(9)->get();
        $clients = Client::orderBy('id', 'DESC')->get();

       
        $blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();


        return view('front.index', compact('educations', 'experinces', 'scategories', 'services', 'portfolios', 'funfacts', 'testimonials', 'blogs', 'clients'));
    }


       // Blog Page  Funtion
       public function blogs(Request $request){
        $category = $request->category;
        $term = $request->term;
        $month = $request->month;
        $year = $request->year;
        $bcategories = Bcategory::where('status', 1)->orderBy('id', 'DESC')->get();
        $archives = Archive::orderBy('id', 'DESC')->get();

          if (!empty($month) && !empty($year)) {
              $archive = true;
            } else {
              $archive = false;
            }
        $latestblogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();
        $blogs = Blog::where('status', 1)
                        ->when($category, function ($query, $category) {
                            return $query->where('bcategory_id', $category);
                        })
                        ->when($term, function ($query, $term) {
                            return $query->where('title', 'like', '%'.$term.'%');
                        })
                        ->when($archive, function ($query) use ($month, $year) {
                            return $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
                        })
                        ->orderBy('id', 'DESC')->paginate(6);

        return view('front.blogs', compact('blogs', 'bcategories', 'archives', 'latestblogs'));
    }

    // Blog Details  Funtion
    public function blogdetails($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $latestblogs = Blog::where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();
        $bcategories = Bcategory::where('status', 1)->orderBy('id', 'DESC')->get();
        $archives = Archive::orderBy('id', 'DESC')->get();
        return view('front.blog-details', compact('blog', 'bcategories', 'latestblogs', 'archives'));
    }

    // 
   // Email Sends  Funtions
    public function sendmail(Request $request) {
        
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'subject' => 'required',
          'message' => 'required'
        ]);
  
        $about =  About::first();
        $from = $request->email;
        $to = $about->mail;
        $subject = $request->subject;
        $message = $request->message;
  
        $headers = "From: $request->name <$from> \r\n";
        $headers .= "Reply-To: $request->name <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        @mail($to, $subject, $message, $headers);
  
        Session::flash('success', 'Email sent successfully!');
        return back();
  
    }

       // Portfolio  Funtions
       public function portfolios(Request $request){
        $category = $request->category;
        $term = $request->term;
        $scategories = Service::where('status', 1)->get();

        $portfolios = Portfolio::when($category, function ($query, $category) {
                                    return $query->where('service_id', $category);
                                })
                                ->orderBy('id', 'DESC')->paginate(9);

        return view('front.portfolios', compact('portfolios', 'scategories'));
    }

    //Portfolio Details
    public function portfoliodetails($slug) {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
        return view('front.portfolio-details', compact('portfolio'));
    }

    public function service(){
        $services = Service::where('status', 1)->orderBy('id', 'DESC')->paginate(6);

        return view('front.service' , compact('services'));
    }

     //Portfolio Details
     public function servicedetails($slug) {
        $services = Service::where('status', 1)->orderBy('id', 'DESC')->get();
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('front.service-details', compact('service','services'));
    }
}
