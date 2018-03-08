@extends('templates.inner_template.master')

@section('content')
{{--

<div class="vc_row wpb_row vc_row-fluid" id="breadcrum_outer">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">    
        <div class="vc_row wpb_row vc_row-fluid block block-fullwidth breadcrum">
          <div class="container">
            <div class="wpb_wrapper breadcrum-panel">
                {!!$data['breadcrumb']!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 

--}}
{{--
<div class="container">
<h1 class="pageheading">{!!$page->page_header!!}</h1>
</div> 

--}}


<div id="page_{{$page->id}}" class="innercontent">

{!!$page->content!!}


</div><!-- inner content close -->

@endsection

@section('js')

@endsection










































