@extends('admin.layouts.app')
@section('content')
    <h3>Edit Color</h3>

    <div class="col-xl-4 m-auto ">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('fail'))
                <div class="alert alert-danger text-dark">
                    {{session('success')}}
                </div>
            @endif

            <div class="card-body">
                <form action="{{route('update.color')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        {{--color name--}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">color name</label>
                                <input type="text"
                                       name="name"
                                       value="{{$color->name ?? old('name')}}"
                                       class="form-control @error('name') is-ivalid @enderror"
                                       placeholder="color name">

                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        {{--color code--}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="color" class="form-label">pick a color</label>
                                <input type="color"
                                       name="code"
                                       class="form-control form-control-color w-100 @error('code') is-ivalid @enderror"
                                       id="color"
                                       value="{{$color->code ?? old('code')}}">
                                @error('code')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$color->id}}">
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-info" type="submit">Update Color</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
@endsection
