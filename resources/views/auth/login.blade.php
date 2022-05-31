<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Login | Appzia - Admin & Dashboard Template</title>
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
            <h3 class="text-center mt-0 mb-3">
                <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="24"
                                                       alt="logo-img"></a>
            </h3>
            <h5 class="text-center mt-0 text-color"><b>Sign In</b></h5>

            <form class="form-horizontal mt-3 mx-3" action="index.html">

                <div class="form-group mb-3">
                    <div class="col-12">
                        <input class="form-control @error('username') is-invalid @enderror" type="text" required=""
                               placeholder="Username Or mobile">
                    </div>
                    @error('username')
                    <div class="p-2  text-danger">
                        <span class="p-3">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="col-12">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" required=""
                               placeholder="Password">
                    </div>
                    @error('password')
                    <div class="p-2  text-danger">
                        <span class="p-3">{{$message}}</span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" checked="">
                            <label for="checkbox-signup" class="text-color">
                                Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center mt-3">
                    <div class="col-12">
                        <button class="btn btn-info btn-block btn-lg waves-effect waves-light w-100" type="submit">
                            Log In
                        </button>
                    </div>
                </div>

                <div class="form-group row mt-4 mb-0">
                    <div class="col-sm-7">
                        <a href="auth-recoverpw.html" class="text-color">
                            <i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="auth-register.html" class="text-color">Create an account</a>
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
