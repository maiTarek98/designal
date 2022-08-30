<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Slider;
use App\Models\GeneralSettings;
use App\Models\Subscribe;
use App\Models\ClientReview;
use DB;
use App;
class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status','show')->get();
        $client_reviews = ClientReview::get();
        return view('site.home',compact('sliders','client_reviews'));
    }

    public function services()
    {
        return view('site.services');
    }
    public function portfolio()
    {
        return view('site.portfolio');
    }

    public function contact_us()
    {
        return view('site.contact_us');
    }
    public function about_us()
    {
        return view('site.about_us');
    }

    public function storeContact(Request $request){
        ContactUs::create($request->except('_token'));

        return back()->with('success', trans('translate.your message has been sent successfully'));

    }

    public function storeSubscribe(Request $request)
    {
       Subscribe::create($request->except('_token'));

        return back()->with('success', trans('translate.your message has been sent successfully'));
    }
}