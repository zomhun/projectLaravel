@extends('layouts.main')
@section('content')
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
<form action="" method="post">
    <section id="aa-myaccount">
        <div class="container" style="margin-top:50px;margin-bottom:50px;border:5px solid black;">
            <div class="row">
                @csrf
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
                <div class="col" style="display: flex;">
                    <img src="{{ URL::asset('public/assets/img/6108959398_3d1c789b-dd6b-4b90-b498-0c6076b1fe3f.png') }}"
                        alt="" style="align-self: center;margin: 0 auto;margin-top:20px;">
                </div>
                <div class="col" style="display: flex;">
                    <div style="align-self: center;margin: 0 auto;">
                        <h3 style="text-align: center;margin: 0 auto;margin-top:50px;">Hi,</h3>
                        <h1 style="color:red">Just one more step</h1>
                        <p style="text-align: center;margin: 0 auto;margin-top:20px;font-size:20px">Click the button below to activate</p>
                    <input name="code" value="b9dca9f6-b3fb-4b00-ab30-f950d1c87a4f" style="display:none">
                    </div>


                </div>
            </div>
            <div class="login--form row">
            <div class="col" style="display: flex;margin-top:20px">
                <button class="btn btn--xs btn--round register_btn btn btn-danger " type="submit"
                    style="align-self: center;margin: 0 auto;margin-bottom:20px;height:50px;width:100px">Activated</button>
        </div>
            </div>
        </div>
    </section>
</form>
@stop