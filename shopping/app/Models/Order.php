<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    // protected $table = 'orders';

    protected $fillable = ['cus_id','name','email','phone','address','order_note','status','coupon_value'];

    
    public function details(){
        
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function cus(){
        return $this->hasOne(Customer::class,'id','cus_id');
    }

    public function scopeSearch($query){
        if(request('cus_name')){
            $key = request('cus_name');
            $query = $query->where('name','like','%'.$key.'%');
        }
        if(request('status')){
            $query = $query->where('status',request('status'));
        }
        if(request('order')){
            $order = request('order');
            $orderArr = explode('-',$order);
            $query = $query->orderBy($orderArr[0],$orderArr[1]);
        }
        if(request('from-date') && request('to-date')){
            $by_date1 = request('from-date');
            $by_dateArr1 = explode('-',$by_date1);
            $dateFrom = $by_dateArr1;
            $dateFrom = str_replace('/','-',$dateFrom);
            $by_date2 = request('to-date');
            $by_dateArr2 = explode('-',$by_date2);
            $dateTo = $by_dateArr2;
            $dateTo = str_replace('/','-',$dateTo);
            $query = $query->whereBetween('created_at',[$dateFrom,$dateTo]);
        }
        return $query;
    }
    public function getTotal(){
        $total=0;
        foreach($this->details as $item){
            $total += $item->price *$item->quantity;
        }
        return $total;
    }
}
?>