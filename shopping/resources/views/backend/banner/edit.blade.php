@extends('backend.nav')
@section('content')
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Banner</h2>
        </div>
        <div class="card-body">
            <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                action="../update/{{ $banner->id }}">
                @csrf
                
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" class="form-control" id="banner_title" name="banner_title"
                        placeholder="Banner Title" value="{{ $banner->banner_title }}">
                        @error('banner_title') <small style="color:red;">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="file" id="select_image" name="banner_img">
                    <img src="../../../public/banner/{{ $banner->banner_img }}" alt="" style="width: 300px;" id="show_image">
                </div>

                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" class="form-control" id="banner_text" name="banner_text"
                        placeholder="banner text" value="{{ $banner->banner_text }}">
                        @error('banner_text') <small style="color:red;">{{$message}}</small> @enderror
                </div>
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                    <input type="text" class="form-control" id="banner_span" name="banner_span"
                        placeholder="banner span" value="{{ $banner->banner_span }}">
                        @error('banner_span') <small style="color:red;">{{$message}}</small> @enderror
                </div>
                <div class="row">
                    <label class="col-md-3 col-sm-3  control-label">Status</label>

                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label><input type="checkbox" {{ ($banner->status == 1 ? 'checked' : '') }}
                              name="status" id="status">Show/Hide</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <a href="/shopping/admin/banner"><button type="button"
                                class="btn btn-danger">Cancel</button></a>
                        <a href="/shopping/admin/banner/edit/{{ $banner->id }}"><button class="btn btn-primary"
                                type="reset">Reset</button></a>
                        <button type="submit" class="btn btn-success" name="update">Submit</button>
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