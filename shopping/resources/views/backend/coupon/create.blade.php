@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Coupon</h4>
                    </div>
                    <div class="card-body">
                        <form action="coupon/addnew" method="post">
                            @csrf
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Name</label>
                                        @error('coupon_name') <small>{{$message}}</small> @enderror
                                        <input type="text" class="form-control" placeholder="Coupon Name"
                                            name="coupon_name" id="coupon_name" value="{{$code}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Coupon Value</label>
                                        @error('coupon_value') <small>{{$message}}</small> @enderror
                                        <input type="text" class="form-control" placeholder="Coupon Value"
                                            name="coupon_value" id="coupon_value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="status" id="status">Show/Hide</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success" name="addnew">Submit</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>List Coupon</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Coupon Name</th>
                            <th>Coupon Value</th>
                            <th>Status</th>
                            <th>Create date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->coupon_name }}</td>
                            <td>{{ number_format($coupon->coupon_value) }}</td>
                            <td>{{ $coupon->status }}</td>
                            <td>{{ $coupon->created_at }}</td>
                            <td>
                                <a href="/shopping/admin/coupon/edit/{{ $coupon->id }}">
                                    <i class="fa fa-pencil-square-o"></i>Edit</a>
                                <a href="/shopping/admin/coupon/delete/{{ $coupon->id }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này không?');" class="xoa"
                                    style="color:red">
                                    <i class="fa fa-trash-o"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop