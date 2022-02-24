<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    function index(){
        $datablog = new Blog();
        $blogs = $datablog->getallblog();
        return view('backend.blog.blog', compact('blogs'));
    }
    public function addnew(Request $request){
        $rules = [
            'blog_title' => 'required|unique:blog',
            'blog_content' => 'required|unique:blog',
        ];
        $messages = [
            'blog_title.required' => 'title name cannot be empty',
            'blog_title.unique' => 'title name already used',
            'blog_content.required' => 'content name cannot be empty',
            'blog_content.unique' => 'content name already used',
        ];
        $request -> validate($rules,$messages);
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $strrandom = (\Str::random(10));
        $imageName = time().$strrandom.'.'.$request->img->extension();  
     
        $request->img->move(public_path('blog'), $imageName);
        
        $data = $request->all();
        $data['img']=$imageName;
        Blog::create($data);
        //print_f($data);
        return redirect()->action([BlogController::class, 'index']) -> with('success','successfully added new');
    }
    function edit($id){
        $blog = Blog::findOrFail($id);
    
        return view('backend.blog.edit', compact('blog'));
    }
    function update(Request $request,$id){
        if(isset($request['status'])){
            $request['status']=1;
        }else{
            $request['status']=0;
        }
        if(isset($request['img'])){
            $request->validate([
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $strrandom = (\Str::random(10));
            $imageName = time().$strrandom.'.'.$request->img->extension();  
        
            $request->img->move(public_path('blog'), $imageName);
            // $request['image']->getPathname('imageName');
            $blog = Blog::findOrFail($id);
            $file =public_path('blog/'.$blog->img);
            $img= unlink($file);
            $data = $request->all();
            $data['img']=$imageName;
            // dd($data);
            Blog::where('id', $id)->update([ 'blog_title' => $data['blog_title'],'img' => $data['img'], 'blog_content' => $data['blog_content'], 'status' => $data['status']]);
        }
        else{
            $data = $request->all();
            Blog::where('id', $id)->update([ 'blog_title' => $data['blog_title'], 'blog_content' => $data['blog_content'],  'status' => $data['status']]);
        }

        return redirect()->action([BlogController::class, 'index']) -> with('success','Update successful');
    }
    function delete($id){
        $blog = Blog::findOrFail($id);
        $file =public_path('blog/'.$blog->img);
        $img= unlink($file);
        $blog->delete();
        return back();
    }
}