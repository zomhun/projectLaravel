@extends('layouts.main')
@section('content')
<h2>Order details</h2>
<a style="float:right;color:#ff6666" href="/shopping/order/detailpdf/{{$order->id}}?pdf={{$order->id}}"><i class="fa fa-download"></i> Download pdf</a>
<div class="row">
    <div class="col-md-6">
        <h4>Customer information</h4>
        <table class="table">
            <tr>
                <td>Full name</td>
                <td>{{$order->cus->name}}</td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">Email</td>
                <td>{{$order->cus->email}}</td>
            </tr>
            <tr>
                <td scope="row">Phone</td>
                <td>{{$order->cus->phone}}</td>
            </tr>
            <tr>
                <td scope="row">Address</td>
                <td>{{$order->cus->address}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <h4>Delivery information</h4>
        <table class="table">
            <tr>
                <td scope="row">Full name</td>
                <td>{{$order->name}}</td>
            </tr>
            <tr>
                <td scope="row">Email</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td scope="row">Phone</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td scope="row">Address</td>
                <td>{{$order->address}}</td>
            </tr>
        </table>
    </div>
</div>
<h3>Order details</h3>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Order date</th>
            <th>Total price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->created_at->format('d-m-Y')}}</td>
            <td>${{number_format($order->getTotal())}}</td>
            <td>
                @if($order->status ==0)
                <span class="label label-danger" style="float:left">Unconfimred</span>
                <form class="form-inline" method="post" action="{{route('admin.order.status',$order->id)}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="4" name="status">
                    <button type="submit" style="float:right;background-color:#ff6666;color:white;border:solid;border-radius:5px;">Cancel order</button>
                </form>
                @elseif($order->status ==1)
                <span class="label label-info">Confirmed</span>
                @elseif($order->status ==2)
                <span class="label label-primary">Delivery in progress</span>
                @elseif($order->status ==3)
                <span class="label label-success">Received</span>
                @elseif($order->status ==4)
                <span class="label label-danger">Cancelled</span>
                @endif
            </td>
        </tr>
    </tbody>
</table>
<h3>Product's detail information</h3>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product name</th>
            <th>Color</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->details as $item)
        <tr>
            <td scope="row"><img src="{{url('public/product')}}/{{$item->prod->image}}" alt="" width="100"></td>
            <td>{{$item->prod->pro_name}}</td>
            <td>{{$item->cname->color_name}}</td>
            <td>{{$item->sname->size_name}}</td>
            <td>{{$item->quantity}}</td>
            <td>${{$item->price}}</td>
            <td>${{$item->quantity * $item->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop