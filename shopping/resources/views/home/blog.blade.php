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
        <div class="row">
            <div class="col-md-12">
                <div class="aa-blog-archive-area">
                    <div class="aa-blog-content">
                        <div class="row">
                            @foreach($blogs as $blog)
                            <div class="col-md-4 col-sm-4">
                                <article class="aa-blog-content-single">
                                    <h4><a href="/shopping/blogdetail/{{ $blog->id }}">{{ $blog->blog_title }}</a></h4>
                                    <figure class="aa-blog-img">
                                        <a href="/shopping/blogdetail/{{ $blog->id }}">
                                            <img src="public/blog/{{ $blog->img }}" style="width:300px; height:200px">
                                        </a>
                                    </figure>
                                    <div class="contentCell">{!! $blog->blog_content !!}</div>
                                    <a href="/shopping/blogdetail/{{ $blog->id }}">Read more </a>
                                    <div class="aa-article-bottom">
                                        <div class="aa-post-author">
                                            {{ $blog->created_at->format('d-m-Y') }}
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
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
$(document).ready(function() {

    contentTrimming();
})

function contentTrimming() {
    var cells = $(".contentCell");
    if (cells != null && cells.length > 0) {
        var limitedChar = 80;
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