<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Blog extends Model{
    protected $table = 'blog';
    protected $fillable = ['blog_title','img','blog_content','status'];

    function getallblog(){
        return $data = Blog::all();
    }
}
?>