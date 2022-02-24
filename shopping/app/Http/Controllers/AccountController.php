<?php

namespace App\Http\Controllers;

use App\models\Customer;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function account(){
        $dataacc = new Customer();
        $acc = $dataacc->get();
        return view('backend.account.account', compact('acc'));
    }
    function detail($id){
        $acc = Customer::findOrFail($id);
        
        return view('backend.account.detail', compact('acc'));
    }
    public function update(Request $request,$id){
        $acc = Customer::findOrFail($id);
        $request->validate([
            'name' => 'required|min:4|max:50|unique:customer,name,'.$id,
            'email' => 'required|email|unique:customer,email,'.$id,
        ]);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // dd($data);
        $acc->update([ 'name' => $data['name'],'email' => $data['email'],'address' => $data['address'],'phone' => $data['phone'] ]);

        
        return redirect()->back()->with('success','Successfully modified information');
    }
}
