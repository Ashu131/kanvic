@extends('templates.inner_template.master')

@section('css')
<style>
.expertise_think-1{position: relative;}
.expertise_think-2{padding-left:0 !important;}
.grey_matter_block {
    position: relative;
}


</style>

@endsection


@section('content')

<div class="innercontent"> 
{!!$data['press_release']!!}
</div>
@endsection

@section('js')


@endsection