<div class="aa-product-catg-body">
    <ul class="aa-product-catg">
        @foreach($data as $product)
        <li>
            <figure>
                <a class="aa-product-img" href="productdetail/{{$product->id}}"><img
                        src="public/product/{{ $product->image }}" alt="polo shirt img"
                        style="width:250px;height:300px"></a>
                <figcaption>
                    <h4 class="aa-product-title"><a href="#">{{ $product->pro_name }}</a></h4>
                    @if($product['saleprice'])
                    <span class="aa-product-price">$ {{ $product->saleprice }}</span><span class="aa-product-price">
                        <del>$ {{ $product->price }}</del>
                        @else
                        <span class="aa-product-price">$ {{ $product->price }}</span><span
                            class="aa-product-price"></span>
                        @endif
                        <p class="aa-product-descrip">{!! $product->description !!}</p>
                </figcaption>
            </figure>
            <div class="aa-product-hvr-content">
                @if(Auth::guard('cus')->check() == 'true')

                <a class="idForm1" data-id="{{ $product->id}}" data-placement="top" title="Add to Wishlist"><span
                        onclick="myFunction(this)" class="fa fa-heart-o" style="color:#ff6666"></span> </a>

                @else
                <a href="customer/login" title="Add to Wishlist"><span onclick="myFunction(this)"
                        class="fa fa-heart-o" style="color:#ff6666"></span> </a>

                @endif
                <a href="#" class="quickview" data-id="{{ $product->id }}"><span class="fa fa-search"></span></a>
            </div>
            <!-- product badge -->
            @if($product['saleprice'])
            <span class="aa-badge aa-sale" href="#">SALE!</span>
            @endif
        </li>
        @endforeach
    </ul>
</div>
<x-quickview />