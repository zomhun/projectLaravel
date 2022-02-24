<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Classify extends Model{
    protected $table = 'category';

    protected $fillable = ['cat_name','status','parent_id'];

    function getallclassify(){
        return $data = Classify::all();
    }
    function getselectclassify(){
        return $data = Classify::all() -> where('status','=','1');
    }
    public function classifyname(){
        return $this->hasOne(Classify::class,'id','classify_id');
    }
    public function subcatname(){
        return $this->hasOne(Subcategory::class,'id','subcat_id');
    }
    public function subcatscla(){
        return $this->hasMany(SubCategory::class,'id','subcat_id');
    }
}
?>