<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model{
    protected $table = 'product_detail';

    protected $fillable = ['product_id','size_id','color_id','quantity','status'];

    public function sizename(){
        return $this->hasOne(Size::class,'id','size_id');
    }
    public function colorname(){
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function getDetail(){
        return $data = ProductDetail::all() -> where('status','=','1');
    }
    public function scopeSearchDetail($query){
        if(request('id')){
            $id = request('id');
            $query = $query->where('product_id',$id);
        }
    }
}
?>