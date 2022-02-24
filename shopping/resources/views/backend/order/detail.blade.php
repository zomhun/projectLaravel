@extends('backend.nav')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success col" role="alert">
    {{Session::get('success')}}
</div>
@endif
<h2>Order details</h2>
<div class="row">
    <div class="col-md-6">
        <h4>Customer information</h4>
        <hr>
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
            <td>{{number_format($order->getTotal())}} VND</td>
            <td>
                @if($order->status==3)
                <span class="btn btn-success">Đã giao hàng</span>
                @elseif($order->status==4)
                <span class="btn btn-danger">Đã huỷ</span>
                @else
                <form class="form-inline" method="post" action="{{route('admin.order.status',$order->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="status" id="">
                            <option value="">Select status</option>
                            <option value="0" {{$order->status ==0 ? 'selected' : ''}}>Unconfimred</option>
                            <option value="1" {{$order->status ==1 ? 'selected' : ''}}>Confirmed</option>
                            <option value="2" {{$order->status ==2 ? 'selected' : ''}}>Delivery in progress</option>
                            <option value="3" {{$order->status ==3 ? 'selected' : ''}}>Received</option>
                            <option value="4" {{$order->status ==4 ? 'selected' : ''}}>Cancelled</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </form>
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
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->details as $item)
        <tr>
            <td scope="row"><img src="{{url('public/images')}}/{{$item->prod->image}}" alt="" width="100"></td>
            <td>{{$item->prod->pro_name}}</td>
            <td>{{$item->quantity}}</td>
            <td>${{$item->price}}</td>
            <td>{{$item->quantity * $item->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop