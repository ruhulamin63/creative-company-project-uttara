<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;
use App\Models\Companyprofile;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CompanyProfileController extends Controller
{
    public function company_index(){
        return view('admin.pages.company-profile.crud.company-profile-list');
    }
    
    public function company_all_data_show(){
        $company = Companyprofile::all();

        try {
            return DataTables::of($company)
                ->addIndexColumn()

                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editCompanyBtn" style="display: inline-block;" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteCompanyBtn" class="btn btn-danger btn-sm">
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
    public function add_company_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'company_name' => 'required',
            'reg_no' => 'required',
            'trade_licence_no' => 'required',
            'tagline' => 'required',
            'website' => 'required',
            'facebook_id' => 'required',
            'skype_id' => 'required',
            'bank_account_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            
            $data = array();
            
            $data['company_name'] = $request->company_name;
            $data['reg_no'] = $request->reg_no;
            $data['trade_licence_no'] = $request->trade_licence_no;
            $data['tagline'] = $request->tagline;
            $data['website'] = $request->website;
            $data['facebook_id'] = $request->facebook_id;
            $data['skype_id'] = $request->skype_id;
            $data['bank_account_name'] = $request->bank_account_name;
            $data['bank_name'] = $request->bank_name;
            $data['branch_name'] = $request->branch_name;

            if($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
    
                $image_new_name =date("YmdHis");
                //dd($image_ext);
    
                $image_full_name= $image_new_name.'.'.$image_ext;
                Image::make($image)->resize(145, 50)->save('media/company-logo/'. $image_full_name);
                $imageData='/media/company-logo/'.$image_full_name;
    
                $data['company_logo']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('companyprofiles')->insert($data);

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
    public function edit_company_details(Request $request){
        $company_id = $request->company_id;

        //dd($company_id);

        $productDetails = Companyprofile::find($company_id);

        //dd($productDetails);
        //$request->session()->put('boiler_image', $productDetails->image);

        return response()->json(['details'=>$productDetails],200);
    }

    //UPDATE Order DETAILS
    public function update_company_details(Request $request){
        $company_id = $request->company_id;

        //dd($company_id);

        $validator = \Validator::make($request->all(),[
            'company_name' => 'required',
            'reg_no' => 'required',
            'trade_licence_no' => 'required',
            'tagline' => 'required',
            'website' => 'required',
            'facebook_id' => 'required',
            'skype_id' => 'required',
            'bank_account_name' => 'required',
            'bank_name' => 'required',
            'branch_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $company = Companyprofile::find($company_id);

            $company->company_name = $request->company_name;
            $company->reg_no = $request->reg_no;
            $company->trade_licence_no = $request->trade_licence_no;
            $company->tagline = $request->tagline;
            $company->website = $request->website;
            $company->facebook_id = $request->facebook_id;
            $company->skype_id = $request->skype_id;
            $company->bank_account_name = $request->bank_account_name;
            $company->bank_name = $request->bank_name;
            $company->branch_name = $request->branch_name;
           
            // if($request->hasFile('company_logo')) {
            //     $image = $request->file('company_logo');
            //     //$image_name=$image->getClientOriginalName();
            //     $image_ext=$image->getClientOriginalExtension();
    
            //     $image_new_name =date("YmdHis");
            //     //dd($image_ext);
    
            //     $image_full_name=$image_new_name.'.'.$image_ext;
            //     Image::make($image)->resize(145, 50)->save('media/company-logo/'. $image_full_name);
            //     $imageData='/media/company-logo/'.$image_full_name;
    
            //     $company->company_logo=$imageData;
            // }else {
            //     $thumbnail = null;
            // }

            if($request->company_logo !=""){
                $image = $request->file('company_logo');
                //$image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
                $image_new_name =date("YmdHis");
                $image_full_name=$image_new_name.'.'.$image_ext;
                $upload_path='media/company-logo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                $imageData='/media/company-logo/'.$image_full_name;
    
                $company->company_logo=$imageData;
            }else {
                $thumbnail = null;
            }
            
            $query = $company->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Company details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_company(Request $request){
        $company_id = $request->company_id;
        //dd($company_id);
        $query = Companyprofile::find($company_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
