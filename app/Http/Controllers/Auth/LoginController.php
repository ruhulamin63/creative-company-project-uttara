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

        if($request->session()->has('admin_username')){
            if($request->session()->get('admin_type') == 1){
                return redirect()->route('admin.dashboard');
            }else{
                return view('authenticate.login-from');
            }
        }else{
            return view('authenticate.login-from');
        }
    }

    public function postLogin(Request $request) {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'mgs' => 'Required data missing.'
            ]);
        }else{
            
            $user=DB::table('users')
            ->where('username',$request->input('username'))
            ->where('activeStatus',1)
            ->first();
            

            if($user){

                if(Hash::check($request->password, $user->password)){

                    $request->session()->put('admin_id', $user->id);
                    $request->session()->put('admin_name', $user->name);
                    $request->session()->put('admin_username', $user->username);
                    $request->session()->put('admin_type', $user->user_type);
                    $request->session()->put('admin_contact_number', $user->contact_number);
                    $request->session()->put('admin_password', $user->password);
                   
                    if($request->session()->get('admin_type') == 1){
                        return redirect()->route('admin.dashboard')->with([
                            'error' => false,
                            'mgs', 'Logged In Successfully'
                        ]);
                        
                    }else{
                        return redirect()->back()->with([
                            'error' => true,
                            'mgs' => 'User Not found !'
                        ]);
                    }

                }else{
                    return redirect()->back()->with([
                        'error' => true,
                        'mgs' => 'Incorrect username or password'
                    ]);
                }

            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'mgs' => 'User Not found !'
                ]);
            }
        }
    }

    //==================Register from======================
    public function registration(){

        return view('authenticate.register-from');
    }

    public function postRegistration(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'image' => 'required',
            'contact_number' => 'required',
            'password' => 'required',
        ]);

        //dd("test");

        $data=array();
        $data['name'] = $request->name;
        $data['address'] = $request->address;

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

        //==================================================================

        $data['user_type'] = 2;
        $data['activeStatus'] = 1;

        $query = DB::table('users')->insert($data);

        //$token = $user->createToken('loanApiProjectToken')->plainTextToken;

        
        // $response = [
        //     'user' => $user,
        //     'token' => $token,
        // ];


            // $url = "https://sms.solutionsclan.com/api/sms/send";
            // $sms = [
            //     "apiKey"=> "A00027601a70cca-cb11-4b43-9f4e-efd223fa024c",
            //     "contactNumbers"=> $request->contact_number,
            //     "senderId"=> "8809612440635",
            //     "textBody"=> "আপনার আবাদেনটি সফলভাবে গ্রহণ করা হয়েছে । আবেদনটি অনুমোদনের জন্য অনুগ্রহ করে অপেক্ষা করুন ।"
            // ];
    
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sms));
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            // $response = curl_exec($ch);
            // echo "$response";
            // curl_close($ch);
    
       

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
