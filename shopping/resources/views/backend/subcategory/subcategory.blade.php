@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="card-title">{{$category->cat_name}}</h1>
                <a href="/shopping/admin/category">Category List</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subcategory</h4>
                    </div>
                    <div class="card-body">
                        <form action="addnew/{{$category->id}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subcategory name</label>

                                        <input type="text" class="form-control" placeholder="subcategory Name"
                                            name="subcat_name" id="subcat_name">
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
                <h2>List Subcategory</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategorys as $subcat)
                        <tr>
                            <td>{{ $subcat->id }}</td>
                            <td>{{ $subcat->cat_name }}</td>
                            <td>{{ $subcat->status?"show":"hide" }}</td>
                            <td>{{ $subcat->created_at }}</td>
                            <td>
                                <a href="/shopping/admin/category/subcategory/edit/{{$category->id}}/{{$subcat->id}}">
                                    <i class="fa fa-pencil-square-o"></i>Edit</a>
                                <a href="/shopping/admin/category/subcategory/delete/{{$subcat->id}}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này không?');" class="xoa"
                                    style="color:red">
                                    <i class="fa fa-trash-o"></i>Delete</a>
                                <a href="/shopping/admin/category/subcategory/classify/{{$subcat->id}}" style="color:green">
                                    <i class="fa fa-arrow-down"></i>Classify</a>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop