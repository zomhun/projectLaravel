<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Category;

class ApiController extends Controller
{
    public function ajaxSearch(){
        $data = Product::search()->limit(8)->get();
        return $data;
    }
    public function ajaxSearchProduct(){
        $data = Product::detail()->get();
        // $data["view"] = $data["view"] + 1;
        // Product::where('id', $id)->update([ 'view' => $data['view'] ]);
        // $dataproimg = Productimage::all()-> where('pro_id','=',$id);
        // $productimgs = $dataproimg ;
        return $data;
    }
}
