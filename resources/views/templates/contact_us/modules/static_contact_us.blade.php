<div class="vc_col-sm-4 wpb_column vc_column_container clearfix vc_custom_1412421095668">
    <div class="wpb_wrapper contact-info-right">
        <div class="custom-list-item">
            <i class="entypo-icon entypo-icon-mobile flipicon"></i>
                <div class="contact-right-text"><h3>Call us</h3>
                    {!!$contact_us->call_us!!}
                </div>
        </div>
        <div class="custom-list-item">
            <i class="entypo-icon entypo-icon-mail flipicon"></i>
            <div class="contact-right-text">
                <h3>email us</h3>
               {{$contact_us->email_us}}
            </div>
        </div>
        <div class="custom-list-item"><i class="entypo-icon entypo-icon-location flipicon"></i>
            <div class="contact-right-text"><h3>visit us</h3>
                {{$contact_us->visit_us}}
            </div>
        </div>
        
        <div class="custom-list-item">
            <i class="fa fa-location-arrow vc_hidden-lg vc_hidden-md flipicon"></i>
            <div class="map-nevigate-button">
                <a  href="http://maps.google.com?q=Plot%20No%20C-212%20gautam%20marg%20vaishali%20nagar%20hanuman%20nagar%20jaipur" target="_blank">
                   <span class="vc_hidden-lg vc_hidden-md"><h3>Navigate</h3></span>
                </a>
            </div>
            <div class="google-map">
                <div id="map-canvas1" class="contact-us-map"></div>
            </div> 
        </div>
        <div class="vc_empty_space"  style="height: 30px">
            <span class="vc_empty_space_inner"></span>
        </div>
    </div> 
</div> 