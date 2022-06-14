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
                    <input type="hidden" value="{{$product->id}}" name="product_id" />
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
                            <button valu="{{$product->id}}" id="increase" class="btn btn-pink">
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
                                <span class="d-none d-sm-block">Comments</span>
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
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free carles.
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    {{--tabs --}}

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
