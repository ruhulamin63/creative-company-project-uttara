<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\About;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function about_index(){
        return view('admin.pages.about-us.crud.about-list');
    }
    
    public function about_all_data_show(){
        $abouts = About::all();

        try {
            return DataTables::of($abouts)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editAboutBtn" style="display: inline-block;" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button data-id="'.$action['id'].'" id="deleteAboutBtn" class="btn btn-danger btn-sm">
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
    public function add_about_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'mission_title' => 'required',
            'mission_desc' => 'required',
            'difference_title' => 'required',
            'difference_title' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            //dd('test');
            $data = array();

            $data['title'] = $request->title;
            $data['desc'] = $request->desc;
            $data['mission_title'] = $request->mission_title;
            $data['mission_desc'] = $request->mission_desc;
            $data['difference_title'] = $request->difference_title;
            $data['difference_desc'] = $request->difference_desc;

            $query = DB::table('abouts')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'About us created successfully.'
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
    public function edit_about_details(Request $request){
        $about_id = $request->about_id;

        //dd($about_id);

        $aboutDetails = About::find($about_id);

        //dd($aboutDetails);
        //$request->session()->put('boiler_image', $productDetails->image);

        return response()->json(['details'=>$aboutDetails],200);
    }

    //UPDATE Order DETAILS
    public function update_about_details(Request $request){
        $about_id = $request->about_id;

        //dd($about_id);

        $validator = \Validator::make($request->all(),[
            'title' => 'required',
            'desc' => 'required',
            'mission_title' => 'required',
            'mission_desc' => 'required',
            'difference_title' => 'required',
            'difference_desc' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $about = About::find($about_id);

            $about->title = $request->title;
            $about->desc = $request->desc;
            $about->mission_title = $request->mission_title;
            $about->mission_desc = $request->mission_desc;
            $about->difference_title = $request->difference_title;
            $about->difference_desc = $request->difference_desc;
            
            $query = $about->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'About details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_about(Request $request){
        $about_id = $request->about_id;
        //dd($product_id);
        $query = About::find($about_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'About deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
