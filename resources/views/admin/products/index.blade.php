@extends('admin.layouts.app')
@section('content')
    <h3>all proudct</h3>
    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>title</th>
                        <th>price</th>
                        <th>active</th>
                        <th>stock</th>
                        <th>image</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $products as $key =>$product)
                        <tr data-id="5" style="">
                            <td data-field="id">{{$products->firstItem() + $key}}</td>
                            <td data-field="title">{{$product->title}}</td>
                            <td><b class="badge rounded-pill bg-success">{{$product->price}}</b></td>
                            <td class="">
                                <input type="checkbox"
                                       {{$product->active ? 'checked':null}}
                                       class="form-check">

                            </td>
                            <td>{{$product->stock}}</td>

                            <td data-field="image">
                                <img class="avatar-md "
                                     src="{{asset(config('shop.productCoverPath').$product->image) }}"
                                     alt="">

                            </td>
                            <td class="text-center">
                                <a
                                    href="{{route('show.edit.product' , $product->id)}}"
                                    class="btn btn-outline-warning btn-sm edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-outline-danger btn-sm edit" title="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>

                                <a
                                    href="{{route('get.product',[$product->id , $product->slug])}}"
                                    class="btn btn-outline-danger btn-sm edit" title="more Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
