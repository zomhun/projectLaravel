@extends('layouts.main')
@section('css')
<style>
.rating-stars ul {
    list-style-type: none;
    padding: 0;

    -moz-user-select: none;
    -webkit-user-select: none;
}

.rating-stars ul>li.star {
    display: inline-block;

}

/* Idle State of the stars */
.rating-stars ul>li.star>i.fa {
    font-size: 2.5em;
    /* Change the size of the stars */
    color: #ccc;
    /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul>li.star.hover>i.fa {
    color: #ff8c8c;
}

/* Selected state of the stars */
.rating-stars ul>li.star.selected>i.fa {
    color: #ff6666;
}
</style>
@stop
@section('content')
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>T-Shirt</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Product</a></li>
                    <li class="active">{{ $product->pro_name }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container"><a
                                                    data-lens-image="../public/product/{{ $product->image }}"
                                                    class="simpleLens-lens-image"><img
                                                        src="../public/product/{{ $product->image }}"
                                                        class="simpleLens-big-image"
                                                        style="width:250px;height:300px"></a></div>
                                        </div>
                                        <div class="simpleLens-thumbnails-container">
                                            <a data-big-image="../public/product/{{ $product->image }}"
                                                data-lens-image="../public/product/{{ $product->image }}"
                                                class="simpleLens-thumbnail-wrapper" href="#">
                                                <img src="../public/product/{{ $product->image }}"
                                                    style="width:45px;height:55px">
                                            </a>
                                            @foreach($productimgs as $productimg)
                                            <a data-big-image="../public/product/{{ $productimg->image }}"
                                                data-lens-image="../public/product/{{ $productimg->image }}"
                                                class="simpleLens-thumbnail-wrapper" href="#">
                                                <img src="../public/product/{{ $productimg->image }}"
                                                    style="width:45px;height:55px">
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal view content -->
                            <form action="../cart/add/{{$product->id}}" method="post">
                                @csrf
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $product->pro_name }}</h3>
                                        <div class="aa-price-block">
                                            @if($product['saleprice'])
                                            <span class="aa-product-price">$ {{ $product->saleprice }}</span><span
                                                class="aa-product-price">
                                                <del style="color:red">$ {{ $product->price }}</del>
                                                @else
                                                <span class="aa-product-price">$ {{ $product->price }}</span><span
                                                    class="aa-product-price"></span>
                                                @endif
                                                <p class="aa-product-avilability">Avilability:
                                                    <span>{{ $product->status?"In Stock":"Soldout" }}</span>
                                                </p>
                                        </div>
                                        <h4>Size</h4>

                                        <div class="aa-prod-view-size">
                                            <input type="hidden" name="size" id="selected_size" value="" />
                                            @foreach($data1 as $datasize)
                                            @foreach($sizes as $size)
                                            @if($datasize->size_id == $size->id)
                                            <a class="opt_size" data-value="{{$size->id}}">{{$size->size_name}}</a>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                        <h4>Color</h4>
                                        <div class="aa-color-tag">
                                            <input type="hidden" name="color" id="selected_color" value="" />
                                            @foreach($data2 as $datacolor)
                                            @foreach($colors as $color)
                                            @if($datacolor->color_id == $color->id)
                                            <a style="background-color:{{ $color->color_name }};width:30px;height:30px ; border : 2px solid black"
                                                class="opt_color" data-value="{{$color->id}}"> </a>
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </div>
                                        <div class="aa-prod-quantity">
                                            <form action="">
                                                <select id="" name="quantity">
                                                    <option selected="1" value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </form>
                                            <p class="aa-prod-category">
                                                Category: <a href="#">{{ $product->catname->cat_name }}</a>
                                            </p>
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <button type="submit" class="aa-add-to-cart-btn"
                                                href="{{route('cart.add',$product->id)}}">
                                                Add ToCart</button>
                                            @if($wishlist0)
                                            <a href="add-wishlist/{{$product->id}}" class="idForm"
                                                data-id="{{ $product->id}}" data-placement="top"
                                                title="Add to Wishlist"><span style="font-size:30px;color:#ff6666;margin-left:30px"
                                                    onclick="myFunction(this)" class="fa fa-heart"></span> </a>
                                            @else
                                            <a href="add-wishlist/{{$product->id}}" class="idForm"
                                                data-id="{{ $product->id}}" data-placement="top"
                                                title="Add to Wishlist"><span style="font-size:30px;color:#ff6666;margin-left:30px"
                                                    onclick="myFunction(this)" class="fa fa-heart-o"></span> </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#review" data-toggle="tab">Reviews</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                {!!$product->description!!}
                            </div>
                            <div class="tab-pane fade " id="review">
                                <div class="aa-product-review-area">
                                    <h4>{{$countfeedback}} Reviews for {{ $product->pro_name }}</h4>
                                    <ul class="aa-review-nav">
                                        @foreach($feedbacks as $feedback)
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    @foreach($cus as $cust)
                                                    @if($cust->id==$feedback->customer_id)
                                                    <h4 class="media-heading"><strong>{{$cust->name}}</strong> -
                                                        <span>{{$feedback->created_at}}</span>
                                                    </h4>
                                                    @endif
                                                    @endforeach
                                                    <div class="aa-product-rating">
                                                        @if($feedback->rating==1)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        @elseif($feedback->rating==2)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        @elseif($feedback->rating==3)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        @elseif($feedback->rating==4)
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star-o"></span>
                                                        @else
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @endif
                                                    </div>
                                                    <p>{{$feedback->feedback_detail}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        {{$feedbacks->appends(request()->all())->links()}}
                                    </ul>
                                    <h4>Add a review</h4>
                                    @if(Auth::guard('cus')->check())
                                    <form
                                        action="../customer/rating/{{Auth::guard('cus')->user()->id}}/{{$product->id}}"
                                        method="post" class="aa-review-form">
                                        @csrf
                                        <div class='rating-stars text-center'>
                                            <p>Your Rating</p>
                                            <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class='success-box text-center'>
                                            <div class='clearfix'></div>
                                            <div class='text-message'></div>
                                            <input type="hidden" name="rating" id="rating-value" value="5" />
                                            <div class='clearfix'></div>
                                        </div>
                                        <!-- review form -->
                                        <div class="form-group" style="clear:both">
                                            <label for="message">Your Review</label>
                                            <textarea class="form-control" rows="3" id="message"
                                                name="feedback_detail"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                                    </form>
                                    @else
                                    <div class="aa-review-form">
                                        <a href="{{route('customer.login')}}"><button
                                                class="btn btn-default aa-review-submit">Log in to rate this
                                                product</button></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->
                    <div class="aa-product-related-item">
                        <h3>Related Products</h3>
                        <ul class="aa-product-catg aa-related-item-slider">
                            <!-- start single product item -->
                            @foreach($data as $product)
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="../productdetail/{{$product->id}}"><img
                                            src="../public/product/{{ $product->image }}" alt="polo shirt img"
                                            style="width:250px;height:300px"></a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#">{{ $product->pro_name }}</a></h4>
                                        <span class="aa-product-price">$ {{ $product->price }}</span><span
                                            class="aa-product-price">
                                            @if($product['saleprice'])
                                            <del>$ {{ $product->saleprice }}</del>
                                            @endif
                                        </span>
                                    </figcaption>
                                </figure>
                                <!-- product badge -->
                                <span class="aa-badge aa-sale" href="#">SALE!</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('js')
<script>
$(document).ready(function() {
    $('.opt_color').on('click', function(e) {
        e.preventDefault();
        $('#selected_color').val($(this).attr('data-value'));
    });
    $('.opt_size').on('click', function(e) {
        e.preventDefault();
        $('#selected_size').val($(this).attr('data-value'));
    });
    $('.opt_size').click(function() {
        $('.opt_size').removeAttr('style');
        $(this).css("background-color", "#FF6666");
    });
    $('.opt_color').click(function() {
        $('.opt_color').css("border", "2px solid black");
        $(this).css("border", "2px solid #FF6666");
    });
});

$(document).ready(function() {

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
        $('#rating-value').val(ratingValue);

    });


});


function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>
@stop