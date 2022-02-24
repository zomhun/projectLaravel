@extends('backend.nav')
@section('content')

<div class="row">
    <div class="col">
        <div class="x_content">
            <h1>{{ $product->pro_name }}</h1>
            <div class="row">
                <a href="../"><button type="button" class="btn btn-primary float-left">LIST PRODUCT</button></a>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h3 class="float-left">ADD DETAIL</h3>
                    <a class="float-right btn btn-wf btn-danger add_detail " style="color: red"><i
                            class="nc-icon nc-simple-add"></i>ADD</a>
                </div>
            </div>
            <form method="post" action="/shopping/admin/product/viewdetail/submitdetail/{{$product->id}}">
                @csrf
                <div id="main_detail">
                    <div class="row" style="margin-left: 20px;">
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <label><input type="checkbox" name="size_type" class="size_type">Text/Number</label>
                        </div>
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <select class="form-control" id="size_id" name="size_id[]">
                                <option value="">-- Select Size --</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <select class="form-control" id="color_id" name="color_id[]">
                                <option value="">-- Select Color --</option>
                                @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <label><input class="form-control" id="quantity" name="quantity[]" type="number"
                                    min="0"></label>
                        </div>
                        <div class="col-md-1 col-sm-1  form-group has-feedback">
                            <a class="btn btn-sm btn-danger delete_detail ">DELETE</a>
                        </div>


                    </div>
                </div>
                <div id="add_detail">

                </div>
                <button type="submit" class="btn btn-success" name="submitdetail">Submit</button>
            </form>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h3 class="float-left">LIST DETAIL</h3>
                    <hr>

                </div>
            </div>

            @foreach($details as $dt)
            <form method="post" action="/shopping/admin/product/viewdetail/edit/{{$dt->id}}">
                @csrf
                <div id="list_detail">
                    <div class="row" style="margin-left: 20px;">
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <select class="form-control" id="size_id" name="size_id">
                                <option value="">-- Select Size --</option>
                                @foreach($sizes as $size)
                                @if( $dt->size_id == $size->id )
                                <option value="{{$size->id}}" selected>{{$size->size_name}}</option>
                                @else
                                <option value="{{$size->id}}">{{$size->size_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <select class="form-control" id="color_id" name="color_id">
                                <option value="">-- Select Color --</option>
                                @foreach($colors as $color)
                                @if( $dt->color_id == $color->id )
                                <option value="{{$color->id}}" selected>{{$color->color_name}}</option>
                                @else
                                <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2  form-group has-feedback">
                            <label><input class="form-control" id="quantity" value="{{$dt->quantity}}" name="quantity"
                                    type="number"></label>
                        </div>
                        <div class="col-md-1 col-sm-1  ">
                            <button class="btn btn-sm btn-success" name="submit">EDIT</button>
                        </div>
                        <div class="col-md-1 col-sm-1  ">
                            <a class="btn btn-sm btn-danger  "
                                href="/shopping/admin/product/viewdetail/delete/{{$dt->id}}"
                                onclick="return confirm('Are you sure you want to delete this record?');">DELETE</a>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach


            <a href="../"><button type="button" class="btn btn-primary">LIST PRODUCT</button></a>
        </div>
    </div>
</div>
@stop


@section('js')
<script>
$('.add_detail').click(function(ev) {
    ev.preventDefault();
    var main_detail = $('#main_detail').html();
    $('#add_detail').append(main_detail);

});
$(document).on('click', '.delete_detail', function(ev) {
    ev.preventDefault();
    $(this).closest('.row').remove();
});
$(".size_type").change(function() {
    if (this.checked) {
        var link = "{{url('admin/product/viewdetail/sizetype/433/1')}}";
        $.ajax({
            url: link,
            type: 'GET',
            success: function(res) {
                var _option = '<option value="">-- Select Size --</option>';
                for (var size of res) {
                    _option += '<option value="' + size.id + '">' + size.size_name + '</option>'
                }
                $('#size_id').html(_option);
            }
        })
    } else {
        var link = "{{url('admin/product/viewdetail/sizetype/433/0')}}";
        $.ajax({
            url: link,
            type: 'GET',
            success: function(res) {
                var _option = '<option value="">-- Select Size --</option>';
                for (var size of res) {
                    _option += '<option value="' + size.id + '">' + size.size_name + '</option>'
                }
                $('#size_id').html(_option);
            }
        })
    }
});
$.ajax({
    url: "{{url('admin/product/viewdetail/sizetype/433/0')}}",
    type: 'GET',
    success: function(res) {
        var _option = '<option value="">-- Select Size --</option>';
        for (var size of res) {
            _option += '<option value="' + size.id + '">' + size.size_name + '</option>'
        }
        $('#size_id').html(_option);
    }
});
</script>
@stop()