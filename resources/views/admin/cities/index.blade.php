@extends('admin.layouts.app')
@section('content')
    <div class="row">
        {{--city form --}}
        <div class="col-xl-4 ">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.city')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--city name--}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">city name</label>
                                    <input type="text"
                                           name="city"
                                           value="{{old('city')}}"
                                           class="form-control @error('city') is-ivalid @enderror"
                                           placeholder="city name">

                                    @error('city')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New City</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>

        {{--state create form--}}
        <div class="col-xl-4 ">
            <div class="card">
                @if(session('success-state'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">

                    <form action="{{route('store.state')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--city name--}}
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Select City Name</label>
                                    <select
                                        class="form-control form-select"
                                        name="city_id" id="city_id">
                                        <option value="0">Select a City</option>
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="state" class="form-label">State Name</label>
                                    <input
                                        type="text"
                                        class="form-control "
                                        name="state" id="state" />


                                    @error('state')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New State</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>

    </div>
    <div class="shadow bg-white rounded col-xl-12 ">
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

                {{--@foreach( $colors as $key =>$color)
                    <tr data-id="5" style="cursor: pointer;">
                        <td data-field="id">{{$colors->firstItem() + $key}}</td>
                        <td data-field="title">{{$color->name}}</td>
                        <td data-field="color">
                            <img class="avatar-sm rounded-circle" style="background-color:{{$color->code}}" width="20" height="20" alt="">

                        </td>
                        <td class="text-center">
                            <a
                                href="#{{$color->id}}"
                                class="btn btn-outline-warning btn-sm edit" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            &nbsp;
                            <a class="btn btn-outline-danger btn-sm edit" title="delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach--}}

                </tbody>
            </table>
          {{--  {!! $colors->links() !!}--}}
        </div>
    </div>

@endsection
