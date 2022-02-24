<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;

class Product extends Model{
    protected $table = 'product';

    protected $fillable = ['pro_name','cat_id','image','description','status','price','saleprice'];

    function getallproduct(){
        return $data = Product::all();
    }
    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query->where('pro_name','like','%'.$key.'%');
        }
        if(request('cat_id')){
            $cat_id=request('cat_id');
            $cat = Category::find($cat_id);
            $cat_ids = $cat->childArray();
            $query = $query->whereIn('cat_id',$cat_ids);
        }
        if(request('orderBy')){
            switch (request('orderBy')) {
                case 'nameasc':
                    $query->orderby('pro_name', 'asc');
                    break;
                case 'namedesc':
                    $query->orderby('pro_name', 'desc');
                    break;
                case 'priceasc':
                    $query->orderby('price', 'asc');
                    break;
                case 'pricedesc':
                    $query->orderby('price', 'desc');
                    break;
                case 'view':
                    $query->orderby('view','desc');
                    break;
                case 'purchased':
                    $query->orderby('purchased','desc');
                    break;
                case 'newest':
                    $query->orderby('created_at','desc');
                    break;
                }
        }
        if(request('slider-range-value1z')>=0 && request('slider-range-value2z')){
            $min=request('slider-range-value1z');
            $max=request('slider-range-value2z');
            $query = $query->whereBetween('price',[$min,$max]);
        }
        if(request('price_min')>=0 && request('price_max')){
            $min=request('price_min');
            $max=request('price_max');
            $query = $query->whereBetween('saleprice',[$min,$max]);
        }
        return $query;
    }
    public function scopeDetail($query){
        if(request('id')){
            $id = request('id');
            $query = $query->where('id',$id);
        }
    }
    public function catname(){
        return $this->hasOne(Classify::class,'id','cat_id');
    }
    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
?>