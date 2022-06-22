@extends('admin.layouts.app')
@section('content')
    <h3>Single Order</h3>
    @if(session('fail_msg'))
        <div class="alret alert-danger col-lg-5 m-auto p-2 rounded-3">
            <h5>{{session('fail_msg')}}</h5>
        </div>
        <br>
    @endisset
    @if(session('succ_msg'))
        <div class="alret alert-success col-lg-5 m-auto p-2 rounded-3">
            <h5>{{session('succ_msg')}}</h5>
        </div>
        <br>
    @endisset
    <form action="{{route('change.status.order')}}" method="post">
        @csrf
        @method('post')
        <div class="col-lg-4 border m-auto rounded-3 bg-white shadow p-4">
            <label for="status"> change Order Status</label>
            <select class="form-control" name="status">
                @foreach($order::getOrderStatus() as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>
            <br>
            <input type="hidden" name="order" value="{{$order->id}}">
            <button class="btn btn-info form-control">apply</button>
        </div>
    </form>
    <br>

    <div class="col-lg-12 ">
        <div class="row">

            <div class="col-lg-4 shadow rounded-3 ">
                <div class="alert alert-success">user Info</div>
                <table class="table table-hover">
                    <tr>
                        <td><b>User Tel :</b></td>
                        <td>{{$order->user->tel}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 shadow rounded-3  ">
                <div class="alert alert-info">Address Info</div>
                <table class="table table-hover">
                    <tr>
                        <td><b>City :</b></td>
                        <td>{{$order->state->city->name}}</td>
                    </tr>
                    <tr>
                        <td><b>state :</b></td>
                        <td>{{$order->state->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Mobile :</b></td>
                        <td>{{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td><b>Postal Code :</b></td>
                        <td>{{$order->postal_code}}</td>
                    </tr>
                    <tr>
                        <td><b>Address :</b></td>
                        <td>{{$order->address}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 shadow rounded-3 ">
                <div class="alert alert-success">Factor Info</div>
                <table class="table table-hover ">
                    <tr>
                        <td><b>Tracking Code: </b></td>
                        <td>{{$order->tracking_code}}</td>
                    </tr>
                    <tr>
                        <td><b>Payment Code: </b></td>
                        <td>{{$order->payment_code}}</td>
                    </tr>
                    <tr>
                        <td><b>Paide Date: </b></td>
                        <td>{{$order->paied_date }}</td>
                    </tr>
                    <tr>
                        <td><b>Paid Hourse: </b></td>
                        <td>{{\Carbon\Carbon::parse($order->paied_date)->diffForHumans()}}</td>
                    </tr>

                    <tr>
                        <td><b>Total Price: </b></td>
                        <td>
                            <h5 class="text-pink">@money($order->total) $</h5></td>
                    </tr>


                    <tr>
                        <td><b>Discount Price: </b></td>
                        <td>
                            @isset($order->discount_total)
                                <h5 class="text-dark">@money($order->discount_total) $</h5>
                            @endisset
                        </td>
                    </tr>


                </table>

            </div>
        </div>
    </div>
    <hr>
    @isset($order->orderItems)
        <div class="table-responsive ">

            <table class="table  table-nowrap align-middle table-edits">
                <thead>
                <tr style="">
                    <th>ID</th>
                    <th>title</th>
                    <th>color</th>
                    <th>size</th>
                    <th>price</th>
                    <th>price_onSale</th>
                    <th>valide days</th>
                    <th>total price</th>
                    <th>image</th>
                    <th>count</th>

                </tr>
                </thead>

                <tbody>
                @foreach($order->orderItems as $key => $orderItem)
                    <tr>
                        <td><strong>{{$key+1}}</strong></td>
                        <td>{{$orderItem->product->title}}</td>
                        <td>
                            @if(!is_null($orderItem->color_id))
                                <div class="rounded-3"
                                     style="width: 20px ; height: 20px; background-color:{{$orderItem->color->code}} "></div>
                            @endif
                        </td>
                        <td>
                            @if(!is_null($orderItem->size_id))
                                {{$orderItem->size->title}}
                            @else
                                -
                            @endif
                        </td>
                        <td><strong>{{$orderItem->product->price}} $</strong></td>
                        <td>
                            @if(!is_null($orderItem->product->on_sale))
                                <strong>{{$orderItem->product->on_sale ??'-'}} $</strong>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @php

                                $now = \Illuminate\Support\Carbon::now()->format('Y-m-d');
                                $start =$orderItem->product->started_at;
                                $end  = $orderItem->product->end_at;

                            @endphp

                            @if(!is_null($orderItem->product->on_sale ))

                                <span class="bold badge badge-soft-info"> {{$orderItem->product->started_at}}</span> to
                                <span class="bold badge badge-soft-danger">{{$orderItem->product->end_at}} </span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <strong>
                                {{--totol price--}}
                                @if(\Illuminate\Support\Carbon::now()->isBetween($start , $end))
                                    {{(int)$orderItem->count * (int) $orderItem->product->on_sale}} $
                                @else
                                    {{(int)$orderItem->count * (int)$orderItem->product->price}} $
                                @endif

                            </strong>
                        </td>
                        <td>
                            <img class="avatar-sm"
                                 src="{{asset(config('shop.productCoverPath').$orderItem->product->image)}}" alt="">
                        </td>
                        <td>


                            {{$orderItem->count}}


                        </td>
                        <td class="text-center">

                            {{--view--}}
                            <a href="{{route('get.product.home' , [$orderItem->product->id , $orderItem->product->slug])}}"
                               class="btn btn-outline-success btn-sm edit" title="more Details">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br>
            <hr>

        </div>
    @endisset
@endsection
