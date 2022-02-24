<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    function index(){
        $datapromotion = new Promotion();
        $promotions = $datapromotion->getallpromotion();
        return view('backend.promotion.promotion', compact('promotions'));
    }
    function edit($id){
        $promotion = Promotion::findOrFail($id);
    
        return view('backend.promotion.edit', compact('promotion'));
    }
    function update(Request $request,$id){
        $rules = [
            'promotion_title' => 'required',
            'promotion_text' => 'required',
        ];
        $messages = [
            'promotion_title.required' => 'title name cannot be empty',
            'promotion_text.required' => 'text name cannot be empty',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        if(isset($request['promotion_img'])){
            $request->validate([
                'promotion_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $strrandom = (\Str::random(10));
            $imageName = time().$strrandom.'.'.$request->promotion_img->extension();  
        
            $request->promotion_img->move(public_path('promotion'), $imageName);
            // $request['image']->getPathname('imageName');
            $promotion = Promotion::findOrFail($id);
            $file =public_path('promotion/'.$promotion->promotion_img);
            $img= unlink($file);
            $data = $request->all();
            $data['promotion_img']=$imageName;
            // dd($data);
            Promotion::where('id', $id)->update([ 'promotion_title' => $data['promotion_title'],'promotion_img' => $data['promotion_img'], 'promotion_text' => $data['promotion_text']]);
        }
        else{
            $data = $request->all();
            Promotion::where('id', $id)->update([ 'promotion_title' => $data['promotion_title'], 'promotion_text' => $data['promotion_text']]);
        }

        return redirect()->action([PromotionController::class, 'index']) -> with('success','Update successful');
    }
}