@extends('admin.layouts.app')
@section('content')

    <div class="shadow bg-white rounded col-xl-12 ">
        <div class="table-responsive">

            <form action="{{route('get.state')}}" method="post" class="row justify-content-center pt-3">
                @csrf
                @method('post')
                <div class="col-lg-2">
                    <button type="submit" id="getstate" class="mybtn btn btn-outline-info col-lg-12">Refresh</button>
                </div>
                <div class="col-lg-3">
                    <select type="text" class=" form-select" name="get_city_id">
                        <option value="0">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <br>
            <table class="table  table-nowrap align-middle table-edits">

                <thead>
                <tr style="">
                    <th>ID</th>
                    <th>Name</th>

                    <th class="text-center">Opt</th>
                </tr>
                </thead>
                <tbody>

                     @foreach( $states as $key =>$state)
                         <tr data-id="5" style="cursor: pointer;">
                             <td data-field="id">{{$loop->iteration}}</td>
                             <td data-field="title">{{$state->name}}</td>

                             <td class="text-center">
                                 <a
                                     href="#{{$state->id}}"
                                     class="btn btn-outline-warning btn-sm edit" title="Edit">
                                     <i class="fas fa-pencil-alt"></i>
                                 </a>
                                 &nbsp;
                                 <a class="btn btn-outline-danger btn-sm edit" title="delete">
                                     <i class="fas fa-trash-alt"></i>
                                 </a>
                             </td>
                         </tr>
                     @endforeach




                </tbody>
            </table>
            {{--  {!! $states->links() !!}--}}
        </div>
    </div>

@endsection
