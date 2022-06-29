@extends('admin.layouts.app')
@section('content')
    <h3>All Comments</h3>

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


    <div class="row">
        <div class="shadow bg-white rounded col ">
            <div class="table-responsive ">
                @if($comments->count())
                    <table class="table table-hover  table-nowrap align-middle table-edits">
                        <thead>
                        <tr style="">
                            <th>ID</th>
                            <th>product</th>
                            <th>text</th>
                            <th>show</th>
                            <th class="text-center">Opt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key=>$comment)
                            <tr>
                                <td><b>{{++$key}}</b></td>
                                <td>
                                    <a href="{{route('get.product.home' , [$comment->product->id,$comment->product->slug])}}">
                                        {{$comment->product->title}}
                                    </a>
                                </td>
                                <td>
                                    {{\Illuminate\Support\Str::limit($comment->text,30)}}
                                </td>
                                <td>
                                    @if($comment->show)
                                        <a href="{{route('change.show.comment', $comment->id)}}">
                                            <span class="h5 ri-checkbox-circle-fill text-success"></span>
                                        </a>
                                    @else
                                        <a href="{{route('change.show.comment', $comment->id)}}">
                                            <i class="h5 ri-indeterminate-circle-fill text-danger"></i>
                                        </a>

                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('delete.comment' ,$comment->id)}}">
                                        <i class="h5 text-danger  ri-delete-bin-fill"></i>
                                    </a>
                                    |
                                    <a href="{{route('show.comment' , $comment->id)}}">
                                        <i class="h5 text-info  ri-discuss-fill"></i>
                                        reply</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <h3>No Any comments</h3>
                @endif

            </div>
        </div>
    </div>


@endsection
