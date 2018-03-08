@section('css')
<link rel="stylesheet" href="{{url('resources/assets/js/plugins/nestable/jquery.nestable.css')}}">
<link rel="stylesheet" href="{{url('resources/assets/css/pagination.css')}}">
@endsection
@foreach($gallery_items as $gallery_item)
<div class="vc_col-sm-3 wpb_column vc_column_container clearfix officegalblock">
            <div class="wpb_wrapper">
               <div class=" wpb_single_image wpb_content_element img_icon_h link_image h_scale_up with-popup image_popup vc_align_center wpb_animate_when_almost_visible wpb_appear icon-top-right ">
                  <div class="wpb_wrapper">
                     <!-- <div class="vc_single_image-wrapper" style="border-radius:5px"> -->
                        <p>
                            <a class="fancybox" href="{{url('resources/assets/img/modules/gallery',$gallery_item->filename)}}" data-fancybox-group="gallery"><img src="{{url('resources/assets/img/modules/gallery',$gallery_item->filename)}}" alt="" /></a>
                        </p>                           
                     <!-- </div> -->
                  </div>
               </div>
            </div>
         </div>
@endforeach

<!-- 
<div id="tab-1423082433077-3-5" class="wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix">
    <section  class="wpb_row main_row vc_row-fluid no-separator">
        <div class="row-inner">
            <div class="vc_col-sm-12 wpb_column vc_column_container clearfix">
                <div class="wpb_wrapper" >
                    <div class="twc_swiper carousel-classic carousel-light nav-hide no-pagination">
                        <div class="twc_slider_carousel owl-carousel"  data-items-row="4" data-responsive="true" data-items-tablet="2" data-items-mobile="1" data-navigation="true" data-slide-speed="500" data-autoplay="false" data-stop-hover="true" data-mouse-drag="true" data-transition="slide" data-space="30" data-scroll-basis="1" data-items-tablet="2" data-items-tablet="2" data-rtl="false">
                        @foreach($gallery_items as $gallery_item)
                             <p>
                                <a class="fancybox" href="{{url('resources/assets/img/modules/gallery',$gallery_item->filename)}}" data-fancybox-group="gallery"><img src="{{url('resources/assets/img/modules/gallery',$gallery_item->filename)}}" alt="" /></a>
                            </p>
                        @endforeach  
                        </div>
                        <div class="twc-controls">
                            <div class="twc-buttons">
                                <div class="twc-prev"><svg viewBox="0 0 700 750" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="455.377,702 140.303,395.991 455.377,90 471.7,106.797 173.953,395.991 471.7,685.19"></polygon></svg></div>
                                <div class="twc-next"><svg viewBox="0 0 700 750" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="156.626,90 471.7,396.009 156.626,702 140.303,685.202 438.05,396.009 140.303,106.81"></polygon></svg></div>
                            </div>
                            <div class="twc-pagination"></div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </section>
</div>
 -->
   


<style>/*
#pagination{clear:both;}
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
   
}
.pagination>li {
    display: inline;
}
.pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
     z-index: 2;
    color: #0a5582;
    cursor: default;
    font-weight: 700;
}
    .pagination>li {
    display: inline;
}
    .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #4d4d4d;
    text-decoration: none;
   
}
    .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
    .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #666666;
    text-decoration: none;
    border: 0px solid #ddd;
}
    .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
    color: #0a5582;
    background-color: #eee;
    border-color: #ddd;
}
    .press_single img {
    max-height: 300px;
    max-width: 100%;
    margin: auto;
    min-height: 160px;
      
}
    .press_single {
    max-height: 400px;
    text-align: center;
    min-height: 300px;
    -webkit-box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49);
-moz-box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49);
box-shadow: -1px 3px 12px -2px rgba(0,0,0,0.49); 
        -moz-border-radius: 15px;
border-radius: 15px;
        margin-top:25px;
        
          
}
    .pagination>.disabled>span {
    color: white;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd;
}
 .pagination>.disabled>span:hover {
    color: white;
    cursor: not-allowed;
    border-color: #ddd;
}
  .pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    color:#4d4d4d;
  }
    .pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
        color:#4d4d4d;
}
*/
  
</style>