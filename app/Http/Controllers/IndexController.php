<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Partner;
use App\Models\Home;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Product;
use App\Models\Service;
use App\Models\Career;
use App\Models\Client;
use App\Models\Companyprofile;
use App\Models\Contact;
use App\Models\User;

use DB;

class IndexController extends Controller
{
    public function index(){
        $home = Home::all();
        $client = Client::all();
        $partner = Partner::all();

        return view('show.index', compact('home', 'client', 'partner'));
    }

    public function portfolio(){
        $web_app = Portfolio::get('web_app_image');
        //dd($web_app);
        $mobile_app = Portfolio::get('mobile_app_image');
        $graphic_design = Portfolio::get('graphic_design_image');

        return view('show.pages.portfolio', compact('web_app', 'mobile_app', 'graphic_design'));
    }

    public function product(){
        $products = Product::where('activeStatus', 1)->get();

        return view('show.pages.product', compact('products'));
    }

    public function service(){
        $services = Service::where('activeStatus', 1)->get();

        return view('show.pages.service', compact('services'));
    }

    public function team(){

        $teams = Team::where('activeStatus', 1)->get();

        return view('show.pages.team', compact('teams'));
    }

    public function about_us(){
        $about = About::all();

        return view('show.pages.about-us', compact('about'));
    }

    public function career(){
        $careers = Career::where('activeStatus', 1)->get();

        return view('show.pages.careers.career', compact('careers'));
    }

    public function job_context_list(){
        $careers = Career::where('activeStatus', 1)->get();

        return view('show.pages.careers.view-details', compact('careers'));
    }

    public function client(){

        $clients = Client::all();

        return view('show.pages.client', compact('clients'));
    }
    

    public function company_profile(){

        $company = Companyprofile::all();

        return view('show.pages.company_profile', compact('company'));
    }

    public function contact(){
        return view('show.pages.contact-us');
    }
}
