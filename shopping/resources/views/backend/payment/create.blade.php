@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">payment</h4>
                    </div>
                    <div class="card-body">
                        <form action="payment/addnew" method="post">
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
                                        <label>payment Name</label>
                                        @error('payment_name') <small>{{$message}}</small> @enderror
                                        <input type="text" class="form-control" placeholder="payment Name"
                                            name="payment_name" id="payment_name">
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
                <h2>List payment</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>payment Name</th>
                            <th>Status</th>
                            <th>Create date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->payment_name }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->created_at }}</td>
                            <td>
                                <a href="/shopping/admin/payment/edit/{{ $payment->id }}">
                                    <i class="fa fa-pencil-square-o"></i>Edit</a>
                                <a href="/shopping/admin/payment/delete/{{ $payment->id }}"
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