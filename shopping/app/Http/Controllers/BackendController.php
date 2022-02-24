<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    function index(){
        return view('backend.dashboard');
    }
}