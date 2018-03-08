@extends('templates.inner_template.master')

@section('content')

<div class="banner-btm clearfix">
  <div class="container">
  <div class="sub_menu_tray">
  <div class="pagetitle">
        <div class="pull-left banner_lft_title">
      <?php
          $pgtitle = strlen($data['event']->title) > 70 ? substr($data['event']->title,0,70)."..." : $data['event']->title; 
       ?>
          {!!$pgtitle!!}
      </div>

  <div class="pull-right">
    <div class="right_menu_link clearfix pull-left">
    <a href="{{url('case-studies')}}" class="backbtn btn"><i class="fa fa-angle-left"></i> Back to All Case Studies</a>
    <a href="{{url('contact-us')}}">Contact</a>
    </div>
        <div class="share_block pull-left">
        <div class="share_btn">Share</div>
      <div class="share_icon">
      <ul>
      <li data-bgcolor="#0077b7"><a href="" class="linkedin"><img src="{{url('resources/assets/images/linkdin.png')}}"></a></li>
        <li data-bgcolor="#50abf1"><a href="" class="twitter"><img src="{{url('resources/assets/images/twitter.png')}}"></a></li>
      <li data-bgcolor="#3a559f"><a href="" class="facebook"><img src="{{url('resources/assets/images/facebook.png')}}"></a></li>
      <li data-bgcolor="#2d99ed"><a href="" class="envelope"><img src="{{url('resources/assets/images/mail.png')}}"></a></li>
       </ul>
       </div>
    </div>
    </div>
  </div>
    </div>
    </div>
 </div>


<div class="inner_cs_content">

<div class="inner-banner case_study_banner"> 
  <div class="container text-center banner_txt_block">
    <h2 class="banner-title">{!!$data['event']->title!!}</h2>
    <h6 class="sub-title">{!!$data['event']->inner_desc!!}</h6>
  </div> 
  <div class="bannerimg"><img class="img-responsive" src="{{url('resources/assets/img/modules/pagebanner',$data['event']->banner)}}"></div>
</div>
{!!$data['event']->content!!}

</div>
<div class="talk-to-our-block clearfix mt-90">
  <div class="container">
  <div class="pull-left col-sm-offset-2"><img class="talkto-img" src="{{url('resources/assets/images/talk-to-our.jpg')}}" /></div>
  <div class="pull-left col-sm-offset-1">
  <h2 class="sub-heading text-center" style="text-align:left;">Talk to our team on<br />how we can help you.</h2>
  <a href="{{url('contact-us')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  </div>
</div>
</div>
<div class="we-help-block case_help_block background_color">
  <div class="container">
    <h2 class="sub-heading text-center">Where we help.</h2>
  </div>
  <div class="container" id="case_study_h_block">
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
          <h5>Make deep and lasting changes to improve your business performance.</h5>
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

@endsection

@section('js')    

@endsection