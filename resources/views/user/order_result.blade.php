@extends('user.layouts.app')
@section('content')
    <h3>order result</h3>
    <div class="col-lg-5 m-auto rounded-3 shadow">
        @isset($order)
            <table class="table table-hover">
                <tr>
                    <td>
                        <b> Paied Amount:</b>
                    </td>
                    <td>
                        <b>
                        {{$order->discount_total ?? $order->total}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Tracking Code:</b></td>
                    <td><b>{{$order->tracking_code}}</b></td>
                </tr>
                <tr>
                    <td><b>Payment Code:</b></td>
                    <td><b>{{$order->payment_code}}</b></td>
                </tr>
            </table>
        @endisset

    </div>
    <a href="{{route('index')}}" class="btn btn-outline-info">Back to the  Home</a>

@endsection
