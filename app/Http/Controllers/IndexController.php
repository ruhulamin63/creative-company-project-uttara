<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Service;
use App\Models\Product;
use App\Models\Team;
use App\Models\Career;
use DB;

class IndexController extends Controller
{
    public function index(){
        return view('show.index');
    }

    public function portfolio(){
        return view('show.pages.portfolio');
    }

    public function product(){
        $products = Product::where('activeStatus', 1)->get();

        return view('show.pages.product', compact('products'));
    }

    public function service(){
        $services = Service::where('activeStatus', 1)->get();

        return view('show.pages.service', compact('services'));
    }

    public function team(){

        $teams = Team::where('activeStatus', 1)->get();

        return view('show.pages.team', compact('teams'));
    }

    public function about_us(){
        return view('show.pages.about-us');
    }

    public function career(){
        $careers = Career::where('activeStatus', 1)->get();

        return view('show.pages.careers.career', compact('careers'));
    }

    public function job_context_list(){
        $careers = Career::where('activeStatus', 1)->get();

        return view('show.pages.careers.view-details', compact('careers'));
    }

    public function client(){
        return view('show.pages.client');
    }
    // public function post_client(Request $request){
    //     //dd('test');
    //     $validator = \Validator::make($request->all(), [
    //         'name' => 'required',
    //         'position' => 'required',
    //         'image' => 'required',
    //         'linkin_id' => 'required',
    //         'facebook_id' => 'required',
    //         'twitter_id' => 'required',
    //         'github_id' => 'required',
    //     ]);

    //     // if(!$validator->passes()){
    //     //     return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
    //     // }else{

    //         $data=array();
    //         $data['name']=$request->name;
    //         $data['position']=$request->position;
    //         $data['image']= $request->image;
    //         $data['linkin_id']= $request->linkin_id;
    //         $data['facebook_id']= $request->facebook_id;
    //         $data['twitter_id']= $request->twitter_id;
    //         $data['github_id']= $request->github_id;
    //         $data['activeStatus']= 1;

    //         $query = DB::table('teams')->insert($data);


    //         if($query){
    //             return redirect()->back()->with([
    //                 'error' => false,
    //                 'mgs' => 'Submit Successfully'
    //             ],200);
    //         }else{
    //             return redirect()->back()->with([
    //                 'error' => true,
    //                 'mgs' => 'Something going wrong'
    //             ],412);
    //         }
    //     //}
    // }


    public function company_profile(){
        return view('show.pages.company_profile');
    }

    public function contact(){
        return view('show.pages.contact-us');
    }
    public function post_contact(Request $request){
        //dd('test');
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // if(!$validator->passes()){
        //     return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        // }else{

            $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['subject']= $request->subject;
            $data['messege']= $request->message;

            $query = DB::table('contacts')->insert($data);


            if($query){
                return redirect()->back()->with([
                    'error' => false,
                    'mgs' => 'Submit Successfully'
                ],200);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'mgs' => 'Something going wrong'
                ],412);
            }
        //}
    }
}
