
<?php $count = 1; ?>
@foreach($press as $pres)
   <div class="col-sm-6 col-xs-12 block-group" style="@if($count%2==0) padding-right:0 @else padding-left:0 @endif ">
       <a href="{{route('show.grey-matter.slug',$pres->slug)}}">
      <div class="expertise_think-2 grey_matter_block" style="background-image:url('{{url('resources/assets/img/modules/article/',$pres->imgname)}}'); ">
          <div class="col-sm-12 img-innertxt">
              <div class="small_block">
            <h2 class="sub-heading">{!!$pres->title!!}</h2>
            <h6>{!!$pres->sub_title!!}</h6>
            </div>
          </div> 
        </div>
    </a>
  </div>
<?php $count++; ?>

@endforeach