@extends('user.layouts.app')
@section('content')

    <div class="col-lg-11  m-auto">
        <div class="row justify-content-between">
            <div class="col-md-3 ">
                <div class="card ">
                    <img src="assets/images/small/img-3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="#">
                                Card title that wraps to a new line
                            </a>
                        </h5>
                    </div>
                    <div class="text-center">
                        <h3 class=""><strong>12500$</strong></h3>
                        <del class="text-white bg-danger rounded-3 p-1"><strong>12500$</strong></del>
                        <br>
                        <br>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-outline-info">
                            <i class="ri-shopping-bag-2-fill"></i>
                            Buy
                        </a>
                        <a href="#" class="btn btn-outline-danger">
                            <i class="ri-heart-2-fill"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 border">
        new Prodcut
    </div>
    <div class="col-lg-12 mt-3 border">
        Our Brands
    </div>


@endsection
