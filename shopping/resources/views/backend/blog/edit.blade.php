@extends('backend.nav')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Blog</h2>
    </div>
    <div class="card-body">
        <div class="">
            <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                action="../update/{{ $blog->id }}">
                @csrf
                <div class=" col-md-12 form-group has-feedback">
                    <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="title"
                        value="{{ $blog->blog_title }}">
                </div>
                <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="file" id="select_image" name="img">
                    <img src="" alt="" style="width: 300px;" id="show_image">
                </div>
                <div class="col-md-12 col-sm-12 x_content">
                    <textarea class="resizable_textarea form-control" name="blog_content" id="summernote"
                        s>{{ $blog->blog_content }}</textarea>
                </div>
                <div class="ln_solid"></div>
                <div class="row">
                    <label class="col-md-3 col-sm-3  control-label">Status</label>

                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label><input type="checkbox" {{ ($blog->status == 1 ? 'checked' : '') }} name="status"
                                    id="status">Show/Hide</label>
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