@extends('user.layouts.app')
@push('header')

@endpush
@section('content')
    <div class="col-lg-12 ">
        <div class="row justify-content-center">
            <div class="col-lg-5 p-3 bg-white  shadow rounded-3 border">
                <div class="exzoom  " id="exzoom">
                    <!-- Images -->
                    <div class="exzoom_img_box ">
                        <ul class='exzoom_img_ul '>
                            <li><img src="{{asset('assets/images/product/img-1.png')}}"/></li>
                            <li><img src="{{asset('assets/images/product/img-2.png')}}"/></li>
                            <li><img src="{{asset('assets/images/product/img-3.png')}}"/></li>
                            <li><img src="{{asset('assets/images/product/img-4.png')}}"/></li>
                            <li><img src="{{asset('assets/images/product/img-5.png')}}"/></li>

                        </ul>
                    </div>

                    <div class="exzoom_nav "></div>
                    <!-- Nav Buttons -->
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-1 p-3"></div>
            <div class="col-lg-5 bg-white rounded-3 shadow   ">
                <h4 class="p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad autem cu</h4>

                <br>
                <p class="p-3 col-lg-8 " style="border-left: 2px solid hotpink">Note :Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid cumque
                    dicta dolorem earum, eius et eveniet, magni molestias </p>

                {{--attributes--}}
                <div class="">
                    <strong>attributes</strong>
                    <ul>
                        <li>xyz: lidks</li>
                        <li>a</li>
                    </ul>
                </div>
                <hr>
                {{--color--}}
                <strong>Select Color</strong><br>
                <div class="mt-2">
                    <input type="radio" name="color" value="1"> <img width="40" height="40" class=" rounded-circle"
                                                                     style="background-color: skyblue" alt="">
                    <input type="radio" name="color" value="1"> <img width="40" height="40" class=" rounded-circle"
                                                                     style="background-color: skyblue" alt="">
                    <input type="radio" name="color" value="1"> <img width="40" height="40" class=" rounded-circle"
                                                                     style="background-color: skyblue" alt="">
                </div>
                <hr>
                {{--size--}}
                <div class="col-lg-2">
                    <strong>size</strong>: <strong>M</strong>
                    <select name="" id="" class="form-control form-select mt-2 ">
                        <option value="1">L</option>
                        <option value="1">2X</option>
                        <option value="1">M</option>
                    </select>
                </div>
                <hr class="col-lg-5 m-auto">

                {{--button--}}
                <div class="col-lg-6 m-auto  mt-2">


                    <button class="btn btn-pink form-control">
                        <strong>Add To Basket</strong>
                    </button>
                </div>

            </div>
        </div>

    </div>
    <div class="col-lg-11 m-auto border mt-2"><b>descriptions-logn-short</b></div>
    <div class="col-lg-6 m-auto">
        <hr>
    </div>
    <div class="col-lg-11 m-auto border mt-2"><b>descriptions-logn-short</b></div>

@endsection
@push('footer')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.exzoom.css')}}">
    <script src="{{asset('assets/js/jquery.exzoom.js')}}"></script>
    <script>
        $(function () {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 10,
                "navBorder": 0,

                // autoplay
                "autoPlay": true,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endpush
