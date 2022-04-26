<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        return view('show.index');
    }

    public function portfolio(){
        return view('show.pages.portfolio');
    }

    public function product(){
        return view('show.pages.product');
    }

    public function service(){
        return view('show.pages.service');
    }

    public function team(){
        return view('show.pages.team');
    }

    public function about_us(){
        return view('show.pages.about-us');
    }

    public function career(){
        return view('show.pages.career');
    }

    public function client(){
        return view('show.pages.client');
    }

    public function company_profile(){
        return view('show.pages.company_profile');
    }

    public function contact(){
        return view('show.pages.contact-us');
    }
}
