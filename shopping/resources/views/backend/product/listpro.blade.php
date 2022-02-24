@extends('backend.nav')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success col" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="row">
    <div class="col">
        <div class="x_content">
            <a href="product/create"><button type="button" class="btn btn-primary">ADD NEW PRODUCT</button></a>
            <form class="form-label-left input_mask">
                <section class="intro">
                    <div class="bg-image h-100" style="
                            background-color: #d9eff5;
                            ">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control form-control-lg rounded"
                                                        placeholder="Type Keywords" aria-label="Type Keywords"
                                                        aria-describedby="basic-addon2" name="key" value="{{ request()->key }}" />
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="text-muted text-uppercase mt-3 mb-4">ADVANCED SEARCH</h6>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <select class="form-control" id="cat_id" name="cat_id">
                                                            <option value="">Select Category</option>
                                                            <?php showCategories($categories) ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <select class="form-control" name="orderBy">
                                                            <option value="">Order By</option>
                                                            <option value="nameasc" @if( request()->orderBy  == 'nameasc') selected="selected" @endif>Name ASC</option>
                                                            <option value="namedesc" @if( request()->orderBy  == 'namedesc') selected="selected" @endif>Name DESC</option>
                                                            <option value="priceasc" @if( request()->orderBy  == 'priceasc') selected="selected" @endif>Price ASC</option>
                                                            <option value="pricedesc" @if( request()->orderBy  == 'pricedesc') selected="selected" @endif>Price DESC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="slider-range"></div>
                                                    </div>
                                                </div>
                                                <div class="row slider-labels">
                                                    <div class="col-md-6 mb-6 caption">
                                                        <strong>Min:</strong>
                                                        <input id="slider-range-value1z" type="text"
                                                            name="slider-range-value1z" value="">
                                                    </div>
                                                    <div class="col-md-6 mb-6 text-right caption">
                                                        <strong>Max:</strong>
                                                        <input id="slider-range-value2z" type="text"
                                                            name="slider-range-value2z" value="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="min-value" value="">
                                                        <input type="hidden" name="max-value" value="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mt-4">
                                                    <p class="text-muted mb-0"><span
                                                            class="text-info">{{$data->total()}} </span>results</p>
                                                    <div>
                                                        <a href="product"><button type="button"
                                                                class="btn btn-link text-body"
                                                                data-mdb-ripple-color="dark">Reset</button></a>
                                                        <button type="submit" class="btn btn-info">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Sale price</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->pro_name }}</td>
                        <td>{{ $product->catname->cat_name }}</td>
                        <td><img src="../public/product/{{ $product->image }}" style="width:100px"></td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ number_format($product->saleprice) }}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <a href="/shopping/admin/product/edit/{{ $product->id }}">
                                <i class="fa fa-pencil-square-o"></i>Edit</a>
                            <a href="/shopping/admin/product/delete/{{ $product->id }}"
                                onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này không?');" class="xoa"
                                style="color:red">
                                <i class="fa fa-trash-o"></i>Delete</a>
                            <a href="/shopping/admin/product/viewimage/{{ $product->id }}">
                                <i class="fa fa-plus"></i>Add images</a>
                            <a href="/shopping/admin/product/viewdetail/{{ $product->id }}" style="color:green">
                                <i class="fa fa-arrow-down"></i>Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->appends(request()->all())->links()}}
            <a href="product/create"><button type="button" class="btn btn-primary">ADD NEW PRODUCT</button></a>
        </div>
    </div>
</div>
@stop
<?php 
function showCategories($categories,$parent_id=0,$char=''){
    foreach($categories as $key => $item)
    {
        $selected=request()->cat_id==$item->id ? 'selected' : '';
        if($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'"'.$selected.'>'.$char.$item->cat_name.'</option>';
            unset($categories[$key]);
            showCategories($categories,$item->id,$char.'     --');
        }
    }
}
?>