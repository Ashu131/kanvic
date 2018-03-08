@extends('templates.inner_template.master')
<?php
 include(app_path().'/Mobile_Detect.php');
    $objMobile = new Mobile_Detect;
    if($objMobile ->isMobile()) {
    $sys = "mobile";
    }
    else
    {
      $sys = 'desktop';
    }
?>

@section('content')
<div class="banner-btm clearfix expertise-top-titlebar">
  <div class="container">
    <div class="sub_menu_tray">
      <div class="pull-left banner_lft_title">
      <?php
          $pgtitle = strlen($data['event']->title) > 70 ? substr($data['event']->title,0,70)."..." : $data['event']->title; 
          
          ?>
          {!!$pgtitle!!}
      </div>
        <div class="pull-right">
        <div class="mobile_sub_r">
          <div class="right_menu_link pull-left">
            <a href="{{url('grey-matter')}}" class="btn"><i class="fa fa-angle-left"></i> Back to Grey Matter</a>
            <a href="{{url('contact-us')}}">Contact</a>
          </div>
          <div class="share_block pull-left">
            <div class="share_btn" id="share_button">Share</div>
            <div class="share_icon">
              <ul>
              <li data-bgcolor="#0077b7"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{url('grey-matter')}}/{{$data['event']->slug}}" class="linkedin customer share" title="linkedin Share" target="_blank"><img src="../resources/assets/images/linkdin.png"></a></li>
              <li data-bgcolor="#50abf1"><a href="https://twitter.com/share?url={{url('grey-matter')}}/{{$data['event']->slug}}&amp;text=Share popup on" class="twitter customer share" title="Twitter share" target="_blank"><img src="../resources/assets/images/twitter.png"></a></li>
              <li data-bgcolor="#3a559f"><a href="https://www.facebook.com/sharer.php?u={{url('grey-matter')}}/{{$data['event']->slug}}" class="facebook customer share" title="Facebook share" target="_blank"><img src="../resources/assets/images/facebook.png"></a></li>
              <li data-bgcolor="#0077b7"><a href="mailto:someone@example.com?Subject=Hello%20again" class="envelope"><img src="../resources/assets/images/mail.png"></a></li>
            </ul> 
          </div>
        </div>
        </div>


      </div>
    </div>
  </div> 
</div>

<div class="inner-banner article-banner" style="background-image:url('{{url('resources/assets/img/modules/article/banner',$data['event']->inner_banner)}}');"> 
<div class="article_b_text">
    <div class="article_top_title">
<div class="container">
  <div class="article_banner_text">
    <h2 class="banner-title">{!!$data['event']->title!!}</h2>
    <h6 class="sub-title text-left">by {{$data['event']->author}} | {{date('F Y', strtotime($data['event']->created_at))}}</h6>
    </div>
  </div>
 </div>
</div>
</div>
<div class="article-container"> 
<div class="container" id="article_inner_content"> 
{{-- <h2 class="banner-title" style="font-size:30px;">{!!$data['event']->title!!}</h2> --}}
{!!$data['event']->content!!}
</div>

  <div class="container">
    <hr class="divider about-divider">
  </div>
<div class="talk-to-our-block clearfix expertise_talk_block">
<div class="container">
  <div class="pull-left col-sm-offset-2">
  <img class="talkto-img" src="{{url('resources/assets/images/talk-to-our.jpg')}}"></div>
  <div class="pull-left col-sm-offset-1">
  <h2 class="sub-heading text-center" style="text-align:left;">Talk to our team on<br>how we can help you.</h2>
  <a href="{{url('contact-us')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  </div>
</div>
</div>


<div class="we-help-block about_help_block background_color" id="about_help_four">
    <div class="container"> 
      <h2 class="sub-heading text-center">Where we help.</h2>   
   </div>
    <div class="container">
      <div class="help-block">
        <div class="help_sub_heading">
        <h4>Strategy</h4> 
        </div>   
        <div>
          <h5>Make the critical, interdependent decisions necessary to succeed in today’s world.</h5> 
          <a href="{{url('strategy')}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a>   
        </div>
      </div>
      <div class="help-block">
      <div class="help_sub_heading">
        <h4>Digital</h4>
      </div>
        <div> 
          <h5>Adapt to the new era of digitally driven business.</h5> 
          <a href="{{url('digital')}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a> 
        </div>
      </div>
                  <div class="help-block">  
                  <div class="help_sub_heading">
        <h4>Transformation</h4>
        </div>
        <div>    
          <h5>Make deep and lasting changes to improve your business performance. </h5>   
          <a href="{{url('transformation')}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a>  
        </div> 
      </div>
            <div class="help-block">
            <div class="help_sub_heading">   
        <h4>Marketing</h4>
        </div>
        <div>     
          <h5>Deliver and capture more value.</h5>
          <a href="{{url('marketing')}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a> 
        </div>
      </div>


    </div>
  </div>





</div>

@endsection
