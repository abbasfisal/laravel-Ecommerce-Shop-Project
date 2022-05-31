<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Register | Appzia - Admin & Dashboard Template</title>
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

</head>

<body class="auth-body-bg">
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card">

        <div class="card-body shadow">
            <br>
            <h5 class="ssstext-center mt-0 text-color text-center">
                <b>
                    Please enter the one time password <br> to verify
                    your account
                </b>
            </h5>

            <form class="form-horizontal mt-3" action="index.html">

                {{--Mobile--}}

                <div class="container height-100 d-flex justify-content-center align-items-center">
                    <div class="position-relative">
                        <div class="card p-2 text-center">

                            <div class="text-color"><span>A code has been sent to</span> <small>*******9897</small>
                            </div>
                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                <input
                                    class="m-2 text-center form-control rounded" type="number" name="first"
                                    maxlength="1"/>
                                <input
                                    class="m-2 text-center form-control rounded" type="number" name="second"
                                    maxlength="1"/>
                                <input
                                    class="m-2 text-center form-control rounded" type="number" name="third"
                                    maxlength="1"/>
                                <input
                                    class="m-2 text-center form-control rounded" type="number" name="fourth"
                                    maxlength="1"/>

                            </div>
                            <br>
                            @if(session('otp'))
                                <div class="alert text-danger">
                                    <b>{{session('otp')}}You OTP COde is not rigt</b>
                                </div>
                            @endif

                        </div>
                        <div class="card-2">
                            <div class="content d-flex justify-content-center align-items-center"><span>Didn't get the code</span>
                                <a
                                    href="#" class="text-decoration-none ms-3">Resend(1/3)</a></div>
                        </div>
                    </div>
                </div>


                {{--Register Button--}}
                <div class="form-group text-center mt-4">
                    <div class="col-12">
                        <button class="btn shadow btn-warning btn-block btn-lg waves-effect waves-light w-100" type="submit">
                            Confirm
                        </button>
                    </div>
                </div>

                <div class="form-group mt-3 mb-0">
                    <div class="col-sm-12 text-center">
                        <a href="auth-login.html" class="text-color">Already have account?</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>


<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

</body>
</html>
