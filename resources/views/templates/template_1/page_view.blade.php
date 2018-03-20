@extends('templates.template_1.master')
@section('css')
<link rel='stylesheet' href="{{url('resources/assets/css/owl.carousel.min.css')}}" type='text/css' media='all' />
<style>
.panel-default>.panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #e4e5e7;
  padding: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.panel-default>.panel-heading a {
  display: block;
  padding: 10px 0px;
}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
  color:#de6422;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
}

.panel-default>.panel-heading a[aria-expanded="true"]:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.accordion-option {
  width: 100%;
  float: left;
  clear: both;
  margin: 15px 0;
}

.accordion-option .title {
  font-size: 20px;
  font-weight: bold;
  float: left;
  padding: 0;
  margin: 0;
}

.accordion-option .toggle-accordion {
  float: right;
  font-size: 16px;
  color: #6a6c6f;
}

.accordion-option .toggle-accordion:before {
  content: "Expand All";
}

.accordion-option .toggle-accordion.active:before {
  content: "Collapse All";
}


</style>
@endsection
@section('content')
<section  id="section-1" class="homebanner top-banner">
  <div class="container text-center">
  <h1>
    Creating adaptive strategies.
  </h1>
  <div class="home-banner-txt font-21">
  <p>We are a pioneering management consulting firm,</p>
  <p>collaborating with visionary leaders to achieve outsized business impact.</p>

  </div>
  <a href="{{url('what-we-do')}}" class="btn">What we do<i class="fa fa-angle-right"></i></a>
  <a href="{{url('our-approach')}}" class="btn">Our approach<i class="fa fa-angle-right"></i></a>
  </div>
</section>
<div class="bannerimg" id="home_banner"><img class="img-responsive" src="resources/assets/images/home-banner.jpg"></div>

<section id="section-industries">
  <div class="container"> 
    <div class="text-center">
      <h2 class="section-title text-uppercase">Expertise</h2>
      <p class="sub-heading text-center">Where we help.</p>
      <p class="second-par">We provide expert advice to C-level executives on their toughest strategic issues.</p>
      <div class="industries-list" id="industries-list">
        <ul>
          <li>
            <h2><a href="{{url('strategy')}}">Strategy</a></h2>
          </li>
          <li>
            <h2><a href="{{url('digital')}}">Digital</a></h2>
          </li>
          <li>
            <h2><a href="{{url('transformation')}}">Transformation</a></h2>
          </li>
          <li>
            <h2><a href="{{url('marketing')}}">Marketing</a></h2>
          </li>
        </ul>

      </div>
    </div>
    </div>


</section>

<section id="section-case-study" class="background_color">
   <!--<div class="container">-->
     <div class="col-sm-5" id="imglft">
     <div class="row">
    <img class="img-responsive" src="{{url('resources/assets/images/home-cs.jpg')}}" />
    </div>
  </div>
    <div class='col-sm-5 col-sm-offset-1 rblock'>
      <h2 class="case-title text-uppercase">Case Study</h2>
      <p class="sub-heading font-60">Setting an FMCG player on the path to a digital future.</p>
     <!-- <p class="font-21">Securing future growth for an industrial goods manufacturer by achieving performance excellence.</p>-->
      <a href="{{url('case-studies/digital-live')}}" class="btn">Learn More<i class="fa fa-angle-right"></i></a>
   </div>
    <!--</div>-->
  
</section>
<section id="thinking-block">
<div class="parallax-container">
    <div class="parallax"><img src="resources/assets/img/modules/article/banner/VbARj9.jpg"></div>
  </div>
    <div class="homethink_blayer">
  <div class="parallax-text">
  <div class="container home-think-text">
  <div class='col-sm-12 col-xs-12'>
    <h2 class="case-title">THINKING</h2>
    <p class="sub-heading">How India Inc. should think about digital</p>
    <p class="font-21">Indian executives can turn digital from a buzzword into a business imperative by thinking differently in three key aspects</p>

    <a href="{{url('grey-matter/How-India-Inc-should-think-about-digital')}}" class="btn">Read More<i class="fa fa-angle-right"></i></a>
  </div>
  </div>
  </div>
  </div>
</section>

<div class="talk-to-our-block clearfix home_talk_to"> 
  <div class="container mt-90">  
    <div class="pull-left col-sm-offset-2"><img class="talkto-img" src="resources/assets/images/talk-to-our.jpg"></div>
    <div class="pull-left col-sm-offset-1 rblock">  
      <h2 class="sub-heading text-center" style="text-align:left;">Talk to us.</h2>
      <p>Start your journey to success with Kanvic.</p>
      <a href="{{url('contact-us')}}" class="btn">Get in touch<i class="fa fa-angle-right"></i></a>
    </div>  
  </div>
</div>

<section id="section-twitter" class="background_color">
  <div class="container text-center">
  <p class="font-italic"><i class="fa fa-twitter"></i> Despite challenges in many industries, there are firms in every sector that achieved #breakthroughgrowth last year.</p>
  <p class="font-italic twitter-link"><a href="http://bit.ly/2iVbxky" target="_blank">http://bit.ly/2iVbxky</a></p>
  </div>
</section>

