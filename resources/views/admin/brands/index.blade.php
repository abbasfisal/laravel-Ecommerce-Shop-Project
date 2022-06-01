@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-xl-6 m-auto">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.brand')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--title--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Title</label>
                                    <input type="text"
                                           name="title"
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
                                           placeholder="slug" value="{{old('slug')}}">
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
                            </div>

                        </div>

                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Brand</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <div class="row rounded-3 shadow m-auto">
            <div class="table-responsive">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>Title</th>
                        <th>SLUG</th>
                        <th>image</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $brands_paginate as $key =>$brand)
                        <tr data-id="5" style="cursor: pointer;">
                            <td data-field="id">{{$brands_paginate->firstItem() + $key}}</td>
                            <td data-field="title">{{$brand->title}}</td>
                            <td data-field="slug">{{$brand->slug}}</td>
                            <td data-field="category">
                                @if($brand->parent_id == null)
                                    <b>{{$brand->title}}</b>
                                @else
                                    {{$brand->parent->title}}
                                @endif
                            </td>
                            <td class="text-center">
                                <a
                                    href="#{{$brand->id}}"
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
                {!! $brands_paginate->links() !!}
            </div>
        </div>
    </div>
@endsection
