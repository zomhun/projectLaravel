<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Classify;

class ClassifyController extends Controller
{
    public function index($id){
        $dataclassify = Classify::all()-> where('parent_id','=',$id);
        $classifys = $dataclassify;
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.classify.classify',compact('classifys','subcategory'));
    }
    public function addnew($id, Request $request){
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // dd($request['status']);
        $data = $request->all();
        // dd($data);
        $data['cat_name'] = $request['classify_name'];
        $subcategory = Subcategory::findOrFail($id);
        $data['parent_id'] = $subcategory['id'];
        Classify::create($data);
        return back();
        
    }
    public function edit($id,$claid){
        // Tìm đến đối tượng muốn update
        $classify = Classify::findOrFail($claid);
        $subcategory = SubCategory::findOrFail($id);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.classify.edit', compact('classify','subcategory'));
    }

    public function update(Request $request, $id, $claid){

        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        Classify::where('id', $claid)->update([ 'cat_name' => $data['classify_name'],'status' => $data['status']]);
        return redirect()->action([ClassifyController::class, 'index'],['id' => $id]);

    }
    public function delete($id){
        $classify = Classify::findOrFail($id);
        $classify->delete();
        return back();
    }
}
?>