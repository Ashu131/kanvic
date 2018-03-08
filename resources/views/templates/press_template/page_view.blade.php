@extends('templates.inner_template.master')

@section('css')
<style>
.expertise_think-1{position: relative;}
.expertise_think-2{padding-left:0 !important;}
.expertise_thinkblock .img-innertxt{z-index: 2;background: rgba(0,0,0,0.4);position: absolute;bottom:0;width:100%;}
.grey_matter_block {
    position: relative;
}

</style>
@endsection
@section('content')
<div class="innercontent">
<div class="banner-btm clearfix expertise-top-titlebar">
  <div class="container">
  <div class="sub_menu_tray">
    <div class="pull-left banner_lft_title">{{$page->page_header}}</div>
    <div class="pull-right">
    <div class="right_menu_link pull-left ">
    @if($page->id==115)
      <a href="{{url('strategy')}}">How we help</a><a href="{{url('strategy-case-studies')}}">Case studies</a><a href="{{url('strategy-thinking')}}" class="active">Thinking</a><a href="{{url('strategy-contact')}}">Contact</a>
    @endif
    @if($page->id==151)
      <a href="{{url('digital')}}">How we help</a><a href="{{url('digital-case-studies')}}">Case studies</a><a href="{{url('digital-thinking')}}" class="active">Thinking</a><a href="{{url('digital-contact')}}">Contact</a>
    @endif
        @if($page->id==152)
      <a href="{{url('transformation')}}">How we help</a><a href="{{url('transformation-case-studies')}}">Case studies</a><a href="{{url('transformation-thinking')}}" class="active">Thinking</a><a href="{{url('transformation-contact')}}">Contact</a>
    @endif
        @if($page->id==153)
      <a href="{{url('marketing')}}">How we help</a><a href="{{url('marketing-case-studies')}}">Case studies</a><a href="{{url('marketing-thinking')}}" class="active">Thinking</a><a href="{{url('marketing-contact')}}">Contact</a>
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
      <h1 class="banner-title1">Grey Matter on {!!$page->parent_title!!}</h1>
    <h2 class="banner-title">Matters. The most.</h2>
    <h6 class="sub-title">Kanvic Grey Matter showcases our latest management thinking on today’s most critical business issues.</h6>
      
</div>
</div>
      <div class="case_study_landing expertise_thinkblock">
        <div class="container">
{!!$data['thinking_data']!!}
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
        @if($page->id==115)
        <a href="{{url('strategy-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
        @endif
        @if($page->id==151)
         <a href="{{url('digital-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a> 
        @endif
    @if($page->id==152)
    <a href="{{url('transformation-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a> 
    @endif
     @if($page->id==153)
     <a href="{{url('marketing-contact')}}" class="btn">Get in Touch<i class="fa fa-angle-right"></i></a>
     @endif
          </div>  
</div>
</div>






</div>
@endsection

@section('js')


@endsection