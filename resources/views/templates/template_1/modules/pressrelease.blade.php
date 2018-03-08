<div class="banner-btm clearfix expertise-top-titlebar">
  <div class="container">
    <div class="sub_menu_tray">
      <div class="pull-left banner_lft_title">Grey Matter</div>
        <div class="pull-right">
          <div class="right_menu_link pull-left ">
            <a href="contact-us">Contact</a>
          </div>
        <div class="share_block pull-left">
          <div class="share_btn">Share</div>
          <div class="share_icon">
            <ul>
              <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{url('grey-matter')}}" class="linkedin customer share" title="linkedin Share" target="_blank"><img src="resources/assets/images/linkdin.png"></a></li> 
              <li><a href="" class="twitter"><img src="resources/assets/images/twitter.png"></a></li>
              <li><a href="" class="facebook"><img src="resources/assets/images/facebook.png"></a></li>
              <li><a href="" class="envelope"><img src="resources/assets/images/mail.png"></a></li>
            </ul> 
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>
 <div class="inner-banner about_banner"> 
  <div class="container text-center">
    <h1 class="banner-title1">Grey Matter</h1>
    <h2 class="banner-title">Matters. The most.</h2>
    <h6 class="sub-title">Kanvic Grey Matter showcases our latest management thinking on today’s most critical business issues.</h6>   </div> </div> 
      <div class="case_study_landing expertise_thinkblock">
        <div class="container grey_matter_list">
<?php $count = 1; ?>
@foreach($press as $pres)

@if($count==1)
   <div class="expertise_think-1" id="grey_large_img" style="background-image:url('{{url('resources/assets/img/modules/article/',$pres->imgname)}}'); ">
       <a href="{{route('show.grey-matter.slug',$pres->slug)}}">
    	<div class="col-sm-6 img-innertxt">
<div class="con">
              <h2 class="sub-heading">{!!$pres->title!!}</h2>
              <h6>{!!$pres->sub_title!!}</h6> 
            </div>
    			
   			</div> 
   			</a>
        </div>

@else
   <div class="col-sm-6 block-group" style="@if($count%2!=0) padding-right:0 @else padding-left:0 @endif ">
       <a href="{{route('show.grey-matter.slug',$pres->slug)}}">
    	<div class="expertise_think-2 grey_matter_block" style="background-image:url('{{url('resources/assets/img/modules/article/',$pres->imgname)}}'); ">
    			<div class="col-sm-12 img-innertxt">
    			    <div class="small_block">
    				<h2 class="sub-heading">{!!$pres->title!!}</h2>
    				<h6>{!!$pres->sub_title!!}</h6>
    				<!--<a href="{{route('show.grey-matter.slug',$pres->slug)}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a>--> 
    				</div>
    			</div> 
   			</div> 
   			</a>
        </div>
@endif



  


<?php $count++; ?>

@endforeach
    </div>
   </div> 
<div class="container"><hr class="divider about-divider"> </div>
<div class="clearfix grey-talk-panel">
         <div class="container">
          <div class="pull-left col-sm-offset-2">
            <img class="talkto-img" src="resources/assets/images/talk-to-our.jpg" /> 
            </div>
       <div class="pull-left col-sm-offset-1">
        <h2 class="sub-heading mb-0">Talk to our team on<br />how we can help you.</h2>
         <a href="{{url('contact-us')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a> 
          </div>  
</div>
</div>












              
     