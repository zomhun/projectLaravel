<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    public $totalQuantity = 0;
    public $totalPrice = 0;

    
    public function add($product,$color,$size,$quantity){
        $colorModel = Color::find($color);
        $sizeModel = Size::find($size);
        $carts = $this->getCarts();
        $cartKey = $product["id"]."_". $color ."_" .$size;
        if(isset($carts[$cartKey]))
        {
            $carts[$cartKey] -> quantity += $quantity;
        }else
        {
        $item = [
            'id' => $product->id,
            'name' => $product->pro_name,
            'image' => $product->image,
            'cat_id' => $product->cat_id,
            'size'  => $size,
            'color' => $color,
            'color_name' => $colorModel->color_name,
            'size_name' => $sizeModel->size_name,
            'price' => $product->saleprice ? $product->saleprice : $product->price,
            'quantity' =>$quantity
        ];
        $carts[$cartKey] = (object)$item;
    }
    session(['cart'=>$carts]);
    }
    public function addcoupon($coupon){
        $coupon['coupon_id']=$coupon['0']->id;
        $coupon['coupon_value']=$coupon['0']->coupon_value;
        session(['coupon'=>$coupon]);
    }
    public function capnhat($id,$color,$size,$quantity=1){
        $carts = $this->getCarts();
        $cartKey = $id."_".$color."_".$size;
        if(isset($carts[$cartKey])){
            $carts[$cartKey]->quantity = $quantity;
            session(['cart'=>$carts]);
        }
    }
    public function remove($id,$color,$size){
        $carts = $this->getCarts();
        $cartKey = $id."_".$color."_".$size;
        if(isset($carts[$cartKey])){
            unset($carts[$cartKey]);
            session(['cart'=>$carts]);
        }
    }
    public function removeAll(){
        session()->forget('cart');
        session()->forget('coupon');
    }
    public function getCarts(){
        $carts = session('cart') ? session('cart') : [];
        return $carts;
    }
    public function getTotal($isPrice = false){
        $total=0;
        $carts = $this->getCarts();
        foreach($carts as $cart){
            if($isPrice){
                $total += $cart->quantity*$cart->price;
            }else{
                $total += $cart->quantity;
            }
        }
        return $total;
    }
    public function getCoupon(){
        $coupon = session('coupon') ? session('coupon') : [];
        return $coupon;
    }
}
?>