@extends('admin.layouts.app')
@section('content')
    <h3>edit</h3>

    <div class="col-xl-4 m-auto">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success text-dark">
                    {{session('success')}}
                </div>
            @endif

            @if(session('fail'))
                <div class="alert alert-danger text-dark">
                    {{session('fail')}}
                </div>
            @endif
            <div class="card-body">

                <form action="{{route('update.size')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        {{--size name--}}
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Size</label>
                                <input type="text"
                                       name="title"
                                       value="{{$size->title ?? old('title')}}"
                                       class="form-control @error('title') is-ivalid @enderror"
                                       placeholder="size">

                                <input type="hidden" value="{{$size->id}}" name="id">

                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <button class="btn btn-info" type="submit">Update Size</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
@endsection
