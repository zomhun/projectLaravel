<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model{
    protected $table = 'order_detail';

    protected $fillable = ['order_id','pro_id','quantity','price','size_id','color_id'];
    public $timestamps = false;
    public function prod(){
        return $this->hasOne(Product::class,'id','pro_id');
    }
    public function sname(){
        return $this->hasOne(Size::class,'id','size_id');
    }
    public function cname(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
?>