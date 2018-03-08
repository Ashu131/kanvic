@extends('admin.master')
@section('content')
{{Session::get('success')}}
<form action="{{route('gallery.post.page')}}" method="post">
    <label>Gallery Type Name</label>
    <input type="text" name="menu_type_name">
    <select name="gallery_position">
        @foreach($data['positions'] as $position)
            <option value="{{$position->position_id}}">{{$position->position_name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="_token" value="{{Session('_token')}}">
    <button type="submit">Create</button>
</form>

<ul>
    @foreach($data['gallery_type'] as $gallery_type)
    <li><a href="{{route('show.gallery.single',$gallery_type->gallery_type)}}"> {{$gallery_type->name}} </a></li>
<!--
            <ul>
                <li></li>
            </ul>
-->
    @endforeach
</ul>
@endsection