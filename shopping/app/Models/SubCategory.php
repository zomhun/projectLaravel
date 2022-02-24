<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model{
    protected $table = 'category';

    protected $fillable = ['cat_name','status','parent_id'];

    function getallsubcategory(){
        return $data = Subcategory::all();
    }
    function getselectsubcategory(){
        return $data = Subcategory::all() -> where('status','=','1');
    }
    public function subcatname(){
        return $this->hasOne(Subcategory::class,'id','subcat_id');
    }
    public function catname(){
        return $this->hasOne(Category::class,'id','cat_id');
    }
    public function subcats(){
        return $this->hasMany(Category::class,'id','cat_id');
    }
}
?>