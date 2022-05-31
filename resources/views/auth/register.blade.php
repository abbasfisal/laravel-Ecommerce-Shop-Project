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

        <div class="card-body">
            <h3 class="text-center mt-0 mb-2">
                <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="26"
                                                       alt="logo-img"></a>
            </h3>
            <h5 class="ssstext-center mt-0 text-color"><b>Sign Up</b></h5>

            <form class="form-horizontal mt-3" action="index.html">

                {{--Mobile--}}
                <div class="form-group mb-3">
                    <div class="col-12">
                        <label for="tel">Enter Mobile Number</label>
                        <input class="form-control @error('tel') is-invalid @enderror"
                               id="tel"
                               value="{{old('tel')}}"
                               name="tel"
                               type="text" required=""
                               placeholder="09123456789">
                    </div>
                    @error('tel')
                    <div class="p-2  text-danger">
                        <span class="p-3">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                {{--password--}}
                <div class="form-group mb-3">
                    <div class="col-12">
                        <label for="tel">Enter Password</label>
                        <input class="form-control @error('password') is-invalid @enderror"
                               id="tel"
                               name="tel"
                               type="text" required=""
                               placeholder="">
                    </div>
                    @error('password')
                    <div class="p-2  text-danger">
                        <span class="p-3">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                {{--confirm--}}
                <div class="form-group mb-3">
                    <div class="col-12">
                        <label for="tel">Enter Confirm Password</label>
                        <input class="form-control @error('confirm') is-invalid @enderror"
                               id="tel"
                               name="tel"
                               type="text" required=""
                               placeholder="">
                    </div>
                    @error('confirm')
                    <div class="p-2  text-danger">
                        <span class="p-3">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                {{--Register Button--}}
                <div class="form-group text-center mt-4">
                    <div class="col-12">
                        <button class="btn btn-info shadow btn-block btn-lg waves-effect waves-light w-100" type="submit">
                            Register
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
