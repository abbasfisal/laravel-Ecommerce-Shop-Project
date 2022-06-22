@extends('admin.layouts.app')
@section('content')

    <form action="{{route('search.order')}}" method="post">
        @csrf
        @method('post')
        <div class="col-lg-5 p-3 shadow bg-white rounded-3 m-auto">
            <label for="code" class=" form-label">Enter Payment Code | Tracking Code</label>
            <input type="text" id="code" class="form-control"
                   placeholder="Enter code"
                   name="code">
            <br>
            <button class="btn btn-info form-control">Search</button>
        </div>
    </form>
    <br>
    @if(session('search_msg'))
        <div class="alert alert-info"> {{session('search_msg')}}</div>
    @endisset

    @isset($order)


            <div class="row">
                <div class="shadow bg-white rounded col ">
                    <div class="table-responsive ">
                        <table class="table  table-nowrap align-middle table-edits">
                            <thead>
                            <tr style="">

                                <th>mobile</th>
                                <th>status</th>
                                <th>Tracking Code</th>
                                <th>Payment Code</th>
                                <th>total</th>
                                <th>disount_total</th>
                                <th class="text-center">Opt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($order))
                                <tr>
                                    <td>Empty</td>
                                </tr>
                            @endif


                                <tr>

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
                                        <a href="{{route('single.order' , $order->id)}}"
                                           class="btn btn-outline-success btn-sm edit" title="view more">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

    @endisset

@endsection
