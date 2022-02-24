@extends('backend.login.index')
@section('content')
<div class="col-md-6 col-lg-4">
    <div class="login-wrap p-0">
        <h3 class="mb-4 text-center">LOGIN</h3>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
        <form action="#" class="signin-form" method="post">
            @csrf
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input id="password" name="password" type="password" class="form-control" placeholder="Password"
                    required>
                <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"
                    id="togg-pass-log"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3" name="login">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="#" style="color: #fff">Forgot Password</a>
                </div>
            </div>
        </form>
        <!-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
        <div class="social d-flex text-center">
            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
        </div>
        <a href="index.php" class="px-2 py-2 ml-md-1 rounded">Return To Home Page</a> -->
    </div>
</div>
@stop