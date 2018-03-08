@extends('templates.inner_template.master')

@section('content')

<div id="searchpage" class="innercontent">
<div class="container">

@if($searchstatus==2)
<ul class="searchlist">
@foreach($searchdata['fulldata_title'] as $fullsearch)
<li>
  @if($searchdata['tabname']=='article')
    <a href="{{url('grey-matter')}}/{!!$fullsearch->slug!!}">
    @elseif($searchdata['tabname']=='cs')
    <a href="{{url('case-studies')}}/{!!$fullsearch->slug!!}">
    @else
   <a href="{{url($fullsearch->slug)}}">
    @endif

  {!!$fullsearch->title!!}</a>
  <?php $sort_content4 = strip_tags($fullsearch->content);
    $sort_content4 = substr($sort_content4, 0, 500);
   ?>
  <p>{!!$sort_content4!!}...</p>

</li>
@endforeach
@foreach($searchdata['fulldata_content'] as $fullsearch1)
<li>
  @if($searchdata['tabname']=='article')
    <a href="{{url('grey-matter')}}/{!!$fullsearch1->slug!!}">
    @elseif($searchdata['tabname']=='cs')
    <a href="{{url('case-studies')}}/{!!$fullsearch1->slug!!}">
    @else
   <a href="{{url($fullsearch1->slug)}}">
    @endif

  {!!$fullsearch1->title!!}</a>
  <?php $sort_content4 = strip_tags($fullsearch1->content);
    $sort_content4 = substr($sort_content4, 0, 500);
   ?>
  <p>{!!$sort_content4!!}...</p>

</li>
@endforeach
</ul>
@endif

@if($searchstatus==1)
@if(count($searchdata['pd_title'])>0 || count($searchdata['pd_content'])>0)
<?php $total_pages = count($searchdata['pd_title'])+count($searchdata['pd_content']); ?>

<h2 class="search_title">Result in Pages</h2>
<ul class="searchlist">
<?php $i = 1; ?>
@foreach($searchdata['pd_title'] as $pgdata)
@if($i<=5)
<li>
  <a href="{!!$pgdata->slug!!}">{!!$pgdata->title!!}</a>
  <?php $sort_content = strip_tags($pgdata->content);
    $sort_content = substr($sort_content, 0, 500);
   ?>
  <p>{!!$sort_content!!}...</p>
</li>
@endif
<?php $i++; ?>
@endforeach

@if(count($searchdata['pd_title']) < 5)
@foreach($searchdata['pd_content'] as $pgdata1)
@if($i<=5)
<li>
  <a href="{!!$pgdata1->slug!!}">{!!$pgdata1->title!!}</a>
  <?php $sort_content1 = strip_tags($pgdata1->content);
    $sort_content1 = substr($sort_content1, 0, 500);
   ?>
  <p>{!!$sort_content1!!}...</p>
</li>
@endif
<?php $i++; ?>
@endforeach
@endif
</ul>
<?php
$searchcounter1 = $total_pages-5;
?>
@if($total_pages-5>0)
<a href="{{url('search')}}?tab=page&q={{$searchquery}}" class="btn">{{$total_pages-5}} more @if($searchcounter1>1)results @else result @endif</a>
@endif
@endif



@if(count($searchdata['article_data_title'])>0 || count($searchdata['article_data_content'])>0)
<?php
  $total_articles =  count($searchdata['article_data_title'])+count($searchdata['article_data_content']);
 ?>
<h2 class="search_title">Result in Articles</h2>
<ul class="searchlist">
<?php $j = 1; ?>
@foreach($searchdata['article_data_title'] as $artdata)
@if($j<=5)
<li>
  <a href="{{url('grey-matter')}}/{!!$artdata->slug!!}">{!!$artdata->title!!}</a>
  <?php $sort_content1 = strip_tags($artdata->content);
    $sort_content1 = substr($sort_content1, 0, 500);
   ?>
  <p>{!!$sort_content1!!}...</p>
</li>
@endif
<?php $j++; ?>
@endforeach

@if(count($searchdata['article_data_title']) < 5)
@foreach($searchdata['article_data_content'] as $artdata1)
@if($j<=5)
<li>
  <a href="{{url('grey-matter')}}/{!!$artdata1->slug!!}">{!!$artdata1->title!!}</a>
  <?php $sort_content2 = strip_tags($artdata1->content);
    $sort_content2 = substr($sort_content2, 0, 500);
   ?>
  <p>{!!$sort_content2!!}...</p>
</li>
@endif
<?php $j++; ?>
@endforeach
@endif


</ul>
<?php
$searchcounter2 = $total_articles-5;
?>

@if($total_articles-5>0)
<a href="{{url('search')}}?tab=article&q={{$searchquery}}" class="btn">{{$total_articles-5}} more @if($searchcounter2>1)results @else result @endif</a>
@endif
@endif

@if(count($searchdata['cs_data_title'])>0 || count($searchdata['cs_data_content'])>0)
<?php
$total_cs = count($searchdata['cs_data_title'])+count($searchdata['cs_data_content']);
 ?>
<h2 class="search_title">Result in Case Studies</h2>
<ul class="searchlist">
<?php $k = 1; ?>
@foreach($searchdata['cs_data_title'] as $csdata)
@if($k<=5)
<li>
  <a href="{{url('case-studies')}}/{!!$csdata->slug!!}">{!!$csdata->title!!}</a>
    <?php $sort_content2 = strip_tags($csdata->content);
    $sort_content2 = substr($sort_content2, 0, 500);
   ?>
  <p>{!!$sort_content2!!}...</p>
</li>
@endif
<?php $k++; ?>
@endforeach

@if(count($searchdata['cs_data_title']) < 5)
@foreach($searchdata['cs_data_content'] as $csdata1)
@if($k<=5)
<li>
  <a href="{{url('case-studies')}}/{!!$csdata1->slug!!}">{!!$csdata1->title!!}</a>
    <?php $sort_content2 = strip_tags($csdata1->content);
    $sort_content2 = substr($sort_content2, 0, 500);
   ?>
  <p>{!!$sort_content2!!}...</p>
</li>
@endif
<?php $k++; ?>
@endforeach
@endif


</ul>
@if($total_cs-5>0)
<?php
$searchcounter3 = $total_cs-5;
?>
<a href="{{url('search')}}?tab=cs&q={{$searchquery}}" class="btn">{{$total_cs-5}} more @if($searchcounter3>1)results @else result @endif</a>
@endif
@endif


@endif



</div>

</div><!-- inner content close -->

@endsection

@section('js')

@endsection
