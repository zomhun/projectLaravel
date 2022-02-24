@extends('backend.login.index')
@section('content')
<div class="col-md-6 col-lg-4">
    <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">SIGNUP</h3>

        <form action="#" class="signin-form" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username" required>
                @error('name')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email" required>
                @error('email')
                <p style="color:red;">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input name="password" id="password1" type="password" class="form-control" placeholder="Password"
                    required>
                @error('password')
                <p style="color:red;">{{$message}}</p>
                @enderror
                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"
                    id="togg-pass-sign"></span>
            </div>
            <div class="form-group">
                <input name="password_check" id="password2" type="password" class="form-control"
                    placeholder="Retype Password" required>
                @if(Session::has('error'))
                <div>
                   <p style="color:red;">{{Session::get('error')}}</p>
                </div>
                @endif
                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"
                    id="togg-pass-resign"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3" name="signup">Sign Up</button>
            </div>
        </form>
        <a href="{{route('admin')}}" class="px-2 py-2 ml-md-1 rounded">Return To Home page</a>
    </div>
</div>
@stop