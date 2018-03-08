<div id="text-6" class="widget widget_text">
    <div class="textwidget">
        <div class="">
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:600px;">
                <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:600px;height:600px;">
                    <ul>
                        <?php
                          $k=0;
                        ?>
                        @foreach($gallery_items as $item)
                            <li class="@if($k%2==0) odd @else even @endif" data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                                <img src="{{url('resources/assets/img/modules/slider',$item->filename)}}" alt="{{$item->caption}}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="tp-caption waxom-medical-subtitle lft tp-resizeme"
                                    @if($k%2==0)
                                        data-x="-2" data-y="140" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    @else
                                        data-x="right" data-hoffset="-10" data-y="140" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    @endif
                                    style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                                    {{$item->caption}}
                                </div>
                                <div class="tp-caption waxom-medical-title lft tp-resizeme secondh"
                                    @if($k%2==0)
                                        data-x="-2" data-y="180" data-speed="300" data-start="100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" 
                                    @else
                                        data-x="right" data-hoffset="-10" data-y="180" data-speed="300" data-start="100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    @endif
                                    style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
                                    {{$item->logo_caption}}
                                </div>
                                <div class="tp-caption waxom-medical-text lfb tp-resizeme detailcontent"
                                    @if($k%2==0)
                                        data-x="0" data-y="250" data-speed="300" data-start="700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    @else
                                        data-x="right" data-hoffset="-10" data-y="250" data-speed="300" data-start="700" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                                    @endif
                                    style="z-index: 7; max-width: 457px; white-space: normal;line-height:22px !important;">
                                    {!!$item->information!!}
                                </div>
                                @if($item->link!='')
                                <div class="tp-caption waxom-medical-text lfb tp-resizeme viewbtndiv"
                                    @if($k%2==0)
                                        data-x="1" data-y="392" data-speed="600" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" 
                                    @else
                                        data-x="right" data-hoffset="-54" data-y="392" data-speed="600" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600" 
                                    @endif
                                    style="z-index: 8; max-width: 730px; max-height: 16px; white-space: normal;">
                                    @if($k=='2')
                                    <a href="#" class="btn btn-primary btn-lg">Online reports</a>
                                    <a href="{{url("$item->link")}}" class="btn btn-primary btn-lg">Book a home collection</a>
                                    @endif
                                    @if($item->know_more_btn==1)
                                    <a href="{{url("$item->link")}}" class="btn btn-primary btn-lg">Know more</a>
                                    @endif
                                </div>
                                @endif
                           </li>

                                <?php
                                        $k++; 
                                ?> 

                         @endforeach
                                          
                    </ul>
                    <div class="tp-bannertimer"></div>
                                    </div>
                                    <!-- slider style -->
                                    <style scoped>
                                        .tp-caption.waxom-medical-title,
                                        .waxom-medical-title {
                                            font-size: 52px;
                                            font-weight: 700;
                                            color: rgb(123, 120, 120);
                                            text-decoration: none;
                                            text-shadow: none;
                                            background-color: transparent;
                                            border-width: 0px;
                                            border-color: rgb(0, 0, 0);
                                            border-style: none
                                        }
                                        
                                        .tp-caption.waxom-medical-subtitle,
                                        .waxom-medical-subtitle {
                                            font-size: 36px;
                                            font-weight: 600;
                                            color: rgb(123, 120, 120);
                                            text-decoration: none;
                                            text-shadow: none;
                                            background-color: transparent;
                                            border-width: 0px;
                                            border-color: rgb(0, 0, 0);
                                            border-style: none
                                        }
                                        
                                        .tp-caption.waxom-medical-text,
                                        .waxom-medical-text {
                                            font-size: 16px;
                                            font-weight: 400;
                                            color: rgb(123, 120, 120);
                                            text-decoration: none;
                                            text-shadow: none;
                                            background-color: transparent;
                                            border-width: 0px;
                                            border-color: rgb(0, 0, 0);
                                            border-style: none
                                        }
                                        .tp-caption.waxom-medical-text ul{padding-left: 17px !important;}
                                        .tp-caption.waxom-medical-text li{list-style-type: disc;margin-bottom:10px !important;}
                                        .tp-caption.waxom-medical-text li:last-child{margin-bottom: 0 !important;}
                                        .tp-caption.waxom-medical-text-right,
                                        .waxom-medical-text-right {
                                            font-size: 16px;
                                            font-weight: 400;
                                            text-align: right;
                                            text-decoration: none;
                                            text-shadow: none;
                                            background-color: transparent;
                                            border-width: 0px;
                                            border-color: rgb(0, 0, 0);
                                            border-style: none;
                                            color: #000;
                                        }
                                    </style>

                                    <script type="text/javascript">
                                        var setREVStartSize = function() {
                                            var tpopt = new Object();
                                            tpopt.startwidth = 1140;
                                            tpopt.startheight = 525;
                                            tpopt.container = jQuery('#rev_slider_1_1');
                                            tpopt.fullScreen = "off";
                                            tpopt.forceFullWidth = "off";

                                            tpopt.container.closest(".rev_slider_wrapper").css({
                                                height: tpopt.container.height()
                                            });
                                            tpopt.width = parseInt(tpopt.container.width(), 0);
                                            tpopt.height = parseInt(tpopt.container.height(), 0);
                                            tpopt.bw = tpopt.width / tpopt.startwidth;
                                            tpopt.bh = tpopt.height / tpopt.startheight;
                                            if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
                                            if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
                                            if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
                                            if (tpopt.bh > 1) {
                                                tpopt.bw = 1;
                                                tpopt.bh = 1
                                            }
                                            if (tpopt.bw > 1) {
                                                tpopt.bw = 1;
                                                tpopt.bh = 1
                                            }
                                            tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
                                            if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
                                            if (tpopt.fullScreen == "on") {
                                                tpopt.height = tpopt.bw * tpopt.startheight;
                                                var cow = tpopt.container.parent().width();
                                                var coh = jQuery(window).height();
                                                if (tpopt.fullScreenOffsetContainer != undefined) {
                                                    try {
                                                        var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                                                        jQuery.each(offcontainers, function(e, t) {
                                                            coh = coh - jQuery(t).outerHeight(true);
                                                            if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight
                                                        })
                                                    } catch (e) {}
                                                }
                                                tpopt.container.parent().height(coh);
                                                tpopt.container.height(coh);
                                                tpopt.container.closest(".rev_slider_wrapper").height(coh);
                                                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                                                tpopt.container.css({
                                                    height: "100%"
                                                });
                                                tpopt.height = coh;
                                            } else {
                                                tpopt.container.height(tpopt.height);
                                                tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                                                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
                                            }
                                        };

                                        /* CALL PLACEHOLDER */
                                        setREVStartSize();

                                        var tpj = jQuery;
                                        tpj.noConflict();
                                        var revapi1;

                                        tpj(document).ready(function() {
                                            w_w = tpj(window).width();

                                            if(w_w>1025 && w_w<1500)
                                            slideH = 400;
                                            else
                                                slideH = 525;

                                            if (tpj('#rev_slider_1_1').revolution == undefined) {
                                                revslider_showDoubleJqueryError('#rev_slider_1_1');
                                            } else {
                                                revapi1 = tpj('#rev_slider_1_1').show().revolution({
                                                    dottedOverlay: "none",
                                                    delay: 9000,
                                                    startwidth: 1140,
                                                    startheight: slideH,
                                                    hideThumbs: 200,

                                                    thumbWidth: 100,
                                                    thumbHeight: 50,
                                                    thumbAmount: 3,

                                                    simplifyAll: "off",

                                                    navigationType: "bullet",
                                                    navigationArrows: "solo",
                                                    navigationStyle: "round",

                                                    touchenabled: "on",
                                                    onHoverStop: "on",
                                                    nextSlideOnWindowFocus: "off",

                                                    swipe_threshold: 0.7,
                                                    swipe_min_touches: 1,
                                                    drag_block_vertical: false,

                                                    keyboardNavigation: "off",

                                                    navigationHAlign: "center",
                                                    navigationVAlign: "bottom",
                                                    navigationHOffset: 0,
                                                    navigationVOffset: 20,

                                                    soloArrowLeftHalign: "left",
                                                    soloArrowLeftValign: "center",
                                                    soloArrowLeftHOffset: 20,
                                                    soloArrowLeftVOffset: 0,

                                                    soloArrowRightHalign: "right",
                                                    soloArrowRightValign: "center",
                                                    soloArrowRightHOffset: 20,
                                                    soloArrowRightVOffset: 0,

                                                    shadow: 0,
                                                    fullWidth: "on",
                                                    fullScreen: "off",

                                                    spinner: "spinner0",

                                                    stopLoop: "off",
                                                    stopAfterLoops: -1,
                                                    stopAtSlide: -1,

                                                    shuffle: "off",

                                                    autoHeight: "off",
                                                    forceFullWidth: "off",

                                                    hideThumbsOnMobile: "off",
                                                    hideNavDelayOnMobile: 1500,
                                                    hideBulletsOnMobile: "off",
                                                    hideArrowsOnMobile: "off",
                                                    hideThumbsUnderResolution: 0,

                                                    hideSliderAtLimit: 0,
                                                    hideCaptionAtLimit: 0,
                                                    hideAllCaptionAtLilmit: 0,
                                                    startWithSlide: 0
                                                });

                                            }
                                        }); /*ready*/
                                    </script>
                                </div>
                                <!-- END REVOLUTION SLIDER -->
                            </div>
                        </div>
                    </div>