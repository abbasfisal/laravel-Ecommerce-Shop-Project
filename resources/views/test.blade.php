<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
</head>
<body>
<div class="col-lg-8">
<select class="js-example-basic-multiple form-select form-control" name="states[]" multiple="multiple">
    <option value="AL">Alabama</option>
    ...
    <option value="WY">Wyoming</option>
</select>
</div>

<script src="{{asset('assets/js/select2.min.js')}}"></script>


{{--sciritp--}}
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

<script>
    $(document).ready(function() {

        $('.js-example-basic-multiple').select2();
    });
</script>

</body>
</html>
