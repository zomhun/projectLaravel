<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('backend.login.login');
    }
    public function login(Request $request){
        // $pass_hashed = bcrypt(123456);
        // dd($pass_hashed);
        $data = $request->only('name','password');
        $check_login = Auth::attempt($data);
        if($check_login){
            // $role = Auth::user('role');
            // dd($role);
            // $admin = "admin";
            // if($role = $admin){
                return redirect()->route('admin');
            // }
            // return redirect()->route('home');
        }
        return redirect()->back()->with('error','wrong name or password');
        // dd($check_login);
    }
    public function logout(){
        Auth::logout();
        return redirect()->action([LoginController::class, 'index']);
    }

    public function signup(){
        return view('backend.login.signup');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:4|max:50|unique:customer',
            'email' => 'required|email|unique:customer',
            'password'=> 'required',
            'password_check'=> 'required|same:password',
        ]);
        // dd($request);
        $data = $request->only('name','email');
        $data['password'] = bcrypt($request['password']);
        User::create($data);
        return redirect()->route('login')->with('success','Account successfully created');
        
    }
}
?>