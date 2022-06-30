@extends('user.layouts.app')
@section('content')
    <h3 class="text-pink">Products In Your Order</h3>
    <br>
    @isset($orderitems)

        <div class="table-responsive table-hover ">

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
                    <th class="text-center">opt</th>

                </tr>
                </thead>

                <tbody>
                <tbody>
                @foreach($orderitems as $key => $orderItem)
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
                </tbody>
            </table>
        </div>
    @endisset

@endsection
