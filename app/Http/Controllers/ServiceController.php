<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{

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
                        return  '<span class="badge badge-danger" style="text-align: center;">
                                    <span>'.$denied.'</span>
                                </span>'; 
                    }else{
                        $success = "Success";
                        return '<span class="badge badge-success" style="text-align: center;">
                                    <span>'.$success.'</span>
                                </span>'; 
                    }
                })


                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editServiceBtn" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteServiceBtn" class="btn btn-danger btn-sm">
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

     //add service created
    public function add_service_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'service_name' => 'required',
            'service_desc' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
          
            //$services = new Service();

            //$appointment->user_id = Keygen::numeric(8)->generate();
            //dd($appointment->user_id);

            // $services->service_name = $request->service_name;
            // $services->service_desc = $service_desc;
            // $services->activeStatus = 1;
            // $query = $services->save();


            $data = array();
            
            $data['service_name'] = $request->service_name;
            $data['service_desc'] = $request->service_desc;
            $data['activeStatus'] = 1;

            if($request->hasFile('service_image')) {
                $image = $request->file('service_image');
                $image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
    
                //$image_new_name =$request->contact_number.date("YmdHis");
                //dd($image_ext);
    
                $image_full_name= $image_name.'.'.$image_ext;
                Image::make($image)->resize(300, 300)->save('media/services/'. $image_full_name);
                $imageData='/media/services/'.$image_full_name;
    
                $data['service_image']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('services')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Service created successfully.'
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
    public function edit_service_details(Request $request){
        $service_id = $request->service_id;

        $serviceDetails = Service::find($service_id);

        //dd($serviceDetails);
        //$request->session()->put('boiler_image', $serviceDetails->image);

        return response()->json(['details'=>$serviceDetails],200);
        //dd($orderDetails);
    }

    //UPDATE Order DETAILS
    public function update_service_details(Request $request){
        $service_id = $request->s_id;

        //dd($order_id);

        $validator = \Validator::make($request->all(),[
            'service_name' => 'required',
            'service_desc' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $services = Service::find($service_id);

            $services->service_name = $request->service_name;
            $services->service_desc = $request->service_desc;
           
            if($request->hasFile('service_image')) {
                $image = $request->file('service_image');
                $image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
    
                //$image_new_name =$request->contact_number.date("YmdHis");
                //dd($image_ext);
    
                $image_full_name=$image_name.'.'.$image_ext;
                Image::make($image)->resize(300, 300)->save('media/services/'. $image_full_name);
                $imageData='/media/services/'.$image_full_name;
    
                $services->image=$imageData;
            }else {
                $thumbnail = null;
            }
            
            $query = $services->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Service details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_service(Request $request){
        $service_id = $request->s_id;
        $query = Service::find($service_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Service deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
