@extends('backend.nav')
@section('content')
<div class="col-md-12">
    <h2>List User</h2>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    @error('name')
    <p style="color:red;">{{$message}}</p>
    @enderror

    @foreach($user as $use)
    <form action="/shopping/admin/update/{{$use->id}}" method="post">
        <table class="table table-bordered">


            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>

                    <th>Password</th>
                    <th>Created at</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            @csrf
            <tbody>
                <tr>
                    <td>
                        {{$use->id}}
                    </td>
                    <td>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $use->name }}">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </td>
                    <td>{{$use->created_at}}</td>
                    <td>{{$use->updated_at}}</td>
                    <td>
                        <button class="btn btn-success" name="update">update</button>
                        <a href="/shopping/admin/delete/{{$use->id}}" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this record?');">detele</a>
                    </td>
            </tbody>
        </table>
    </form>
    @endforeach

</div>
@stop