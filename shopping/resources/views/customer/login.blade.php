@extends('layouts.main')
@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="{{ URL::asset('public/assets/img/fashion/1920x300-water-background.jpg') }}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Account Page</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Account</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->

<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <h4>Login</h4>
                                <form action="login" class="aa-login-form" method="post">
                                    @csrf
                                    <label for="">Username<span>*</span></label></br>
                                    @error('name1') <small>{{$message}}</small> @enderror
                                    <input type="text" placeholder="Username" name="name1">

                                    <label for="">Password<span>*</span></label></br>
                                    @error('password1') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="Password" name="password1">

                                    <button type="submit" class="aa-browse-btn" name="login">Login</button>
                                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"
                                            name="remember"> Remember me </label>
                                    <p class="aa-lost-password"><a href="{{route('customer.forget_pass')}}">Lost your
                                            password?</a></p>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="aa-myaccount-register">
                                <h4>Register</h4>
                                <form action="register" class="aa-login-form" method="post">
                                    @csrf
                                    <label for="">Username(4-50 Characters)<span>*</span></label></br>
                                    @error('name') <small>{{$message}}</small> @enderror
                                    <input type="text" placeholder="Username" name="name">
                                    <label for="">Email Address<span>*</span></label></br>
                                    @error('email') <small>{{$message}}</small> @enderror
                                    <input type="text" placeholder="Email" name="email">
                                    <label for="">Password<span>*</span></label></br>
                                    @error('password') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="Password" name="password">
                                    <label for="">Re-type Password<span>*</span></label><br>
                                    @error('checkpassword') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="Re-type Password" name="checkpassword">
                                    <label for="">Phone</label>
                                    <input type="text" placeholder="Phone" name="phone">
                                    <label for="">Address</label>
                                    <input type="text" placeholder="Address" name="address">
                                    <button type="submit" class="aa-browse-btn" name="register">Register</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->
@stop