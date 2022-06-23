@extends('admin.layouts.app')
@section('content')
    <h3>Edit Brand</h3>
    <div class="row">
        <div class="col-xl-6 m-auto">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger ">
                        {{session('fail')}}
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{route('update.brand')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <input type="hidden" name="id" value="{{$brand->id}}">
                            {{--title--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Title</label>
                                    <input type="text"
                                           name="title"
                                           value="{{$brand->title ?? old('title')}}"
                                           class="form-control @error('title') is-ivalid @enderror"
                                           placeholder="Title">

                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{--slug--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text"
                                           name="slug"
                                           class="form-control @error('parent') is-ivalid @enderror"
                                           id="slug"
                                           placeholder="slug" value="{{$brand->slug?? old('slug')}}">
                                    @error('slug')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{--image  --}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Brand Image</label>
                                    <input class="form-control" name="image" type="file">

                                    @error('image')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                                <div class="text-center">
                                    <img src="{{asset(config('shop.brandImagePath').$brand->image)}}" alt="">
                                </div>
                                <br>

                            </div>

                        </div>

                        <div class="row">
                            <button class="btn btn-info" type="submit">Update Brand</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
@endsection
