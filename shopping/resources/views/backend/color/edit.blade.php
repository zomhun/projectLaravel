@extends('backend.nav')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Color</h4>
                        </div>
                        <div class="card-body">
                            <form action="/shopping/admin/color/update/{{ $color->id }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Color Name</label>
                                            @error('color_name') <small style="color:red;">{{$message}}</small> @enderror
                                            <input type="text" class="form-control" placeholder="Color Name" name="color_name" id="color_name" value="{{ $color->color_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <div class="checkbox">
                                            <label><input type="checkbox" {{ ($color->status == 1 ? 'checked' : '') }} name="status" id="status">Show/Hide</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="{{ url('admin/color') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
                                        <a href="/shopping/admin/color/edit/{{ $color->id }}"><button class="btn btn-primary" type="reset">Reset</button></a>
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