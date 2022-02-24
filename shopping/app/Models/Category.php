<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = 'category';

    protected $fillable = ['cat_name','status','parent_id'];

    function getallcat(){
        return $data = Category::all();
    }
    function getselectcat(){
        return $data = Category::all() -> where('status','=','1');
    }
    public function catname(){
        return $this->hasOne(Category::class,'id','cat_id');
    }
    public function subcats(){
        return $this->hasMany(SubCategory::class,'cat_id','id');
    }
    public function parent() {
        return $this->belongsTo(self::class,'parent_id','id');
    }
    public function childs() {
        return $this->hasMany(self::class,'parent_id','id');
    }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function childArray(){
        $result=[$this->id];
        foreach($this->childs as $child){
            array_push($result,$child->id);
            foreach($child->childs as $child1){
                array_push($result,$child1->id);
            }
        }
        return $result;
    }
}
?>