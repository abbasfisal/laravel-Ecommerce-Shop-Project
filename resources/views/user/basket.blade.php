@extends('user.layouts.app')
@section('content')
    <div class="col-lg-11 border m-auto rounded-3 bg-white">
        @if(session('msg'))
            <div class="col alert alert-info mb-3">  {{session('msg')}}</div>
        @endif
        <br>

        <div class="table-responsive ">

            @if(!empty($baskets->count()))
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
                        <th class="text-center">Opt</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($baskets as $key=>$basket)

                        <tr>
                            <td><strong>{{$key+1}}</strong></td>
                            <td>{{$basket->product->title}}</td>
                            <td>
                                @if(!is_null($basket->color_id))
                                    <div class="rounded-3"
                                         style="width: 20px ; height: 20px; background-color:{{$basket->color->code}} "></div>
                                @endif
                            </td>
                            <td>
                                @if(!is_null($basket->size_id))
                                    {{$basket->size->title}}
                                @else
                                    -
                                @endif
                            </td>
                            <td><strong>{{$basket->product->price}} $</strong></td>
                            <td>
                                @if(!is_null($basket->product->on_sale))
                                    <strong>{{$basket->product->on_sale ??'-'}} $</strong>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @php

                                    $now = \Illuminate\Support\Carbon::now()->format('Y-m-d');
                                    $start =$basket->product->started_at;
                                    $end  = $basket->product->end_at;
                                    var_dump(\Carbon\Carbon::now()->isBetween($start , $end))
                                @endphp

                                @if(!is_null($basket->product->on_sale ))
                                    @if(\Carbon\Carbon::now()->isBetween($start , $end))
                                        <span class="">
                                <i class="text-success ri-checkbox-circle-fill"></i>
                            </span>
                                    @else
                                        <span class="">
                                <i class="text-danger ri-indeterminate-circle-fill"></i>
                            </span>
                                    @endif
                                    <span class="bold badge badge-soft-info"> {{$basket->product->started_at}}</span> to
                                    <span class="bold badge badge-soft-danger">{{$basket->product->end_at}} </span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <strong>
                                    {{--totol price--}}
                                    @if(\Illuminate\Support\Carbon::now()->isBetween($start , $end))
                                        {{(int)$basket->count * (int) $basket->product->on_sale}} $
                                    @else
                                        {{(int)$basket->count * (int)$basket->product->price}} $
                                    @endif

                                </strong>
                            </td>
                            <td>
                                <img class="avatar-sm"
                                     src="{{asset(config('shop.productCoverPath').$basket->product->image)}}" alt="">
                            </td>
                            <td>
                                <a href="{{route('dec.basket.user',$basket->id)}}" type="submit"
                                   class="btn  btn-sm  btn-outline-danger">
                                    <i class="fas fa-minus"></i>
                                </a>

                                {{$basket->count}}

                                <a href="{{route('increase.basket.user' , $basket->id)}}"
                                   class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-plus"></i>
                                </a>

                            </td>
                            <td class="text-center">
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

                <br>
                <hr>
                {{--price details--}}
                @if($baskets->count())
                    <div class="rounded-3 bg-white border col-lg-6 m-auto shadow">
                        @php($total=null )
                        @php( $total_without_on_sale =null )
                        @php($total_with_on_sale = null);
                        @foreach($baskets as $basket)

                            @if($basket->product->on_sale !=null)

                                @if(\Illuminate\Support\Carbon::now()->isBetween($basket->product->started_at ,  $basket->product->end_at))

                                    @php( $total += (int)$basket->count * (int)$basket->product->on_sale )
                                    @php( $total_with_on_sale += (int)$basket->count * (int)$basket->product->on_sale )
                                @endif

                            @else

                                @php($total += (int)$basket->count *(int) $basket->product->price )
                                @php($total_without_on_sale +=(int)$basket->count *(int) $basket->product->price)
                            @endif


                        @endforeach

                        {{--form apply copun / next stem--}}
                        <form action="{{route('all.basket.user')}}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">

                                <div class="col-lg-4">
                                    <Button class="btn form-control btn-outline-info">Apply</Button>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="title" placeholder="Enter Coupon Code"
                                           class="form-control">
                                </div>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror


                            {{--coupon is not valid ( may be expired or sooner used )--}}
                            @isset($coupon_valid)
                                <div class="alert alert-danger">
                                    {{$coupon_valid}}
                                </div>
                            @endif

                        </form>
                        <br>
                        <h3 class="text-info text-center">
                            <b>order Total:</b>
                            @money($total) </h3>

                        @isset($coupon)
                            <table class="table table-hover">
                                <tr>
                                    <td><strong>Discount Code :</strong></td>
                                    <td>{{$coupon['title']}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Discount Percent :</strong></td>
                                    <td>{{$coupon['percent']}} <span class="badge badge-soft-info">%</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Order without Calculate Coupon :</strong></td>
                                    <td>@money($total)</td>
                                </tr>
                                <tr>
                                    <td><strong>Total Order with Calculate Coupon :</strong></td>
                                    <td>@money(DISCOUNT($total_without_on_sale , $coupon['percent']) +
                                        $total_with_on_sale)
                                    </td>
                                </tr>
                            </table>
                        @endisset
                        <br>
                        <form action="{{route('address.basket.user')}}" method="get">

                            @isset($coupon)
                                <input type="hidden" name="code" value="{{$coupon['title']}}">
                            @endisset
                            <button class="btn btn-info form-control">Next Step</button>
                        </form>
                    </div>
                @endif

            @else
                <h4 class="p-3">Your Baskets Is Empty</h4>

            @endif
        </div>


@endsection
