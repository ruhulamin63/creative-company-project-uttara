<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use DataTables;
use Illuminate\Support\Facades\DB;

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

    public function service_index(){
        return view('admin.pages.services.crud.service-list');
    }

    public function service_all_data_show(){
        $services = Service::all();

        try {
            return DataTables::of($services)
                ->addIndexColumn()

                // ->addColumn('service_image', function($service){
                //     return  '<div class="btn-group d-flex flex-column w-50 me-2">
                //                 <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                //             </div>'; 
                // })
                
                ->addColumn('activeStatus', function($service){
                    if($service->activeStatus == 0){
                        $denied = "Denied";
                        return  '<div class="btn-group d-flex flex-column w-50 me-2">
                                    <span class="badge badge-danger" style="text-align: center;">
                                        <span>'.$denied.'</span>
                                    </span>
                                </div>'; 
                    }else{
                        $success = "Success";
                        return '<div class="btn-group d-flex flex-column w-50 me-2">
                                    <span class="badge badge-success" style="text-align: center;">
                                        <span>'.$success.'</span>
                                    </span>
                                </div>'; 
                    }
                })


                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editBoilerBtn" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteBoilerBtn" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </div>';
                })
                ->rawColumns(['service_image', 'activeStatus','actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }
}
