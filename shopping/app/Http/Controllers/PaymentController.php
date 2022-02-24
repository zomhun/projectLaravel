<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){
        $datapayment = new Payment;
        $payments = $datapayment -> getallpayment();
        return view('backend.payment.create', compact('payments'));
    }
    public function addnew(Request $request){
        $rules = [
            'payment_name' => 'required|unique:payment',
        ];
        $messages = [
            'payment_name.unique' => 'payment name already used',
            'payment_name.required' => 'payment name cannot be empty',
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

        Payment::create($data);
        return back() -> with('success','successfully added new');
        
    }
    public function edit($id){
        // Tìm đến đối tượng muốn update
        $payment = Payment::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $payment = Payment::findOrFail($id);
        $rules = [
            'payment_name' => 'required|unique:payment,payment_name,'.$id,
        ];
        $messages = [
            'payment_name.unique' => 'payment name already used',
            'payment_name.required' => 'payment name cannot be empty',
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
        Payment::where('id', $id)->update([ 'payment_name' => $data['payment_name'],'status' => $data['status'] ]);
        return redirect()->action([PaymentController::class, 'index']) -> with('success','Update successful');

    }
    public function delete($id){
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return back();
    }
}