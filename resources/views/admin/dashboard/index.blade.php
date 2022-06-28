@extends('admin.layouts.app')
@section('content')
    <h3>DashBoard Index</h3>

    @isset($data)
        <div class="row">

            @foreach($data as $key=> $item)
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body p-t-10">
                            <h4 class="card-title text-muted mb-0">
                                <b>{{$key}}</b>
                            </h4>
                            <h2 class="mt-3 mb-2"><i class="mdi mdi-arrow-up text-success me-2"></i><b>{{$item}}</b></h2>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endisset

@endsection
