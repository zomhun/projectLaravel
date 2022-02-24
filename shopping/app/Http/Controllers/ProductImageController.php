<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    function viewimg($id){
        $dataproimg = Productimage::all()-> where('pro_id','=',$id);
        $productimgs = $dataproimg ;
        $product = Product::findOrFail($id);
        return view('backend.productimg.listimg', compact('productimgs','product'));
    }
    function addimg(Request $request,$id){
        // dd($request['image']);
        
        $product = Product::findOrFail($id);
        if($request->image && count($request->image)>0){
            foreach($request->image as $key => $img){
                $strrandom = (\Str::random(10));
                $imageName = time().$key.$strrandom.'.'.$img->extension(); 
                
                $img->move(public_path('product'), $imageName);
                
                $data = $request->all();
                $data['image'] = $imageName;
                $data['pro_id'] = $product['id'];
                Productimage::create($data);
            }
        }
        return back();
    }
    function deleteimg(Request $request,$id,$idimg){
        // $productimg = Productimage::findOrFail($idimg);
        // $productimg->delete();
        $image = Productimage::find($request->idimg);

        $file =public_path('product/'.$image['image']);
        $img= unlink($file);
        // dd($img);

        // unlink(public_path('images').$image->image_name);

        Productimage::where("id", $image->id)->delete();
        return redirect()->action([ProductImageController::class, 'viewimg'],['id' => $id]);
    }
}
?>