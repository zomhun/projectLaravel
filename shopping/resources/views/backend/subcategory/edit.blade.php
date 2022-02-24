@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">SubCategory</h4>
                    </div>
                    <div class="card-body">
                        <form action="/shopping/admin/category/subcategory/update/{{$category->id}}/{{$subcategory->id }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Subcategory Name"
                                            name="subcat_name" id="subcat_name" value="{{ $subcategory->cat_name }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="checkbox">
                                        <label><input type="checkbox" {{ ($subcategory->status == 1 ? 'checked' : '') }}
                                                name="status" id="status">Show/Hide</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <a href="{{url('admin/category/subcategory')}}/{{$category->id}}"><button type="button"
                                            class="btn btn-danger">Cancel</button></a>
                                    <a href="category/subcategory/edit/{{$category->id}}/{{ $subcategory->id }}"><button
                                            class="btn btn-primary" type="reset">Reset</button></a>
                                    <button type="submit" class="btn btn-success" name="update">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop