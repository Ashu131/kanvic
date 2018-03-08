@extends('admin.master')
@section('content')
{{Session::get('success')}}
<form action="{{route('create.menu.type')}}" method="post">
    <label>Menu Type Name</label>
    <input type="text" name="menu_type_name">
    <select name="menu_position">
        @foreach($data['positions'] as $position)
            <option value="{{$position->position_id}}">{{$position->position_name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="_token" value="{{Session('_token')}}">
    <button type="submit">Create</button>
</form>

<ul>
    @foreach($data['menu_type'] as $menu_type)
    <li><a href="{{route('show.menu.single',$menu_type->menu_type_id)}}"> {{$menu_type->menu_type_name}} </a></li>
<!--
            <ul>
                <li></li>
            </ul>
-->
    @endforeach
</ul>
@endsection