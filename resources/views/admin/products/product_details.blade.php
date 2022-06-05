@extends('admin.layouts.app')
@section('content')
    <h3>Product Details</h3>

    <div class="row shadow rounded-3 ">
        {{--title--}}
        <br>
        <div class="col-lg-10 m-auto ">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" disabled value="{{$product->title}}" name="title" id="title"
                   class="form-control form-text">

        </div>
        <br>
        {{--slug--}}
        <div class="col-lg-10 m-auto mt-3 ">
            <label for="slug" class="form-label">Product Slug</label>
            <input type="text" disabled value="{{$product->slug}}" name="slug" id="slug" class="form-control form-text">
        </div>


        {{--category / sub category--}}
        <br>
        <div class="col-lg-10 m-auto mt-3">
            <div class="row ">
                {{--category--}}
                <div class="col-md-6 ">
                    <label for="main_category" class="form-label">Main Category</label>
                    <div class="alert bg-warning">
                        <b><i>{{$product->category->parent->title}}</i></b>
                    </div>
                </div>
                {{--sub category--}}
                <div class="col-md-6 ">
                    <label for="category_id" class="form-label">Select SubCategory</label>
                    <div class="alert bg-success">
                        <b>
                            {{$product->category->title}}
                        </b>
                    </div>

                </div>
            </div>
        </div>

        {{--details --}}
        @if(count($product->details))
            <div class="row">
                <div class="col-lg-10 border rounded-3 p-1 shadow bg-white m-auto">
                    @foreach($product->details as $detail)
                        <div class="row">
                            <div class="col-lg-8  m-auto  ">
                            <textarea disabled class="form-control "
                                      rows="3">{!! $detail->description !!}</textarea>
                            </div>
                            <div class="col-lg-4  ">
                                <input type="text" value="{{$detail->title}}" class="form-control form-text"
                                       disabled/><br>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif


        <br>
        {{--size / color--}}
        <div class="col-lg-10 m-auto mt-3">
            <div class="row ">
                {{--size--}}
                @if(count($product->sizes))
                    <div class="col-md-6 ">
                        <label for="sizes" class="form-label"> Size</label>
                        @foreach($product->sizes as $size)
                            <div class="badge bg-danger">{{$size->title}}</div>
                        @endforeach

                    </div>
                @endif

                {{--Colors --}}
                @if(count($product->colors))
                    <div class="col-md-6 ">
                        <label for="colors" class="form-label"> Color </label>

                        @foreach($product->colors as $color)
                            <div class="">{{$color->name}}
                                <img style="background-color: {{$color->code}}" width="20" height="20" alt="">
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>

        <br>
        {{--brand --}}
        <div class="col-lg-10 mt-3 m-auto">
            <div class="row ">
                <div class="col-md-6 ">
                    {{--brand--}}
                    <label for="brand_id" class="form-label"> Brand</label>
                    <div class=" badge bg-info">{{$product->brand->title}}</div>
                </div>
            </div>
        </div>

        {{--price / onSale--}}
        <br>
        <div class="col-lg-10 mt-3 m-auto">
            <div class="row ">
                {{--price--}}
                <div class="col-md-6 ">
                    <label for="price" class="form-label">Product price</label>
                    <input disabled type="number" value="{{$product->price}}"
                           class="form-control form-text">
                </div>
                <div class="col-md-6 ">
                    {{--onSale--}}
                    <label for="on_sale" class="form-label">Product OnSale Price</label>
                    <input type="number" value="{{$product->on_sale}}" disabled
                           class="form-control form-text">
                </div>
            </div>
        </div>

        {{--active /stock--}}
        <br>
        <div class="col-lg-10 mt-3 m-auto">
            <div class="row ">
                {{--active--}}
                <div class="col-md-6 m-auto">
                    <label for="active" class="form-check-label">Active Product</label>
                    <input type="checkbox" disabled {{$product->active ? 'checked' : null}} class="form-check">

                </div>
                {{--stock--}}
                <div class="col-md-6 ">
                    <label for="stock" class="form-label">Product Stock</label>
                    <input type="number" value="{{$product->stock}}" disabled
                           class="form-control form-text">
                </div>
            </div>
        </div>

        {{--stated_at / End at--}}
        <div class="col-lg-10 mt-3 m-auto">
            <br>
            <div class="row ">
                {{--started _at--}}
                <div class="col-md-6 ">
                    <label for="started_at" class="form-label">onSale Start at</label>
                    <input type="date" value="{{$product->started_at}}" disabled
                           class="form-control form-text">

                </div>
                <div class="col-md-6 ">
                    {{--end_at--}}
                    <label for="end_at" class="form-label">onSale End at</label>
                    <input type="date" value="{{$product->end_at}}" disabled
                           class="form-control form-text">
                </div>
            </div>
        </div>

        {{--image cover--}}
        <div class="col-lg-10 mt-3 m-auto">
            <br>
            <label for="cover" class="form-label"> Cover Image</label>
            <a target="_blank" href="{{asset(config('shop.productCoverPath').$product->image)}}">
                <img class="shadow rounded-3" src="{{asset(config('shop.productCoverPath').$product->image)}}"
                     width="100" height="100" alt="">
            </a>

        </div>

        {{--image--}}
        @if(count($product->product_galleries))
            <div class="col-lg-10 m-auto mt-3">
                <br>
                <label for="cover" class="form-label">Product Gallery</label>

                @foreach($product->product_galleries as $image)
                    <a target="_blank" href="{{asset(config('shop.productCoverPath').$product->image)}}">
                        <img class="shadow rounded-3" src="{{asset(config('shop.productGalleris').$image->image)}}"
                             width="100" height="100" alt="">
                    </a>
                @endforeach

            </div>
        @endisset

        {{--note / short description --}}
        <br>
        <div class="col-lg-10 mt-3 m-auto">
            <div class="row">
                <div class="col-md-6">
                    <label for="note" class="form-label"> Note </label>
                    <textarea disabled name="note" class="form-control" cols="10" rows="5">{{$product->note}}</textarea>
                </div>

                {{--short description--}}
                <div class="col-md-6">
                    <label for="short_description" class="form-label">Short Description </label>
                    <textarea name="short_description" class="form-control" disabled cols="10"
                              rows="5">{{$product->short_description}}</textarea>
                </div>
            </div>
        </div>

        {{--long_description--}}
        <br>
        <hr>
        <div class="col-lg-10 m-auto mt-3">
              <div class="">   {!! $product->long_description !!}</div>

        </div>

    </div>

@endsection
