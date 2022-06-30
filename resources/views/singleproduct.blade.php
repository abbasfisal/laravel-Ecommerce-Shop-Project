@extends('user.layouts.app')
@push('header')

@endpush
@section('content')
    @if(session('succ-add-wishlist'))
        <div class="alert alert-success col-lg-11 m-auto mb-2">{{session('succ-add-wishlist')}}</div>
    @endif

    @if(session('succ'))

        <div class="alert alert-success col-lg-11 m-auto mb-2">{{session('succ')}}</div>
    @endif

    @if(session('fail'))

        <div class="alert alert-danger col-lg-11 m-auto mb-2">{{session('fail')}}</div>
    @endif


    <div class="col-lg-12 ">
        <div class="row justify-content-center">
            <div class="col-lg-5 p-3 bg-white  shadow rounded-3 border">
                <div class="exzoom  " id="exzoom">
                    <!-- Images -->
                    <div class="exzoom_img_box ">
                        <ul class='exzoom_img_ul '>
                            @foreach($product->product_galleries as $gallery)
                                <li><img src="{{asset(config('shop.productGalleris').$gallery->image)}}"/></li>
                            @endforeach
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

            @csrf
            @method('post')
            <div class="col-lg-5 bg-white rounded-3 shadow   ">
                {{--title--}}
                <h4 class="p-3">
                    {{$product->title}}
                </h4>

                <br>
                {{--note--}}
                <div>
                    <small class="p-3 col-lg-8 " style="border-left: 2px solid hotpink">{{$product->note}} </small>
                </div>
                <br>
                {{--attributes--}}
                @if(count($product->details))
                    <div class="mt-2">
                        <strong>attributes</strong>
                        <ul>
                            @foreach($product->details as $detail)
                                <li><strong>{{$detail->title}}</strong>: {{$detail->description}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                @endif
                {{--color--}}
                <form action="{{route('add.basket.user')}}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{$product->id}}" name="product_id"/>
                    @if(count($product->colors))
                        <strong>Select Color</strong><br>
                        <div class="mt-2">
                            @foreach($product->colors as $color)
                                <div class=" d-inline-block p-2 rounded-3 shadow">
                                    <input checked type="radio" name="color" value="{{$color->id}}">
                                    <img width="40" height="40" class=" rounded-circle"
                                         style="background-color: {{$color->code}}" alt="">
                                    <span class="badge badge-soft-info">{{$color->name}}</span>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    @endif
                    {{--size--}}
                    @if(count($product->sizes))
                        <div class="col-lg-2">
                            <strong>size</strong>: <strong>M</strong>
                            <select name="size" id="" class="form-control form-select mt-2 ">
                                @foreach($product->sizes as $size)
                                    <option value="{{$size->id}}">{{$size->title}}</option>

                                @endforeach
                            </select>
                        </div>
                        <hr class="col-lg-5 m-auto">
                    @endif
                    <br>
                    <br>
                    <div class="p-4">
                        price : <h4 class="text-pink">@money($product->price)$</h4>
                        <br>
                        @isset($product->on_sale)
                            @if(now()->isBetween($product->started_at , $product->end_at))
                                on sale price : <h3 class="text-danger">@money($product->on_sale)$</h3>
                            @endif
                        @endisset
                    </div>
                    {{--button--}}
                    <br>
                    <br>
                    <div class="col-lg-6 m-auto ">
                        <button value="{{$product->id}}" id="addbasket" class="btn btn-pink form-control">
                            <strong>Add To Basket</strong>
                        </button>
                        <br>
                        <br>
                        <div id="interaction" class="col  text-center">
                            <button id="decrease" value="{{$product->id}}" class="btn btn-pink">
                                <strong>-</strong>
                            </button>
                            <label id="count">{{$product->count}}</label>
                            <button value="{{$product->id}}" id="increase" class="btn btn-pink">
                                <strong>+</strong>
                            </button>
                            <br>
                            <br>
                            <button value="{{$product->id}}" id="delbtn" class="btn btn-pink">
                                <strong>remove</strong>
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

        {{-- Short / long Description / comment --}}
        <br>
        <br>
        <div class="col-lg mt-3">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Details of Product</h4>
                    <p class="card-title-desc">Example of custom tabs</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#summ" role="tab"
                               aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Summary Desc</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#long" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Long Desc</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Add Comment</span>
                            </a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    {{--short description--}}
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="summ" role="tabpanel">
                            <p class="mb-0 p-4 col-lg-10  m-auto text-justify">
                                {{$product->short_description}}

                            </p>
                        </div>
                        {{--long description--}}
                        <div class="tab-pane" id="long" role="tabpanel">
                            <p class="mb-0 m-auto col-lg-10 text-justify">
                                {!! $product->long_description !!}
                            </p>
                        </div>
                        <div class="tab-pane" id="messages1" role="tabpanel">
                            <form action="{{route('add.comment.user' , $product->id)}}" class="col-lg-8 m-auto"
                                  method="post">
                                @method('post')
                                @csrf

                                <textarea name="text" class="form-control " cols="15" rows="10"
                                          placeholder="Enter Your Comment Text "></textarea>
                                <br>
                                <button type="submit" class="btn btn-info">Send</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg mt-3 border rounded-2 p-3 bg-white">

            <!-- Contenedor Principal -->
            <div class="comments-container">

                <h3 class="text-pink">Comments</h3>

                <ul id="comments-list" class="comments-list">
                    @foreach($comments as $comment)
                        <li>
                            <div class="comment-main-level">
                                <!-- Avatar -->
                                <div class="comment-avatar avatar-md">
                                    <img
                                        width="80"
                                        height="80"
                                        src="{{asset('assets/images/users/user-avatar.jpg')}}"
                                        alt=""></div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-author">

                                            User{{$comment->user->id}}
                                        </h6>
                                        <span>{{$comment->created_at->diffForHumans()}}</span>

                                    </div>
                                    <div class="comment-content">
                                        {{$comment->text}}
                                    </div>
                                </div>
                            </div>

                        @if($comment->reply->count())
                            <!-- Respuestas de los comentarios -->
                                <ul class="comments-list reply-list">
                                    @foreach($comment->reply as $reply)
                                        <li>
                                            <!-- Avatar -->
                                            <div class="comment-avatar"><img
                                                    src="{{asset('assets/images/users/user-avatar.jpg')}}"
                                                    alt=""></div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><a href="http://creaticode.com/blog">User{{$reply->user->id}}</a></h6>
                                                    <span>{{$reply->created_at->diffForHumans()}}</span>

                                                </div>
                                                <div class="comment-content">
                                                    {{$reply->text}}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>

            </div>

            {{$comments->links()}}
        </div>

        <br>
    </div>


@endsection
@push('footer')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.exzoom.css')}}">
    <script src="{{asset('assets/js/jquery.exzoom.js')}}"></script>
    <script>
        $(function () {

            $("#interaction").hide();

            /*gallery*/
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
                "autoPlayTimeout": 5000

            });


        });
    </script>
