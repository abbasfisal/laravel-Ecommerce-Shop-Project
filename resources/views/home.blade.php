@extends('user.layouts.app')
@section('content')

    <div class="col-lg-11  m-auto">
        <div class="row justify-content-between">
            @foreach($products as $product)
                <div class="col-md-3 ">
                    <div class="card ">
                        <img src="{{config('shop.productCoverPath').$product->image}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <a href="{{route('get.product.home',[$product->id , $product->slug])}}">
                                    {{$product->title}}
                                </a>
                            </h5>
                        </div>
                        <div class="text-center">
                            @if($product->on_sale!=null)
                                <h3 class=""><strong>{{$product->on_sale}} $</strong></h3>
                                <del class="text-white bg-danger rounded-3 p-1"><strong>{{$product->price}} $</strong>
                                </del>
                                <br>
                                <br>
                            @else
                                <h3 class=""><strong>{{$product->price}}</strong></h3>
                            @endif
                            @if($product->stock <= 0)
                                <strong class="rounded-3 badge-soft-warning">Not Available</strong>
                            @endif

                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-info">
                                <i class="ri-shopping-bag-2-fill"></i>
                                Add to Basket
                            </a>
                            <a href="#" class="btn btn-outline-danger">
                                <i class="ri-heart-2-fill"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{$products->links()}}
    </div>
    <div class="col-lg-12 border">
        new Prodcut
    </div>
    <div class="col-lg-12 mt-3 border">
        Our Brands
    </div>

    <h3>
        best selling product
    </h3>
    https://bbbootstrap.com/snippets/best-selling-products-carousel-slider-92645788

@endsection
