<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Productimage extends Model{
    protected $table = 'productimg';

    protected $fillable = ['pro_id','image'];

    public function scopeDetailImage($query){
        if(request('id')){
            $id = request('id');
            $query = $query->where('pro_id',$id);
        }
    }
}
?>