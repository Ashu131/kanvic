@extends('templates.inner_template.master')
@section('css')


@endsection
@section('content')
<div class="banner-btm clearfix">
    <div class="container">
    <div class="sub_menu_tray">
      <div class="pull-left banner_lft_title">{!!$page->parent_title!!}</div>
      <div class="pull-right">
      <div class="right_menu_link pull-left ">
      @if($page->id==148)
      <a href="{{url('strategy')}}">How we help</a><a class="active" href="{{url('strategy-case-studies')}}">Case studies</a><a href="{{url('strategy-thinking')}}">Thinking</a><a href="{{url('strategy-contact')}}">Contact</a>
      @endif
      @if($page->id==149)
      <a href="{{url('digital')}}">How we help</a><a class="active" href="{{url('digital-case-studies')}}">Case studies</a><a href="{{url('digital-thinking')}}">Thinking</a><a href="{{url('digital-contact')}}">Contact</a>
      @endif
      @if($page->id==102)
      <a href="{{url('transformation')}}">How we help</a><a class="active" href="{{url('transformation-case-studies')}}">Case studies</a><a href="{{url('transformation-thinking')}}">Thinking</a><a href="{{url('transformation-contact')}}">Contact</a>
      @endif
      @if($page->id==150)
      <a href="{{url('marketing')}}">How we help</a><a class="active" href="{{url('marketing-case-studies')}}">Case studies</a><a href="{{url('marketing-thinking')}}">Thinking</a><a href="{{url('marketing-contact')}}">Contact</a>
      @endif
      
      </div>

      <div class="share_block pull-left">
        <div class="share_btn">Share</div>
      <div class="share_icon">
      <ul>
      <li data-bgcolor="#0077b7"><a href="https://www.linkedin.com/company/kanvic-consulting-private-limited" class="linkedin" target="_blank"><img src="resources/assets/images/linkdin.png"></a></li>
      <li data-bgcolor="#50abf1"><a href="https://twitter.com/Kanvic?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="twitter" target="_blank"><img src="resources/assets/images/twitter.png"></a></li>
      <li data-bgcolor="#3a559f"><a href="https://www.facebook.com/kanvicconsulting/" class="facebook" target="_blank"><img src="resources/assets/images/facebook.png"></a></li>
      <li data-bgcolor="#2d99ed"><a href="mailto:careers@kanvic.com" class="envelope"><img src="resources/assets/images/mail.png"></a></li>
       </ul>
       </div>
    </div>
    </div>
</div>
   </div>
  </div>




<div class="inner-banner about_banner">    
    <div class="container text-center">
    <h1 class="banner-title1"><span style="color:#{{$page->color}}">{!!$page->parent_title!!}</span><br />Case Studies</h1>
    <h2 class="banner-title">Only results. Nothing else.</h2>
    <h6 class="sub-title">We create outsized client impact through our uniquely adaptive and highly collaborative approach. Learn more about our client success stories through our most recent case studies.</h6>
    </div>
</div>

<div class="case_study_landing">
  <div class="container" id="all_cs_page">
      {!!$data['services_cs']!!}
    </div>
</div>

<div class="expertise-think_block">
  <div class="container">
  <div class="text-center">
    <h2 class="section-title text-uppercase thinktab">THINKING</h2>
    <h2 class="sub-heading">Our latest perspectives on<br /> strategy.</h2>
    <h6>At Kanvic we design strategies that are adaptive, impactful & implementable.</h6>
    @if($page->id==148)
    <a href="{{url('strategy-thinking')}}" class="btn">Read More<i class="fa fa-angle-right"></i></a>
    @endif
    @if($page->id==149)
    <a href="{{url('digital-thinking')}}" class="btn">Read More<i class="fa fa-angle-right"></i></a>
    @endif
    @if($page->id==102)
    <a href="{{url('transformation-thinking')}}" class="btn">Read More<i class="fa fa-angle-right"></i></a>
    @endif
    @if($page->id==150)
    <a href="{{url('marketing-thinking')}}" class="btn">Read More<i class="fa fa-angle-right"></i></a>
    @endif
</div>
  </div>
</div>

<div class="talk-to-our-block clearfix expertise_talk_block mt-90">
<div class="container">

  <div class="pull-left col-sm-offset-2"><img class="talkto-img" src="resources/assets/images/talk-to-our.jpg" /></div>
  <div class="pull-left col-sm-offset-1">
  <h2 class="sub-heading text-center" style="text-align:left;">Talk to our team on<br />how we can help you.</h2>
  @if($page->id==148)
  <a href="{{url('strategy-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  @endif
   @if($page->id==149)
  <a href="{{url('digital-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  @endif
  @if($page->id==102)
  <a href="{{url('transformation-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  @endif
  @if($page->id==150)
  <a href="{{url('marketing-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
  @endif
  </div>
</div>
</div>


@endsection

@section('js')






@endsection