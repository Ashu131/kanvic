<!DOCTYPE html>
<html>
    <head>
        @include('templates.inner_template.head')
    </head>
    <body>
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            @include('templates.project_show')
            @include('templates.inner_template.header')

            <main id="main-container">
                @yield('content')
            </main>

            @include('templates.inner_template.footer')
        </div>
    </body>
</html>


<!--
<div class="container career">
<div class="heading"><span class="career_heading">CAREER</span></div>
<div class="col-md-5 about_career">Have you ever had to write an &lsquo;About us&rsquo; page for your website but been unsure of what to include? Let&rsquo;s face it, writing content for your website is hard. Determining how much you need to write and what you need to write about are no small tasks. Many business owners struggle putting more than a few sentences together about their business. Other businesses have plenty to say, but aren&rsquo;t sure what to include. Since we know it can be overwhelming, we&rsquo;ve written up our guidelines for writing content that will create a compelling About Us page.</div>
<div class="col-md-1">&nbsp;</div>
<div class="col-md-6 career_form">
<ul>
<li>Currently there are no Openings</li>
<li>We welcome your comments and suggestions, feel free to contact us</li>
</ul>
<form>
<div class="col-md-4 form_lable">Post Applied For<span class="req">*</span></div>
<div class="col-md-8 form_input">
    <div class="row">
<div class="col-md-12">
    <input class="career_post_input" name="postFor" type="text" placeholder="" />
</div>
    </div>
</div>
<div class="col-md-4 form_lable">Full Name <span class="req">*</span></div>
<div class="col-md-8 form_input">
<div class="col-md-3">
    <div class="row">
    <select class="gender_optn">
<option>Mr</option>
<option>Miss</option>
</select>
        </div>
    </div>
<div class="col-md-9">
<div class="row">
<div class="col-md-6 txt_input"><input name="fname" type="text" placeholder="First Name"></div>
<div class="col-md-6 txt_input"><input name="lname" type="text" placeholder="Last Name"></div>
</div>
</div>
</div>
<div class="col-md-4 form_lable">Highest Qualification<span class="req">*</span></div>
<div class="col-md-8 form_input"><input class="career_post_input" name="hq" type="text" placeholder="" /></div>
<div class="col-md-4 form_lable">Your Introduction</div>
<div class="col-md-8 form_input">
<div><textarea class="intro" cols="42" name="intro" rows="4" placeholder=""></textarea></div>
</div>
<div class="col-md-4 form_lable">Email <span class="req">*</span></div>
<div class="col-md-8 form_input"><input class="career_email_input" name="email" type="text" placeholder="Email" /></div>
<div class="col-md-4 form_lable">Phone <span class="req">*</span></div>
<div class="col-md-8 form_input"><input class="career_post_input" name="phone" type="text" placeholder="Phone" /></div>
<div class="col-md-4 form_lable">Copy and Paste Resume <span class="req">*</span></div>
<div class="col-md-8 form_input"><textarea class="cpresume" cols="42" name="copypast" rows="4" placeholder=""></textarea></div>
<div class="col-md-4 form_lable">&nbsp;</div>
    <img id="captcha">
    
<div class="col-md-8"><input id="mainCaptcha" class="ca_input" disabled="disabled" type="text" value="{{Captcha::create()}}"/></div>
<div class="col-md-4 form_lable">&nbsp;</div>
<div class="col-md-8 form_input">
<ul>
<li style="font-size: 10px; font-familt: 'lato';">ENTER THE CODE HERE BELOW</li>
<li><input id="6_letters_code" class="career_c_input" name="6_letters_code" required="" type="text"/></li>
<li style="font-size: 12px; font-familt: 'lato';">Can'`'t read the image? click <span id="refresh" style="color: blue; cursor: pointer; font-size: 14px;">here</span> to refresh</li>
</ul>
</div>
<div class="col-md-4 form_lable">&nbsp;</div>
<div class="col-md-8 form_input">
<div class="hvr-shutter-out-vertical-form bt"><input class="submit_input" style="padding: 0px;" name="contactForm" type="submit" value="SUBMIT" /></div>
</div>
</form></div>
</div>-->
