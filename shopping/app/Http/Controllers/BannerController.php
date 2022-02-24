<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function index(){
        $databanner = new Banner();
        $banners = $databanner->getallbanners();
        return view('backend.banner.banner', compact('banners'));
    }
    function addnew(Request $request){
        $rules = [
            'banner_title' => 'required|unique:banner',
            'banner_text' => 'required|unique:banner',
            'banner_span' => 'required|unique:banner'
        ];
        $messages = [
            'banner_title.required' => 'title name cannot be empty',
            'banner_title.unique' => 'title name already used',
            'banner_text.required' => 'text name cannot be empty',
            'banner_text.unique' => 'text name already used',
            'banner_span.required' => 'span name cannot be empty',
            'banner_span.unique' => 'span name already used',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        $request->validate([
            'banner_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $strrandom = (\Str::random(10));
        $imageName = time().$strrandom.'.'.$request->banner_img->extension();  
     
        $request->banner_img->move(public_path('banner'), $imageName);
        
        $data = $request->all();
        $data['banner_img']=$imageName;
        // dd($data);

        Banner::create($data);
        return redirect()->action([BannerController::class, 'index']) -> with('success','successfully added new');
    }
    function edit($id){
        $banner = Banner::findOrFail($id);
       
        return view('backend.banner.edit', compact('banner'));
    }
    function update(Request $request,$id){
        $rules = [
            'banner_title' => 'required|unique:banner,banner_title,'.$id,
            'banner_text' => 'required|unique:banner,banner_text,'.$id,
            'banner_span' => 'required|unique:banner,banner_span,'.$id,
        ];
        $messages = [
            'banner_title.required' => 'title name cannot be empty',
            'banner_title.unique' => 'title name already used',
            'banner_text.required' => 'text name cannot be empty',
            'banner_text.unique' => 'text name already used',
            'banner_span.required' => 'span name cannot be empty',
            'banner_span.unique' => 'span name already used',
        ];
        $request -> validate($rules,$messages);
    if(isset($request['status'])){
        $request['status']=1;
    }else{
        $request['status']=0;
    }
    if(isset($request['banner_img'])){
        $request->validate([
            'banner_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $strrandom = (\Str::random(10));
        $imageName = time().$strrandom.'.'.$request->banner_img->extension();  
     
        $request->banner_img->move(public_path('banner'), $imageName);
        // $request['image']->getPathname('imageName');
        $banner = Banner::findOrFail($id);
        $file =public_path('banner/'.$banner->banner_img);
        $img= unlink($file);
        $data = $request->all();
        $data['banner_img']=$imageName;
        // dd($data);
        Banner::where('id', $id)->update([ 'banner_text' => $data['banner_text'],'banner_img' => $data['banner_img'],'banner_span' => $data['banner_span'], 'banner_title' => $data['banner_title'], 'status' => $data['status']]);
    }
    else{
        $data = $request->all();
        Banner::where('id', $id)->update([ 'banner_text' => $data['banner_text'],'banner_span' => $data['banner_span'], 'banner_title' => $data['banner_title'],  'status' => $data['status']]);
    }
    
    return redirect()->action([BannerController::class, 'index']) -> with('success','Update successful');
}
    function delete($id){
        $banner = Banner::findOrFail($id);
        $file =public_path('banner/'.$banner->banner_img);
        $img= unlink($file);
        $banner->delete();
        return back();
    }
}