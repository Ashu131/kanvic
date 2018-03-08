<div class="wpb_row vc_row-fluid pb-60">
    <div class="testimonials-slider-wrapper" id="cslide-slides">
        <h2 class="box-title">TESTIMONIALS</h2>
            <div class="compact-buttons">
                <div class="cslide-prev compact-prev"><i class="fa fa-angle-left"></i></div>
                <div class="cslide-next compact-next"><i class="fa fa-angle-right"></i></div>
            </div>
            <div class="tiny-border"></div>
            <div class="testimonials-slider cslide-slides-container">
            @foreach($testimonials as $testimonial)
                <div class="cslide-slide">
                    <div class="testi-boxes">
                        <blockquote>
                            {!!$testimonial->news_desc!!}
                        </blockquote>
                        <div class="testi-info clearfix">
                            <div class="testi-details">
                                <span>{{$testimonial->author}}</span> {{$testimonial->author_desc}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
    </div>
</div>