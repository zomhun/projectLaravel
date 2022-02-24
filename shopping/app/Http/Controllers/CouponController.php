<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Str;

class CouponController extends Controller
{
    public function index(){
        $datacoupon = new Coupon;
        $coupons = $datacoupon -> getallcoupon();
        $code = strtoupper(Str::random(6));
        return view('backend.coupon.create', compact('coupons','code'));
    }
    public function addnew(Request $request){
        $rules = [
            'coupon_name' => 'required|unique:coupon',
            'coupon_name' => 'required',
        ];
        $messages = [
            'coupon_name.unique' => 'coupon name already used',
            'coupon_name.required' => 'coupon name cannot be empty',
            'coupon_value.required' => 'coupon value cannot be empty',
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

        Coupon::create($data);
        return back() -> with('success','Update successful');
        
    }
    public function edit($id){
        // Tìm đến đối tượng muốn update
        $coupon = Coupon::findOrFail($id);

        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('backend.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $coupon = Coupon::findOrFail($id);
        $rules = [
            'coupon_name' => 'required|unique:coupon,coupon_name,'.$id,
        ];
        $messages = [
            'coupon_name.unique' => 'coupon name already used',
            'coupon_name.required' => 'coupon name cannot be empty',
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
        Coupon::where('id', $id)->update([ 'coupon_name' => $data['coupon_name'],'status' => $data['status'] ]);
        return redirect()->action([CouponController::class, 'index']) -> with('success','Update successful');

    }
    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return back();
    }
}
?>