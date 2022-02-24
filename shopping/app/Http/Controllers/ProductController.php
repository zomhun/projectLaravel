<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Classify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $datacat = new Category;
        $categories = $datacat -> getselectcat();
        $data = Product::search()->orderBy('id','DESC')->paginate(10);
        $catname = $datacat -> catname();
        
        return view('backend.product.listpro', compact('data','categories','catname'));
    }
    public function create(){
        $datacat = new Category;
        $categories = $datacat -> getselectcat();
        return view('backend.product.create', compact('categories'));
    }
    function addnew(Request $request){
        $rules = [
            'pro_name' => 'required|unique:product',
            'price' => 'required',
        ];
        $messages = [
            'pro_name.required' => 'Product name cannot be empty',
            'pro_name.unique' => 'Product name already used',
            'price.required' => 'Price name cannot be empty',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $strrandom = (\Str::random(10));
        $imageName = time().$strrandom.'.'.$request->image->extension();  
     
        $request->image->move(public_path('product'), $imageName);
        
        $data = $request->all();
        $data['image']=$imageName;
        // dd($_POST);

        Product::create($data);
        return redirect()->action([ProductController::class, 'index']) -> with('success','successfully added new');
    }
    function edit($id){
        $datacat = new Category;
        $categories = $datacat -> getselectcat();
        $product = Product::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.product.edit', compact('product','categories'));
    }
    function update(Request $request,$id){
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        if(isset($request['image'])){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product = Product::findOrFail($id);
            $file =public_path('product/'.$product->image);
            $img= unlink($file);
            $strrandom = (\Str::random(10));
            $imageName = time().$strrandom.'.'.$request->image->extension();  
         
            $request->image->move(public_path('product'), $imageName);
            // $request['image']->getPathname('imageName');
            
            $data = $request->all();
            $data['image']=$imageName;
            Product::where('id', $id)->update([ 'pro_name' => $data['pro_name'], 'cat_id' => $data['cat_id'], 'image' => $data['image'], 'price' => $data['price'], 'saleprice' => $data['saleprice'], 'description' => $data['description'],'status' => $data['status'] ]);
        }
        else{
            $data = $request->all();
            Product::where('id', $id)->update([ 'pro_name' => $data['pro_name'], 'cat_id' => $data['cat_id'], 'price' => $data['price'], 'saleprice' => $data['saleprice'], 'description' => $data['description'],'status' => $data['status'] ]);
        }
        return redirect()->action([ProductController::class, 'index']) -> with('success','Update successful');
    }
    function delete($id){
        $product = Product::findOrFail($id);
        $file =public_path('product/'.$product->image);
        $img= unlink($file);
        $product->delete();
        return back();
    }
}
