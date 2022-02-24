@extends('layouts.main')
@section('content')
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Checkout Page</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="checkout">
    <div class="container">
        <div class="row">
            <form action="{{route('order.placeorder')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="checkout-area">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="checkout-left">
                                    <div class="panel-group" id="accordion">
                                        <!-- Coupon section -->
                                        <div class="panel panel-default aa-checkout-coupon">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne">
                                                        Have a Coupon?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <input type="text" placeholder="Coupon Code" name="coupon_name" id="coupon-text"
                                                        class="aa-coupon-code" value="">
                                                    <button class="aa-cart-view-btn" id="coupon-button" style="float:left" type="button">Add Coupon</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Shipping Address -->
                                        <div class="panel panel-default aa-checkout-billaddress">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseFour">
                                                        Shippping Address
                                                    </a>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="accinfo" id="accinfo" value="checkedValue">
                                                            Get Account information
                                                        </label>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder="name" name="name">
                                                                <input type="hidden" name="accname"
                                                                    value="{{$account->name}}">
                                                                @error('name') <small>{{$message}}</small> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="email" placeholder="Email Address*"
                                                                    name="email">
                                                                <input type="hidden" name="accemail"
                                                                    value="{{$account->email}}">
                                                                @error('email') <small>{{$message}}</small> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="tel" placeholder="Phone*" name="phone">
                                                                <input type="hidden" name="accphone"
                                                                    value="{{$account->phone}}">
                                                                @error('phone') <small>{{$message}}</small> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <input type="text" placeholder="Address*" name="address">
                                                                <input type="hidden" id="custId" name="accaddress"
                                                                    value="{{$account->address}}">
                                                                @error('address') <small>{{$message}}</small> @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="aa-checkout-single-bill">
                                                                <textarea cols="8" rows="3"
                                                                    name="order_note">Order Notes</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkout-right">
                                    <h4>Order Summary</h4>
                                    <div class="aa-order-summary-area">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($carts as $cart)
                                                <tr>
                                                    <td>{{ $cart->name }} <strong> x {{ $cart->quantity }}</strong>
                                                        <br>
                                                        <strong style="display: inline-block;font-size:20px">{{ $cart->size_name}}</strong><p style="background-color:{{ $cart->color_name}};border:1px solid black;height:20px; width:20px;display: inline-block; margin-bottom:0;margin-left:10px"></p>
                                                    </td>
                                                    <td>${{ number_format($cart->price * $cart->quantity) }}</td>
                                                </tr>
                                                @endforeach
                                            <tfoot>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>${{$totalprice}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>${{$tax}}</td>
                                                </tr>
                                                @if($coupon)
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>${{$coupon['coupon_value']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>${{$totalprice + $tax - $coupon['coupon_value']}}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <th>Total</th>
                                                    <td>${{$totalprice + $tax}}</td>
                                                </tr>
                                                @endif
                                            </tfoot>
                                        </table>
                                    </div>
                                    <h4>Payment Method</h4>
                                    <div class="aa-payment-method">
                                        @error('payment_id') <small>{{$message}}</small> @enderror
                                        @foreach($payments as $payment)
                                        <label for="cashdelivery"><input type="radio" id="cashdelivery"
                                                value="{{$payment->id}}" name="payment_id">{{$payment->payment_name}}
                                        </label>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="aa-cart-view-btn" style="margin-top:20px">Place
                                        Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{route('order.addcoupon')}}" method="post">
                @csrf
                <input type="hidden" placeholder="Coupon Code" name="coupon_name" class="aa-coupon-code" id="coupon-text-hidden" value="">
                <button class="aa-cart-view-btn" id="coupon-button-hidden" type="submit" hidden>Add Coupon</button>
            </form>
        </div>
    </div>
</section>
@stop
@section('js')
<script>
$('#accinfo').click(function() {
    var isCheck = $(this).is(':checked');
    if (isCheck) {
        var account_name = $('input[name="accname"]').val();
        var account_email = $('input[name="accemail"]').val();
        var account_phone = $('input[name="accphone"]').val();
        var account_address = $('input[name="accaddress"]').val();
        $('input[name="name"]').val(account_name);
        $('input[name="email"]').val(account_email);
        $('input[name="phone"]').val(account_phone);
        $('input[name="address"]').val(account_address);
    }
})
$("#coupon-button").click(function(){
    var coupon_val = $('#coupon-text').val();
    $('#coupon-text-hidden').val(coupon_val);
    $("#coupon-button-hidden").click();
});
</script>
@stop