<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.adminDashboard');
    }

    public function admin_invoice(){
        return view('admin.pages.invoice.admin-invoice');
    }

    public function admin_show_table(){
        return view('admin.pages.table.show-table');
    }
}
