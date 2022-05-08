<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Client;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function client_index(){
        return view('admin.pages.clients.crud.client-list');
    }
    
    public function client_all_data_show(){
        $clients = Client::all();

        try {
            return DataTables::of($clients)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="deleteClientBtn" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </div>';
                })
                ->rawColumns(['client_image', 'actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }

     //add service created
    public function add_client_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'client_image' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            //dd('test');
            $data = array();

            // if($request->hasFile('client_image')) {
            //     $image = $request->file('client_image');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(300, 300)->save('media/clients/'. $image_full_name);
            //     $imageData='/media/clients/'.$image_full_name;
    
            //     $data['client_image']=$imageData;
            // }else {
            //     $thumbnail = null;
            // }

            if($request->client_image !=""){
                $image = $request->file('client_image');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/clients/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/clients/'.$image_full_name;
    
                 $data['client_image']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('clients')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Client image created successfully.'
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
    public function delete_client(Request $request){
        $client_id = $request->client_id;
        //dd($product_id);
        $query = Client::find($client_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Client image deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
