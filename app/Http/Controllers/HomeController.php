<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function home_index(){
        return view('admin.pages.home-page.crud.home-list');
    }

    public function home_all_data_show(){
        $home = Home::all();

        try {
            return DataTables::of($home)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editHomeBtn" style="display: inline-block;" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteHomeBtn" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>';
                })
                ->rawColumns(['actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }

     //add service created
    public function add_home_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'logo' => 'required',
            'logo_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            
            $data = array();
            
            $data['title'] = $request->title;
            $data['desc'] = $request->desc;
            $data['logo'] = $request->logo;
            $data['logo_name'] = $request->logo_name;

            // if($request->hasFile('logo')) {
            //     $image = $request->file('logo');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(145, 50)->save('media/home-page-logo/'. $image_full_name);
            //     $imageData='/media/home-page-logo/'.$image_full_name;
    
            //     $data['logo']=$imageData;
            // }else {
            //     $thumbnail = null;
            // }

            if($request->logo !=""){
                $image = $request->file('logo');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/home-page-logo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/home-page-logo/'.$image_full_name;
    
                $data['logo']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('homes')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Created successfully.'
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
    public function edit_home_details(Request $request){
        $home_id = $request->home_id;

        //dd($home_id);

        $homeDetails = Home::find($home_id);

        //dd($productDetails);
        //$request->session()->put('boiler_image', $productDetails->image);

        return response()->json(['details'=>$homeDetails],200);
    }

    //UPDATE Order DETAILS
    public function update_home_details(Request $request){
        $home_id = $request->home_id;

        //dd($comphome_idany_id);

        $validator = \Validator::make($request->all(),[
            'title' => 'required',
            'desc' => 'required',
            'logo_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $home = Home::find($home_id);

            $home->title = $request->title;
            $home->desc = $request->desc;
            $home->logo_name = $request->logo_name;
           
            // if($request->hasFile('logo')) {
            //     $image = $request->file('logo');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name=$image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(145, 50)->save('media/home-page-logo/'. $image_full_name);
            //     $imageData='/media/home-page-logo/'.$image_full_name;
    
            //     $home->logo=$imageData;
            // }else {
            //     $thumbnail = null;
            // }

            if($request->logo !=""){
                $image = $request->file('logo');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/home-page-logo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/home-page-logo/'.$image_full_name;
    
                $home->logo=$imageData;
            }else {
                $thumbnail = null;
            }
            
            $query = $home->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Home details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_home(Request $request){
        $home_id = $request->home_id;
        //dd($company_id);
        $query = Home::find($home_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }

}
