<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use \Crypt;
use PDF;

use App\Models\User;

class LoginController extends Controller
{
    //===============================view signin page========================
    public function login_index(Request $request) {
        $all_apply_count = User::where('user_type', 2)
        ->where('activeStatus',1)
        ->count('id');

        $info_verify = User::where('info_verify', 1)
            ->where('user_type',2)
            ->where('activeStatus',1)
            ->count('id');

        $loan_verify = User::where('loan_verify', 1)
            ->where('user_type',2)
            ->where('activeStatus',1)
            ->count('id');

        $delivery_loan = User::where('delivery_loan',1)
            ->where('user_type',2)
            ->where('activeStatus',1)
            ->count('id');

        $total_delivery_loan = User::where('info_verify', 1)
                    ->where('loan_verify', 1)
                    ->where('delivery_loan',1)
                    ->where('user_type',2)
                    ->where('activeStatus',1)
                    ->count('id');

        //=========================================================

        if($request->session()->has('user_contact_number')){
            if($request->session()->get('type') == 1){
                return redirect()->route('admin.dashboard');
            }else if($request->session()->get('type') == 2){
                return redirect()->route('customer.dashboard');
            }else{
                return view('authenticate.login-from', compact('all_apply_count', 'info_verify', 'loan_verify', 'delivery_loan', 'total_delivery_loan'));
            }
        }else{
            return view('authenticate.login-from', compact('all_apply_count', 'info_verify', 'loan_verify', 'delivery_loan', 'total_delivery_loan'));
        }
    }

