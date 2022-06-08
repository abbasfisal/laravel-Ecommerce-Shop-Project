@extends('user.layouts.app')
@section('content')
    <div class="col-lg-11 border m-auto rounded-3 bg-white">


        @if(session('succ'))
            <div class="col alert alert-success mb-3">  {{session('succ')}}</div>
        @endif
        <br>
        <div class="table-responsive ">
            <table class="table  table-nowrap align-middle table-edits">
                <thead>
                <tr style="">
                    <th>ID</th>
                    <th>title</th>
                    <th>image</th>
                    <th class="text-center">Opt</th>
                </tr>
                </thead>

                <tbody>
                @foreach($wishlists as $key=>$wish)
                    <tr>
                        <td><strong>{{$wishlists->firstItem()+$key}}</strong></td>
                        <td>
                            <a href="{{route('get.product.home',[$wish->product->id ,$wish->product->slug])}}">
                                {{$wish->product->title}}
                            </a>
                        </td>
                        <td>
                            <img class="avatar-sm rounded-3 shadow"
                                 src="{{config('shop.productCoverPath').$wish->product->image}}" alt="">
                        </td>
                        <td class="text-center">
                            <a href="{{route('del.wish.user',$wish->id)}}"
                               class="btn btn-outline-danger btn-sm edit" title="more Details">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="col p-4">
                {{$wishlists->links()}}
            </div>
        </div>
@endsection
