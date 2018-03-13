<footer>
	<div class="container footer-container">
		<div class="footer-logo"><img src="{{url('resources/assets/images/footer-logo.png')}}" /></div>
		<div class='col-sm-12'>
		<div class="row">
			<div class="col-sm-7 row" id="footer-menu">
			<div class="footer-menu">
			<div class="col-sm-3 row footer-block">
				<h3>About</h3>
				<ul>
					<li class="{{isActiveRoute('who-we-are')}}"><a href="{{url('who-we-are')}}">Who we are</a></li>
					<li class="{{isActiveRoute('what-we-do')}}"><a href="{{url('what-we-do')}}">What we do</a></li>
					<li class="{{isActiveRoute('our-approach')}}"><a href="{{url('our-approach')}}">Our approach</a></li>
					<li class="{{isActiveRoute('our-journey')}}"><a href="{{url('our-journey')}}">Our journey</a></li>
				</ul>
			</div>
			<div class="col-sm-3 row footer-block">
				<h3>Expertise</h3>
				<ul>
					<li class="{{isActiveRoute('strategy')}}"><a href="{{url('strategy')}}">Strategy</a></li>
					<li class="{{isActiveRoute('digital')}}"><a href="{{url('digital')}}">Digital</a></li>
					<li class="{{isActiveRoute('transformation')}}"><a href="{{url('transformation')}}">Transformation</a></li>
					<li class="{{isActiveRoute('marketing')}}"><a href="{{url('marketing')}}">Marketing</a></li>
				</ul>
			</div>

			<div class="col-sm-3 row footer-block">
				<h3>industries</h3>
				<ul>
					<li class="{{isActiveRoute('consumer-goods')}}"><a href="{{url('consumer-goods')}}">Consumer Goods</a></li>
					<li class="{{isActiveRoute('retail')}}"><a href="{{url('retail')}}">Retail</a></li>
					<li class="{{isActiveRoute('healthcare')}}"><a href="{{url('healthcare')}}">Healthcare</a></li>
					<li class="{{isActiveRoute('industrial-goods')}}"><a href="{{url('industrial-goods')}}">Industrial Goods</a></li>
				</ul>
			</div>
			<div class="col-sm-3 row footer-block">
				<h3>INSIGHTS</h3>
				<ul>
					<li class="{{isActiveRoute('case-studies')}}"><a href="{{url('case-studies')}}">Case Studies</a></li>
					<li class="{{isActiveRoute('grey-matter')}}"><a href="{{url('grey-matter')}}">Grey Matter</a></li>
				</ul>
			</div>

			</div>
			<div class="footer-menu mb-0">
				<div class="col-sm-3 row footer-block">
				<h3>Contact</h3>
				<ul>
					<li><a href="{{url('career')}}">Careers</a></li>
					<li class="{{isActiveRoute('contact-us')}}"><a href="{{url('contact-us')}}">Contact us</a></li>
				</ul>
			</div>
				
					</div>
				
		</div>
			<div class="col-sm-5" id="newsletter-block">
				<h3>Sign up for Email alerts:</h3>
				<div class="newsletter-sub">
					<input type="text" class="" placeholder="Email Address">
					<div class="error_msg"><span class="text-danger clearfix" style="display: none;">Invalid Email</span></div>
					<!--<input type="submit" value="Submit" class="" id="submitbtn">-->
					<button class="" id="submitbtn" type="button" data-url="{{url('subscribe-newsletter')}}" data-token="{{csrf_token()}}">Submit</button>
				</div>
				<div class="footer-social"><span>Follow Us on:</span>
				<a href="https://www.linkedin.com/company/kanvic-consulting-private-limited" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="https://twitter.com/Kanvic?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="https://www.facebook.com/kanvicconsulting/" target="_blank"><i class="fa fa-facebook"></i></a>
				</div>
			</div>
			</div>
		</div>
	</div>
</footer>

<div id="mobile_share_popup"></div>

<div class="hide baseurl">{{url('')}}</div>
<script type="text/javascript" src="{{url('resources/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('resources/assets/js/bootstrap.min.js')}}"></script>
<script>
$('.panel-title a').click(function() {
	var num = $(this).attr('href').replace('#collapse', '');
	$(".approachlft img").hide();
	$(".approachlft img").eq(num-1).show();
    $('.panel-title').removeClass('active');
    if(!$(this).closest('.panel').find('.panel-collapse').hasClass('in'))
        $(this).parents('.panel-title').addClass('active');
 });
	

</script>


