<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;
use DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function product_index(){
        return view('admin.pages.products.crud.product-list');
    }
    
    public function product_all_data_show(){
        $products = Product::all();

        try {
            return DataTables::of($products)
                ->addIndexColumn()

                // ->addColumn('product_image', function($service){
                //     return  '<div class="btn-group d-flex flex-column w-50 me-2">
                //                 <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                //             </div>'; 
                // })
                
                ->addColumn('activeStatus', function($products){
                    if($products->activeStatus == 0){
                        $denied = "Denied";
                        return  '<span class="badge badge-danger" style="text-align: center;">
                                    <span>'.$denied.'</span>
                                </span>'; 
                    }else{
                        $success = "Success";
                        return '<span class="badge badge-success" style="text-align: center;">
                                    <span>'.$success.'</span>
                                </span>'; 
                    }
                })


                ->addColumn('actions', function($action){
                    return '<button data-id="'.$action['id'].'" id="editProductBtn" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>

                            <button data-id="'.$action['id'].'" id="deleteProductBtn" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </div>';
                })
                ->rawColumns(['product_image', 'activeStatus','actions'])
                ->make(true);

        }catch (\Exception $e) {
            dd($e);
        }
    }

     //add service created
    public function add_product_post(Request $request){

        $validator = \Validator::make($request->all(), [
            'product_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{

            $data = array();
            
            $data['product_name'] = $request->product_name;
            $data['activeStatus'] = 1;

            if($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
    
                //$image_new_name =$request->contact_number.date("YmdHis");
                //dd($image_ext);
    
                $image_full_name= $image_name.'.'.$image_ext;
                Image::make($image)->resize(300, 300)->save('media/products/'. $image_full_name);
                $imageData='/media/products/'.$image_full_name;
    
                $data['product_image']=$imageData;
            }else {
                $thumbnail = null;
            }
           
            $query = DB::table('products')->insert($data);

            if($query){
                return response()->json([
                    'code' => 1,
                    'msg' => 'Service created successfully.'
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
    public function edit_product_details(Request $request){
        $product_id = $request->product_id;

        $productDetails = Product::find($product_id);

        //dd($productDetails);
        //$request->session()->put('boiler_image', $productDetails->image);

        return response()->json(['details'=>$productDetails],200);
    }

    //UPDATE Order DETAILS
    public function update_product_details(Request $request){
        $product_id = $request->p_id;

        //dd($order_id);

        $validator = \Validator::make($request->all(),[
            'product_name' => 'required'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $products = Product::find($product_id);

            $products->product_name = $request->product_name;
           
            if($request->hasFile('product_image')) {
                $image = $request->file('product_image');
                $image_name=$image->getClientOriginalName();
                $image_ext=$image->getClientOriginalExtension();
    
                //$image_new_name =$request->contact_number.date("YmdHis");
                //dd($image_ext);
    
                $image_full_name=$image_name.'.'.$image_ext;
                Image::make($image)->resize(300, 300)->save('media/products/'. $image_full_name);
                $imageData='/media/products/'.$image_full_name;
    
                $products->image=$imageData;
            }else {
                $thumbnail = null;
            }
            
            $query = $products->update();

            //dd("test");

            
            if($query){
                return response()->json(['code'=>1, 'msg'=>'Product details have been updated'],200);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
            }
        }
    }

    // DELETE Order RECORD
    public function delete_product(Request $request){
        $product_id = $request->p_id;
        $query = Product::find($product_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Product deleted from database'],200);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong'],412);
        }
    }
}
