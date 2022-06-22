@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                <table class="table table-hover  table-nowrap align-middle table-edits">
                    <thead>
                    <tr style="">
                        <th>ID</th>
                        <th>MOBILE</th>
                        <th>STATUS</th>
                        <th>TRACKING CODE</th>
                        <th>PAYMENT CODE</th>
                        <th>TOTAL</th>
                        <th>DISCOUNT TOTAL</th>
                        <th class="text-center">OPT</th>
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
                        <td>
                            <span class="badge badge-soft-info">
                            {{++$key}}
                            </span>
                        </td>
                        <td>{{$order->phone}}</td>
                        {{--status--}}
                        <td>
                            @switch($order->status)
                                @case(\App\Models\Order::status_paid)
                                <span class="badge badge-soft-warning"><b>{{$order->status}}</b></span>
                                @break

                                @case(\App\Models\Order::status_pending)
                                <span class="badge badge-soft-info"><b>{{$order->status}}</b></span>
                                @break

                                @case(\App\Models\Order::status_delivered)
                                <span class="badge badge-soft-success"><b>{{$order->status}}</b></span>
                                @break


                                @case(\App\Models\Order::status_fail)
                                <span class="badge badge-soft-danger"><b>{{$order->status}}</b></span>
                                @break

                                @case(\App\Models\Order::status_canceled)
                                <span class="badge badge-soft-dark"><b>{{$order->status}}</b></span>
                                @break

                                @default
                                <span class="badge badge-soft-dark"><b>{{$order->status}}</b></span>
                                @break


                            @endswitch
                        </td>
                        <td>{{$order->tracking_code}}</td>
                        <td>{{$order->payment_code}}</td>
                        <td>
                            <b>@money($order->total) $</b>
                        </td>
                        <td>
                            @isset($order->discount_total)
                                <b>@money($order->discount_total) $</b>
                            @endisset
                        </td>
                        <td class="text-center">
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
