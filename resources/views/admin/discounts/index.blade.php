@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-xl-4 m-auto">
            <div class="card">
                @if(session('success'))
                    <div class="alert text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    <form
                        enctype="multipart/form-data"
                        action="{{route('store.discount')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            {{--title--}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">title</label>
                                    <input type="text"
                                           name="title"
                                           value="{{old('title')}}"
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
                                           value="{{old('percent')}}">
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
                                           value="{{old('started_at')}}">
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
                                           value="{{old('end_at')}}">
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
                        <div class="row">
                            <button class="btn btn-info" type="submit">Create New Discount</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>title</th>
                        <th>%</th>
                        <th>started_at</th>
                        <th>end_at</th>
                        <th>image</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $discounts as $key =>$discount)
                        <tr  data-id="5" style="">
                            <td data-field="id">{{$discounts->firstItem() + $key}}</td>
                            <td data-field="title">{{$discount->title}}</td>
                            <td><b class="badge rounded-pill bg-success">{{$discount->percent}}</b></td>
                            <td>{{$discount->started_at}}</td>
                            <td>{{$discount->end_at}}</td>

                            <td data-field="image">
                                <img class="avatar-md "
                                     src="{{$discount->image ? asset(config('shop.discountImagePath').$discount->image) : asset('assets/images/shop/noimage.jpg')}}"
                                     style="background-color:{{$discount->code}}"
                                      alt="">

                            </td>
                            <td class="text-center">
                                <a
                                    href="#{{$discount->id}}"
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
                {!! $discounts->links() !!}
            </div>
        </div>
    </div>
@endsection

