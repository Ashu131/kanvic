@extends('ashutosh.career_app')
@section('content')
    <div class="banner-btm clearfix large-bannerbtm">
	<div class="container">
		<div class="sub_menu_tray">
			<div class="pull-left banner_lft_title">Carrers</div>
			<div class="pull-right">
				<div class="right_menu_link pull-left ">
					<a href="contact-us">Contact Us</a>
				</div>
				<div class="share_block pull-left">
					<div class="share_btn">Share</div>
					<div class="share_icon">
						<ul>
							<li data-bgcolor="#0077b7"><a class="linkedin" href="https://www.linkedin.com/company/kanvic-consulting-private-limited" target="_blank"><img src="{{ asset('resources/assets/images/linkdin.png') }}" alt="" /></a></li>
							<li data-bgcolor="#50abf1"><a class="twitter" href="https://twitter.com/Kanvic?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><img src="{{ asset('resources/assets/images/twitter.png') }}" alt="" /></a></li>
							<li data-bgcolor="#3a559f"><a class="facebook" href="https://www.facebook.com/kanvicconsulting/" target="_blank"><img src="{{ asset('resources/assets/images/facebook.png') }}" alt="" /></a></li>
							<li data-bgcolor="#2d99ed"><a class="envelope" href="mailto:careers@kanvic.com"><img src="{{ asset('resources/assets/images/mail.png') }}" alt="" /></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="inner-banner about_banner">
	<div class="container text-center retail_heading">
		<h1 class="banner-title1">Careers</h1>
		<h2 class="banner-title">Come and build a firm of the<br> future.</h2>
		<h6 class="sub-title">
			We seek out people from diverse backgrounds who are not only looking to experience the highest quality of consulting but also help us build a platform where people with a passion for consulting can explore their true potential.
        </h6>
	</div>
</div>
<div class="bannerimg"><img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/career.jpeg') }}" alt="" /></div>
<div class="individual_how_work mb-85 who_people_list" style="padding-top: 100px;">
	<div class="container">
		{{--  <h2 class="section-title text-uppercase text-center">KEY ISSUES</h2>  --}}
		<div class="text-center">
			<h2 class="sub-heading text-center">Our vision.</h2>
			<div class="col-sm-10 howworktxt">
				<p>
                    At Kanvic we are building a new kind of consulting firm from the ground up.
                </p>
			</div>
		</div>
    </div>
	<div class="container-fluid carrer_what_we_block">
		<div class="row">
			<div class="col-xs-4">
				<h2 class="career-sub-heading">A firm of the future</h2>
				<p>
					Providing advice may be one of the oldest professions but the demands of today&apos;s world require a very different kind of consultant. We are building a consulting firm that combines the unique spark of human ingenuity and the incredible potential of technology to meet our clients&apos; fast-changing needs.
				</p>
			</div>
			<div class="col-xs-4">
				<h2 class="career-sub-heading">A team of partners</h2>
				<p>
					We believe that a traditional employer-employee relationship cannot tap people&apos;s true potential in today&apos;s world. Hence we are building a firm of highly motivated and entrepreneurial partners who collaborate on a common platform to realise their full potential.
				</p>
			</div>
			<div class="col-xs-4">
				<h2 class="career-sub-heading">An enduring institution</h2>
				<p>
					We are building a firm that will endure for years to come. So while our thinking is constantly evolving, our values are constant and our actions are always grounded in a long-term outlook.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="innersection-1 about-what-block1 background_color" style="padding-bottom: 0px; margin-bottom: 0px;">
	<div class="container">
		{{--  <h2 class="section-title text-uppercase text-center">HOW WE HELP</h2>  --}}
		<h2 class="sub-heading text-center">What we’re looking for.</h2>
		<div class="col-sm-10 ourvalues text-center">
			<p>
				To help us realise our vision, we are in search of candidates from diverse backgrounds,<br>with multi-disciplinary skill-sets and new perspectives, who can positively<br>answer three important questions:
			</p>
		</div>
	</div>
