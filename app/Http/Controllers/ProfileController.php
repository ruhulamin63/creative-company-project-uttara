<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB; //Import query builser
use Illuminate\Support\Facades\Hash;

use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Models\User;

class ProfileController extends Controller{

    //===============================Profile view function=========================================

    public function admin_overview(){

        $id = Session()->get('admin_id');
        $users = User::where('id',$id)->first();

        return view('admin.admin_account.overview')->with('users', $users);
    }

    public function admin_settings(){

        $id = Session()->get('admin_id');
        $users = User::where('id',$id)->first();

        return view('admin.admin_account.settings')->with('users', $users);
    }

    //===============================Show profiloe information=========================================

    public function change_info(Request $req){

        $id = Session()->get('admin_id');
        $users = User::find($id);


        $data=array();
        $data['contact_number']= $req->contact_number;

        // if($req->hasFile('avatar')) {
        //     $image = $req->file('avatar');
        //     //$image_name=$image->getClientOriginalName();
        //     $image_ext=$image->getClientOriginalExtension();

        //     $image_new_name =date("YmdHis");
        //     //dd($image_ext);

        //     $image_full_name=$image_new_name.'.'.$image_ext;
        //     Image::make($image)->resize(300, 300)->save('media/admin/'. $image_full_name);
        //     $imageData='media/admin/'.$image_full_name;

        //     $data['image']=$imageData;
        // }else {
        //     $thumbnail = null;
        // }

        if($req->avatar !=""){
            $image = $req->file('avatar');
            //$image_name=$image->getClientOriginalName();
            $image_ext=$image->getClientOriginalExtension();
            $image_new_name =date("YmdHis");
            $image_full_name=$image_new_name.'.'.$image_ext;
            $upload_path='media/admin/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $imageData='/media/admin/'.$image_full_name;

             $data['image']=$imageData;
        }else {
            $thumbnail = null;
        }

        $query = DB::table('users')->update($data);


        if($query){

            // $req->session()->flash('admin_first_name');
            // $req->session()->flash('admin_last_name');
            // $req->session()->flash('admin_address');
            // $req->session()->flash('admin_phone');
            // $req->session()->flash('admin_image');

            // $req->session()->put('admin_username', $users->username);
            // $req->session()->put('admin_last_name', $users->last_name);
            // $req->session()->put('admin_address', $users->address);
            // $req->session()->put('admin_phone', $users->phone);
            // $req->session()->put('admin_image', $users->image);

            return redirect()->back()->with([
                'error' => false,
                'msg' => 'Information update successfully'
            ]);
        }else{
            return redirect()->back()->with([
                'error' => true,
                'msg' => 'Some wrong information!'
            ]);
        }
    }

    //===============================change profile email=========================================

    public function change_email(Request $req){

        $validator = Validator::make($req->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'msg' => 'Required data missing.'
            ]);
        }else{
            $id = Session()->get('admin_id');

            $users = User::find($id);

            $users->email = $req->email;

            if($users->save()){

                $req->session()->flash('admin_email');
                $req->session()->put('admin_email', $users->email);

                return redirect()->back()->with([
                    'error' => false,
                    'msg' => 'Email update successfully'
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => true,
                    'msg' => 'Not success'
                ]);
            }
        }
    }

    //===============================change profile password=========================================

    public function change_password(Request $req){
        $id = Session()->get('admin_id');

        $password = User::find($id);

        $validator = Validator::make($req->all(), [

            'currentpassword' => 'required',
            'newpassword' => [
                'required',
                'string',
                'min:4',
                'max:20',
                // 'regex:/[a-z]/',
                // 'regex:/[A-Z]/',
                // 'regex:/[0-9]/',
                // 'regex:/[@$!%*#?&]/',
            ],
            'confirmpassword' => 'required|same:newpassword'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => true,
                'msg' => 'Required data missing.'
            ]);
        }else{

            $id = Session()->get('admin_id');
            $session_password = Session()->get('admin_password');

            $users = User::find($id);

            if(!Hash::check($req->currentpassword, $users->password)){
                
                return redirect()->back()->with([
                    'error' => true,
                    'msg' => 'Current password not match !'
                ]);

            }else{

                if($req->newpassword != $req->confirmpassword){

                    return redirect()->back()->with([
                        'error' => true,
                        'msg' => 'New & confirm password not match !'
                    ]);
                }else{
                    //dd($users);
                    $users->password = Hash::make($req->newpassword);

                    if($users->update()){
                        
                        $req->session()->flash('admin_password');
                        $req->session()->put('admin_password', $users->password);
        
                        return redirect()->back()->with([
                            'error' => false,
                            'msg' => 'Password update successfully'
                        ]);
                    }else{
                        return redirect()->back()->with([
                            'error' => true,
                            'msg' => 'Not success'
                        ]);
                    }
                }

            }
        }
    }
}
