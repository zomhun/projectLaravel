<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model{
    protected $table = 'banner';

    protected $fillable = ['banner_img','banner_span','banner_title','banner_text','status'];

    function getallbanners(){
        return $data = Banner::all();
    }
    
}
?>