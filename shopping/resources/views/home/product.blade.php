@extends('layouts.main')

@section('content')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Fashion</h2>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Product</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-category">
    <form class="form-label-left input_mask">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="col-md-6 col-sm-6  form-group has-feedback" style="width: 24%">
                                <select class="form-control OB" name="orderBy">
                                    <option value="">Order By</option>
                                    <option   value="nameasc" @if( request()->orderBy == 'nameasc') selected="selected"
                                        @endif>Name ASC</option>
                                    <option   value="namedesc" @if( request()->orderBy == 'namedesc') selected="selected"
                                        @endif>Name DESC</option>
                                    <option   value="priceasc" @if( request()->orderBy == 'priceasc') selected="selected"
                                        @endif>Price ASC</option>
                                    <option   value="pricedesc" @if( request()->orderBy == 'pricedesc')
                                        selected="selected"
                                        @endif>Price DESC</option>
                                </select>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <input type="text" name="price_min" value="" class="hidden" id="txtPriceMin">
                                    <input type="text" name="price_max" value="" class="hidden" id="txtPriceMax">
                                    <input type="text" name="cat_id" value="{{$catId}}" class="hidden">
                                </div>
                            </div>
                        </div>

                        <x-list-product />
                        <div class="aa-product-catg-pagination">
                            {{$data->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Category</h3>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <?php menucategorys($categorys) ?>
                                </ul>
                            </div>
                        </div>
                        <div class="aa-sidebar-widget">
                            <h3>Shop By Price</h3>
                            <!-- price range -->
                            <div class="aa-sidebar-price-range">
                                <form action="">
                                    <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    </div>
                                    <span id="skip-value-lower" class="example-val ">30</span>
                                    <span id="skip-value-upper" class="example-val">100</span>
                                    <button id="filter" class="aa-filter-btn" type="submit">Filter</button>
                                </form>
                            </div>

                        </div>
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Top Rated Products</h3>
                            <div class="aa-recently-views">
                                <ul>
                                @foreach($toprateds as $toprated)
                                <li>
                                    <a href="#" class="aa-cartbox-img"><img alt="img"
                                            src="../shopping/public/product/{{ $toprated->image }}"></a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="#">{{$toprated->pro_name}}</a></h4>
                                        @if($toprated->saleprice)
                                        <span class="aa-product-price">$ {{ $toprated->saleprice }}</span><span
                                            class="aa-product-price">
                                            <del style="color:red">$ {{ $toprated->price }}</del>
                                            @else
                                            <span class="aa-product-price">$ {{ $toprated->price }}</span><span
                                                class="aa-product-price"></span>
                                            @endif
                                    </div>
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </form>
</section>

<!-- / product category -->


@stop()
@section('js')
<script>
$(document).on("change", ".OB", function(e) {
    $('#filter').click();
    
    
});
</script>
@stop
<?php 
function menucategorys($categorys,$parent_id=0){
    
    foreach($categorys as $key => $item)
    {

        if($item->parent_id == $parent_id)
        {$subMenu=null;
            foreach($categorys as $c => $c1) 
            {
                if($c1->parent_id == $item->id)
                {   
                    $subMenu= $c1;
                    break;
                }
            }
            echo '<li class="">';
            echo '<a href="../shopping/product?cat_id='.$item->id.'" >'.$item->cat_name;
            echo (isset($subMenu) ? '<span class="caret"></span>' : "");
            echo '</a>';
            if(isset($subMenu))
            {
                echo '<ul class="dropdown-menu sm-nowrap">';
                unset($categorys[$key]);
                menucategorys($categorys, $item->id);     
                echo '</ul>';
            }
            echo '</li>';
            echo '<br>';
        }
        
     
    }
}
?>