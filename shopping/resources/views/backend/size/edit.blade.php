@extends('backend.nav')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Size</h4>
                        </div>
                        <div class="card-body">
                            <form action="/shopping/admin/size/update/{{ $size->id }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Size Name</label>
                                            @error('size_name') <small style="color:red;">{{$message}}</small> @enderror
                                            <input type="text" class="form-control" placeholder="Size Name" name="size_name" id="size_name" value="{{ $size->size_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Size Number</label>
                                            @error('size_number') <small style="color:red;">{{$message}}</small> @enderror
                                            <input type="text" class="form-control" placeholder="Size Number" name="size_number" id="size_number" value="{{ $size->size_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>

                                    <div class="col-md-9 col-sm-9 ">
                                        <div class="checkbox">
                                            <label><input type="checkbox" {{ ($size->status == 1 ? 'checked' : '') }} name="status" id="status">Show/Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="{{ url('admin/size') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                        <a href="/shopping/admin/size/edit/{{ $size->id }}"><button class="btn btn-primary" type="reset">Reset</button></a>
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