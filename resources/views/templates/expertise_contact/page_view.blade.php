@extends('templates.inner_template.master')

@section('content')
<div class="banner-btm clearfix show_bar">
  <div class="container">
  <div class="about_sub_menu">
  @if($page->id==144)
    <div class="pull-left banner_lft_title">Contact us</div>
@elseif($page->id==145)
<div class="pull-left banner_lft_title">Contact us</div>
@elseif($page->id==146)
<div class="pull-left banner_lft_title">Contact us</div>
@else
<div class="pull-left banner_lft_title">Contact us</div>
@endif

    <div class="pull-right">
      <div class="pull-left right_menu_link">
          @if($page->id==144)
        <a href="{{url('transformation')}}">How we help</a>
        <a href="{{url('transformation-case-studies')}}">Case studies</a>
        <a href="{{url('transformation-thinking')}}">Thinking</a>
        <a href="{{url('transformation-contact')}}">Contact</a>
        @endif
        @if($page->id==145)
        <a href="{{url('strategy')}}">How we help</a>
        <a href="{{url('strategy-case-studies')}}">Case studies</a>
        <a href="{{url('strategy-thinking')}}">Thinking</a>
        <a href="{{url('strategy-contact')}}">Contact</a>
        @endif
        @if($page->id==146)
         <a href="{{url('digital')}}">How we help</a>
        <a href="{{url('digital-case-studies')}}">Case studies</a>
        <a href="{{url('digital-thinking')}}">Thinking</a>
        <a href="{{url('digital-contact')}}">Contact</a>
        @endif
        @if($page->id==147)
         <a href="{{url('marketing')}}">How we help</a>
        <a href="{{url('marketing-case-studies')}}">Case studies</a>
        <a href="{{url('marketing-thinking')}}">Thinking</a>
        <a href="{{url('marketing-contact')}}">Contact</a>
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

<div class="inner-banner contact-banner">    
    <div class="container text-center">
        <h1 class="banner-title1">Contact Us</h1>
        <h2 class="banner-title">Connect. Meet. Move.</h2>
        <h6 class="sub-title">Discover how our highly customised solutions can create impactful and long-lasting results for your business.</h6>
    </div>
    <div class="bannerimg"><img class="img-responsive" src="{{url('resources/assets/images/contact-banner.jpg')}}"></div>
</div>
<div id="page_{{$page->id}}" class="innercontent">
<section id="contact-section-1">
    <div class="container">
    <div class="col-sm-11 row">
                <h5 class="contact-sub-heading">We serve clients right across India as well as leading international companies from around the world. We have particularly deep experience supporting companies from the UK and France on India entry and have consultants from both these markets in our team.</h5>

        <h5 class="contact-sub-heading">To talk to our @if($page->id==144)transformation @endif @if($page->id==145)strategy @endif @if($page->id==146)digital @endif @if($page->id==147)marketing @endif experts about how we can help please complete the details below.</h5>
        <h5>Our team will contact you shortly to take the conversation forward.</h5>
    </div>
    </div>
</section>
    

<section id="contact-section-form">
    <div class="container">
    <div class="row">
        
        <div class="col-sm-12">
        <div class="row">
            {!!$data['contact_form']!!}
        </div>
        </div>
        </div>
    </div>
    
</section>
</div>

<div class="individual_how_work background_color mt-90 mb-85 contact_list">
     <div class="container">
     <div class="text-center">
     <h2 class="sub-heading text-center">Our Presence</h2>
     </div>
      <div class="individual_worklist">
      <div class="about_people_list">
      <div class="col-sm-5 lfttxt"><h4>Delhi NCR</h4></div>
      <div class="col-sm-6 righttxt text-justify">
        <h6>Level 6 JMD Regent Square<br />
MG Road,<br /> Gurgaon - 122002<br /><br />
Phone: <a href="tel:+91 124 4711 939">+91 124 4711 939</a>
</h6></div>
      </div>
      <div class="about_people_list">
      <div class="col-sm-5 lfttxt"><h4>Mumbai</h4></div>
      <div class="col-sm-6 righttxt text-justify">
        <h6>Ksheetij Patel<br /><br />
        Phone: <a href="tel:+91 8850288205">+91 8850288205</a> 
<br /><br />
Email: <a href="mailto:ksheetij@kanvic.com" target="_top">ksheetij@kanvic.com</a></h6>
      </div>
      </div>
      <div class="about_people_list"> 
      <div class="col-sm-5 lfttxt"><h4>London</h4></div>
      <div class="col-sm-6 righttxt text-justify">
      <h6>Gehan Wanduragala<br /><br />
        Phone: <a href="tel:+44 7825160716">+44 7825160716</a> 
<br /><br />
Email: <a href="mailto:gehan@kanvic.com" target="_top">gehan@kanvic.com</a></h6>
      </div>
    </div>

      <div class="about_people_list"> 
      <div class="col-sm-5 lfttxt"><h4>Paris</h4></div>
      <div class="col-sm-6 righttxt text-justify">
      <h6>Vlad Flamind<br /><br />
       Phone: <a href="tel:+33 762451907">+33 762451907</a> 
<br /><br />
Email: <a href="mailto:vlad@kanvic.com" target="_top">vlad@kanvic.com</a></h6>
      </div>
    </div>


  </div>
</div>
</div>


<div class="innercontent">
<div class="expertise-study_block mt-0 mb-85">
  <div class="container">
  <div class="col-sm-12 text-center">
    <h2 class="section-title text-uppercase">CASE STUDIES</h2>
    <h2 class="sub-heading">See how our work makes an impact.</h2>
    <h6>At Kanvic we design strategies that are adaptive, impactful and implementable.</h6>
    @if($page->id==144)
    <a href="transformation-case-studies" class="btn">View Transformation Case Studies<i class="fa fa-angle-right"></i></a>
    @elseif($page->id==145)
    <a href="strategy-case-studies" class="btn">View Strategy Case Studies<i class="fa fa-angle-right"></i></a>
    @elseif($page->id==146)
    <a href="digital-case-studies" class="btn">View Digital Case Studies<i class="fa fa-angle-right"></i></a>
    @else
    <a href="marketing-case-studies" class="btn">View Marketing Case Studies<i class="fa fa-angle-right"></i></a>
    @endif
    </div>
  </div>
</div>





    
</div>











 @endsection

@section('js')
<script>
$(document).ready(function(){

    baseurl = $('.baseurl').text();

        $.get(baseurl+'/captcha_src',function(data){
    $('#captcha').attr('src',data)
            });

$('#refresh').click(function(){
    $.get(baseurl+'/captcha_src',function(data){
    $('#captcha').attr('src',data)
            });

});
});
    </script>
@endsection
            <!--contact us-->
