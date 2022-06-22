@extends('admin.layouts.app')
@section('content')
    <div class="row">
        {{--color table --}}
        <div class="shadow bg-white rounded col-xl-8 ">
            <div class="table-responsive">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $colors as $key =>$color)
                        <tr data-id="5" style="cursor: pointer;">
                            <td data-field="id">{{$colors->firstItem() + $key}}</td>
                            <td data-field="title">{{$color->name}}</td>
                            <td data-field="color">
                                <img class="avatar-sm rounded-circle" style="background-color:{{$color->code}}" width="20" height="20" alt="">

                            </td>
                            <td class="text-center">
                                <a
                                    href="{{route('show.edit.color' , $color->id)}}"
                                    class="btn btn-outline-warning btn-sm edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-outline-danger btn-sm edit" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $colors->links() !!}
            </div>
        </div>

        {{--color create form--}}
        <div class="col-xl-4 ">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.color')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--color name--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">color name</label>
                                    <input type="text"
                                           name="name"
                                           value="{{old('name')}}"
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
                                           value="{{old('code')}}">
                                    @error('code')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Color</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>

    </div>
@endsection
