@extends('backend.nav')
@section('content')
<div class="card col-md-8">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-0">Edit Profile</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif

        <form method="post" action="/shopping/admin/save" enctype="multipart/form-data">


            <h6 class="heading-small text-muted mb-4">User information</h6>

            @csrf
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-name">
                        <i class="w3-xxlarge fa fa-user"></i>Name
                    </label>
                    @error('name')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                    <input type="text" name="name" id="input-name" class="form-control" placeholder="Name"
                        value="{{$user->name}}" required="" autofocus="">

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-email"><i
                            class="w3-xxlarge fa fa-envelope-o"></i>Email</label>
                    @error('email')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                    <input type="email" name="email" id="input-email" class="form-control" placeholder="Email"
                        value="{{$user->email}}" required="">

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning mt-4" name="save">Save</button>
                </div>
            </div>
        </form>
        <hr class="my-4">
        <form method="post" action="/shopping/admin/change">

            <h6 class="heading-small text-muted mb-4">Password</h6>
            @if(Session::has('success2'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success2')}}
            </div>
            @endif
            @if(Session::has('error2'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error2')}}
            </div>
            @endif
            @csrf
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-current-password">
                        <i class="w3-xxlarge fa fa-eye-slash"></i>Current Password
                    </label>
                    <input type="password" name="password" id="input-current-password" class="form-control"
                        placeholder="Current Password" value="" required="">
                        @error('password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror


                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-password">
                        <i class="w3-xxlarge fa fa-eye-slash"></i>New Password
                    </label>
                    <input type="password" name="new_password" id="input-password" class="form-control"
                        placeholder="New Password" value="" required="">
                        @error('new_password')
                    <p style="color:red;">{{$message}}</p>
                    @enderror

                </div>
                <div class="form-group">
                    <label class="form-control-label" for="input-password-confirmation">
                        <i class="w3-xxlarge fa fa-eye-slash"></i>Confirm New Password
                    </label>
                    <input type="password" name="password_check" id="input-password-confirmation" class="form-control"
                        placeholder="Confirm New Password" value="" required="">
                        @error('password_check')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning mt-4">Change password</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop()