<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;
use App\Models\Career;

use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CareerController extends Controller
{
    public function career_index(){
        return view('admin.pages.careers.crud.career-list');
    }
    
    public function career_all_data_show(){
        $careers = Career::all();

        try {
            return DataTables::of($careers)
                ->addIndexColumn()

                // ->addColumn('product_image', function($service){
                //     return  '<div class="btn-group d-flex flex-column w-50 me-2">
                //                 <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                //             </div>'; 
                // })
                
                ->addColumn('activeStatus', function($service){
                    if($service->activeStatus == 0){
                        $denied = "Denied";
                        return  '<span class="badge badge-danger" style="text-align: center;">
                                    <span>'.$denied.'</span>
                                </span>'; 
                    }else{
                        $active = "Active";
                        return '<span class="badge badge-success" style="text-align: center;">
                                    <span>'.$active.'</span>
                                </span>'; 
                    }
                })


                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editCareerBtn" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteCareerBtn" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </div>';
                })
                ->rawColumns(['product_image', 'activeStatus','actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }

     //add service created
    public function add_career_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'position_name' => 'required',
            'company_name' => 'required',
            'vacancy' => 'required',
            'job_type' => 'required',
            'apply_date' => 'required',
            'job_context' => 'required',
            'job_nature' => 'required',
            'edu_requirment' => 'required',
            'job_location' => 'required',
            'salary_range' => 'required',
            'other_benefit' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{

            $data = array();
            
            $data['position_name'] = $request->position_name;
            $data['company_name'] = $request->company_name;
            $data['vacancy'] = $request->vacancy;
            $data['job_type'] = $request->job_type;
            $data['apply_date'] = $request->apply_date;
            $data['job_context'] = $request->job_context;
            $data['job_nature'] = $request->job_nature;
            $data['edu_requirment'] = $request->edu_requirment;
            $data['job_location'] = $request->job_location;
            $data['salary_range'] = $request->salary_range;
            $data['other_benefit'] = $request->other_benefit;
            
            $data['activeStatus'] = 1;

           
            $query = DB::table('careers')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Career created successfully.'
                ]);
            }else{
                return response()->json([
                    'code' => 0,
                    'msg' => 'Something went wrong.'
                ]);
            }
        }
    }

    
    //Get Order Details
    public function edit_career_details(Request $request){
        $career_id = $request->career_id;

        //dd($product_id);

        $careerDetails = Career::find($career_id);

        //dd($productDetails);
        //$request->session()->put('boiler_image', $productDetails->image);

        return response()->json(['details'=>$careerDetails],200);
    }

    //UPDATE Order DETAILS
    public function update_career_details(Request $request){
        $career_id = $request->c_id;

        //dd($order_id);

        $validator = \Validator::make($request->all(),[
            'position_name' => 'required',
            'company_name' => 'required',
            'vacancy' => 'required',
            'job_type' => 'required',
            'apply_date' => 'required',
            'job_context' => 'required',
            'job_nature' => 'required',
            'edu_requirment' => 'required',
            'job_location' => 'required',
            'salary_range' => 'required',
            'other_benefit' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $careers = Career::find($career_id);

            //dd($careers);

            $careers->position_name = $request->position_name;
            $careers->company_name = $request->company_name;
            $careers->vacancy = $request->vacancy;
            $careers->job_type = $request->job_type;
            $careers->apply_date = $request->apply_date;
            $careers->job_context = $request->job_context;
            $careers->job_nature = $request->job_nature;
            $careers->edu_requirment = $request->edu_requirment;
            $careers->job_location = $request->job_location;
            $careers->salary_range = $request->salary_range;
            $careers->other_benefit = $request->other_benefit;
            
            $query = $careers->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Career details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_career(Request $request){
        $career_id = $request->career_id;
        //dd($product_id);
        $query = Career::find($career_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>' Deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
