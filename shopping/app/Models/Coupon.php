<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model{
    protected $table = 'coupon';

    protected $fillable = ['coupon_name','coupon_value','status'];

    function getallcoupon(){
        return $data = Coupon::all();
    }
    function getselectcoupon(){
        return $data = Coupon::all() -> where('status','=','1');
    }
    public function couponname(){
        return $this->hasOne(Coupon::class,'id','coupon_id');
    }
}
?>