@extends('layouts.main')
@section('content')
<section id="aa-slider" style="position:relative">
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    @foreach($banners as $banner)
                    <li>
                        <div class="seq-model">
                            <img data-seq src="public/banner/{{$banner->banner_img }}" alt="Men slide img" />
                        </div>
                        <div class="seq-title">
                            @if($banner->banner_span)<span data-seq>{{$banner->banner_span}}</span>@endif
                            <h2 data-seq>{{$banner->banner_title}}</h2>
                            <p data-seq>{{$banner->banner_text}}</p>
                            <a data-seq href="{{$banner->url}}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- slider navigation btn -->
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
        </div>
    </div>
</section>
<!-- / slider -->
<!-- Start Promo section -->
<section id="aa-promo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-promo-area">
                    <div class="row">
                        <!-- promo left -->
                        <div class="col-md-5 no-padding">
                            @foreach($promotions as $promotion)
                            @if($promotion->status==0)
                            <div class="aa-promo-left">
                                <div class="aa-promo-banner">
                                    <img src="public/promotion/{{$promotion->promotion_img}}" alt="img">
                                    <div class="aa-prom-content">
                                        <span>{{$promotion->promotion_text}}</span>
                                        <h4><a
                                            @if($promotion->promotion_title=="for men")
                                                href="{{ URL::asset('product?cat_id=1') }}"
                                            @else
                                                href="{{ URL::asset('product?cat_id=2') }}"
                                            @endif>{{$promotion->promotion_title}}</a></h4>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <!-- promo right -->
                        <div class="col-md-7 no-padding">
                            <div class="aa-promo-right">
                                @foreach($promotions as $promotion)
                                @if($promotion->status==1)
                                <div class="aa-single-promo-right">
                                    <div class="aa-promo-banner">
                                        <img src="public/promotion/{{$promotion->promotion_img}}" alt="img">
                                        <div class="aa-prom-content">
                                            <span>{{$promotion->promotion_text}}</span>
                                            <h4><a 
                                            @if($promotion->promotion_title=="for men")
                                                href="{{ URL::asset('product?cat_id=1') }}"
                                            @else
                                                href="{{ URL::asset('product?cat_id=2') }}"
                                            @endif>{{$promotion->promotion_title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                            <x-HomeMenBox />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-banner-area">
                        <a href="#"><img src="{{ URL::asset('public/assets/img/1920x300-water-background.jpg') }}"
                                alt="fashion banner img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <x-popular-box />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-truck"></span>
                            <h4>FREE SHIPPING</h4>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-clock-o"></span>
                            <h4>30 DAYS MONEY BACK</h4>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-phone"></span>
                            <h4>SUPPORT 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Support section -->
<!-- Testimonial -->
<section id="aa-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-testimonial-area">
                    <ul class="aa-testimonial-slider">
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="{{ URL::asset('public/assets/img/IMG_20181123_185355.jpg') }}"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Everyone has to be dirty.</p>
                                <div class="aa-testimonial-info">
                                    <p>Dat</p>
                                    <span>CEO</span>
                                    <a href="#">DirtyTee.com</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="{{ URL::asset('public/assets/img/139544038_3738812019500441_1532448704741690608_n.jpg') }}"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>This is not alcohol, this is candle.</p>
                                <div class="aa-testimonial-info">
                                    <p>Duy nen</p>
                                    <span>CEO</span>
                                    <a href="#">Hanoipho.com</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="{{ URL::asset('public/assets/img/Untitled-1.jpg') }}"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <div class="aa-testimonial-info">
                                    <p>Tai</p>
                                    <span>COO</span>
                                    <a href="#">MM.com</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Testimonial -->

<!-- Latest Blog -->
<section id="aa-latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-latest-blog-area">
                    <h2>LATEST BLOG</h2>
                    <div class="row">
                        @foreach($blogs as $blog)
                        <!-- single latest blog -->
                        <div class="col-md-4 col-sm-4">
                            <div class="aa-latest-blog-single">
                                <figure class="aa-blog-img">
                                    <a href="/shopping/blogdetail/{{ $blog->id }}"><img src="public/blog/{{ $blog->img }}"
                                            alt="img"></a>
                                    <figcaption class="aa-blog-img-caption">
                                        <span href="#"><i class="fa fa-eye"></i>{{ $blog->view }}</span>
                                        <span href="#"><i class="fa fa-clock-o"></i>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-blog-info">
                                    <h3 class="aa-blog-title"><a href="/shopping/blogdetail/{{ $blog->id }}">{{ $blog->blog_title }}</a></h3>
                                    <div class="contentCell">{!! $blog->blog_content !!}</div>
                                    <a href="/shopping/blogdetail/{{ $blog->id }}" class="aa-read-mor-btn">Read more <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Latest Blog -->

@stop()
@section('js')
<script>
$(document).ready(function() {

    contentTrimming();
})

function contentTrimming() {
    var cells = $(".contentCell");
    if (cells != null && cells.length > 0) {
        var limitedChar = 30;
        for (var i = 0; i < cells.length; i++) {
            var cellText = $(cells[i]).text().trim();
            if (cellText.length > limitedChar) {
                var trimmedText = cellText.substring(0, limitedChar) + "...";
                $(cells[i]).text(trimmedText);
            }
        }
    }
}
</script>
@stop