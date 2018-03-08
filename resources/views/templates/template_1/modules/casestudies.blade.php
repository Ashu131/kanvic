<?php $count = 0; ?>
@foreach($press as $pres)
<div class="col-sm-6 cs-single-block">
    <a href="{{route('show.case-studies.slug',$pres->slug)}}">
    <img class="img-responsive" src="{{url('resources/assets/img/modules/case_studies',$pres->thumb)}}" />
    <div class="block-text">
        <h4>{!!$pres->title!!}</h4>
        <h6>Related:<span>  {!!$pres->related_text!!}</span></h6>
        <a href="{{route('show.case-studies.slug',$pres->slug)}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a>
    </div>
</a>
</div>
<?php $count++; ?>
@endforeach