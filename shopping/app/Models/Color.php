<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Color extends Model{
    protected $table = 'color';

    protected $fillable = ['color_name','color_number','status'];

    function getallcolor(){
        return $data = Color::all();
    }
    function getselectcolor(){
        return $data = Color::all() -> where('status','=','1');
    }
    public function colorname(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
?>