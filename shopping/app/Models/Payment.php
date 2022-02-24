<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model{
    protected $table = 'payment';

    protected $fillable = ['payment_name','status'];

    function getallpayment(){
        return $data = Payment::all();
    }
    function getselectpayment(){
        return $data = Payment::all() -> where('status','=','1');
    }
    public function paymentname(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }
}
?>