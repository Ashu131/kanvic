;(function($){
  
  /**
   * jQuery function to prevent default anchor event and take the href * and the title to make a share popup
   *
   * @param  {[object]} e           [Mouse event]
   * @param  {[integer]} intWidth   [Popup width defalut 500]
   * @param  {[integer]} intHeight  [Popup height defalut 400]
   * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
   */
  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {
    
    // Prevent default anchor event
    e.preventDefault();
    
    // Set values for window
    intWidth = intWidth || '500';
    intHeight = intHeight || '400';
    strResize = (blnResize ? 'yes' : 'no');

    // Set title and open popup with focus on it
    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,            
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
  }
  
  /* ================================================== */
  
  $(document).ready(function ($) {
    $('.share_icon li a').on("click", function(e) {
      $(this).customerPopup(e);
    });
  });
    
}(jQuery));





$(document).ready(function(){
	baseurl = $('.baseurl').text();
	    $('.current-item').parent().parent().addClass('current-item');
    $('.current-item').parent().parent().parent().addClass('current-item');
jQuery(document).on('keypress','.numeric',function(e){  
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
       jQuery('this').html("Digits Only").show().fadeOut(1000);
               return false;
    }
   });

});
var w_w = jQuery(window).width();
var w_h = jQuery(window).height();
if(w_w<992){
$('.mobile_menu').css('height',w_h);
}

$(document).on('click','#searchbtn', function(){
      $(this).hide();
      if(w_w>992)
      $('.navbar-nav').hide();
      if(w_w<992){
        $('.header-search').css({'width':'84%','background':'#fff'});
        $('.logo').hide();
      }
      else
      $('.header-search').css('width','100%');
      $('#searchform').fadeIn();
      $('#searchclose').show();

});

$(document).on('click','#searchclose', function(){
      $(this).hide();
      if(w_w>992)
      $('.navbar-nav').show();
      $('#searchform').hide();
      $('#searchbtn').show();
      if(w_w<992){
        $('.header-search').css({'background':'transparent'});
        $('.logo').show();
      }
      $('.header-search').css('width','0');

});

/* mobile click */
$(document).ready(function () {
  if(w_w<992){
    $('.navbar-nav > li').addClass('has-children');
 
    var share_link = $('.share_icon').html();
    $('#mobile_share_popup').html(share_link+'<div class="close_share_popup"><span>x</span></div>');

    
    $(document).on('click','.close_share_popup', function(){
        $('#mobile_share_popup').animate({'top':'100%'},500);

    });
  }
  });

$(document).on('click','.submenubar', function(){
      $(".close_share_popup").click();
      $(this).toggleClass('open');
      $('.mobile_sub_r').slideToggle();



});




$(document).on('click','.navbar-toggle', function(){
  $('#main-nav').addClass('menu_open');
  $(this).animate({'left':'86.8%'},500);
  $('.mobile_menu').animate({'left':0},500);

});

$(document).on('click','.menu_open .navbar-toggle', function(){
  $('.navbar-toggle').animate({'left':0},100);
  $('.navbar-toggle').attr('aria-expanded',false);
  $('.mobile_menu').animate({'left':'-100%'},100, function(){
  $('#main-nav').removeClass('menu_open');

  });

});


/* mobile menu */




$(document).ready(function () {

    var options = {
        email: $('.newsletter-sub input'),
        btn: $('.newsletter-sub button'),
        span: $('.newsletter-sub span'),
    };

    options.email.on('focus', function () {
        $(this).removeClass('sub-error');
        options.span.hide();
    });
    $(options.btn).click(function () {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        console.log(options.email.val());
        if (!filter.test(options.email.val())) {
            options.email.addClass('sub-error');
            options.span.show();
            return false;
        } else {
            $.ajax({
                url: options.btn.data('url'),
                type: 'post',
                data: {email: options.email.val(), _token: options.btn.data('token')},
                success: function (res) {
                    console.log(res);
                    if (res.status == 1) {
                    	options.span.show();
                        $('.text-danger').html('<h4 class="text-success">' + res.msg + '</h4>');
                    }
                    else{
                    	options.span.show();
                        $('.text-danger').html('<h4 class="text-danger">' + res.msg + '</h4>');
                    }

                    
                    options.email.val('');
                },
                error: function (err) {
                    console.log(err.responseText);
                    options.span.show();
                    $('.text-danger').html('<h4 class="text-danger">Some Error Occurred!</h4>');
                    options.email.val('');
                }
            });

        }
    });
});

$(function() {

  var w_w = jQuery(window).width();

if(w_w>992){
        $(window).scroll(function() {
            var scrolled   = $(window).scrollTop();
            if(scrolled >= 100) {
                $('.banner-btm').addClass('show_bar');
                if ($('.show_bar').length>0) {
                $('.banner-btm').stop(true,true).animate({top:0},200);
                }
            }
            else
            {
                $('.banner-btm').removeClass('show_bar');
                if ($('.show_bar').length<1) {
                $('.banner-btm').stop(true,false).animate({top:'-85px'},200);
            }
            }
        });
 
}
});



