@extends('user.layouts.app')
@section('content')
    <div class="col-lg-11 m-auto border">
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

                @foreach($order->orderItems as $key=>$item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->product->title}}</td>
                        <td>
                            @if(!is_null($item->color_id))
                                <div class="rounded-3"
                                     style="width: 20px ; height: 20px; background-color:{{$item->color->code}} "></div>
                            @endif
                        </td>
                        <td>
                            @if(!is_null($item->size_id))
                                {{$item->size->title}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @money($item->product->price) $
                        </td>
                        <td>
                            @if(!is_null($item->product->on_sale))
                                <strong>{{$item->product->on_sale ??'-'}} $</strong>
                            @else
                                -
                            @endif
                        </td>

                        {{--valid day--}}
                        <td>
                            @php

                                $now = \Illuminate\Support\Carbon::now()->format('Y-m-d');
                                $start = $item->product->started_at;
                                $end  = $item->product->end_at;

                            @endphp

                            @if(!is_null($item->product->on_sale ))
                                @if(\Carbon\Carbon::now()->isBetween($start , $end))
                                    <span class="">
                                <i class="text-success ri-checkbox-circle-fill"></i>
                            </span>
                                @else
                                    <span class="">
                                <i class="text-danger ri-indeterminate-circle-fill"></i>
                            </span>
                                @endif
                                <span class="bold badge badge-soft-info"> {{$item->product->started_at}}</span> to
                                <span class="bold badge badge-soft-danger">{{$item->product->end_at}} </span>
                            @else
                                -
                            @endif
                        </td>

                        {{--total price--}}
                        <td>
                            <strong>
                                {{--totol price--}}
                                @if(\Illuminate\Support\Carbon::now()->isBetween($start , $end))
                                    {{(int)$item->count * (int) $item->product->on_sale}} $
                                @else
                                    {{(int)$item->count * (int)$item->product->price}} $
                                @endif

                            </strong>
                        </td>
                        {{--image--}}
                        <td>
                            <img class="avatar-sm"
                                 src="{{asset(config('shop.productCoverPath').$item->product->image)}}" alt="">
                        </td>

                        {{--count--}}
                        <td>
                            {{$item->count}}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>

        {{--factor--}}
        <div class="rounded-3 bg-white border col-lg-6 m-auto shadow">
            @php($total=null )
            @php( $total_without_on_sale =null )
            @php($total_with_on_sale = null)
            @foreach($order->orderItems as $item)

                @if($item->product->on_sale !=null)

                    @if(\Illuminate\Support\Carbon::now()->isBetween($item->product->started_at ,  $item->product->end_at))

                        @php( $total += (int)$item->count * (int)$item->product->on_sale )
                        @php( $total_with_on_sale += (int)$item->count * (int)$item->product->on_sale )
                    @else

                        @php( $total += (int)$item->count * (int)$item->product->price )
                        @php( $total_without_on_sale += (int)$item->count * (int)$item->product->price )
                    @endif

                @else

                    @php($total += (int)$item->count *(int) $item->product->price )
                    @php($total_without_on_sale +=(int)$item->count *(int) $item->product->price)
                @endif


            @endforeach
            <form action="{{route('all.basket.user')}}" method="post">


                {{--coupon is not valid ( may be expired or sooner used )--}}


            </form>
            <br>


            @if(!empty($order->discount))
                <table class="table table-hover">
                    <tr>
                        <td><strong>Discount Code :</strong></td>
                        <td>{{$order->discount->title}}</td>
                    </tr>
                    <tr>
                        <td><strong>Discount Percent :</strong></td>
                        <td>{{$order->discount->percent}} <span class="badge badge-soft-info">%</span></td>
                    </tr>
                    <tr>
                        <td><strong>Total Order without Calculate Coupon :</strong></td>
                        <td>
                            <strong>@money($total) $</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Order with Calculate Coupon :</strong></td>
                        <td>
                            @if(now()->isBetween($order->discount->started_at , $order->discount->end_at))

                                <strong>@money($order->discount_total) $ </strong>
                            @else
                                <b class="text-danger">Discount Is Expired</b>
                            @endif
                        </td>
                    </tr>
                </table>
            @endif


            <a href="{{route('pay.user' ,$order->id)}}" class="btn btn-info">Pay the Price</a>
            <br>

        </div>

@endsection
