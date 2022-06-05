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

</head>
<body>
<br>


<div class="row  ">

    <div class="col-lg-10 border rounded-3 p-1 shadow bg-white m-auto">
        <div class="row">
                <div class="col-lg-8  m-auto  ">
                    <textarea name="" id="" class="form-control " cols="30" rows="3"></textarea>
                </div>
                <div class="col-lg-4  ">
                    <input type="text" class="form-control form-text"/>
                    <br>
                    <input type="button" class="btn btn-danger float-end" value="remove"/>
                </div>
        </div>
    </div>

</div>



{{--sciritp--}}
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

{{--<script>
    $(function () {
        var i = 1;
        $("#btnadd").click(function () {
            //e.preventDefault();
            var elemnts =
                '<div class="row" id="holder' + i + '">' +
                '<div class="col-lg-5">' +
                '<input type="text" class="form-control form-text" name="title[]" placeholder="enter title">' +
                '</div>' +
                '<div class="col-lg-5">' +
                '<textarea name="desc[]" id="desc" class="form-text form-control"></textarea>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<button id="hhs" onclick="hii()" class="btn btn-danger mybtn" value="' + i + '">remove</button>' +
                '</div>' +
                '</div>';
            i++
            $("#holder").append(elemnts)
        })

    })

    $(document).on('click', '#hhs', function () {
        var holder_id = $(this).attr('value')

        $('#holder' + holder_id).remove();

    });


</script>--}}

</body>
</html>

