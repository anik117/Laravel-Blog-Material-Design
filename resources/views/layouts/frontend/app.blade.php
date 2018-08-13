<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


    <!-- Stylesheets -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/material-kit.css') }}">

    @stack('css')

    <style>
        .title, .card-title, .info-title, .footer-brand, .footer-big h5, .footer-big h4, .media .media-heading {
            font-family: 'Roboto', sans-serif;
        }
    </style>

</head>
<body>

    @include('layouts.frontend.inc.navbar')
    @include('layouts.frontend.inc.header')

    @yield('content')

    @include('layouts.frontend.inc.footer')

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/frontend/js/material.min.js') }}"></script>

    <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
    <script src="{{ asset('assets/frontend/js/moment.min.js') }}"></script>

    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
    <script src="{{ asset('assets/frontend/js/nouislider.min.js') }}" type="text/javascript"></script>

    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
    <script src="{{ asset('assets/frontend/js/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
    <script src="{{ asset('assets/frontend/js/bootstrap-selectpicker.js') }}" type="text/javascript"></script>

    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
    <script src="{{ asset('assets/frontend/js/bootstrap-tagsinput.js') }}"></script>

    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
    <script src="{{ asset('assets/frontend/js/jasny-bootstrap.min.js') }}"></script>

    <!--    Plugin For Google Maps   -->
    <script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
    <script src="{{ asset('assets/frontend/js/material-kit.js') }}" type="text/javascript"></script>

    @stack('js')

</body>
</html>
