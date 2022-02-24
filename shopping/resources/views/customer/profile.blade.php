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
                    <li><a href="">Home</a></li>
                    <li><a href="">Account</a></li>
                    <li class="active">Profile</li>
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
                            <div class="aa-myaccount-register">
                                <h4>Update profile</h4>
                                <form action="updateprofile/{{Auth::guard('cus')->user()->id}}" class="aa-login-form" method="post">
                                    @csrf
                                    <label for="">Username(4-50 Characters)<span>*</span></label></br>
                                    @error('name') <small>{{$message}}</small> @enderror
                                    <input type="text" placeholder="Username" name="name" value="{{Auth::guard('cus')->user()->name}}">
                                    <label for="">Full name</label>
                                    <input type="text" placeholder="Full name" name="fullname" value="{{Auth::guard('cus')->user()->fullname}}">
                                    <label for="">Email Address<span>*</span></label></br>
                                    @error('email') <small>{{$message}}</small> @enderror
                                    <input type="text" placeholder="Email" name="email" value="{{Auth::guard('cus')->user()->email}}">
                                    <label for="">Phone</label>
                                    <input type="text" placeholder="Phone" name="phone" value="{{Auth::guard('cus')->user()->phone}}">
                                    <label for="">Address</label>
                                    <input type="text" placeholder="Address" name="address" value="{{Auth::guard('cus')->user()->address}}">
                                    <button type="submit" class="aa-browse-btn" name="">Update profile</button>
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