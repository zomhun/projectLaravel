<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model{
    protected $table = 'feedback';

    protected $fillable = ['feedback_detail','customer_id','rating','product_id'];
    function getallfeedback(){
        return $data = Feedback::all();
    }
}