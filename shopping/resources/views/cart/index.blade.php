@extends('layouts.main')
@section('content')
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Cart Page</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Cart</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->
<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($totalqtt==0)
                <div class="card-body cart" style="margin-top:50px">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png"
                            width="200" height="200" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                    </div>
                </div>
                @else
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    <form action="{{route('cart.update',$cart->id)}}">
                                        <tr>
                                            <td>
                                                <a onclick="return confirm('Are you sure want to delete this product?')" href="{{route('cart.remove',$cart->id)}}?color1={{$cart->color}}&size1={{$cart->size}}">
                                                    <fa class="fa fa-close"></fa>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img src="../public/product/{{ $cart->image }}" alt="img">
                                                </a>
                                            </td>
                                            <td><a class="aa-cart-title" href="#">{{ $cart->name }}</a></td>
                                            <td>${{ $cart->price }}</td>
                                            @foreach ($sizes as $size)
                                                @if($cart->size == $size->id)
                                                    @if($cart->cat_id == 16 || $cart->cat_id == 15 || $cart->cat_id ==
                                                    14|| $cart->cat_id == 37 || $cart->cat_id == 36 || $cart->cat_id ==
                                                    35 ||$cart->cat_id == 34)
                                                    <td>
                                                        <p style="font-size: 20px;">{{ $size-> size_number }}</p>
                                                        <input type="text" value="{{ $size-> id  }}" name="size" class="hidden">
                                                    </td>
                                                    @else
                                                    <!-- thêm input -->
                                                    <td>
                                                        <p style="font-size: 20px;">{{ $size-> size_name }}</p>
                                                        <input type="text" value="{{ $size-> id  }}" name="size" class="hidden">
                                                    </td>
                                                    @endif
                                                @endif
                                                @endforeach
                                            @foreach ($colors as $color)
                                                @if($cart->color == $color->id)
                                                <!-- thêm input -->
                                                <td>
                                                    <div
                                                        style="background-color:{{ $color->color_name }};width:30px;height:30px">
                                                        <input type="text" value="{{ $color->id }}" name="color"
                                                            class="hidden">
                                                    </div>
                                                </td>
                                                @endif
                                            @endforeach
                                            <td><input class="aa-cart-quantity" type="number"
                                                    value="{{ $cart->quantity }}" name="quantity" min="1" max="100">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary cart-btn-transform m-3">Update</button
                                            ></td>
                                            <td>{{ $cart->price * $cart->quantity }}</td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('cart.removeAll')}}" class="aa-cart-view-btn"
                                onclick="return confirm('Are you sure you want to delete all products?');">Clear
                                all</a>
                        </div>
                        <!-- Cart Total view -->
                        <div class="cart-view-total">
                            <h4>Cart Totals</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                    <tr>
                                        <th>Total Item</th>
                                        <td>{{$totalqtt}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{number_format($totalprice)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{route('order.checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
                        </div>
                    </div>
                </div>
                @endif
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
@section('js')
<script>
$(".remove").on('click', function() {
    var id = $(this).data('id');
    var form_id = "#form-delete-all-" + id;
    $(form_id).submit();
});
</script>
@stop