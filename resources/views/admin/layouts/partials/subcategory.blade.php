@foreach($sub as $child)
    <option value="{{$child->{'id'} }}">
        {{$child->{'title'} }}
    </option>

    @if(count($child->subcategories))
        @include('admin.layouts.partials.subcategory' , ['sub'=>$child->subcategories])
    @endif
@endforeach
