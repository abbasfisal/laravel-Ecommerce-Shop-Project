@extends('admin.layouts.app')
@section('content')
    <h3>Reply to a Comment</h3>
    <form action="{{route('add.reply.comment', $comment->id)}}" method="get">

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

        <input type="hidden" name="id" value="{{$comment->id}}">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <div>
                        <div class="mb-4">
                            <textarea disabled class="form-control" type="text">{{$comment->text}}</textarea>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" name="reply" cols="30" rows="10"></textarea>
                            @error('reply')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <a href="{{route('show.comments')}}" class="btn btn-outline-pink">Back</a>
                            <button class="btn btn-info">Reply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
