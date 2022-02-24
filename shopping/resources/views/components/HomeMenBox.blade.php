<!-- start prduct navigation -->
<form action="">
    <ul class="nav nav-tabs aa-products-tab">
        @foreach($cats as $category)
        <li role="presentation"
            class="{{app('request')->input('cat_id') == ''  && $category->id == 1 ? 'active' :  ($category->id == app('request')->input('cat_id') ? 'active' : '') }}"
            class="active">
            <a href="#{{$category->id }}" data-id="{{$category->id }}">{{ $category->cat_name }}</a>
        </li>
        @endforeach
    </ul>
</form>
<!-- Tab panes -->
<div class="tab-content">
    @foreach($cats as $category)
    <div id="{{$category->id}}" class="tab-pane {{ $category->id == 1  ? 'active' : '' }}" class="active">
        <ul class="aa-product-catg" id="showpro1">

        </ul>
        <div style="clear:both; text-align:center; padding-bottom:10px">
            <a class="aa-browse-btn" href="product">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
        </div>

    </div>
    @endforeach
</div>
<!-- quick view modal -->           
<x-quickview/>
@section('js1')
<script>
var auth = "{{Auth::guard('cus')->check()}}";
$(document).ready(function() {
    $(".nav-tabs li a").click(function() {
        $(".nav-tabs li").removeClass('active');
        $(this).parent().addClass('active');
        var id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/shopping/api/ajax-search-homemenbox?cat_id=' + id,
            type: 'GET',
            success: function(res) {
                console.table(res);
                var _html = '';
                for (var pro of res) {
                    _html += '<li>';
                    _html += '<figure>';
                    _html += '<a class="aa-product-img" href="productdetail/' + pro.id +
                        '"><img src="public/product/' + pro.image +
                        '" alt="polo shirt img" style="width:250px;height:300px"></a>';
                    _html += '<figcaption>';
                    _html += '<h4 class="aa-product-title"><a href="#">' + pro.pro_name +
                        '</a></h4>';
                    _html += '<span class="aa-product-price">$ ' + pro.price + '</span>';
                    _html += '<span class="aa-product-price">';
                    if (pro.saleprice) {
                        _html += '<del>$ ' + pro.saleprice + '</del>';
                    }
                    _html += '</span>';
                    _html += '</figcaption>';
                    _html += '</figure>';
                    _html += '<div class="aa-product-hvr-content">';
                    if (auth == 1) {
                        _html += '<a data-id="' + pro.id +
                            '" class="idForm" data-placement="top" title="Add to Wishlist"> <span onclick="myFunction(this)" class="fa fa-heart-o" style="color:#ff6666"></span> </a>';
                    } else {
                        _html +=
                            '<a  href="http://localhost:8080/shopping/customer/login"/><span onclick="myFunction(this)" class="fa fa-heart-o"></span></a>';
                    }
                    _html += '<a href="#" class="quickview" data-id="' + pro.id +
                        '"><span class="fa fa-search"></span></a></form>';
                    _html += '</div>';
                    _html += '<span class="aa-badge aa-sale" href="#">SALE!</span>';
                    _html += '</li>';
                }
                $("#showpro1").html(_html);
            }
        });
    });

    $.ajax({
        url: 'http://localhost:8080/shopping/api/ajax-search-homemenbox?cat_id=1',
        type: 'GET',
        success: function(res) {
            console.table(res);
            var _html = '';
            for (var pro of res) {
                _html += '<li>';
                _html += '<figure>';
                _html += '<a class="aa-product-img" href="productdetail/' + pro.id +
                    '"><img src="public/product/' + pro.image +
                    '" alt="polo shirt img" style="width:250px;height:300px"></a>';
                _html += '<figcaption>';
                _html += '<h4 class="aa-product-title"><a href="#">' + pro.pro_name + '</a></h4>';
                if (pro.saleprice) {
                    _html += '<span class="aa-product-price">$ ' + pro.saleprice +
                        '</span><span class="aa-product-price">';
                    _html += '<del>$ ' + pro.price + '</del>';
                } else {
                    _html += '<span class="aa-product-price">$ ' + pro.price +
                        '</span><span class="aa-product-price">';
                }
                _html += '</span>';
                _html += '</figcaption>';
                _html += '</figure>';
                _html += '<div class="aa-product-hvr-content">';
                if (auth == 1) {
                        _html += '<a data-id="' + pro.id +
                            '" class="idForm" data-placement="top" title="Add to Wishlist"> <span onclick="myFunction(this)" class="fa fa-heart-o" style="color:#ff6666"></span> </a>';
                    } else {
                        _html += '<a  href="http://localhost:8080/shopping/customer/login"><span onclick="myFunction(this)" class="fa fa-heart-o"></span></a>';
                    }
                    _html += '<a href="#" class="quickview" data-id="' + pro.id +
                        '"><span class="fa fa-search"></span></a></form>';
                _html += '</div>';
                _html += '<span class="aa-badge aa-sale" href="#">SALE!</span>';
                _html += '</li>';
            }
            $("#showpro1").html(_html);
        }
    });
});

</script>

@stop