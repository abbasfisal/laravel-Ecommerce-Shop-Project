@extends('admin.layouts.app')
@section('content')
    <div class="row shadow rounded-3 ">
        <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            {{--title--}}
            <br>
            <div class="col-lg-10 m-auto ">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control form-text">
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <br>
            {{--slug--}}
            <div class="col-lg-10 m-auto ">
                <label for="slug" class="form-label">Product Slug</label>
                <input type="text" value="{{old('slug')}}" name="slug" id="slug" class="form-control form-text">
                @error('slug')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            {{--category / sub category--}}
            <br>
            <div class="col-lg-10 m-auto">
                <div class="row ">
                    {{--category--}}
                    <div class="col-md-6 ">
                        <label for="category_id" class="form-label">Select Category</label>
                        <select class="form-control form-select" id="category_id" name="category_id">
                            <option value="0">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}} a Category</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                    </div>
                    {{--sub category--}}
                    <div class="col-md-6 ">
                        <label for="subcategory" class="form-label">Select SubCategory</label>
                        <select class="form-control form-select" id="subcategory" name="subcategory">

                        </select>
                        @error('subcategory')
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
                                <option value="{{$brand->id}}">{{$brand->title}}</option>
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
            <div class="col-lg-10 m-auto">
                <div class="row ">
                    {{--price--}}
                    <div class="col-md-6 ">
                        <label for="price" class="form-label">Product price</label>
                        <input type="number" value="{{old('price')}}" name="price" id="price"
                               class="form-control form-text">
                        @error('price')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                    </div>
                    <div class="col-md-6 ">
                        {{--onSale--}}
                        <label for="on_sale" class="form-label">Product OnSale Price</label>
                        <input type="number" value="{{old('on_sale')}}" name="on_sale" id="on_sale"
                               class="form-control form-text">
                        @error('on_sale')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{--active /stock--}}
            <br>
            <div class="col-lg-10 m-auto">
                <div class="row ">
                    {{--active--}}
                    <div class="col-md-6 m-auto">
                        <label for="active" class="form-check-label">Active Product</label>
                        <input type="checkbox" name="active" id="active" class="form-check">
                        @error('active')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                    </div>
                    {{--stock--}}
                    <div class="col-md-6 ">
                        <label for="stock" class="form-label">Product Stock</label>
                        <input type="number" value="{{old('stock')}}" name="stock" id="stock"
                               class="form-control form-text">
                        @error('stock')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{--stated_at / End at--}}
            <div class="col-lg-10 m-auto">
                <br>
                <div class="row ">
                    {{--started _at--}}
                    <div class="col-md-6 ">
                        <label for="started_at" class="form-label">onSale Start at</label>
                        <input type="date" value="{{old('started_at')}}" name="started_at" id="started_at"
                               class="form-control form-text">
                        @error('started_at')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 ">
                        {{--end_at--}}
                        <label for="end_at" class="form-label">onSale End at</label>
                        <input type="date" value="{{old('end_at')}}" name="end_at" id="end_at"
                               class="form-control form-text">
                        @error('end_at')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{--image--}}
            <div class="col-lg-10 m-auto">
                <br>
                <label for="image" class="form-label">Select Image</label>
                <input type="file" name="image" class="form-control"/>
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror


            </div>

            {{--note --}}
            <br>
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-6">
                        <label for="note" class="form-label">Enter Note </label>
                        <textarea name="note" class="form-control" id="" cols="10" rows="5">{{old('note')}}</textarea>
                        @error('note')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="short_description" class="form-label">Short Description </label>
                        <textarea name="short_description" class="form-control" id="" cols="10"
                                  rows="5">{{old('short_description')}}</textarea>
                        @error('short_description')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{--long_description--}}
            <br>
            <div class="col-lg-10 m-auto">
                <textarea name="long_description" class="form-control" id="long" cols="30"
                          rows="50">{{old('long_description')}}</textarea>
                @error('long_description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row">
                <button type="submit" class="btn btn-info">Create new Product</button>
            </div>
        </form>
    </div>

@endsection
@push('header')
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

    {{-- script for changeing Category State--}}
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{@csrf_token()}}'
                }
            })
            $("#category_id").change(function () {
                $("#subcategory").children().remove().end();

                var formData = {
                    category_id: $("#category_id").val()
                }
                $.ajax({
                    data: formData,
                    url: '{{route('subcategory.product')}}',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        data.forEach(el => {
                            $("#subcategory").append(`<option value='${el.id}'>${el.title}</option>`)
                        })

                        console.log('success');
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data)
                    }

                });
            })
        })
    </script>
@endpush
{{--attribtues--}}
{{--<div class="row">
    <div class="col-lg-10 m-auto" id="sel">
        <label class="form-label" for="v">select attributes</label>
        <select class="form-control form-select" name="v" id="v">
            <option value="0">a</option>
            <option value="1">b</option>
            <option value="2">c</option>
        </select>
    </div>
</div>--}}