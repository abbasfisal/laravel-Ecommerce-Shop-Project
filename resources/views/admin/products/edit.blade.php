@extends('admin.layouts.app')
@section('content')
    <h3>Edit Product</h3>

    <div class="row shadow rounded-3 ">
        {{--title--}}
        <br>
        <div class="col-lg-10 m-auto ">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" value="{{$product->title}}" name="title" id="title"
                   class="form-control form-text">

        </div>
        <br>
        {{--slug--}}
        <div class="col-lg-10 m-auto mt-3 ">
            <label for="slug" class="form-label">Product Slug</label>
            <input type="text" value="{{$product->slug}}" name="slug" id="slug" class="form-control form-text">
        </div>


        {{--category / sub category--}}
        <br>
        <div class="col-lg-10 m-auto">
            <div class="row ">

                {{--category--}}
                <div class="col-md-6 ">
                    <label for="main_category" class="form-label">Select Category</label>
                    <select class="form-control form-select" id="main_category" name="main_category">
                        <option value="0">Select a Category</option>
                        @foreach($categories as $category)
                            <option

                                {{$category->id == $product->category->parent->id ? 'selected' : null}}
                                value="{{$category->id}}">{{$category->title}} a Category
                            </option>
                        @endforeach
                    </select>
                    @error('main_category')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
                {{--sub category--}}
                <div class="col-md-6 ">
                    <label for="category_id" class="form-label">Select SubCategory</label>
                    <select class="form-control form-select" id="category_id" name="category_id">
                        @foreach($subCategories as $subcategory)
                            <option

                                {{$subcategory->id ==$product->category_id ? 'selected' : null}}
                                value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
            </div>
        </div>

        {{--details --}}
        {{--attributes--}}
        <br>
        <div class="col-lg-10 m-auto" id="attributes-holder">
            <input type="button" class="btn btn-info mb-1 shadow " id="btn-add-attribute" value="add new attribute">
        </div>

        <br>
        @if(count($product->details))
            <div class="row">
                <div class="col-lg-10 border rounded-3 p-1 shadow bg-white m-auto">
                    @foreach($product->details as $detail)
                        <div class="row">
                            <div class="col-lg-8  m-auto  ">
                            <textarea class="form-control "
                                      rows="3">{!! $detail->description !!}</textarea>
                            </div>
                            <div class="col-lg-4  ">
                                <input type="text" value="{{$detail->title}}" class="form-control form-text"
                                /><br>

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
                <div class="col-md-6 ">
                    <label for="sizes" class="form-label">Select Size</label>
                    <span class="badge bg-info">it can be null</span>
                    @php($product_size_array = null)
                    @foreach($product->sizes as $size)
                        @php($product_size_array []= $size->title)
                    @endforeach

                    <select class="form-control form-select sizes" id="sizes" name="sizes[]" multiple="multiple">
                        @foreach($sizes as $size)
                            <option
                                {{in_array($size->title , $product_size_array) == true ? 'selected' :null}}
                                value="{{$size->id}}">{{$size->title}}</option>
                        @endforeach
                    </select>

                    @error('sizes.*')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>

                {{--Colors --}}
                <div class="col-md-6 ">
                    <label for="colors" class="form-label">Select Color </label>
                    <span class="badge bg-info">it can be null</span>
                    @php($product_color_array = null)
                    @foreach($product->colors as $color)
                        @php($product_color_array []= $color->name)
                    @endforeach
                    <select class="js-example-basic-multiple form-control form-select" id="colors" name="colors[]"
                            multiple="multiple">

                        @foreach($colors as $color)
                            <option
                                {{in_array($color->name , $product_color_array) == true ? 'selected' :null}}
                                value="{{$color->id}}">{{$color->name}} </option>
                        @endforeach
                    </select>
                    @error('colors.*')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                </div>
            </div>
        </div>

        <br>

        {{--brand --}}
        <div class="col-lg-10 m-auto">
            <div class="row ">
                <div class="col-md-6 ">
                    {{--brand--}}
                    <label for="brand_id" class="form-label">Select Brand</label>
                    <select class="form-control form-select" id="brand_id" name="brand_id">
                        <option value="0">Select a Brand</option>
                        @foreach($brands as $brand)
                            <option
                                {{$brand->id == $product->brand_id ? 'selected' : null}}
                                value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                {{--<div class="col-md-6 ">
                    --}}{{--brand--}}{{--
                    <label for="brand_id" class="form-label">Select Brand</label>
                    <select name="brand_id" id="brand_id"
                            class="form-control form-select">
                        <option value="0">Select a Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->title}}</option
                        @endforeach
                    </select>
                    @error('brand_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>--}}
            </div>
        </div>


        {{--price / onSale--}}
        <br>
        <div class="col-lg-10 mt-3 m-auto">
            <div class="row ">
                {{--price--}}
                <div class="col-md-6 ">
                    <label for="price" class="form-label">Product price</label>
                    <input type="number" value="{{$product->price}}"
                           class="form-control form-text">
                </div>
                <div class="col-md-6 ">
                    {{--onSale--}}
                    <label for="on_sale" class="form-label">Product OnSale Price</label>
                    <input type="number" value="{{$product->on_sale}}"
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
                    <input type="checkbox" {{$product->active ? 'checked' : null}} class="form-check">

                </div>
                {{--stock--}}
                <div class="col-md-6 ">
                    <label for="stock" class="form-label">Product Stock</label>
                    <input type="number" value="{{$product->stock}}"
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
                    <input type="date" value="{{$product->started_at}}"
                           class="form-control form-text">

                </div>
                <div class="col-md-6 ">
                    {{--end_at--}}
                    <label for="end_at" class="form-label">onSale End at</label>
                    <input type="date" value="{{$product->end_at}}"
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
                    <textarea name="note" class="form-control" cols="10" rows="5">{{$product->note}}</textarea>
                </div>

                {{--short description--}}
                <div class="col-md-6">
                    <label for="short_description" class="form-label">Short Description </label>
                    <textarea name="short_description" class="form-control" cols="10"
                              rows="5">{{$product->short_description}}</textarea>
                </div>
            </div>
        </div>

        {{--long_description--}}
        <br>
        <hr>
        <textarea name="long_description" class="form-control" id="long" cols="30"
                  rows="50">{!! $product->long_description ?? old('long_description')!!}</textarea>
        @error('long_description')
        <div class="text-danger">{{$message}}</div>
        @enderror


    </div>

@endsection

@push('header')
    {{--Select 2 css--}}
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">



    {{--tiny MCE--}}
    <script src="{{ asset('assets/js/tiny_mce.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#long', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

@endpush
@push('footer')

    {{--select 2 js--}}
    <script src="{{ asset('assets/js/select2.min.js') }}" referrerpolicy="origin"></script>


    <script>
        $(document).ready(function () {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{@csrf_token()}}'
                }
            })
            //main category ajax send subcategory
            $("#main_category").change(function () {
                $("#category_id").children().remove().end();

                var formData = {
                    category_id: $("#main_category").val()
                }
                $.ajax({
                    data: formData,
                    url: '{{route('subcategory.product')}}',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        data.forEach(el => {
                            $("#category_id").append(`<option value='${el.id}'>${el.title}</option>`)
                        })
                    },
                    error: function (data) {
                        console.log(data)
                    }
                });
            })


            $('#colors').select2();
            $('#sizes').select2();


        })


    </script>
    <script src="{{asset('assets/js/add-attributes.js')}}"></script>

@endpush
