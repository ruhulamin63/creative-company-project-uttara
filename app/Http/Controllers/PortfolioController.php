<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\Portfolio;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function portfolio_index(){
        return view('admin.pages.portfolio.crud.portfolio-list');
    }
    
    public function portfolio_all_data_show(){
        $portfolios = Portfolio::all();

        try {
            return DataTables::of($portfolios)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="deletePortfolioBtn" class="btn btn-danger btn-sm">
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
    public function add_portfolio_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'web_app_image' => 'required',
            'mobile_app_image' => 'required',
            'graphic_design_image' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            //dd('test');
            $data = array();

            // if($request->hasFile('web_app_image')) {
            //     $image = $request->file('web_app_image');
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(300, 300)->save('media/portfolios/'. $image_full_name);
            //     $imageData='/media/portfolios/'.$image_full_name;
    
            //     $data['web_app_image']=$imageData;

            // }else{
            //     $thumbnail = null;
            // }

            if($request->web_app_image !=""){
                $image = $request->file('web_app_image');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/portfolios/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/portfolios/'.$image_full_name;
    
                 $data['web_app_image']=$imageData;
            }else {
                $thumbnail = null;
            }
            
            // if($request->hasFile('mobile_app_image')) {
            //     $image = $request->file('mobile_app_image');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(300, 300)->save('media/portfolios/'. $image_full_name);
            //     $imageData='/media/portfolios/'.$image_full_name;
    
            //     $data['mobile_app_image']=$imageData;

            // }else{
            //     $thumbnail = null;
            // }

            if($request->mobile_app_image !=""){
                $image = $request->file('mobile_app_image');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/portfolios/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/portfolios/'.$image_full_name;
    
                 $data['mobile_app_image']=$imageData;
            }else {
                $thumbnail = null;
            }
            
            // if($request->hasFile('graphic_design_image')){
            //     $image = $request->file('graphic_design_image');
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name= $image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(300, 300)->save('media/portfolios/'. $image_full_name);
            //     $imageData='/media/porfolios/'.$image_full_name;

            //     $data['graphic_design_image']=$imageData;
    
            // }else{
            //     $thumbnail = null;
            // }
           
            if($request->graphic_design_image !=""){
                $image = $request->file('graphic_design_image');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/portfolios/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/portfolios/'.$image_full_name;
    
                 $data['graphic_design_image']=$imageData;
            }else {
                $thumbnail = null;
            }

            $query = DB::table('portfolios')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Portfolio image created successfully.'
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
    public function delete_portfolio(Request $request){
        $portfolio_id = $request->portfolio_id;
        //dd($portfolioa_id);
        $query = Portfolio::find($portfolio_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Portfolio image deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
