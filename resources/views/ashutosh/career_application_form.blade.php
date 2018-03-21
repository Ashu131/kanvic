@extends('ashutosh.career_form_app')
@section('content')
<div class="banner-btm clearfix large-bannerbtm">
	<div class="container">
		<div class="sub_menu_tray">
			<div class="pull-left banner_lft_title">Application Form</div>
		</div>
	</div>
</div>
<div class="inner-banner about_banner">
	<div class="container text-center retail_heading">
		<h1 class="banner-title1">Application Form</h1>
		{{--  <h2 class="banner-title">Come and build a firm of the<br> future.</h2>
		<h6 class="sub-title">
			We seek out people from diverse backgrounds who are not only looking to experience the highest quality of consulting but also help us build a platform where people with a passion for consulting can explore their true potential.
        </h6>  --}}
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
                            @foreach ($countries as $item)
                                <option value="{{$item->country_name}}" {{old('nationality')=="$item->country_name"?'selected':''}}>{{$item->country_name}}</option>
                            @endforeach
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

                    <div class="col-sm-12" id="phone">
                        <p>Phone :</p>
                        <input type='text' class='numeric' id="phone_code" name='phone_code' value="{{ old('phone_code') }}">
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
                        <p>Preferred end date :</p>
                        <span>(Choose only for internship)</span>
                        <input type="date" name="end_date" value="{{ old('end_date') }}">
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>Current Occupation :</p>
                        <input type='text' name='occupation' value="{{ old('occupation') }}">
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
                        <input type="text" name="recent_education" value="{{ old('recent_education') }}">
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
                        <p>Why do you want to join Kanvic?</p><span>(Maximum 250 words allowed.)</span>
                        <textarea name='question1' id="question1">{{ old('question1') }}</textarea>
                        @if ($errors->has('question1'))
                            <span class="help-block">
                                <strong style="color:red;">This field is required, Max 250 Words.</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-sm-12"/>
                        <p>What are your long-term career goals?</p><span>(Maximum 250 words allowed.)</span>
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