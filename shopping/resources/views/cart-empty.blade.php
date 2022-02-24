@extends('layouts.main')
@section('content')
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body cart" style="margin-top:50px">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png"
                            width="200" height="200" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                    </div>
                </div>
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