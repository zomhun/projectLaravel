@extends('backend.nav')
@section('content')
<div>
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
                                                aria-describedby="basic-addon2" name="cus_name" />
                                        </div>
                                    </div>
                                    <div class="form-group row card-body">
                                        <div class="col-md-4 mb-3">
                                            <label for="">Sắp xếp theo:</label>
                                            <select class="form-control" name="order" id="">
                                                <option value="created_at-asc">Ngày tạo cũ nhất</option>
                                                <option value="created_at-desc">Ngày tạo mới nhất</option>
                                                <option value="name-asc">Tên Kh a->z</option>
                                                <option value="name-desc">Tên Kh z->a</option>
                                                <option value="totalprice-asc">Tổng tiền tăng dần</option>
                                                <option value="totalprice-desc">Tổng tiền giảm dần</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Trạng thái:</label>
                                            <select class="form-control" name="status" id="">
                                                <option value="0">Chưa xác thực</option>
                                                <option value="1">Đã xác thực</option>
                                                <option value="2">Đang giao hàng</option>
                                                <option value="3">Đã giao hàng</option>
                                                <option value="4">Đã huỷ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row card-body">
                                        <div class="col-md-4 mb-3">
                                            <p>Từ ngày: <input type="text" class="dtp" value="{{request('from')}}" name="from-date" id="form-date">
                                            </p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p>đến ngày: <input type="text" class="dtp" value="{{request('to')}}" name="to-date" id="to-date">
                                            </p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-search"></i>
                                            </button>
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
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->cus->name}}</td>
                <td>{{$order->cus->email}}</td>
                <td>{{$order->cus->phone}}</td>
                <td>{{$order->cus->address}}</td>
                <td>{{$order->created_at->format('d-m-Y')}}</td>
                <td>{{number_format($order->getTotal())}} VND</td>
                <td>
                    @if($order->status ==0)
                    <span class="label label-danger">Chưa xác nhận</span>
                    @elseif($order->status ==1)
                    <span class="label label-info">Đã xác nhận</span>
                    @elseif($order->status ==2)
                    <span class="label label-primary">Đang giao hàng</span>
                    @elseif($order->status ==3)
                    <span class="label label-success">Đã nhận hàng</span>
                    @elseif($order->status ==4)
                    <span class="label label-success">Đã huỷ</span>
                    @endif
                </td>
                <td><a href="{{route('admin.order.detail',$order->id)}}" class="btn btn-success">Xem</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{$data->appends(request()->all())->links()}}
    </div>
</div>
@stop