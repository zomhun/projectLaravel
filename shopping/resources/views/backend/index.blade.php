<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ URL::asset('public/assets/backend/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png') }}" href="{{ URL::asset('public/assets/backend/assets/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ URL::asset('public/assets/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/assets/backend/assets/css/light-bootstrap-dashboard.css?v=2.0.0 ') }}"
        rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ URL::asset('public/assets/backend/assets/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('summernote/summernote.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com//resources/demos/style.css">

</head>

<body>
    <div class="wrapper">
        @include('backend.sidebar')
        @yield('nav')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ URL::asset('public/assets/backend/assets/js/core/popper.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ URL::asset('public/assets/backend/assets/js/core/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/plugins/chartist.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/light-bootstrap-dashboard.js?v=2.0.0 ') }}"
        type="text/javascript"></script>
    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ URL::asset('public/assets/backend/assets/js/demo.js') }}"></script>
    
    <script src = "https://code.jquery.com/jquery-1.12.4.js" ></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ URL::asset('summernote/summernote.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300
        });

        $(".dtp").datepicker({
            dateFormat: 'yy/mm/dd'
        });
    });
    </script>

    @yield('js')
</body>

</html>