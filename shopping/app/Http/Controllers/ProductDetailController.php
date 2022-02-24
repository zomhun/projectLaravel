<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use App\Models\Color;


class ProductDetailController extends Controller
{
    function viewdetail($id){
      
            $dataprodetail = ProductDetail::where('product_id','=',$id)->get();
            $details = $dataprodetail ;
            $product = Product::findOrFail($id);
            $datasize = new Size();
            $sizes = $datasize -> getselectsize();
            $datacolor = new Color();
            $colors = $datacolor -> getselectcolor();
        return view('backend.product_detail.listdetail' , compact('details', 'product','sizes','colors'));
    }
    function submitdetail(Request $request,$id){
        $product = Product::findOrFail($id);

        if($request->size_id && count($request->size_id)>0){
            foreach($request->size_id as $key => $size_id){
                $color_id = $request ->color_id[$key];
                $quantity = $request ->quantity[$key];
                ProductDetail::create([
                'product_id' => $product->id,
                'size_id' => $size_id,
                'color_id' => $color_id,
                'quantity' => $quantity,
                ]);
            }
        return back();
        }
    }
    public function edit(Request $request, $id){
        $data = $request->all();
        //dd($data);
        ProductDetail::where('id', $id)->update([ 'size_id' => $data['size_id'],'color_id' => $data['color_id'],'quantity' => $data['quantity'] ]);
        return back();
    }

    function delete($id){
        $prodetail = ProductDetail::findOrFail($id);
        $prodetail->delete();
        return back();
    }
    function sizetype($id,$sizetype){
        $size = Size::where('size_type',$sizetype)->get();
        return response($size);
    }
}
?>