<section id="section-join-kanvic">
  <div class="container">
    <div class="col-sm-5">
    <p class="sub-heading">Come and build a firm of the future.</p>
    <p>Pursue your career in consulting at Kanvic.<!--<i class="fa fa-long-arrow-right modal_arrow" data-toggle="modal" data-target="#exampleModal"></i>--></p>
    <a href="{{ route('career.page') }}" class="btn" >Join us<i class="fa fa-angle-right"></i></a>
    </div>
  </div>
</section>



{{--  <div class="modal fade career_popup" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Careers at Kanvic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Kanvic offers a unique opportunity for individuals who have a genuine passion for consulting, who are focussed on a long-term career in the field and who are inspired by the challenge of building a leading firm.</p>
        <p>&nbsp;</p>
        <p>We seek out candidates from diverse backgrounds, with multi-disciplinary skill sets and new perspectives, who will complement our team and contribute to the organisation’s future growth.</p>
        <h3>Despite this diversity, the right Kanvic candidate has several common traits:</h3>
        <ul>
          <li>A passion for consulting</li>
          <li>An entrepreneurial instinct and a high degree of self-motivation</li>
          <li>A collaborative mindset with a high level of maturity</li>
          <li>A thirst for continuous learning and self-improvement</li>
          <li>Long-term thinking</li>
          <li>High ethical standards</li>
          <li>Commitment</li>
        </ul>
        <h3>While a candidate’s attitude is our primary filter, we also assess their:</h3>
        <ul>
          <li>Understanding of business</li>
          <li>Problem solving ability</li>
          <li>Logical thinking</li>
          <li>Written and spoken communication skills</li>
          <li>Creativity</li>
        </ul>
        <p id="how_join">How to join</p>
        <p>At Kanvic we recruit consultants through our unique six month traineeship in strategy consulting.</p>
        <p>&nbsp;</p>
        <p>We also offer six month and two month in-study internships for students looking to gain first-hand experience of the consulting role.</p>
        
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Post Study Traineeships at Kanvic
        </a>
      </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
        <p>For graduates and experienced professionals seeking to build a long-term career in strategy consulting, Kanvic’s six month Associate Consultant traineeship offers an accelerated path to partnership in the firm.</p>
        <p>&nbsp;</p>
        <p>Over the six months the candidate is continually evaluated to assess their fit to join the Kanvic team as an Associate Consultant.</p>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          In Study Internships at Kanvic
        </a>
      </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <h3>6- Month Internship</h3>
        <p>Kanvic offers 6 month Junior Consultant internships in strategy consulting to Indian and international students enrolled at leading universities and business schools, who are seeking to gain practical exposure to the consulting role.</p>
        <p>&nbsp;</p>
        <p>This internship can form part of a student’s academic programme or a ‘gap year’ between studies.</p>
        <p>&nbsp;</p>
        <p>Students undertaking Bachelors, Masters or MBA in a relevant area of study in India or abroad can apply. Candidates in the pre-final or final year of their studies will be preferred.</p>
        <p>&nbsp;</p>
        <p>Upon successful completion of the internship, interested candidates may be assessed for their potential to join the Kanvic team on a permanent basis after completion of their studies.</p>
        <h3>2- Month Summer Internship</h3> 
        <p>Students at leading Indian universities and business schools can apply for a two month internship in strategy consulting at Kanvic as part of their academic programme.</p>
        <p>&nbsp;</p>
        <p>The two month internship is designed to provide a taster of consulting through collaborating in internal and client projects with our consulting teams.</p>
        </div>
      </div>
    </div>

  </div>



      </div>
      <div class="modal-footer">
<h3>All traineeship and internship positions are based at our Gurgaon (Delhi NCR) office.</h3>

<h3>To apply please send your CV (maximum 2 pages) and a one page letter of motivation explaining why you would like to join Kanvic to <a href="mailto:careers@kanvic.com">careers@kanvic.com</a></h3>
<h3>Please state the programme you wish to be considered for and your available start date in the email title.</h3>

      </div>
    </div>
  </div>
</div>  --}}


{{-- {!!$data['home_slider']!!} --}}
{{-- {!!$data['testimonial']!!} --}}
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r71/three.min.js"></script>
<!--  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
<script src="{{url('resources/assets/js/projector.js')}}" type="text/javascript"></script>
<script src="{{url('resources/assets/js/owl.carousel.js')}}" type="text/javascript"></script>
<script src="{{url('resources/assets/js/materialize.js')}}" type="text/javascript"></script>

<script>



$(document).ready(function() {

  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
     
});








$(document).ready(function(){
      $('.parallax').parallax();
    });


$(document).ready(function () {

    /* $('#bannerslider').owlCarousel({
        loop: true,
        margin: 0,
        nav:true,
        autoplay:false,
        autoPlay: 3000,
        dots: false,
        autoplaySpeed:1300,
        navText: [ '', '' ],
        responsiveClass: true,
        responsive: {
                0: {
                    items: 1,
                  },
                  600: {
                    items: 1,
                  },
                  1000: {
                    items: 1,
                    margin: 0,
                  }
                }
        })*/
       /*  $('#testimonial-slide').owlCarousel({
        loop: true,
        margin: 0,
        nav:true,
        autoplay:false,
        autoPlay: 3000,
        autoplaySpeed:1300,
        navText: [ '', '' ],
        responsiveClass: true,
        responsive: {
                0: {
                    items: 1,
                  },
                  600: {
                    items: 1,
                  },
                  1000: {
                    items: 1,
                    margin: 0,
                  }
                }
        })*/

}); 

</script>
@endsection
