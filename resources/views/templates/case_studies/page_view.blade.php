@extends('templates.inner_template.master')
@section('css')


@endsection
@section('content')
<div class="banner-btm clearfix large-bannerbtm">
    <div class="container">
    <div class="sub_menu_tray">
      <div class="pull-left banner_lft_title">Case Studies</div>
      <div class="pull-right">
      <div class="right_menu_link pull-left ">
      </div>
  <div class="share_block pull-left">
        <div class="share_btn">Share</div>
      <div class="share_icon">
      <ul>
      <li data-bgcolor="#0077b7"><a href="" class="linkedin" target="_blank"><img src="resources/assets/images/linkdin.png"></a></li>
      <li data-bgcolor="#50abf1"><a href="" class="twitter" target="_blank"><img src="resources/assets/images/twitter.png"></a></li>
      <li data-bgcolor="#3a559f"><a href="" class="facebook" target="_blank"><img src="resources/assets/images/facebook.png"></a></li>
      <li data-bgcolor="#2d99ed"><a href="" class="envelope"><img src="resources/assets/images/mail.png"></a></li>
       </ul>
       </div>
    </div>
    </div>
     </div>
    </div>
  </div>
<div class="inner-banner about_banner">    
    <div class="container text-center">
    <h1 class="banner-title1">Case Studies</h1>
    <h2 class="banner-title">Only results. Nothing else.</h2>
    <h6 class="sub-title">We create outsized client impact through our uniquely adaptive and highly collaborative approach. Learn more about our client success stories through our most recent case studies.</h6>
    </div>
</div>

<div class="case_study_landing">
  <div class="container" id="all_cs_page">
  {!!$data['case_studies']!!}
    </div>
</div>

<div class="container"><hr class="divider about-divider"> </div>

<div class="talk-to-our-block clearfix expertise_talk_block">
<div class="container">

  <div class="pull-left col-sm-offset-2"><img class="talkto-img" src="{{url('resources/assets/images/talk-to-our.jpg')}}"></div>
  <div class="pull-left col-sm-offset-1">
  <h2 class="sub-heading text-center" style="text-align:left;">Talk to our team on<br>how we can help you.</h2>
  <a href="{{url('contact-us')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  </div>
</div>
</div>


@endsection

@section('js')






@endsection