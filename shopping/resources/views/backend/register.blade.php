<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST">
                        @csrf
                        <h1>Register Account</h1>
                        <div>
                            @error('name')
                                <div class="text text-danger" style="float: left">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name" placeholder="Name" />

                        </div>
                        <div>
                            @error('email')
                                <div class="text text-danger" style="float: left">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="email" placeholder="Email" />
                        </div>
                        <div>
                            @error('password')
                                <div class="text text-danger" style="float: left">{{ $message }}</div>
                            @enderror
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                        <div>
                            @error('cf_password')
                                <div class="text text-danger" style="float: left">{{ $message }}</div>
                            @enderror
                            <input type="password" class="form-control" name="cf_password"
                                placeholder="Confirm Password" />
                        </div>
                        <div>
                            <button class="btn btn-default submit">Sign Up</button>
                        </div>
                        <a href="{{ route('login') }}">Login</a>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
