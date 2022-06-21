@extends('user.layouts.app')
@section('content')

    <form action="{{route('address.add.user')}}" method="post">
        @method('post')
        @csrf
        <div class="row ">
            {{--city/state--}}
            <div class="col-lg-8  m-auto">
                {{--city--}}
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label" for="city">Select Your City </label>
                        <select class="form-control" name="city" id="city">
                            <option value="0">Select Your City</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="state">Select Your State </label>
                        <select class="form-control" name="state" id="state">

                        </select>
                    </div>
                </div>
            </div>


            {{--postal code / mobile --}}
            <div class="col-lg-8  m-auto mt-3">
                <div class="row">
                    {{--mobile--}}
                    <div class="col-lg-6">
                        <label class="form-label" for="mobile">Enter Your Mobile Number </label>
                        <input type="text" value="{{old('mobile')}}" name="mobile" placeholder="09xxxxxxxxx"
                               class="form-control">
                        @error('mobile')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    {{--postal code--}}
                    <div class="col-lg-6">
                        <label class="form-label" for="postalcode">Enter Your Postal Code </label>
                        <input type="text" value="{{old('postalcode')}}" name="postalcode" placeholder="0xxxxxxxx"
                               class="form-control">
                        @error('postalcode')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{--addres--}}
            <div class="col-lg-8 m-auto mt-3">
            <textarea name="address" id="address" cols="10" rows="3" placeholder="Enter Your Address"
                      class="form-control">{{old('address')}}</textarea>
                @error('address')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <br>
                <input type="hidden" value="{{request('code') ?? null}}" name="code" />
                <button type="submit" class="btn btn-info form-control">Next Step</button>
            </div>
        </div>
    </form>
@endsection


@push('footer')
    <script>
        $(document).ready(function () {
            $("#state").attr('disabled', 'disable');
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{@csrf_token()}}'
                }
            })
            //main category ajax send subcategory
            $("#city").change(function () {

                $("#state").children().remove().end();

                var formData = {
                    city_id: $("#city").val()
                }
                $.ajax({
                    data: formData,
                    url: '{{route('state.basket.user')}}',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {

                        $("#state").removeAttr('disabled');
                        data.forEach(el => {
                            $("#state").append(`<option value='${el.id}'>${el.name}</option>`)
                        })
                    },
                    error: function (data) {

                        console.log(data)
                    }
                });
            })


        })


    </script>
@endpush
