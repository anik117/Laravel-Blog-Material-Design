<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets/backend/css/material-dashboard.css') }}" rel="stylesheet" />

    <!-- Fonts and icons -->
    <link href="{{ asset('assets/backend/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/google-roboto-300-700.css') }}" rel="stylesheet" />

    @stack('css')

</head>
<body class="theme-deep-purple">

    <div class="wrapper">

        <!-- Left Sidebar -->
        @include('layouts.backend.inc.sidebar')
        <!-- #END# Left Sidebar -->

        <div class="main-panel">

            <!-- Top Bar -->
            @include('layouts.backend.inc.topbar')
            <!-- #Top Bar -->

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

            <!-- Footer -->
            @include('layouts.backend.inc.footer')
            <!-- #Footer -->

        </div>


    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/backend/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/material.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>

    <!-- Forms Validations Plugin -->
    <script src="{{ asset('assets/backend/js/jquery.validate.min.js') }}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets/backend/js/moment.min.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('assets/backend/js/chartist.min.js') }}"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ asset('assets/backend/js/jquery.bootstrap-wizard.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/backend/js/bootstrap-notify.js') }}"></script>

    <!--   Sharrre Library    -->
    <script src="{{ asset('assets/backend/js/jquery.sharrre.js') }}"></script>

    <!-- DateTimePicker Plugin -->
    <script src="{{ asset('assets/backend/js/bootstrap-datetimepicker.js') }}"></script>

    <!-- Vector Map plugin -->
    <script src="{{ asset('assets/backend/js/jquery-jvectormap.js') }}"></script>

    <!-- Sliders Plugin -->
    <script src="{{ asset('assets/backend/js/nouislider.min.js') }}"></script>
    <!--  Google Maps Plugin    -->

    <!-- Select Plugin -->
    <script src="{{ asset('assets/backend/js/jquery.select-bootstrap.js') }}"></script>

    <!--  DataTables.net Plugin    -->
    <script src="{{ asset('assets/backend/js/jquery.datatables.js') }}"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets/backend/js/sweetalert2.js') }}"></script>

    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('assets/backend/js/jasny-bootstrap.min.js') }}"></script>

    <!--  Full Calendar Plugin    -->
    <script src="{{ asset('assets/backend/js/fullcalendar.min.js') }}"></script>

    <!-- TagsInput Plugin -->
    <script src="{{ asset('assets/backend/js/jquery.tagsinput.js') }}"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('assets/backend/js/material-dashboard.js') }}"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    {{--<script src="{{ asset('assets/backend/js/demo.js') }}"></script>--}}

    @stack('js')

</body>
</html>