@endpush
<style>
    /**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        color: #03658c;
        text-decoration: none;
    }

    ul {
        list-style-type: none;
    }

    body {
        font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
        background: #dee1e3;
    }

    /** ====================
     * Lista de Comentarios
     =======================*/
    .comments-container {
        margin: 60px auto 15px;
        width: 768px;
    }

    .comments-container h1 {
        font-size: 36px;
        color: #283035;
        font-weight: 400;
    }

    .comments-container h1 a {
        font-size: 18px;
        font-weight: 700;
    }

    .comments-list {
        margin-top: 30px;
        position: relative;
    }

    /**
     * Lineas / Detalles
     -----------------------*/
    .comments-list:before {
        content: '';
        width: 2px;
        height: 100%;
        background: #c7cacb;
        position: absolute;
        left: 32px;
        top: 0;
    }

    .comments-list:after {
        content: '';
        position: absolute;
        background: #c7cacb;
        bottom: 0;
        left: 27px;
        width: 7px;
        height: 7px;
        border: 3px solid #dee1e3;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
    }

    .reply-list:before, .reply-list:after {
        display: none;
    }

    .reply-list li:before {
        content: '';
        width: 60px;
        height: 2px;
        background: #c7cacb;
        position: absolute;
        top: 25px;
        left: -55px;
    }


    .comments-list li {
        margin-bottom: 15px;
        display: block;
        position: relative;
    }

    .comments-list li:after {
        content: '';
        display: block;
        clear: both;
        height: 0;
        width: 0;
    }

    .reply-list {
        padding-left: 88px;
        clear: both;
        margin-top: 15px;
    }

    /**
     * Avatar
     ---------------------------*/
    .comments-list .comment-avatar {
        width: 65px;
        height: 65px;
        position: relative;
        z-index: 99;
        float: left;
        border: 3px solid #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .comments-list .comment-avatar img {
        width: 100%;
        height: 100%;
    }

    .reply-list .comment-avatar {
        width: 50px;
        height: 50px;
    }

    .comment-main-level:after {
        content: '';
        width: 0;
        height: 0;
        display: block;
        clear: both;
    }

    /**
     * Caja del Comentario
     ---------------------------*/
    .comments-list .comment-box {
        width: 680px;
        float: right;
        position: relative;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
    }

    .comments-list .comment-box:before, .comments-list .comment-box:after {
        content: '';
        height: 0;
        width: 0;
        position: absolute;
        display: block;
        border-width: 10px 12px 10px 0;
        border-style: solid;
        border-color: transparent #FCFCFC;
        top: 8px;
        left: -11px;
    }

    .comments-list .comment-box:before {
        border-width: 11px 13px 11px 0;
        border-color: transparent rgba(0, 0, 0, 0.05);
        left: -12px;
    }

    .reply-list .comment-box {
        width: 610px;
    }

    .comment-box .comment-head {
        background: #FCFCFC;
        padding: 10px 12px;
        border-bottom: 1px solid #E5E5E5;
        overflow: hidden;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }

    .comment-box .comment-head i {
        float: right;
        margin-left: 14px;
        position: relative;
        top: 2px;
        color: #A6A6A6;
        cursor: pointer;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .comment-box .comment-head i:hover {
        color: #03658c;
    }

    .comment-box .comment-name {
        color: #283035;
        font-size: 14px;
        font-weight: 700;
        float: left;
        margin-right: 10px;
    }

    .comment-box .comment-name a {
        color: #283035;
    }

    .comment-box .comment-head span {
        float: left;
        color: #999;
        font-size: 13px;
        position: relative;
        top: 1px;
    }

    .comment-box .comment-content {
        background: #FFF;
        padding: 12px;
        font-size: 15px;
        color: #595959;
        -webkit-border-radius: 0 0 4px 4px;
        -moz-border-radius: 0 0 4px 4px;
        border-radius: 0 0 4px 4px;
    }

    .comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {
        color: #03658c;
    }



    /** =====================
     * Responsive
     ========================*/
    @media only screen and (max-width: 766px) {
        .comments-container {
            width: 480px;
        }

        .comments-list .comment-box {
            width: 390px;
        }

        .reply-list .comment-box {
            width: 320px;
        }
    }
</style>
