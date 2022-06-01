@extends('admin.layouts.app')

@section('content')
    <style>
        .optionGroup {
            font-weight: bold;

        }

        .optionChild {
            padding-left: 15px;
            font-style: italic;
        }
    </style>
    <div class="row">

        <div class="col-xl-6 m-auto">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.category')}}" method="post">
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
                            {{--sub category --}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Select Parent Category</label>
                                    <select
                                        name="category"
                                        class="form-select @error('category') is-ivalid @enderror">
                                        <option selected="" value="0">As Parent</option>
                                        @foreach($categories as $category)
                                            @if($category->parent_id == null)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endif
                                        @endforeach
                                        {{--<option selected="" value="0">None</option>
                                        @foreach ($categories as $category)

                                            @if($category->{'parent_id'} === null)
                                                --}}{{--parent--}}{{--
                                                @if(count($category->subcategories))
                                                    <option
                                                        class="optionGroupn"
                                                        value="{{$category->id}}" >
                                                        @include('admin.layouts.partials.subcategory' , ['sub'=>$category->subcategories])
                                                    </option>
                                                @else
                                                    <option class="optionChild" value="{{$category->id}}" }}>
                                                        without sub {{$category->title}}
                                                    </option>
                                                @endif

                                            @endif


                                        @endforeach--}}
                                    </select>
                                    @error('category')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Category</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <div class="row border m-auto">
            <div class="table-responsive">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>Title</th>
                        <th>SLUG</th>
                        <th>Category</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $cats_paginate as $key =>$cat)
                        <tr data-id="5" style="cursor: pointer;">
                            <td data-field="id">{{$cats_paginate->firstItem() + $key}}</td>
                            <td data-field="title">{{$cat->title}}</td>
                            <td data-field="slug">{{$cat->slug}}</td>
                            <td data-field="category">
                                @if($cat->parent_id == null)
                                    <b>{{$cat->title}}</b>
                                @else
                                    {{$cat->parent->title}}
                                @endif
                            </td>
                            <td class="text-center">
                                <a
                                    href="#{{$cat->id}}"
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
                {!! $cats_paginate->links() !!}
            </div>
        </div>

    </div>



@endsection
