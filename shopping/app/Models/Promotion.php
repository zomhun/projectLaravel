<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Promotion extends Model{
    protected $table = 'promotion';
    protected $fillable = ['promotion_title','promotion_img','promotion_text','status'];

    function getallpromotion(){
        return $data = Promotion::all();
    }
}
?>