<!-- start prduct navigation -->
<ul class="nav nav-tabs aa-products-tab">
    <li class="active"><a href="#view" data-toggle="tab" data-id="view">Most view</a></li>
    <li><a href="#purchased" data-toggle="tab" data-id="purchased">Most buy</a></li>
    <li><a href="#created_at" data-toggle="tab" data-id="created_at">Newest</a></li>
</ul>
<div class="tab-content">
    @foreach($cats as $category)
    <div id="{{$category->id}}" class="tab-pane fade {{ $category->id == 1  ? 'in active' : '' }}" class="active">
        <ul class="aa-product-catg" id="showpro2">

        </ul>
        <div style="clear:both; text-align:center; padding-bottom:10px">
            <a class="aa-browse-btn" href="product">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
        </div>

    </div>
    @endforeach
</div>
@section('js2')
<script>
var auth = "{{Auth::guard('cus')->check()}}";
$(document).ready(function() {
    $(".nav-tabs li a").click(function() {
        $(".nav-tabs li").removeClass('active');
        $(this).parent().addClass('active');
        var id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/shopping/api/ajax-search-popularbox?orderBy=' + id,
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
                            '" class="idForm" data-placement="top" title="Add to Wishlist"> <span onclick="myFunction(this)" class="fa fa-heart-o"></span> </a>';
                    } else {
                        _html +=
                            '<a  href="http://localhost:8080/shopping/customer/login"><span onclick="myFunction(this)" class="fa fa-heart-o"></span></a>';
                    }
                    _html += '<a href="#" class="quickview" data-id="' + pro.id +
                        '"><span class="fa fa-search"></span></a></form>';
                    _html += '</div>';
                    _html += '<span class="aa-badge aa-sale" href="#">SALE!</span>';
                    _html += '</li>';
                }
                $("#showpro2").html(_html);
            }
        });
    });

    $.ajax({
        url: 'http://localhost:8080/shopping/api/ajax-search-popularbox?orderBy=view',
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
                        '" class="idForm" data-placement="top" title="Add to Wishlist"> <span onclick="myFunction(this)" class="fa fa-heart-o"></span> </a>';
                } else {
                    _html +=
                        '<a  href="http://localhost:8080/shopping/customer/login"><span onclick="myFunction(this)" class="fa fa-heart-o"></span></a>';
                }
                _html += '<a href="#" class="quickview" data-id="' + pro.id +
                    '"><span class="fa fa-search"></span></a></form>';
                _html += '</div>';
                _html += '<span class="aa-badge aa-sale" href="#">SALE!</span>';
                _html += '</li>';
            }
            $("#showpro2").html(_html);
        }
    });
});
</script>

@stop