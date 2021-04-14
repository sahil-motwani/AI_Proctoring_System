<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../../AnywherePariksha/public/assets/img/icon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset("/assets/css/azzara.min.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/fonts.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap.min.css")}}">
</head>
<body>
<div class="wrapper">
    <div class="main-header" data-background-color="purple">

        <!-- Logo Header -->
        <div class="logo-header">

            <a href="../index.html" class="logo">
                <h3 class="navbar-brand text-white">Anywhere Praiksha</h3>
            </a>
        </div>
        <!-- End Logo Header -->

        @include('student.includes.navbar')
    </div>

    <!-- Sidebar -->
@include('student.includes.sidebar')
<!-- End Sidebar -->

    <div class="main-panel">

        @yield('content')

    </div>

</div>

@include('includes.custom_js')
@yield('extra_js')
</body>
</html>
