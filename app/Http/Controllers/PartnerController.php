<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Client;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    public function partner_index(){
        return view('admin.pages.partners.crud.partner-list');
    }
    
    public function partner_all_data_show(){
        $clients = Partner::all();

        try {
            return DataTables::of($clients)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="deletePartnerBtn" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }

     //add service created
    public function add_partner_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'partner_image' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            //dd('test');
            $data = array();

            // if($request->hasFile('partner_image')) {
            //     $image = $request->file('partner_image');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(300, 300)->save('media/partners/'. $image_full_name);
            //     $imageData='/media/partners/'.$image_full_name;
    
            //     $data['partner_image']=$imageData;
            // }else {
            //     $thumbnail = null;
            // }

            if($request->partner_image !=""){
                $image = $request->file('partner_image');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/partners/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/partners/'.$image_full_name;
    
                 $data['partner_image']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('partners')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Partner image created successfully.'
                ]);
            }else{
                return response()->json([
                    'code' => 0,
                    'msg' => 'Something went wrong.'
                ]);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_partner(Request $request){
        $partner_id = $request->partner_id;
        //dd($product_id);
        $query = Partner::find($partner_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Partner image deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