</div>
<div class="individual_worklist about_values_list background_color" style="margin-top: 0px; padding-top:20px; text-align:initial">
	<div class="container-fluid carrer_what_we_block">
		<div class="row">
			<div class="col-xs-4">
				<h2 class="career-sub-heading">Do you have a passion for consulting?</h2>
				
			</div>
			<div class="col-xs-4">
				<h2 class="career-sub-heading">Do you want to lead like an owner?</h2>
				
			</div>
			<div class="col-xs-4">
				<h2 class="career-sub-heading">Do you want to build an enduring organisation?</h2>
				
			</div>
		</div>
		<h2 class="section-title text-uppercase text-center">Key attributes</h2>
		{{--  Key Skills Tabs  --}}
		<section>
			<div class="tabs tabs-style-line">
				<nav>
					<ul>
						<li><a href="#section-line-1"><span>Entrepreneurial Instinct</span></a></li>
						<li><a href="#section-line-2"><span>Learning Orientation</span></a></li>
						<li><a href="#section-line-3"><span>Logical Thinking</span></a></li>
						<li><a href="#section-line-4"><span>Problem-Solving Ability</span></a></li>
						<li><a href="#section-line-5"><span>Collaborative Mindset</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<section id="section-line-1">
						<div class="col-xs-2 col-xs-offset-2">
							<img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/brain.jpg') }}" alt="" />
						</div>
						<div class="col-xs-6">
							<p>
								We expect everyone in our team to think like owners and act at start-up speed. Hence, we seek out individuals who have an instinct for spotting opportunities, quickly building relevant capabilities and executing effectively.
							</p>
						</div>
					</section>
					<section id="section-line-2">
						<div class="col-xs-2 col-xs-offset-2">
							<img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/brain.jpg') }}" alt="" />
						</div>
						<div class="col-xs-6">
							<p>
								We strive to be at the cutting-edge in everything we do. Therefore we look for candidates with a thirst for continuous learning and self-improvement. That are constantly motivated to push the boundaries of their own knowledge, of the firm&apos;s and of their field.
							</p>
						</div>
					</section>
					<section id="section-line-3">
						<div class="col-xs-2 col-xs-offset-2">
							<img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/brain.jpg') }}" alt="" />
						</div>
						<div class="col-xs-6">
							<p>
								A rigorous and structured approach is essential to identifying the root causes of our clients&apos; problems. As a result, we require candidates who can demonstrate a high level of logical reasoning.
							</p>
						</div>
					</section>
					<section id="section-line-4">
						<div class="col-xs-2 col-xs-offset-2">
							<img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/brain.jpg') }}" alt="" />
						</div>
						<div class="col-xs-6">
							<p>
								Our clients hire us to solve their toughest strategic problems. Therefore we look for people who can apply creativity, persistence, and innovation to develop unique solutions to the most complex problems.
							</p>
						</div>
					</section>
					<section id="section-line-5">
						<div class="col-xs-2 col-xs-offset-2">
							<img class="img-responsive" src="{{ asset('resources/assets/img/modules/career/brain.jpg') }}" alt="" />
						</div>
						<div class="col-xs-6">
							<p>
								We are able to deliver unparalleled impact in our clients&apos; organisations thanks to the unique combination of skill-sets we bring to their problems and the highly collaborative way we work with their teams. Consequently, we always look for people who can demonstrate a high level of emotional intelligence and a strong team ethic.
							</p>
						</div>
					</section>
				</div>
			</div>
		</section>
	</div>
