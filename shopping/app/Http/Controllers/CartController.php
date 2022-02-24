<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Payment;
use App\Models\Coupon;
use PDF;
use Auth;

class CartController extends Controller
{
    public function view(Cart $cart){
        $datasize = new Size();
        $sizes = $datasize -> getselectsize();
        $carts = $cart->getCarts();
        $datacolor = new Color();
        $colors = $datacolor -> getselectcolor();
        $payments = Payment::all();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('cart.index',compact('carts','totalqtt','totalprice','sizes','colors'));
    }
    public function update($id, Cart $cart,Request $request){
        $quantity = is_numeric($request->quantity) && $request->quantity > 0  ? ceil($request->quantity) : 1;
        $color= $request['color'];
        $size = $request['size'];
        if(is_numeric($quantity)){
            $cart->capnhat($id,$color,$size,$quantity);
            return redirect()->route('cart.view');
        }
        else{
            return redirect()->back()->with('error','There are something went wrong');
        }
    }
    public function add(Product $product,Cart $cart,Request $request){
        $color= $request['color'];
        $size = $request['size'];
        $quantity=$request['quantity'];
        if(is_numeric($quantity)){
            $cart->add($product,$color,$size,$quantity);
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('error','There are something went wrong');
        }
    }
    public function remove($id, Cart $cart,Request $request){
        // dd($request->all());
        $color= $request['color1'];
        $size = $request['size1'];
        $cart->remove($id,$color,$size);
        return redirect()->back()->with('success','Deleted successful');
    }
    public function removeAll(Cart $cart){
        $cart->removeAll();
        return redirect()->route('cart.view');
    }
    public function checkout(Cart $cart){
        $account = Auth::guard('cus')->user();
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        $tax = $totalprice * 0.05;
        $datapayment = new Payment;
        $payments = $datapayment -> getallpayment();
        $coupon = $cart->getCoupon();
        if($totalqtt==0){
            return view('cart-empty');
        }
        return view('cart.checkout',compact('carts','totalqtt','totalprice','tax','account','payments','coupon'));
    }
    public function placeorder(Request $request,Cart $cart){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_id' => 'required'
        ];
        $messages = [
            'name.required' => 'Name cannot be empty',
            'email.required' => 'Email cannot be empty',
            'phone.required' => 'Phone cannot be empty',
            'address.required' => 'Address cannot be empty',
            'payment_id.required' => 'Payment cannot be empty',
        ];
        $request -> validate($rules,$messages);
        $data = $request->only('name','email','phone','address','ordernote','payment_id');
        $data['cus_id'] = Auth::guard('cus')->user()->id;
        $coupon = $cart->getCoupon();
        if(isset($coupon['coupon_id'])){
            $data['coupon_value'] = $coupon['coupon_value'];
        }
        if($order = Order::create($data)){
            $carts = $cart->getCarts();
            foreach($carts as $item){
                OrderDetail::create([
                    'order_id'=>$order->id,
                    'pro_id'=>$item->id,
                    'price'=>$item->price,
                    'quantity'=>$item->quantity,
                    'color_id'=>$item->color,
                    'size_id'=>$item->size
                ]);
            }
            $cart->removeAll();
            return redirect()->route('order.success');
        }
        return redirect()->back()->with('error','Place order not successful');
    }
    public function success(){
        return view('order_success');
    }
    public function history(Cart $cart){
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        $account_id = Auth::guard('cus')->user()->id;
        $orders = Order::where('cus_id',$account_id)->paginate(5);
        return view('order_history',compact('orders','carts','totalqtt','totalprice'));
    }
    public function detail(Order $order,Cart $cart){
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('order_detail',compact('order','carts','totalqtt','totalprice'));
    }
    public function addcoupon(Request $request,Cart $cart){
        $datacoupon = new Coupon;
        $coupon = Coupon::all()-> where('coupon_name',$request['coupon_name']);
        if($coupon==''){
            $cart->addcoupon($coupon);
            return redirect()->back()->with('success','Added coupon successful');
        }
        else{
            return redirect()->back()->with('error','Coupon not available');
        }
    }
    public function detailpdf(Order $order,Cart $cart){
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        if(request('pdf',false)){
            $pdf = PDF::loadview('pdf.order-detail',compact('order','carts','totalqtt','totalprice'));
            return $pdf->download();
        }
        return view('order_detail',compact('order'));
    }
}
