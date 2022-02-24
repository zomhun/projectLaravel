<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $datacolor = new Color;
        $colors = $datacolor -> getallcolor();
        return view('backend.color.create', compact('colors'));
    }
    public function addnew(Request $request){
        $rules = [
            'color_name' => 'required|unique:color',
        ];
        $messages = [
            'color_name.unique' => 'color name already used',
            'color_name.required' => 'color name cannot be empty',
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

        Color::create($data);
        return back() -> with('success','successfully added new');
        
    }
    public function edit($id){
        // Tìm đến đối tượng muốn update
        $color = Color::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.color.edit', compact('color'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $color = Color::findOrFail($id);
        $rules = [
            'color_name' => 'required|unique:color',
        ];
        $messages = [
            'color_name.unique' => 'color name already used',
            'color_name.required' => 'color name cannot be empty',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        //dd($data);
        Color::where('id', $id)->update([ 'color_name' => $data['color_name'],'status' => $data['status'] ]);
        return redirect()->action([ColorController::class, 'index']) -> with('success','Update successful');

    }
    public function delete($id){
        $color = Color::findOrFail($id);
        $color->delete();
        return back();
    }
}
?>