@extends('admin.layouts.app')
@section('content')
    <h3>Edit Discount</h3>

    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('fail'))
                    <div class="alert alert-danger">
                        {{session('fail')}}
                    </div>
                @endif
                <div class="card-body">
                    <form
                        enctype="multipart/form-data"
                        action="{{route('update.discount')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <input name="id" type="hidden" value="{{$discount->id}}"/>
                            {{--title--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">title</label>
                                    <input type="text"
                                           name="title"
                                           value="{{$discount->title ??old('title')}}"
                                           class="form-control @error('title') is-ivalid @enderror"
                                           placeholder="enter title">

                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            {{--discount percent--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color" class="form-label">discount percent</label>
                                    <input type="number"
                                           name="percent"
                                           class="form-control form-control-color w-100 @error('percent') is-ivalid @enderror"
                                           id="color"
                                           value="{{$discount->percent ??old('percent')}}">
                                    @error('percent')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{--discount date--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Discount Start at</label>
                                    <input type="date"
                                           name="started_at"
                                           class="form-control form-control-color w-100 @error('started_at') is-ivalid @enderror"
                                           id="color"
                                           value="{{$discount->started_at ?? old('started_at')}}">
                                    @error('started_at')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{--end at--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Disount End at</label>
                                    <input type="date"
                                           name="end_at"
                                           class="form-control form-control-color w-100 @error('end_at') is-ivalid @enderror"
                                           id="color"
                                           value="{{$discount->end_at ??old('end_at')}}">
                                    @error('end_at')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="color" class="form-label">Disount Banner</label>

                                <input class="form-control" name="image" type="file">
                                @error('image')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <img  width="600" src="{{asset(config('shop.discountImagePath').$discount->image)}}" alt="">
                        </div>
                        <br>
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Discount</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

@endsection
