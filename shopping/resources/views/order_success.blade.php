@extends('layouts.main')
@section('content')
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body cart" style="margin-top:50px;">
                    <div class="col-sm-12 empty-cart-cls"> <img src="{{ URL::asset('public/assets/img/6108982046_e09ce89b-b6e5-4dfe-8ca3-af1358d2822c.png') }}"
                            width="200" height="120" class="img-fluid mb-4 mr-3" style="margin-bottom:50px">
                    </div>
                </div>
                <h1 style="margin-bottom:30px;color:#ff6666">THANK YOU FOR YOUR PURCHASED</h1>
                <h4>We'll email you an order confirmation with detail and tracking info.</h4>
            </div>
        </div>
    </div>
</section>
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area" style="padding-top:0">
                    <div class="cart-view-table" style="background-color:white;min-height:0">
                        <div class="cart-view-total">
                            <a href="{{route('home')}}" class="aa-cart-view-btn">Continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop