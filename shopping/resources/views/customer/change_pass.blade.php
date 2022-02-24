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
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('error')}}
            </div>
            @endif
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="aa-myaccount-register">
                                <h4>Change Password</h4>
                                <form action="" class="aa-login-form" method="post">
                                    @csrf
                                    <label for="">Old Password<span>*</span></label></br>
                                    @error('old_password') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="Old Password" name="old_password">

                                    <label for="">New Password<span>*</span></label><br>
                                    @error('new_password') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="New Password" name="new_password">

                                    <label for="">Re-type Password<span>*</span></label><br>
                                    @error('password_check') <small>{{$message}}</small> @enderror
                                    <input type="password" placeholder="Re-type Password" name="password_check">

                                    <button type="submit" class="aa-browse-btn" name="">Change Password</button>
                                </form>
                            </div>

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