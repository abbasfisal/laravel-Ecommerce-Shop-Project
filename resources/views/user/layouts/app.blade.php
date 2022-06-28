<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Boxed Width | Appzia - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    @stack('header')
</head>

<body data-topbar="dark" data-layout="horizontal" data-layout-size="boxed">
<div id="layout-wrapper">
    @include('user.layouts.partials.menue')
    @include('user.layouts.partials.headermenue' , $data)
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>

        @include('user.layouts.partials.footer')
    </div>
</div>

@include('user.layouts.partials.footerscripts')
@stack('footer')
</body>
</html>
