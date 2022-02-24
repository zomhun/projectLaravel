@foreach($data as $pro)
<div class="modal-content">
    <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="aa-product-view-slider" style="margin-top:30px">
                    <div class="simpleLens-gallery-container" id="demo-1">
                        <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                                <a class="simpleLens-lens-image" data-lens-image="public/product/{{$pro->image}}">
                                    <img src="public/product/{{$pro->image}}" class="simpleLens-big-image"
                                        style="width:250px;height:300px">
                                </a>
                            </div>
                        </div>
                        <div class="simpleLens-thumbnails-container" style="margin-top:30px">
                            <a class="simpleLens-thumbnail-wrapper" data-lens-image="public/product/{{$pro->image}}"
                                data-big-image="public/product/{{$pro->image}}" data-target="simpleLens-big-image">
                                <img src="public/product/{{$pro->image}}" style="width:45px;height:55px">
                            </a>
                            @foreach($dataproimg as $productimg)
                            <a class="simpleLens-thumbnail-wrapper"
                                data-lens-image="public/product/{{ $productimg->image }}"
                                data-big-image="public/product/{{ $productimg->image }}">
                                <img src="public/product/{{ $productimg->image }}" style="width:45px;height:55px">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form action="cart/add/{{$pro->id}}" method="post">
                    @csrf
                    <div class="aa-product-view-content">
                        <h3>{{$pro->pro_name}}</h3>
                        <div class="aa-price-block">
                            @if($pro->saleprice)
                            <span class="aa-product-price">$ {{$pro->saleprice}}</span><span class="aa-product-price">
                                <del style="color:red"> $ {{$pro->price}} </del>
                                @else
                                <span class="aa-product-price">$ {{$pro->price}}</span><span class="aa-product-price">
                                    @endif
                                    <p class="aa-product-avilability"> Avilability:
                                        <span> {{$pro->status ? "In stock" : "Soldout" }}</span>
                                    </p>
                        </div>
                        <div>{!! Str::words($pro->description, 50) !!}</div>
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
                        <h4>Color </h4>
                        <input type="hidden" name="color" id="selected_color" value="" />
                        <div class="aa-prod-view-size">
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
                                <select name="quantity" id="">
                                    <option value="1" selected="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                    <option value="6"> 6 </option>
                                </select>
                            </form>
                            <p class="aa-prod-category">Category: <a href="#">{{$pro->catname->cat_name}}
                                </a>
                            </p>
                        </div>
                        <div class="aa-prod-view-bottom">
                            <button type="submit" class="aa-add-to-cart-btn" href="{{route('cart.add',$pro->id)}}">
                                Add ToCart</button>
                            <a href="productdetail/{{$pro->id}}" class="aa-add-to-cart-btn"> View Details </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach