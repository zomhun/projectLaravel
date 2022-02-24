<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Size extends Model{
    protected $table = 'size';

    protected $fillable = ['size_name','size_type','status'];

    function getallsize(){
        return $data = Size::all();
    }
    function getselectsize(){
        return $data = Size::all() -> where('status','=','1');
    }
    public function scopeSearchDetail($query){
        if(request('id')){
            $id = request('id');
            $query = $query->where('product_id',$id);
        }
    }
}
?>