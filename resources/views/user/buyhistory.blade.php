@extends('user.layouts.app')
@section('content')
    <h3>Your Buy History</h3>


    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                @if($orders->count())
                    <table class="table table-hover  table-nowrap align-middle table-edits">
                        <thead>
                        <tr style="">
                            <th>ID</th>
                            <th>status</th>
                            <th>Payment Code</th>
                            <th>Tracking Code</th>
                            <th>Paied Date</th>
                            <th>total Paied</th>
                            <th class="text-center">Opt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $orders as $key=>$order)
                            <tr>
                                <td><b>{{++$key}}</b></td>
                                <td>
                                    @switch($order->status)
                                        @case(\App\Models\Order::status_paid)
                                        <span class="badge badge-soft-warning"><b class="h6">{{$order->status}}</b></span>
                                        @break

                                        @case(\App\Models\Order::status_pending)
                                        <span class="badge badge-soft-info"><b class="h6">{{$order->status}}</b></span>
                                        @break

                                        @case(\App\Models\Order::status_delivered)
                                        <span class="badge badge-soft-success"><b class="h6">{{$order->status}}</b></span>
                                        @break


                                        @case(\App\Models\Order::status_fail)
                                        <span class="badge badge-soft-danger"><b class="h6">{{$order->status}}</b></span>
                                        @break

                                        @case(\App\Models\Order::status_canceled)
                                        <span class="badge badge-soft-dark"><b class="h6">{{$order->status}}</b></span>
                                        @break

                                        @default
                                        <span class="badge badge-soft-dark"><b class="h6">{{$order->status}}</b></span>
                                        @break


                                    @endswitch
                                </td>
                                <td>{{$order->payment_code}}</td>
                                <td>{{$order->tracking_code}}</td>
                                <td> <b>{{ $order->paied_date}}</b></td>
                                <td><h3 class="text-pink">@money($order->total)$</h3></td>

                                <td class="text-center">
                                    <a href="{{route('items.basket.user' , $order->id)}}">
                                        <i class="fa fa-eye"></i>
                                        <b>Items</b>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Your History Is Empty</h3>
                @endif
            </div>
        </div>
    </div>

@endsection
