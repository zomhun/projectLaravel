@extends('layouts.main')
@section('content')
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>wishlist page</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">wishlist</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table aa-wishlist-table">
                        <form action="">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>id</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                         
                                            <th>#</th>

                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        @foreach($wishlists as $wishlist)
                                        <tr>
                                            <td><a class="remove" href="wishlist/delete/{{ $wishlist->id }}">
                                                    <fa class="fa fa-close"></fa>
                                                </a></td>
                                            <td>{{$wishlist->product_id}}</td>
                                            <td><img src="public/product/{{$wishlist->proname->image}}" alt="img"></td>
                                            <td>{{$wishlist->proname->pro_name}}</td>
                                            <td>{{$wishlist->proname->price}}</td>
                                            <td><a href="productdetail/{{$wishlist->proname->id}}" class="aa-add-to-cart-btn">view product</a></td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    

                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>Subscribe our newsletter </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                    <form action="" class="aa-subscribe-form">
                        <input type="email" name="" id="" placeholder="Enter your Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop