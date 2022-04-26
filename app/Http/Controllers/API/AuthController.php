<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use DB;
use Session;
use Validator;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
   public function register(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'address' => 'required',
            'dob_day' => 'requried',
            'dob_month' => 'requried',
            'dob_year' => 'requried',
            'nid' => 'required',
            'image' => 'required',
            'nid_front_side_image' => 'required',
            'nid_back_side_image' => 'required',
            'contact_number' => 'required',
            'password' => 'required',
        ]);

        //dd("test");

        // if(!$validator->passes()){
        //     //dd('test');
        //     return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        // }else{
            //dd('test');

            // $user = User::create([
            //     'name' => $data['name'],
            //     'father_name' => $data['father_name'],
            //     'mother_name' => $data['mother_name'],
            //     'address' => $data['address'],
            //     'dob_day' => $data['dob_day'],
            //     'dob_month' => $data['dob_month'],
            //     'dob_year' => $data['dob_year'],
            //     'nid' => $data['nid'],
            //     'image' => $data['image'],
            //     'nid_front_side_image' => $data['nid_front_side_image'],
            //     'nid_back_side_image' => $data['nid_back_side_image'],
            //     'contact_number' => $data['contact_number'],
            //     'password' => Hash::make($data['password']),
            // ]);

            $data=array();
            $data['name'] = $request->name;
            $data['father_name'] = $request->father_name;
            $data['mother_name'] = $request->mother_name;
            $data['address'] = $request->address;
            $data['dob_day'] = $request->dob_day;
            $data['dob_month'] = $request->dob_month;
            $data['dob_year'] = $request->dob_year;

            $data['nid'] = $request->nid;
            $data['image'] = $request->image;
            $data['nid_front_side_image'] = $request->nid_front_side_image;
            $data['nid_back_side_image'] = $request->nid_back_side_image;

            $data['contact_number'] = $request->contact_number;
            $data['password'] = Hash::make($request->password);

            $query = DB::table('users')->insert($data);

            //$token = $user->createToken('loanApiProjectToken')->plainTextToken;

            
            // $response = [
            //     'user' => $user,
            //     'token' => $token,
            // ];

            if($query){
                return response()->json([
                    'code' => 1,
                    'data' => $data,
                    //'token' => $token,
                    'msg' => 'Register successfully.'
                ],201);
            }else{
                return response()->json([
                    'code' => 0,
                    'msg' => 'Something went wrong.'
                ],416);
            }
        //}
    }
}
