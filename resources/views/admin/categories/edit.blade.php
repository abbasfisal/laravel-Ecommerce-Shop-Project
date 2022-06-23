@extends('admin.layouts.app')
@section('content')
    <h3>Edit Category</h3>

    <form action="{{route('update.category')}}" method="post">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif

        @if(session('fail'))
            <div class="alert alert-danger">{{session('fail')}}</div>
        @endif


        @csrf
        @method('post')
        <div class="row">
            {{--id--}}
            <input type="hidden" name="id" value="{{$category->id}}">
            {{--title--}}
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           value="{{$category->title ?? old('title')}}"
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
                           placeholder="slug" value="{{$category->slug ?? old('slug')}}">
                    @error('slug')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        @if($category->parent_id !=null)
            <div class="row">
                {{--sub category --}}
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="validationCustom03" class="form-label">Select Parent Category</label>
                        <select
                            name="category"
                            class="form-select @error('category') is-ivalid @enderror">
                            <option selected="" value="0">As Parent</option>
                            @foreach($categories as $catItem)
                                @if($catItem->parent_id == null)
                                    <option
                                        {{$catItem->id == $category->parent_id ? 'selected' :''}}
                                        value="{{$catItem->id}}">{{$catItem->title}}</option>
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

        @endif

        <div class="row">
            <button class="btn btn-info" type="submit">Update Category</button>
        </div>
    </form>

    {{--subCategory--}}

@endsection
