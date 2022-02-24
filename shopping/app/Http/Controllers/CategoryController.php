<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id',0)->paginate(5);
        return view('backend.category.category', compact('categories'));
    }
    public function addnew(Request $request){
        $rules = [
            'cat_name' => 'required|unique:category',
        ];
        $messages = [
            'cat_name.required' => 'Category name cannot be empty',
            'cat_name.unique' => 'category name already used',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // dd($request['status']);
        $data = $request->all();
        // dd($data);

        Category::create($data);
        return back() -> with('success','successfully added new');;
        
    }
    public function edit($id){
        // Tìm đến đối tượng muốn update
        $categories = Category::all();
        $category = Category::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.category.edit', compact('category','categories'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $category = Category::findOrFail($id);
        // dd($category);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        //dd($data);
        Category::where('id', $id)->update([ 'cat_name' => $data['cat_name'],'status' => $data['status'] ]);
        return redirect()->action([CategoryController::class, 'index']) -> with('success','Update successful');

    }
    public function delete($id){
        $category = category::findOrFail($id);
        $category->delete();
        return back();
    }

    public function categorysub($id)
    {
       $sub = SubCategory::where('cat_id', $id)->orderBy('subcat_name','ASC')->get();
       return response($sub);
    }
}
?>