<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Classify;

class SubCategoryController extends Controller
{
    public function index($id){
        $datasubcat = SubCategory::all()-> where('parent_id','=',$id);
        $subcategorys = $datasubcat;
        $category = Category::findOrFail($id);
        
        return view('backend.subcategory.subcategory',compact('subcategorys','category'));
    }
    public function addnew($id,Request $request){
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        
        $data = $request->all();
        
        $data['cat_name'] = $request['subcat_name'];
        // $category = Category::findOrFail($id);
        $data['parent_id'] = $id;
        // dd($request['status']);
        
        // dd($data);

        SubCategory::create($data);
        return back();
        
    }
    public function edit($id,$subid){
        // Tìm đến đối tượng muốn update
        $subcategory = SubCategory::findOrFail($subid);
        $category = Category::findOrFail($id);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.subcategory.edit', compact('subcategory','category'));
    }

    public function update(Request $request, $id,$subid){
         
        
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        SubCategory::where('id', $subid)->update([ 'cat_name' => $data['subcat_name'],'status' => $data['status']]);

        
        return redirect()->action([SubCategoryController::class, 'index'],['id' => $id]);

    }
    public function delete($id){
        $subcats = SubCategory::findOrFail($id);
        $subcats->delete();
        return back();
    }
    public function classify($id)
    {
       $cla = Classify::where('subcat_id', $id)->orderBy('classify_name','ASC')->get();
       return response($cla);
    }
    public function subtocat($id){
        $cat = Category::findOrFail($id)->subcats();
        return response($cat);
    }
}
?>