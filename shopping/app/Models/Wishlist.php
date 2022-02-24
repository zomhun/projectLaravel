<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model{
    protected $table = 'wishlist';

    protected $fillable = ['id','product_id','customer_id'];

    public $timestamps = false;

    public function proname(){
        return $this->hasOne(Product::class,'id','product_id');
    }

}
?>