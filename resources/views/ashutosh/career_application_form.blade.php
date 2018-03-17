@extends('ashutosh.career_form_app')
@section('content')
<div class="banner-btm clearfix large-bannerbtm">
	<div class="container">
		<div class="sub_menu_tray">
			<div class="pull-left banner_lft_title">Application Form</div>
			<div class="pull-right">
				<div class="right_menu_link pull-left ">
					<a href="{{ route('career.show.form') }}">Contact Us</a>
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

<section id="contact-section-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ route('career.form.submit') }}" enctype="multipart/form-data" method="post" class="wpcf7-form contact-form">
                    {{ csrf_field() }}
                    <div class="col-sm-12"/>
                        <p>First Name :</p>
                        <input type='text'  name='fname' value="{{ old('fname') }}">
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Last Name :</p>
                        <input type='text'  name='lname' value="{{ old('lname') }}">
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Gender :</p>
                        <select name="gender">
                            <option value="">Select</option>
                            <option value="Male" {{ old('gender') == "Male"?'selected':''}}>Male</option>
                            <option value="Female" {{ old('gender') == "Female"?'selected':''}}>Female</option>
                            <option value="Other" {{ old('gender') == "Other"?'selected':''}}>Other</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Nationality :</p>
                        <select name="nationality">
                            <option value="">Select</option>
                            <option value="Indian" {{old('nationality')=="Indian"?'selected':''}}>Indian</option>
                            <option value="American" {{old('nationality')=="American"?'selected':''}}>American</option>
                        </select>
                        @if ($errors->has('nationality'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Email :</p>
                        <input type='email'  name='email' value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12" id="phone_code">
                        <p>Phone :</p>
                        <select name="phone_code">
                            <option value="91" {{old('phone_code')==91?'selected':''}}>+91</option>
                            <option value="92" {{old('phone_code')==92?'selected':''}}>+92</option>
                        </select>
                        @if ($errors->has('phone_code'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                        <input type='text' class='numeric' name='phone' value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Role applying for :</p>
                        <select name="career_role" id="career_role">
                            <option value="">Select</option>
                            <option value="Associate Consultant Traineeship" {{old('career_role')=="Associate Consultant Traineeship"?'selected':''}}>Associate Consultant Traineeship</option>
                            <option value="Internship for Indian students" {{old('career_role')=="Internship for Indian students"?'selected':''}}>Internship for Indian students</option>
                            <option value="Internship for international students" {{old('career_role')=="Internship for international students"?'selected':''}}>Internship for international students</option>                            
                        </select>
                        @if ($errors->has('career_role'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Area of interest :</p>
                        <select name="interest">
                            <option value="">Select</option>
                            <option value="Strategy" {{old('interest')=="Strategy"?'selected':''}}>Strategy</option>
                            <option value="Marketing" {{old('interest')=="Marketing"?'selected':''}}>Marketing</option>
                            <option value="Digital" {{old('interest')=="Digital"?'selected':''}}>Digital</option>
                            <option value="Finance" {{old('interest')=="Finance"?'selected':''}}>Finance</option>
                            <option value="Graphic Design" {{old('interest')=="Graphic Design"?'selected':''}}>Graphic Design</option>
                        </select>
                        @if ($errors->has('interest'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Preferred location :</p>
                        <select name="location">
                            <option value="Gurgaon, Delhi NCR">Gurgaon, Delhi NCR</option>
                        </select>
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Available start date :</p>
                        <input type="date" name="start_date" value="{{ old('start_date') }}">
                        @if ($errors->has('start_date'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Available end date :</p>
                        <input type="date" name="end_date" value="{{ old('end_date') }}">
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Duration available for :</p>
                        <span>Choose duration only for internship.</span>
                        <select name="duration">
                            <option value="">Select</option>
                            <option value="2 Months" {{old('duration')=="2 Months"?'selected':''}}>2 Months</option>
                            <option value="3 Months" {{old('duration')=="3 Months"?'selected':''}}>3 Months</option>
                            <option value="4 Months" {{old('duration')=="4 Months"?'selected':''}}>4 Months</option>
                            <option value="5 Months" {{old('duration')=="5 Months"?'selected':''}}>5 Months</option>
                            <option value="6 Months" {{old('duration')=="6 Months"?'selected':''}}>6 Months</option>
                        </select>
                        @if ($errors->has('duration'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Current Occupation :</p>
                        <textarea name='occupation'>{{ old('occupation') }}</textarea>
                        @if ($errors->has('occupation'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-5">
                        <p>Total years of work experience :</p>
                        <input type="text" name="experience" value="{{ old('experience') }}" class="numeric" id="experience">&nbsp;
                        <span style="font-size: x-large;">Years</span>
                        @if ($errors->has('experience'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Name of most recent educational institute :</p>
                        <textarea name='recent_education'>{{ old('recent_education') }}</textarea>
                        @if ($errors->has('recent_education'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12">
                        <p>Education level completed / pursuing currently :</p>
                        <select name="high_education">
                            <option value="">Select</option>
                            <option value="Bachelors" {{old('high_education')=="Bachelors"?'selected':''}}>Bachelors</option>
                            <option value="Masters" {{old('high_education')=="Masters"?'selected':''}}>Masters</option>
                            <option value="MBA" {{old('high_education')=="MBA"?'selected':''}}>MBA</option>
                            <option value="PhD" {{old('high_education')=="PhD"?'selected':''}}>PhD</option>
                        </select>
                        @if ($errors->has('high_education'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                        <p>Other :</p>
                        <input type="text" name="other_education" value="{{ old('other_education') }}">
                        @if ($errors->has('other_education'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        <h1 style="font-size: -webkit-xxx-large;">Key Questions</h1>
                    </div>

                    <div class="col-sm-12"/>
                        <p>Why do you want to join Kanvic?</p>
                        <textarea name='question1'>{{ old('question1') }}</textarea>
                        @if ($errors->has('question1'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required, Max 250 Words.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>What are your long-term career goals?</p>
                        <textarea name='question2'>{{ old('question2') }}</textarea>
                        @if ($errors->has('question2'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required, Max 250 Words.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12">
                        <h1 style="font-size: -webkit-xxx-large;">Attachments</h1>
                    </div>

                    <div class="col-sm-12"/>
                        <p>CV</p>
                        <input type="file" name="cv" value="{{ old('cv') }}">
                        @if ($errors->has('cv'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required, No more than 5MB.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Portfolio/others</p>
                        <input type="file" name="portfolio" value="{{ old('portfolio') }}">
                        @if ($errors->has('portfolio'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required, No more than 5MB.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Link to cloud storage</p>
                        <input type="text" name="link" value="{{ old('link') }}">
                        @if ($errors->has('link'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <input type='submit' value='Submit' name='Submit' id="career_submit">
                    </div>
                </form>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
    
</section>
    
@endsection