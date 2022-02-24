@extends('layouts.main')
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Blog Archive</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Blog Archive</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- Blog Archive -->
<section id="aa-blog-archive">
    <div class="container">
        <div class="row" >
            <div class="col-md-12">
                <div class="aa-blog-archive-area">
                    <div class="aa-blog-content aa-blog-details">
                        <article class="aa-blog-content-single">
                            <h2><a href="#">{{ $blogdetail->blog_title }}</a></h2>
                            <div class="aa-article-bottom">
                                <div class="aa-post-date">
                                    {{ $blogdetail->created_at->format('d-m-Y') }}
                                </div>
                            </div>
                            <figure class="aa-blog-img">
                                <img src="../public/blog/{{ $blogdetail->img }}" >
                            </figure>
                            <p>{!! $blogdetail->blog_content !!}</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
</section>
@stop