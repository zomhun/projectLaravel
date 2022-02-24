@extends('backend.nav')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @csrf

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                </div>
                @endif
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>promotion_title</th>
                                <th>promotion_img</th>
                                <th>promotion_text</th>
                                <th>role</th>
                                <th>#</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($promotions as $promotion)
                            <tr>
                                <td>{{ $promotion->id }}</td>
                                <td>{{ $promotion->promotion_title }}</td>
                                <td><img src="../public/promotion/{{ $promotion->promotion_img }}"
                                        style="width:150px; height:100px"></td>
                                <td>{{$promotion->promotion_text}}</td>
                                <td>{{ $promotion->status?"sub photo":"main photo"}}</td>
                                <td>
                                    <a href="/shopping/admin/promotion/edit/{{ $promotion->id }}">
                                        <i class="fa fa-pencil-square-o"></i>Edit</a>
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