@extends('templates.inner_template.master')

@section('content')
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="wpb_wrapper">    
            <div class="vc_row wpb_row vc_row-fluid block block-fullwidth breadcrum">
                <div class="container">
                    <div class="wpb_wrapper breadcrum-panel">
                        {!!$data['breadcrumb']!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="innercontent container">
    <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">    
                    <div class="vc_row wpb_row vc_row-fluid block block-fullwidth">
                        <div class="container">
                            <h1 class="pageheading" style="@if($page->id_page==116) text-transform: inherit; @endif">{!!$page->page_header!!}</h1>
   @if($page->id_page==63)                 
        {!!$data['career_form']!!}
    @endif

@if($page->id_page==116)
<!-- home collection form -->
<div class="wpb_text_column">
     <div class="wpb_wrapper contact-form-panel">
        <form action="{{route('collection_submit')}}" method="post" id="collection-form" class="wpcf7-form contact-form" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        @if(Session::has('failure'))
        <p class="alert alert-danger">{{Session::get('failure')}}</p>
        @endif
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="patient_fname" class="form-control" id="patient_fname" placeholder="Patient First Name*" value="{{Input::old('patient_fname')}}">
                        <p class="text-danger">{{$errors->first('patient_first_name')}}</p>
                    </span>
                </div>
                <!--<div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="patient_lname" class="form-control" id="patient_lname" placeholder="Patient Last Name" value="{{Input::old('patient_lname')}}">
                        <p class="text-danger">{{$errors->first('patient_lname')}}</p>
                    </span>
                </div>-->
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="mobile" class="form-control numeric" id="mobile" placeholder="Mobile*" value="{{Input::old('mobile')}}">
                        <p class="text-danger">{{$errors->first('mobile')}}</p>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email ID*" value="{{Input::old('email')}}">
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    </span>
                </div>
            </div>
            <div class="row">
                <!--<div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="dob" class="form-control datepicker" placeholder="Date of Birth*">
                        <p class="text-danger">{{$errors->first('date_of_birth')}}</p>
                    </span>
                </div>-->
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <select class="form-control" id="city" name="city">
                        <option value="">Select city*</option>
                       <?php
                         $city = array(); 
                        ?>
                        @foreach($allcity as $single_project)
                        @if(!in_array($single_project->city, $city))
                        <?php array_push($city,$single_project->city);  ?>
                        <option value="{{$single_project->city}}">{{$single_project->city}}</option>
                        @endif
                       @endforeach
                        </select>
                        <p class="text-danger">{{$errors->first('city')}}</p>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="locality" class="form-control" id="locality" placeholder="Locality*" value="{{Input::old('locality')}}">
                        <p class="text-danger">{{$errors->first('locality')}}</p>
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <input type="text" name="home_collection_Date" class="form-control datepicker1" placeholder="Preferred Home Collection Date*">
                        <p class="text-danger">{{$errors->first('home_collection_date')}}</p>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mt15">
                    <span class="">
                        <select class="form-control" id="preferred_time" name="preferred_time">
                        <option value="">Preferred time*</option>
                        <option value="6 AM-8 AM">6 AM-8 AM</option>
                        <option value="8 AM-10 AM">8 AM-10 AM</option>
                        <option value="10 AM-12 PM">10 AM-12 PM</option>
                        <option value="12 PM-02 PM">12 PM-02 PM</option>
                        <option value="02 PM-04 PM">02 PM-04 PM</option>
                        <option value="04 PM-06 PM">04 PM-06 PM</option>
                        <option value="06 PM-08 PM">06 PM-08 PM</option>
                        <option value="08 PM-10 PM">08 PM-10 PM</option>
                        </select>
                        <p class="text-danger">{{$errors->first('preferred_time')}}</p>
                    </span>
                </div>
            </div>
            <div class="mt15">
                <span class="">
                    <textarea type="text" name="home_collection_address" rows="5" class="wpcf7-form-control" id="home_collection_address" placeholder="Home Collection Address*">{{Input::old('home_collection_address')}}</textarea>
                    <p class="text-danger">{{$errors->first('home_collection_address')}}</p>
                </span>
            </div>
            <div class="mt15">
                <span class="">
                    Name of the Test(s) / Packages to be done
                    <textarea type="text" name="test_done" rows="5" class="wpcf7-form-control" id="test_done" placeholder="Write test names separated by comma(,)">{{Input::old('test_done')}}</textarea>
                    <p class="text-danger">{{$errors->first('test_done')}}</p>
                </span>
            </div>
            <div class="mt15">
                <span class="">
                    Attach prescription
                    <input type="file" name="prescription">
                </span>
            </div>
            <button type="submit" class="mt15 wpcf7-form-control wpcf7-submit btn btn-primary btn-big">Submit</button>
    </form>
    </div>
</div>
@endif

@if($page->id_page==98)
<div class="hs_how_we_are mb-50" id="careerbanner">
    <div class="col-lg-12 col-md-12 col-sm-12 carbannerborder">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <img src="resources/assets/images/franchisee.png" alt="">
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="hs_how_we_are_text">
                <p style="font-size: 22px;line-height: 1.4;">If you are an entrepreneur or a laboratory which wished to learn to one of the brand - to earn returns in clinical chemistry business you can register here and we will pass it on to our channel partner who is presenr in your region.</p>
            </div>
                </div>
    </div>
</div>
   

    <div class="wpb_text_column">
            <div class="wpb_wrapper contact-form-panel">
                <p class="contact-heading hs_heading" style="font-size:20px;">"If you are an entrepreneur and wish to run a B.Lal Laboratory, you can register here."</p>
                 <div class="screen-reader-response"></div>
    <form action="{{route('submit.form',6)}}" method="post" id="franchisee-form" class="wpcf7-form contact-form">
{{csrf_field()}}
    @if(Session::get('form_id')==6)
@if(Session::has('success'))
<p class="alert alert-success" style="padding:20px 0 0 20px;">{{Session::get('success')}}</p>
@endif
@if(Session::has('failure'))
<p class="alert alert-danger">{{Session::get('failure')}}</p>
@endif
 @endif
 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{Input::old('name')}}">
                <p class="text-danger">{{$errors->first('name')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="mobile" class="form-control numeric" id="mobile" placeholder="Mobile No" value="{{Input::old('mobile')}}">
                <p class="text-danger">{{$errors->first('mobile')}}</p>
            </span>
        </div>
</div>

 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email ID" value="{{Input::old('email')}}">
<p class="text-danger">{{$errors->first('email')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="phone" class="form-control numeric" id="phone" placeholder="Landline No" value="{{Input::old('phone')}}">
                <p class="text-danger">{{$errors->first('phone')}}</p>
            </span>
        </div>
</div>
 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="current_professional" class="form-control" id="current_professional" placeholder="Current Professional" value="{{Input::old('current_professional')}}">
<p class="text-danger">{{$errors->first('current_professional')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Qualification" value="{{Input::old('qualification')}}">
                <p class="text-danger">{{$errors->first('qualification')}}</p>
            </span>
        </div>
</div>
 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="interest_location" class="form-control" id="interest_location" placeholder="Interest Location" value="{{Input::old('interest_location')}}">
<p class="text-danger">{{$errors->first('interest_location')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                    <select class="form-control" id="slider_select_dep" name="select_dep">
                          <option value="">Source how did you come to know Dr. B. lal</option>
                    </select>
           </span>
        </div>
</div>
 <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 mt15">
            <span class="">
                <select class="form-control" id="slider_select_dep" name="country">
                    <option value="">Country</option>
                    <option value="india">India</option>
                </select>
            </span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 mt15">
            <span class="">
              <input type="text" name="state" class="form-control" id="state" placeholder="Satate" value="{{Input::old('state')}}">

            </span>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 mt15">
            <span class="">
             <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{Input::old('city')}}">

            </span>
        </div>
</div>

<div class="mt15">
    <span class="">
      <textarea type="text" name="address" rows="5" class="wpcf7-form-control" id="address" placeholder="Address">{{Input::old('address')}}</textarea>
<p class="text-danger">{{$errors->first('address')}}</p>
</span>
</div>

<div class="mt15">
    <span class="">
      <textarea type="text" name="enquiry" rows="5" class="wpcf7-form-control" id="enquiry" placeholder="Enquiry Remark">{{Input::old('enquiry')}}</textarea>
<p class="text-danger">{{$errors->first('enquiry')}}</p>
</span>
</div>

<button type="submit" class="mt15 wpcf7-form-control wpcf7-submit btn btn-primary btn-big">Submit</button>
</form>
       </div>
        </div>
@endif
@if($page->id_page==106)
<div class="hs_how_we_are mb-50" id="corporatebanner">
    <div class="col-lg-12 col-md-12 col-sm-12 carbannerborder">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <img src="resources/assets/images/corporate.png" alt="">
        </div>
    </div>
</div>
<div class="wpb_column vc_column_container">
    <div class="wpb_wrapper">
        <div class="wpb_text_column wpb_content_element ">
            <div class="wpb_wrapper contact-form-panel">
                <p class="contact-heading hs_heading" style="font-size:20px;">To enquire the corporate special offers kindly furnish the below details. Our representative will contact you.</p>
                    <div role="form" class="" id="" >
                        <div class="screen-reader-response"></div>


    <form action="{{route('submit.form',3)}}" method="post" id="appointment-form" class="wpcf7-form contact-form">
{{csrf_field()}}
    @if(Session::get('form_id')==3)
@if(Session::has('success'))
<p class="alert alert-success" style="padding:20px 0 0 20px;">{{Session::get('success')}}</p>
@endif
@if(Session::has('failure'))
<p class="alert alert-danger">{{Session::get('failure')}}</p>
@endif
 @endif
 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{Input::old('name')}}">
                <p class="text-danger">{{$errors->first('name')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="mobile" class="form-control numeric" id="mobile" placeholder="Mobile No" value="{{Input::old('mobile')}}">
                <p class="text-danger">{{$errors->first('mobile')}}</p>
            </span>
        </div>
</div>

 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email ID" value="{{Input::old('email')}}">
<p class="text-danger">{{$errors->first('email')}}</p>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt15">
            <span class="">
                <input type="text" name="company" class="form-control" id="phone" placeholder="Company Name" value="{{Input::old('company')}}">
                <p class="text-danger">{{$errors->first('company')}}</p>
            </span>
        </div>
</div>

<div class="mt15">
    <span class="">
      <textarea type="text" name="enquiry" rows="5" class="wpcf7-form-control" id="enquiry" placeholder="Enquiry Remark">{{Input::old('enquiry')}}</textarea>
<p class="text-danger">{{$errors->first('enquiry')}}</p>
</span>
</div>

<button type="submit" class="mt15 wpcf7-form-control wpcf7-submit btn btn-primary btn-big">Submit</button>
 </form>
</div>
</div>
        </div>
                                </div>
                            </div>


@endif

</div>
                 </div>      
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
<script type="text/javascript">
jQuery(document).ready(function(){
   var pgid =  '{{$page->id_page}}';
    if(pgid=='116')
    {
    url = window.location.href;     // Returns full URL
    if (url.indexOf('?') > -1) {
    var packagename = url.substring(url.lastIndexOf('?') + 1);
    var packagename = packagename.replace("-", ' ');
    jQuery('#test_done').val(packagename);
    } 
}

jQuery('.datepicker1').datepicker({minDate: 0});
jQuery('.datepicker').datepicker();
        jQuery('#refresh').click(function(){
            jQuery.get('{{url('captcha_src')}}',function(data){
                jQuery('#captcha').attr('src',data)
            });
        });
    });
 </script>
@endsection