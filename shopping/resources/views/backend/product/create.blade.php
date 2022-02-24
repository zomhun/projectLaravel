@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 md-offset-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design <small>different form elements</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="form-label-left input_mask" method="post" enctype="multipart/form-data"
                            action="addnew">
                            @csrf
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                @error('pro_name') <small style="color:red;">{{$message}}</small> @enderror
                                <input type="text" class="form-control" id="pro_name" name="pro_name"
                                    placeholder="product name" value="">
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <select class="form-control" id="cat_id" name="cat_id">
                                    <option value="">-- Select Category --</option>
                                    <?php showCategories($categories) ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="file" id="select_image" name="image">
                                <img src="" alt="" style="width: 300px;" id="show_image">
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" class="form-control" id="price" name="price" placeholder="price"
                                    value="">
                                    @error('price') <small style="color:red;">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                @error('saleprice') <small  style="color:red;">{{$message}}</small> @enderror
                                <input type="text" class="form-control" id="saleprice" name="saleprice"
                                    placeholder="sale price" value="">
                            </div>
                            <div class="col-md-12 col-sm-12 x_content">
                                <textarea class="resizable_textarea form-control" name="description"
                                    id="summernote"></textarea>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-sm-3  control-label">Status</label>

                                <div class="col-md-9 col-sm-9 ">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="status" id="status">Show/Hide</label>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <a href="{{url('admin/product')}}"><button type="button"
                                            class="btn btn-danger">Return</button></a>
                                    <button type="submit" class="btn btn-success" name="addnew">Submit</button>
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
<?php 
function showCategories($categories,$parent_id=0,$char=''){
    foreach($categories as $key => $item)
    {
        if($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'">'.$char.$item->cat_name.'</option>';
            unset($categories[$key]);
    
            showCategories($categories,$item->id,$char.'     --');
        }
    }
}




?>

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