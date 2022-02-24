<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index(Cart $cart){
        // dd(request()->all());
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        $data = Order::Search()->paginate();
        return view('backend.order.index',compact('data','carts','totalqtt','totalprice'));
    }
    public function detail(Order $order,Cart $cart){
        $carts = $cart->getCarts();
        $totalqtt = $cart->getTotal();
        $totalprice = $cart->getTotal(true);
        return view('backend.order.detail',compact('order','carts','totalqtt','totalprice'));
    }
    public function status(Order $order,Request $request){
        $data=$request->only('status');
        if($order->update($data)){
            return redirect()->back()->with('success','Updated successful');
        }
        return redirect()->back()->with('error','Updated fail');
    }
}