$(document).ready(function(){

    var w_w = jQuery(window).width();
  var url      = window.location.href;
  $('.share_icon ul li a.linkedin').attr('href','https://www.linkedin.com/shareArticle?mini=true&url='+url);

  $('.share_icon ul li a.twitter').attr('href','https://twitter.com/share?url='+url);

  $('.share_icon ul li a.facebook').attr('href','https://www.facebook.com/sharer.php?u='+url);
  var lastsegment = url.match(/([^\/]*)\/*$/)[1];
       lastsegment =  lastsegment.replace(/-/g, ' ');
  //$('.share_icon ul li a.envelope').attr('href','mailto:?subject=From '+lastsegment+'&body='+lastsegment);
  $('.share_icon ul li a.envelope').attr('href','mailto:?subject=From%20kanvic.com%3a%20'+lastsegment+'&body=I%20recommend%20you%20visit%20kanvic.com%20to%20read%3a%0d%0a%0d%0a'+url);

   // stickyHeader();

if(w_w>992){
$(".share_btn").on("mouseover", function () {
        $('.share_icon').stop(true,true).slideToggle();
});
}
else
{
    $('.share_btn').click(function(){
      $(".submenubar").click();
      $(this).toggleClass('share_open');
      $('#mobile_share_popup').show();
      $('#mobile_share_popup').animate({'top':0},500);
    });
}

$('.share_block').mouseleave(function(){
    $('.share_icon').stop(true,true).slideUp();
});


    $('.share_icon ul li').hover(function(){
           var bgcolor = $(this).data('bgcolor');
           $('.share_btn').css({'border':'solid 1px '+bgcolor});
           $('.share_btn').css({'background':bgcolor,'color':'#fff'});
           //$('.share_btn').css({'background':bgcolor});
    }, function(){
        $('.share_btn').css({'background':'','color':'#333'});
        $('.share_btn').css({'border':'solid 1px #626564'});

    });





var w_w = jQuery(window).width();
var w_h = jQuery(window).height();

if(w_w<992)
{
    if($('.banner-btm .banner_lft_title').length>0){

    oldstr = $('.banner_lft_title').text().trim();
    chkText = $('.banner_lft_title').text().length;
    if(chkText>10)
      var newstr = oldstr.substring(0, 10)+'...';

    $('.banner_lft_title').html(newstr);

   $( ".pull-right div" ).wrapAll( '<div class="mobile_sub_r"></div>' );
   $('.mobile_sub_r').before('<label class="head_center_dropdown"><span class="submenubar"></span></label>');
      if($('.right_menu_link').length>0){
        var contact_href =  $('.right_menu_link a:last-child').attr('href');
        $('.mobile_sub_r').after('<div class="mobile_top_contact"><a href="'+contact_href+'">Contact</a></div>');
      }
  }

  $('#main-nav ul li').css({'width':w_w-50});
  $('.sub-0').css({'left':w_w});
  $('.label2').css({'left':w_w-13});
  $('.has-children > a').attr('href','javascript:;');
  jQuery(document).on('click','.toplevel', function(){
    $('.navbar-nav > li').removeClass('active');
    //$('.navbar-nav li ul.label1').slideUp();
    $(this).parent('li').addClass('active');
    //$('.navbar-nav li.active ul.label1').animate({'right':0},500);
    $('.navbar-nav').animate({'left':'-'+w_w},500);
  })

  jQuery(document).on('click','.has-children a', function(){
    var n = $('.navbar-nav').css("left").replace('px', '').replace('-', '');


    var dfd = parseInt(n)+parseInt(w_w);
    $('.navbar-nav').animate({'left':'-'+dfd},500);
    //$('.has-children').removeClass('active');
    //$('.navbar-nav li ul.label2').hide();
    $(this).parent('li').addClass('active');
    $(this).parent('li').children('ul.label2').show();
    //$(this).parent('li').children('ul.label2').animate({'left':0},500);
    //$('.has-children.active ul.label2').show();
   
  })

}
else
{
    $(document).ready(function(){
    $('#main-nav li').mouseenter(function(){
      $('#main-nav li').removeClass('active');
      $(this).addClass('active');
      var getindex = $('li.active ul.label1 li.active').index();
      if(getindex<=0)
      $('li.active ul.label1 > li:first-child').addClass('active');
      else
        $('li.active .label1 li:first-child').removeClass('active');
      $(this).parents('ul').parents('li').addClass('active');
    });

    $('.navbar-nav > li').mouseenter(function(){
      $('.sub_menu_wrapper').hide();
      $(this).children('.sub_menu_wrapper').show();
    });
    $('.sub_menu_wrapper').mouseleave(function(){
      $('.sub_menu_wrapper').hide();
      $("#main-nav li").removeClass("active");
      
    });
  });
}



$(document).on('click','.mobile_nav_header span', function(){
  $('.label1 .has-children').removeClass('active');
  $('.has-children .label2').hide();
  var n = $('.navbar-nav').css("left").replace('px', '');
  var dfd = parseInt(n)+parseInt(w_w);
  $('.navbar-nav').animate({'left':dfd},500);

});

});

/**-----------------------------------------------------
 * Career Form on role change disable some of the option
 * `````````````````````````````````````````````````````
 */
$(document).ready(function () {
  $("#career_role").on('click', '.associate', function() {
    alert('hei');
  });
});



