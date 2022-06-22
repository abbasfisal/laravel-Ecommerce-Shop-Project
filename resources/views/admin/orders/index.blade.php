@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                <table class="table  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>mobile</th>
                        <th>status</th>
                        <th>total</th>
                        <th>disount_total</th>
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(empty($orders))
                        <tr>
                            <td>Empty</td>
                        </tr>
                    @endif

                    @foreach($orders as $key=>$order)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$order->phone}}</td>
                        <td>
                            <span class="badge badge-soft-success">{{$order->status}}</span>
                        </td>
                        <td>
                            <b>@money($order->total) $</b>
                        </td>
                        <td>
                            @isset($order->discount_total)
                                <b>@money($order->discount_total) $</b>
                            @endisset
                        </td>
                        <td>
                            <a href="{{route('single.order' , $order->id)}}" class="btn btn-outline-success btn-sm edit" title="view more">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>
@endsection
