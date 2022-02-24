<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function user(){
        $datause = new User;
        $user = $datause -> getUser();
    
        return view('backend.user.user', compact('user'));
    }


    public function update(Request $request, $id){
        $rules = [
            'name' => 'required||min:4|max:50|unique:users',
        ];
        $messages = [
            'name.min' => 'Name must have 4 characters',
            'name.max' => 'name must be less than 50 characters',
            'name.unique' => 'Names cannot be duplicated'
        ];

        $request -> validate($rules,$messages);
        
        if(isset($request['password'])){
        $data = $request->all();
        //dd($data);
        $data['password'] = bcrypt($request['password']);
        User::where('id', $id)->update([ 'name' => $data['name'],'password' => $data['password'] ]);
        }else{
        $data = $request->all();
        //dd($data);
        User::where('id', $id)->update([ 'name' => $data['name']]);
        }
        
        // gán dữ liệu gửi lên vào biến data
        
        return redirect()->route('admin.user')->with('success','Successfully modified information');
    }
    
    function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function profile(){
        $user =  Auth::guard('web')->user();
        return view('backend.user.profile',compact('user'));
    }
    public function save(Request $request){
        $auth =  Auth::guard('web')->user();
        $request->validate([
            'name' => 'required|min:4|max:50|unique:users,name,'.$auth->id,
            'email' => 'required|email|unique:users,email,'.$auth->id,
        ]);


        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data)
        $auth->update([ 'name' => $data['name'],'email' => $data['email']]);

        
        return redirect()->back()->with('success','Successfully modified information');

    }
    
    public function change(Request $request){

        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'password_check' => 'required|same:new_password',
        ]);
        $auth =  Auth::guard('web')->user();
        if (Hash::check($request->password,$auth->password)){
            $pass_hashed = bcrypt($request->new_password);
            $auth->update(['password' => $pass_hashed]);
            return redirect()->back()->with('success2','Change password successfully');
        }else{
            return redirect()->back()->with('error2','Wrong password please re-enter');
        }
    }
  


}
?>