</div>
{{--  Career Page Bottom Tabs  --}}
<div class="individual_how_work mb-85 who_people_list" style="padding-top: 100px;">
	<div class="container" style="margin-bottom: 100px;">
		<div class="text-center">
			<h2 class="sub-heading text-center">How to join us.</h2>
			<div class="col-sm-10 howworktxt">
				{{--  <p>
                    We believe that at its heart any business is all about its people. At Kanvic we are<br>
					building a firm with a single overarching purpose - to explore people&apos;s true<br>
					potential - whether in our clients&apos; organisations or our own.
                </p>  --}}
			</div>
		</div>
    </div>
	<div class="container-fluid carrer_what_we_block">
		<section>
			<div class="tabs tabs-style-iconbox">
				<nav>
					<ul>
						<li><a href="#section-iconbox-1"><span>Associate Consultant<br>Traineeships</span></a></li>
						<li><a href="#section-iconbox-2"><span>Internships for<br>Indian Students</span></a></li>
						<li><a href="#section-iconbox-3"><span>Internships for<br>International Students</span></a></li>
					</ul>
				</nav>
				<div class="content-wrap">
					<section id="section-iconbox-1">
						<div class="col-xs-7 career_big_tabs">
							<h2 class="sub-heading">Associate Consultant Traineeship</h2>
							<h4>Mission</h4><br>
							<h5>
								The six month Associate Consultant Traineeship is the principal route to a full-time position at Kanvic. During the Traineeship, candidates gain a 360-degree exposure to the consulting role and Kanvic&apos;s unique culture.
							</h5><br>
							<h4>Opportunities</h4><br>
							<h5>
								Through a combination of live client projects, internal assignments and mentoring by senior team members, the candidate gains a thorough grounding in Kanvic&apos;s consulting approach and identifies the unique role they can play within the organisation.

								Over the course of six months, the candidate is continually evaluated to assess their fit to join the Kanvic team in a full-time position.

							</h5><br>
							<h4>Profile</h4><br>
							<h5>
								The Traineeship is open to candidates who have completed their undergraduate or postgraduate studies and have up to three years relevant professional experience.
							</h5>
						</div>
						<div class="col-xs-5">
							<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
						</div>
					</section>
					<section id="section-iconbox-2">
						<div class="col-xs-7 career_big_tabs">
							<h2 class="sub-heading">Internships for Indian Students</h2>
							<h4>Mission</h4><br>
							<h5>
								Kanvic&apos;s six-month internships in strategy consulting provide students with practical exposure to the role of strategy consultant before embarking on a career in the field.
							</h5><br>
							<h4>Opportunities</h4><br>
							<h5>
								During the course of the internship, the candidate has the opportunity to apply their course learning in real projects by:

									- Working on top management issues affecting leading companies
									- Working closely with highly experienced senior consultants
									- Working on a wide variety of projects covering different sectors and functions

									Upon successful completion of the internship, interested candidates may be assessed for their potential to join the Kanvic team on a permanent basis after completion of their studies.

							</h5><br>
							<h4>Profile</h4><br>
							<h5>
								Students undertaking Bachelors, Masters or MBA in a relevant area of study in India can apply. Candidates in the pre-final or final year of their studies will be preferred.
							</h5>
						</div>
						<div class="col-xs-5">
							<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
						</div>
					</section>
					<section id="section-iconbox-3">
						<div class="col-xs-7 career_big_tabs">
							<h2 class="sub-heading">Internships for International Students</h2>
							<h4>Mission</h4><br>
							<h5>
								Kanvic&apos;s six-month internship for international students provides a unique exposure to the role of a strategy consultant in the world&apos;s fastest-growing major economy.
							</h5><br>
							<h4>Opportunities</h4><br>
							<h5>
								International interns have the opportunity to apply their course learning in real projects through:

								- Working on top management issues affecting leading companies in India
								- Working alongside highly skilled senior consultants with extensive experience in India and around the world
								- Working on a wide variety of projects covering different sectors of the Indian economy and spanning multiple business functions

								Past international interns have come from leading academic institutions in countries including France, UK, Germany, Italy, and Russia.

							</h5><br>
							<h4>Profile</h4><br>
							<h5>
								Students undertaking Bachelors, Masters or MBA in a relevant area of study can apply. This internship can form part of a student’s academic programme or a ‘gap year’ between studies.
							</h5>
						</div>
						<div class="col-xs-5">
							<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
						</div>
					</section>
					
				</div>
			</div>
		</section>
	</div>
</div>
<div class="expertise-study_block mt-0 ">
	<div class="container">
		<div class="col-sm-12 text-center">
			{{--  <h2 class="section-title text-uppercase">CASE STUDIES</h2>  --}}
			<h2 class="sub-heading">Our talent testimonials.</h2>
			{{--  <h6>
			We believe that at its heart any business is all about its people. At Kanvic we are<br>
			building a firm with a single overarching purpose - to explore people&apos;s true<br>
			potential - whether in our clients&apos; organisations or our own.
			</h6>  --}}
			
		</div>
	</div>
	<div class="container-fluid carrer_what_we_block">
		<div class="row">
			<div class="col-xs-5">
				<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
			</div>
			<div class="col-xs-7 career_testimonial">
				<h4>
					&rdquo;
						My internship at Kanvic was an outstanding experience that gave me the opportunity to work on inspiring business cases and learn from brilliant colleagues. Additionally, it gave me a unique vantage point on the economy and the culture of this incredible country.
					&rdquo;
				</h4>
				<p>
					Nicolas Degroote<br>
					EDHEC, France

				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-7 career_testimonial">
				<h4>
					&rdquo;
						During my internship at Kanvic, I was able to apply all the theoretical knowledge and frameworks I had studied in the first year of my MBA. The learning curve was exponential, helping me develop a structured approach to solving business problems. However, the best part was the great work culture and people. I could reach out to anyone at anytime and my colleagues would be more than happy to help me out.
					&rdquo;
				</h4>
				<p>
					Javed Alam,<br>
					IIM Indore, IIT Kharagpur

				</p>
			</div>
			<div class="col-xs-5">
				<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5">
				<img src="{{ asset('resources/assets/img/modules/career/human.jpg') }}" alt="">
			</div>
			<div class="col-xs-7 career_testimonial">
				<h4>
					&rdquo;
						I am grateful for the opportunity to have worked at Kanvic and would definitely recommend this company to anyone looking for a great professional experience with very interesting projects and lots of learning in a multicultural environment. I wish Kanvic continued success.
					&rdquo;
				</h4>
				<p>
					Adèle,<br>
					EDHEC, France

				</p>
			</div>
		</div>
	</div>
</div>
	
@endsection