@extends('user.layouts.app')
@section('content')

    @isset($stock_unavailable)
        @foreach($stock_unavailable as $item)
            {{var_dump($item)}}
        @endforeach
    @endisset

@endsection
