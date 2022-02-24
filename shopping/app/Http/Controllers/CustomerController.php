<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Feedback;
use Auth;
use Str;
use Mail;
use Hash;
use PhpParser\Node\Stmt\TryCatch;

class CustomerController extends Controller
{
    public function index(Cart $cart){
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('customer.login',compact('totalqtt','carts','totalprice'));
    }
    public function login(Request $request){
        $request->validate([
            'name1' => 'required|min:4|max:50',
            'password1' => 'required',

        ]);

        $data['name'] = $request['name1'];
        $data['password'] = $request['password1'];
        // dd($data);
        $check_login = Auth::guard('cus')->attempt($data);

        $auth = Auth::guard('cus')->user();
        if($check_login){
            if($auth->status == 1){
            
                return redirect()->route('home');
            } 
            elseif($auth->status == 0){
        return redirect()->back()->with('error','Your account is not verified. Please check your email '.$auth->email.' to verify your account');
            
        }
       }
    return redirect()->back()->with('error','Wrong password or account does not exist');
        // dd($check_login);
    }
    public function logout(){
        Auth::guard('cus')->logout();
        return redirect()->route('home');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:4|max:50|unique:customer',
            'email' => 'required|email|unique:customer',
            'password'=> 'required',
            'checkpassword'=> 'required|same:password',
        ]);


        if($request['password']==$request['checkpassword']){
            $data = $request->only('name','email');
            $data['password'] = bcrypt($request['password']);
            
            Customer::create($data);
            
            


            $token = strtoupper(\Str::random(10));
            $customer = Customer::where('email',$request->email)->first();

            try {
                \Mail::send('emails.activated', ['token' => $token,'customer' => $customer],function($mail) use($customer){
                $mail-> to($customer->email, $customer->name)->subject('C2010G1 - account verification');
            });
            Customer::where('email',$request->email)->update(['token'=>$token]);
            return redirect()->route('customer.login')->with('success','Account successfully created,Please check your email '.$request->email.' to verify your account');
            }
            catch (\throwble $th){
                redirect()->back()->with('error','error while sending email');
            }
        }else{
            return redirect()->back()->with('error','The password does not match ,please try again');
        }       
    }

    public function change_pass(){
        $auth =  Auth::guard('cus')->user();
        return view('customer.change_pass', compact('auth'));
    }
    public function postchange_pass(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required',
            'password_check'=> 'required|same:new_password',
        ]);
        $auth =  Auth::guard('cus')->user();
        if (Hash::check($request->old_password,$auth->password)){
            $pass_hashed = bcrypt($request->new_password);
            $auth->update(['password' => $pass_hashed]);
            return redirect()->back()->with('success','Change password successfully');
        }else{
            return redirect()->back()->with('error','Wrong password please re-enter');
        }
    }
    


    public function forget_pass(){

        return view('customer.forget_pass');
    }

    public function postforget_pass(Request $req){
        $req->validate([
            'email' => 'required|email|exists:customer',
        ]);
        $token = strtoupper(\Str::random(10));
        $customer = Customer::where('email',$req->email)->first();

        try {
            \Mail::send('emails.forget_pass', ['token' => $token,'customer' => $customer],function($mail) use($customer){
            $mail-> to($customer->email, $customer->name)->subject('C2010G1 - password retrieval');
        });
        Customer::where('email',$req->email)->update(['token'=>$token]);

        return redirect()->back()->with('success','Please check your email '.$customer->email.' to reset your password');
        }
        catch (\throwble $th){
            redirect()->back()->with('error','error while sending email');
        }
        

    }
    public function get_pass(){

        return view('customer.get_pass');
    }
    public function postget_pass($email , $token , Request $req){
        $req->validate([
            'password'=> 'required',
            'password_check'=> 'required|same:password',
        ]);
        $customer = Customer::where(['email' =>$email,'token' =>$token])->first();
            if($customer){
                $pass_hashed = bcrypt($req->password);
                $check_update = Customer::where('email',$email)->update(['token'=>null,'password'=>$pass_hashed]);
                if($check_update){
                    return redirect()->route('customer.login')->with('success','Change password successfully');
                }
            }
        return redirect()->back()->with('error','Invalid account or code'); 
    } 
    public function activated(){
        $auth =  Auth::guard('cus')->user();
        return view('customer.activated',compact('auth'));  
    }     
    public function postactivated($email , $token ){
        $customer = Customer::where(['email' =>$email,'token' =>$token])->first();
        if($customer){
            Customer::where('email',$email)->update(['token'=>null,'status' => 1 ]);
            return redirect()->route('customer.login')->with('success','Account activation successful');
        }
        return redirect()->back()->with('error','Invalid account or code'); 
    }
    public function rating($customer,$product,Request $request){
        $data = $request->all();
        $data['customer_id']=$customer;
        $data['product_id']=$product;
        Feedback::create($data);
        return redirect()->back();
    }
    public function profile(){
        return view('customer.profile');
    }
    public function updateprofile($id,Request $request){
        $request->validate([
            'name' => 'required|min:4|max:50|unique:customer,name,'.$id,
            'email' => 'required|email|unique:customer,name,'.$id,
            'phone' => 'unique:customer,phone,'.$id,
        ]);
        $data = $request->only('name','email','phone','address','fullname');
        $customer = Customer::where('id',$id)->update($data);
        return redirect()->back()->with('success','Updated successful'); 
    }
}
?>