<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('public/assets/css/login.css') }}">

</head>

<body class="img js-fullheight" style="background-image:url({{url::asset('public/assets/images/bg.jpg') }}">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center tab-content" id="nav-tabContent">
                @yield('content')
            </div>
        </div>
    </section>

    <script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/assets/js/login.js') }}"></script>
</body>
<script>
const password = document.querySelector('#password');
$("#togg-pass-log").click(function() {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggleClass("fa-eye fa-eye-slash");
});

const password1 = document.querySelector('#password1');
$("#togg-pass-sign").click(function() {
    // toggle the type attribute
    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggleClass("fa-eye fa-eye-slash");
});

const password2 = document.querySelector('#password2');
$("#togg-pass-resign").click(function() {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggleClass("fa-eye fa-eye-slash");
});
</script>

</html>