@extends('backend.nav')
@section('content')
<div class="">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Promotion</h2>
        </div>
        <div class="card-body">
        <div class="">
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                    action="../update/{{ $promotion->id }}">
                    @csrf
                    <div class=" col-md-12 form-group has-feedback">
                        <input type="text" class="form-control" id="promotion_title" name="promotion_title" placeholder="title"
                            value="{{ $promotion->promotion_title }}">
                            @error('promotion_title') <small style="color:red;">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="select_image" name="promotion_img">
                        <img src="../../../public/promotion/{{ $promotion->promotion_img }}" alt="" style="width: 300px;" id="show_image" >
                    </div>
                    <div class=" col-md-12 form-group has-feedback">
                        <input type="text" class="form-control" id="promotion_text" name="promotion_text" placeholder="text"
                            value="{{ $promotion->promotion_text }}">
                            @error('promotion_text') <small style="color:red;">{{$message}}</small> @enderror
                    </div>
\
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                        <a href="/shopping/admin/promotion"><button type="button"
                                class="btn btn-danger">Cancel</button></a>
                        <a href="/shopping/admin/promotion/edit/{{$promotion->id}}"><button class="btn btn-primary"
                                type="reset">Reset</button></a>
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