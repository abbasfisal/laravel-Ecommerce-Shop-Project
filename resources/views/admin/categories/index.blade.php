@extends('admin.layouts.app')

    <div class="row">

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    <form action="#" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--title--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Title</label>
                                    <input type="text"
                                           class="form-control @error('title') is-ivalid @enderror"
                                           placeholder="Title" required="">
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            {{--slug--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text"
                                           class="form-control @error('parent') is-ivalid @enderror"
                                           id="slug"
                                           placeholder="slug" value="{{old('slug')}}" required="">
                                    @error('slug')
                                    <div class="invalid-feedback">
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
                                        class="form-select @error('parent') is-ivalid @enderror"
                                        required="">
                                        <option selected="" value="0">None</option>
                                        @foreach($categories as $category)
                                            @if($category->{'parent_id'} === null)
                                                <option
                                                    value="{{$category->{'id'} }}">
                                                    {{$category->{'title'} }}
                                                </option>
                                                @if(count($category->subcategories ))
                                                    @include('admin.layouts.partials.subcategory' , ['sub'=>$category->subcategories])
                                                @endif

                                            @endif
                                        @endforeach
                                    </select>
                                    @error('parent')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>
                            </div>
                            {{--image Upload--}}
                            {{--<div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Select Image</label>
                                    <input type="file"
                                           class="form-control @error('image') is-ivalid @enderror"
                                           name="image"
                                           required="">

                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>--}}
                        </div>

                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Category</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>


    </div>



@endsection
