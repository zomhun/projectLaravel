@extends('layouts.main')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="padding-left:50px;padding-top:50px">Order date</th>
            <th>Total price</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $order)
        <tr>
            <td style="padding-left:50px;padding-bottom:50px">{{$order->created_at->format('d-m-Y')}}</td>
            <td>${{$order->getTotal()-$order->coupon_value}}</td>
            <td><a href="{{route('order.detail',$order->id)}}" class="btn btn-success">View detail</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$orders->appends(request()->all())->links()}}
@stop