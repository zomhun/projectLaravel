@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <h4>Blog</h4>
        <div class="row">
            <div class="col-md-5">
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                    action="blog/addnew">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @csrf
                    <div class=" col-md-12 form-group has-feedback">
                        @error('blog_title') <small>{{$message}}</small> @enderror
                        <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="title"
                            value="">

                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="select_image" name="img">
                        <img src="" alt="" style="width: 300px;" id="show_image">
                    </div>
                    <div class="col-md-12 col-sm-12 x_content">
                        @error('blog_content') <small>{{$message}}</small> @enderror
                        <textarea class="resizable_textarea form-control" name="blog_content"
                            id="summernote"></textarea>
                    </div>
                    <div class="ln_solid"></div>
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
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <a href="{{url('admin/blog')}}"><button type="button"
                                    class="btn btn-danger">Return</button></a>
                            <button type="submit" class="btn btn-success" name="addnew">Submit</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>blog_title</th>
                            <th>Img</th>
                            <th>blog_content</th>
                            <th>status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td><img src="../public/blog/{{ $blog->img }}" style="width:150px; height:100px"></td>
                            <td class="contentCell">{!! $blog->blog_content !!}
                            </td>
                            <th>{{ $blog->status}}</th>
                            <td>
                                <a href="/shopping/admin/blog/edit/{{ $blog->id }}">
                                    <i class="fa fa-pencil-square-o"></i>Edit</a>
                                <a href="/shopping/admin/blog/delete/{{ $blog->id }}"
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
@stop

@section('js')

<script>
$(document).ready(function() {

    contentTrimming();
})

function contentTrimming() {
    var cells = $(".contentCell");
    if (cells != null && cells.length > 0) {
        var limitedChar = 10;
        for (var i = 0; i < cells.length; i++) {
            var cellText = $(cells[i]).text().trim();
            if (cellText.length > limitedChar) {
                var trimmedText = cellText.substring(0, limitedChar) + "...";
                $(cells[i]).text(trimmedText);
            }
        }
    }
}
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