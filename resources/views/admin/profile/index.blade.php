@extends('admin.layouts.app')
@section('content')
    <h3 class="text-pink">Update Your Profile Info</h3>


    @if(session('succ'))
        <div class="alert alert-success">
            {{session('succ')}}
        </div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">
            {{session('fail')}}
        </div>
    @endif


    <form action="{{route('update.profile.admin')}}" method="post">

        @method('post')
        @csrf

        <div class="col-lg-6 m-auto rounded-3 bg-white shadow p-3">
            <label for="name" class=" form-label">Enter Your Name: </label>
            <input type="text" class="form-control" name="name"
                   value="{{auth()->user()->name ? auth()->user()->name : 'user'.auth()->id()}}">

            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <button class="btn btn-info form-control mt-3">Update Your Name</button>
        </div>
    </form>
@endsection
