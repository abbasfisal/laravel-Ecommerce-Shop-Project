@extends('user.layouts.app')
@section('content')
    <div class="col-lg-11 border m-auto rounded-3 bg-white">
        @if(session('msg'))
            <div class="col alert alert-info mb-3">  {{session('msg')}}</div>
        @endif
        <br>
        <div class="table-responsive ">

            <table class="table  table-nowrap align-middle table-edits">
                <thead>
                <tr style="">
                    <th>ID</th>
                    <th>title</th>
                    <th>price</th>
                    <th>image</th>
                    <th>count</th>
                    <th class="text-center">Opt</th>
                </tr>
                </thead>

                <tbody>
                @foreach($baskets as $key=>$basket)

                    <tr>

                        <td><strong>{{$key+1}}</strong></td>

                        <td>{{$basket->product->title}}</td>
                        <td>{{$basket->product->price}}</td>
                        <td>
                            <img class="avatar-sm"
                                 src="{{asset(config('shop.productCoverPath').$basket->product->image)}}" alt="">
                        </td>
                        <td>


                                <a href="{{route('dec.basket.user',$basket->id)}}" type="submit" class="btn  btn-sm  btn-outline-danger">
                                    <i class="fas fa-minus"></i>
                                </a>
                                {{$basket->count}}
                                <a href="{{route('increase.basket.user' , $basket->id)}}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-plus"></i>
                                </a>



                        </td>
                        <td>
                            {{--delte--}}
                            <a href="{{route('del.basket.user' , $basket->id)}}"
                               class="btn btn-outline-danger btn-sm edit" title="more Details">
                                <i class="fas fa-trash"></i>
                            </a>
                            {{--view--}}
                            <a href="{{route('get.product.home' , [$basket->product->id , $basket->product->slug])}}"
                               class="btn btn-outline-success btn-sm edit" title="more Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col p-4">

            </div>
        </div>
@endsection