    public function postLogin(Request $request) {

        $validator = Validator::make($request->all(), [
            'contact_number' => 'required|max:50',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Required data missing.'
            ]);
        }else{
            
            $user=DB::table('users')
            ->where('contact_number',$request->input('contact_number'))
            ->where('activeStatus',1)
            ->first();
            

            if($user){

                if(Hash::check($request->password, $user->password)){

                    $request->session()->put('user_id', $user->id);
                    $request->session()->put('user_name', $user->name);
                    $request->session()->put('user_father_name', $user->father_name);
                    $request->session()->put('user_mother_name', $user->mother_name);
                    $request->session()->put('type', $user->user_type);
                    $request->session()->put('user_contact_number', $user->contact_number);
                    $request->session()->put('user_address', $user->address);
                    $request->session()->put('user_password', $user->password);
                   
                    if($request->session()->get('type') == 1){
                        return redirect()->route('admin.dashboard')->with([
                            'error' => false,
                            'message', 'Logged In Successfully'
                        ]);
                        
                    }else if($request->session()->get('type') == 2){
                        return redirect()->route('customer.dashboard')->with([
                            'error' => false,
                            'message', 'Logged In Successfully'
                        ]);
                    }else{
                        return redirect()->back()->with([
                            'error' => true,
                            'message' => 'User Not found !'
                        ]);
                    }

                }else{
                    return redirect()->back()->with([
                        'error' => true,
                        'message' => 'Incorrect username or password'
                    ]);
                }

            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'message' => 'User Not found !'
                ]);
            }
        }
    }

    //==================Register from======================
    public function registration(){
        $all_apply_count = User::where('user_type', 2)
                                ->where('activeStatus',1)
                                ->count('id');

        $info_verify = User::where('info_verify', 1)
                            ->where('user_type',2)
                            ->where('activeStatus',1)
                            ->count('id');

        $loan_verify = User::where('loan_verify', 1)
                            ->where('user_type',2)
                            ->where('activeStatus',1)
                            ->count('id');

        $delivery_loan = User::where('delivery_loan',1)
                            ->where('user_type',2)
                            ->where('activeStatus',1)
                            ->count('id');

        $total_delivery_loan = User::where('info_verify', 1)
                                    ->where('loan_verify', 1)
                                    ->where('delivery_loan',1)
                                    ->where('user_type',2)
                                    ->where('activeStatus',1)
                                    ->count('id');

        return view('authenticate.register-from', compact('all_apply_count', 'info_verify', 'loan_verify', 'delivery_loan', 'total_delivery_loan'));
    }

    public function postRegistration(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'address' => 'required',
            'day_of_birth' => 'requried',
            'month_of_birth' => 'requried',
            'year_of_birth' => 'requried',
            'nid' => 'required',
            'image' => 'required',
            'nid_front_side_image' => 'required',
            'nid_back_side_image' => 'required',
            'contact_number' => 'required',
            'password' => 'required',
        ]);

        //dd("test");

        $data=array();
        $data['name'] = $request->name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['address'] = $request->address;
        $data['dob_day'] = $request->dob_day;
        $data['dob_month'] = $request->dob_month;
        $data['dob_year'] = $request->dob_year;
        $data['nid'] = $request->nid;

        $data['contact_number'] = $request->contact_number;
        $data['password'] = Hash::make($request->password);

        //==================================================================

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //$image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();

            //$image_new_name =$request->contact_number.date("YmdHis");
            //dd($image_ext);

            $image_full_name=$request->contact_number.'.'.$image_ext;
            Image::make($image)->resize(400, 400)->save('images/nid-image/'. $image_full_name);
            $imageData='images/nid-image/'.$image_full_name;

            $data['image']=$imageData;
        }else {
            $thumbnail = null;
        }

        //===========================================================

        if ($request->hasFile('nid_front_side_image')) {
            $image = $request->file('nid_front_side_image');
            $image_ext=$image->getClientOriginalExtension();
            $image_full_name=$request->contact_number.'.'.$image_ext;
            Image::make($image)->resize(400, 400)->save('images/nid-front-part/'. $image_full_name);
            $imageData='images/nid-front-part/'.$image_full_name;

            $data['nid_front_side_image']=$imageData;
        }else {
            $thumbnail = null;
        }

        //===========================================================

        if ($request->hasFile('nid_back_side_image')) {
            $image = $request->file('nid_back_side_image');
            $image_ext=$image->getClientOriginalExtension();
            $image_full_name=$request->contact_number.'.'.$image_ext;
            Image::make($image)->resize(400, 400)->save('images/nid-back-part/'. $image_full_name);
            $imageData='images/nid-back-part/'.$image_full_name;

            $data['nid_back_side_image']=$imageData;
        }else {
            $thumbnail = null;
        }
        
        //==================================================================

        $data['user_type'] = 2;
        $data['activeStatus'] = 1;
        $data['loan_verify'] = 0;
        $data['info_verify'] = 0;
        $data['user_type'] = 2;

        $query = DB::table('users')->insert($data);

        //$token = $user->createToken('loanApiProjectToken')->plainTextToken;

        
        // $response = [
        //     'user' => $user,
        //     'token' => $token,
        // ];


            $url = "https://sms.solutionsclan.com/api/sms/send";
            $sms = [
                "apiKey"=> "A00027601a70cca-cb11-4b43-9f4e-efd223fa024c",
                "contactNumbers"=> $request->contact_number,
                "senderId"=> "8809612440635",
                "textBody"=> "আপনার আবাদেনটি সফলভাবে গ্রহণ করা হয়েছে । আবেদনটি অনুমোদনের জন্য অনুগ্রহ করে অপেক্ষা করুন ।"
            ];
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sms));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            $response = curl_exec($ch);
            echo "$response";
            curl_close($ch);
    
       

        if($query){
            return redirect()
                ->back()
                ->with([
                    'error' => false,
                    'message' => 'আপনার আবাদেনটি সফলভাবে গ্রহণ করা হয়েছে । আবেদনটি অনুমোদনের জন্য অনুগ্রহ করে অপেক্ষা করুন'
                ]);
        }else{
            return redirect()
            ->route('register')
            ->with([
                'error' => true,
                'message' => 'আপনার আবাদেনটি গ্রহণ করা সম্ভব হচ্ছে না ।'
            ]);
        }
    }

    //================================Logout page================================
    public function logout(Request $request){

        $request->session()->flush();

        return redirect()->route('login');
    }
}
