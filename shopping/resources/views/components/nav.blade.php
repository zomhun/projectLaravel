<div>
    <header id="aa-header" style="position:relative;">
        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <a href="{{ route('home') }}"><img
                                        src="{{ URL::asset('public/assets/img/6108982046_e09ce89b-b6e5-4dfe-8ca3-af1358d2822c.png') }}"
                                        alt="logo img" style="height:50px"></a>
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->
                            <div class="aa-cartbox">
                                <a class="aa-cart-link" href="{{route('cart.view')}}">
                                    <span class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">SHOPPING CART</span>
                                    <span class="aa-cart-notify">{{number_format($totalqtt)}}</span>
                                </a>
                                <div class="aa-cartbox-summary">
                                    <ul>
                                        @foreach($carts as $cart)
                                        <li>
                                            <a class="aa-cartbox-img" href="#"><img
                                                    src="{{ URL::asset('public/product/') }}/{{$cart->image}}"
                                                    alt="img"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">{{ $cart->name }}</a></h4>
                                                <p style="display: inline-block;">{{ $cart->size_name}}</p>
                                                <p
                                                    style="background-color:{{ $cart->color_name}};border:1px solid black;height:10px; width:10px;display: inline-block; margin-bottom:0">
                                                </p>
                                                <p>{{ $cart->quantity }} x ${{ number_format($cart->price) }}</p>
                                            </div>
                                            <a class="aa-remove-product"
                                                href="{{route('cart.remove',$cart->id)}}?color1={{$cart->color}}&size1={{$cart->size}}"><span
                                                    class="fa fa-times"></span></a>
                                        </li>
                                        @endforeach
                                        <li>
                                            <span class="aa-cartbox-total-title">
                                                Total
                                            </span>
                                            <span class="aa-cartbox-total-price">
                                                ${{number_format($totalprice)}}
                                            </span>
                                        </li>
                                    </ul>
                                    <a class="aa-cartbox-checkout aa-primary-btn"
                                        href="{{route('order.checkout')}}">Checkout</a>
                                </div>
                            </div>
                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="">
                                    <input type="text" name="" id="search-box" placeholder="Search here ex. 'man' ">
                                </form>
                                <div style="position:absolute;background-color:white;z-index:1000">
                                    <ul id="ShowSearchResult" style="height:200px;overflow:auto">

                                    </ul>
                                </div>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <?php menuCategories($categories) ?>
                            <li>
                                <a href="{{ route('blog') }}">Blog </a>
                            </li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                            @if(Auth::guard('cus')->check())
                            <li style="float:right"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Hi,
                                    {{Auth::guard('cus')->user()->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('customer.profile') }}"><i class="fa fa-address-card-o"
                                                aria-hidden="true"></i> Profile</a>
                                    </li>
                                    <li><a href="{{ route('order.history') }}"><i class="fa fa-history"
                                                aria-hidden="true"></i> Order history</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wishtlist</a></li>
                                    <li><a href="{{route('customer.change_pass')}}"><i class="fa fa-refresh"
                                                aria-hidden="true"></i> change password</a></li>
                                    <li><a href="{{route('customer.logout')}}"><i class="fa fa-sign-out"
                                                aria-hidden="true"></i> Logout</a></li>
                                </ul>
                            </li>
                            @else
                            <li style="float:right"><a href="{{route('customer.login')}}"><span
                                        class="fa fa-sign-in"></span> Login</a></li>
                            @endif
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>
</div>
@if(Session::has('success'))
<button id="stbutton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
    hidden></button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalCenterTitle">SUCCESS</h1>
            </div>
            <div class="modal-body">
                {{Session::get('success')}}.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#ff6666;color:white">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('error'))
<button id="stbutton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
    hidden></button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalCenterTitle">ERROR</h1>
            </div>
            <div class="modal-body">
                {{Session::get('error')}}.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#ff6666;color:white">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

<?php 
function menuCategories($categories,$parent_id=0){
    
    foreach($categories as $key => $item)
    {

        if($item->parent_id == $parent_id)
        {$subMenu=null;
            foreach($categories as $c => $c1) 
            {
                if($c1->parent_id == $item->id)
                {   
                    $subMenu= $c1;
                    break;
                }
            }
            echo '<li class="">';
            echo '<a href="../../../shopping/product?cat_id='.$item->id.'" >'.$item->cat_name;
            echo (isset($subMenu) ? '<span class="caret"></span>' : "");
            echo '</a>';
            if(isset($subMenu))
            {
                echo '<ul class="dropdown-menu sm-nowrap">';
                unset($categories[$key]);
                menuCategories($categories, $item->id);     
                echo '</ul>';
            }
            echo '</li>';
        }
        
     
    }
}
?>

@section('jsSearch')
<script>
$("#search-box").keyup(function() {
    var _text = $(this).val();
    if (_text != '') {
        $.ajax({
            url: 'http://localhost:8080/shopping/api/ajax-search-name?key=' + _text,
            type: 'GET',
            success: function(res) {
                console.table(res);
                var _html = '';
                for (var pro of res) {
                    _html += '<li style="width:484px;clear:both">';
                    _html += '<div class="pull-left">';
                    _html +=
                        '<a class="aa-product-img" href="../../shopping/productdetail/' +
                        pro.id +
                        '"><img src="../../shopping/public/product/' + pro.image +
                        '" alt="polo shirt img" style="width:75px;height:90px;"></a>';
                    _html += '</div>';
                    _html += '<div style="float:right;">';
                    _html +=
                        '<h4 class="aa-product-title" style="font-weight:bold"><a href="../../shopping/productdetail/' +
                        pro.id +
                        '">' + pro.pro_name + '</a></h4>';
                    if (pro.saleprice) {
                        _html += '<div style="float:right;color:red">';
                        _html += '<span class="aa-product-price">$ ' + pro.saleprice +
                            '</span><span class="aa-product-price">';
                        _html += '<del>$ ' + pro.price + '</del>';
                        _html += '</div>';
                    } else {
                        _html +=
                            '<span class="aa-product-price" style="float:right;color:red">$ ' +
                            pro.price +
                            '</span><span class="aa-product-price">';
                    }
                    _html += '</span>';
                    _html += '</div>';
                    _html += '</li>';
                }
                $("#ShowSearchResult").html(_html);
                $("#ShowSearchResult").show();
            }
        });
    } else {
        $("#ShowSearchResult").html('');
        $("#ShowSearchResult").hide();
    }

});

$(window).load(function() {
    $('#stbutton').hide();
    $('#stbutton').click();
})
</script>

@stop