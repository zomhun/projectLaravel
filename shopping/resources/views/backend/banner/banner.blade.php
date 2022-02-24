@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Banner</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                            action="banner/addnew">
                            @csrf

                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{Session::get('success')}}
                            </div>
                            @endif
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control" id="banner_title" name="banner_title"
                                    placeholder="Banner Title" value="">
                                @error('banner_title') <small style="color:red;">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="file" id="select_image" name="banner_img">
                                <img src="" alt="" style="width: 300px;" id="show_image">
                            </div>

                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control" id="banner_text" name="banner_text"
                                    placeholder="banner text" value="">
                                @error('banner_text') <small style="color:red;">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control" id="banner_span" name="banner_span"
                                    placeholder="banner span" value="">
                                @error('banner_span') <small style="color:red;">{{$message}}</small> @enderror
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="status" id="status">Show/Hide</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button type="submit" class="btn btn-success" name="addnew">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <h2>List Banner</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Banner Title</th>
                            <th>Banner Text</th>
                            <th>Banner Span</th>
                            <th>Status</th>
                            <th>Banner Img</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $bn)
                        <tr>
                            <td>{{ $bn->id }}</td>
                            <td>{{ $bn->banner_title }}</td>
                            <td>{{ $bn->banner_text }}</td>
                            <td>{{ $bn->banner_span }}</td>
                            <th>{{ $bn->status}}</th>
                            <td><img src="../public/banner/{{ $bn->banner_img }}" style="width:200px"></td>
                            <td>
                                <a href="/shopping/admin/banner/edit/{{ $bn->id }}">
                                    <i class="fa fa-pencil-square-o"></i>Edit</a>
                                <a href="/shopping/admin/banner/delete/{{ $bn->id }}"
                                    onclick="return confirm('Are you sure you want to delete this record?');"
                                    class="xoa" style="color:red">
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

@stop()
@section('js')
<script>
$('#show_image').click(function() {
    $('#select_image').click();
});
$('#select_image').change(function() {
    var select_file = $(this);
    var file_input = select_file[0];
    var file = file_input.files[0];
    console.log(file);
    var reader = new FileReader()
    reader.onload = function(ev) {
        $('#show_image').attr('src', ev.target.result)
    }
    reader.readAsDataURL(file);
});
</script>
@stop()