<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function show_data(){
        return view('admin.pages.company-profile.company-info-data');
    }
}
