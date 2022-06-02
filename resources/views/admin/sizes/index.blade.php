@extends('admin.layouts.app')
@section('content')
    <div class="row">
        {{--size table --}}
        <div class="shadow bg-white rounded col-xl-8 ">
            <div class="table-responsive">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>size</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $sizes as $key =>$size)
                        <tr data-id="5" style="cursor: pointer;">
                            <td data-field="id">{{$sizes->firstItem() + $key}}</td>
                            <td data-field="title">{{$size->title}}</td>
                            <td class="text-center">
                                <a
                                    href="#{{$size->id}}"
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
                {!! $sizes->links() !!}
            </div>
        </div>

        {{--size create form--}}
        <div class="col-xl-4 ">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.size')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--size name--}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Size</label>
                                    <input type="text"
                                           name="title"
                                           value="{{old('title')}}"
                                           class="form-control @error('title') is-ivalid @enderror"
                                           placeholder="size">

                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Size</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>

    </div>
@endsection
