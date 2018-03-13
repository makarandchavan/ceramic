jQuery(document).ready(function() {

    jQuery('.tp-banner').show().revolution(

    {

      dottedOverlay:"none",

      delay:16000,

      startwidth:1170,

      startheight:700,

      hideThumbs:200,

      hideTimerBar:"on",



      thumbWidth:100,

      thumbHeight:50,

      thumbAmount:5,



      navigationType:"none",

      navigationArrows:"",

      navigationStyle:"",



      touchenabled:"on",

      onHoverStop:"on",



      swipe_velocity: 0.7,

      swipe_min_touches: 1,

      swipe_max_touches: 1,

      drag_block_vertical: false,



      parallax:"mouse",

      parallaxBgFreeze:"on",

      parallaxLevels:[7,4,3,2,5,4,3,2,1,0],



      keyboardNavigation:"off",



      navigationHAlign:"center",

      navigationVAlign:"bottom",

      navigationHOffset:0,

      navigationVOffset:20,



      soloArrowLeftHalign:"left",

      soloArrowLeftValign:"center",

      soloArrowLeftHOffset:20,

      soloArrowLeftVOffset:0,



      soloArrowRightHalign:"right",

      soloArrowRightValign:"center",

      soloArrowRightHOffset:20,

      soloArrowRightVOffset:0,



      shadow:0,

      fullWidth:"off",

      fullScreen:"on",



      spinner:"",



      stopLoop:"off",

      stopAfterLoops:-1,

      stopAtSlide:-1,



      shuffle:"off",



      autoHeight:"off",

      forceFullWidth:"off",







      hideThumbsOnMobile:"off",

      hideNavDelayOnMobile:1500,

      hideBulletsOnMobile:"off",

      hideArrowsOnMobile:"off",

      hideThumbsUnderResolution:0,



      hideSliderAtLimit:0,

      hideCaptionAtLimit:0,

      hideAllCaptionAtLilmit:0,

      startWithSlide:0,

      fullScreenOffsetContainer: ".header"

    });

  }); //ready



/*********update starts*********/

  jQuery(document).ready(function ($) {

      if($('#jssor_1').length){

      var jssor_1_SlideshowTransitions = [

        {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

        {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}

      ];



      var jssor_1_options = {

        $AutoPlay: true,

        $SlideshowOptions: {

          $Class: $JssorSlideshowRunner$,

          $Transitions: jssor_1_SlideshowTransitions,

          $TransitionsOrder: 1

        },

        $ArrowNavigatorOptions: {

          $Class: $JssorArrowNavigator$

        },

        $ThumbnailNavigatorOptions: {

          $Class: $JssorThumbnailNavigator$,

          $Cols: 10,

          $SpacingX: 8,

          $SpacingY: 8,

          $Align: 360

        }

      };



      var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);



      //responsive code begin

      //you can remove responsive code if you don't want the slider scales while window resizing

      function ScaleSlider() {

          var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;

          if (refSize) {

              refSize = Math.min(refSize, 800);

              jssor_1_slider.$ScaleWidth(refSize);

          }

          else {

              window.setTimeout(ScaleSlider, 30);

          }

      }

      ScaleSlider();

      $(window).bind("load", ScaleSlider);

      $(window).bind("resize", ScaleSlider);

      $(window).bind("orientationchange", ScaleSlider);

      //responsive code end



      //responsive code begin

      //you can remove responsive code if you don't want the slider scales while window resizing

      function ScaleSlider() {

          var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;

          if (refSize) {

              refSize = Math.min(refSize, 800);

              jssor_1_slider.$ScaleWidth(refSize);

          }

          else {

              window.setTimeout(ScaleSlider, 30);

          }

      }

      ScaleSlider();

      $(window).bind("load", ScaleSlider);

      $(window).bind("resize", ScaleSlider);

      $(window).bind("orientationchange", ScaleSlider);

      //responsive code end

      }

  });







jQuery(document).ready(function($) {

      //if($('#map').length){



      //}

      $('#navbar #slidemenu > .nav.navbar-nav > li ul').removeClass('nav navbar-nav');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-dropdown > ul').addClass('dropdown-menu animated fadeIn');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-dropdown > ul').removeClass('nav navbar-nav');

      $('#navbar #slidemenu > .nav.navbar-nav > li.done-megamenu > a').addClass('dropdown-toggle');

      $('#navbar #slidemenu > .nav.navbar-nav > li.done-dropdown > a').addClass('dropdown-toggle');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu').addClass('menu-large');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul').addClass('megamenu__columns');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li').addClass('level-menu level1');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1 > ul > li').addClass('level2');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1 > ul > li.level2 > ul').addClass('level-menu__dropdown');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1 > ul > li.level2 > ul.level-menu__dropdown li').addClass('level3');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1 > ul > li.level2 > ul.level-menu__dropdown > li.level3 > ul').addClass('level-menu__dropdown');

      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1').each(function() {

            var a = $(this).children('a').html();

            var href = $(this).children('a').attr('href');

            $(this).children('ul').children('li').first().before('<li class="title"><a href="'+href+'">'+ a +'</a></li>');



      });



      $('#navbar #slidemenu > .nav.navbar-nav > .expanded.done-megamenu.menu-large > .megamenu > .container > ul.megamenu__columns > li.level-menu.level1 > a').remove();

      $('#navbar #slidemenu > .nav.navbar-nav').each(function() {

            if($(this).children('li.expanded.done-megamenu').length || $(this).children('li.expanded.done-dropdown').length){

                 //alert($(this).children('li.expanded.done-megamenu').length);

            }else{

                  var f = $(this).children('li').html();

                  alert(f);

            }



      });

      //$('.footer__subscribe .block-simplenews form input[type=submit]').addClass('btn btn--wd text-uppercase wave waves-effect');

      $('.overlay__content form#searchform .form-item.form-type-textfield').addClass('input-group input-group--wd');

      $('.overlay__content form#searchform input[type=submit]').addClass('btn btn--wd text-uppercase wave waves-effect waves-effect');

      $('.overlay__content form#searchform .form-item.form-type-textfield').append('<span class="input-group__bar"></span>');

      $('.node-type-product .add-to-cart form select').addClass('btn-group bootstrap-select btn dropdown-toggle select--wd');

      $('.node-type-product .add-to-cart form input[type=text]').addClass('input-number input--wd input-qty pull-left');

      //$('#single-product form.commerce-add-to-cart input[type=submit]').addClass('btn btn--wd text-uppercase');

      //$('#single-product form.commerce-add-to-cart input[type=text]').addClass('input-number input--wd input-qty pull-left');

      $('.item-list > .pager').addClass('pagination');

      $('.item-list > .pager.pagination > .pager-current').addClass('active');

      var pagination_item = $('.item-list > .pager.pagination > .pager-current').html();

      $('.item-list > .pager.pagination > .pager-current').html('<a href="#">'+pagination_item+'</a>');

      $('.item-list > .pager.pagination > .pager-current').removeClass('pager-current');

      $('.page-cart .view-commerce-cart-form form table tbody tr td.views-field-edit-delete input.delete-line-item').val('');

      $('.header__cart .cart-contents .line-item-summary .links.inline > li > a').addClass('btn btn--wd');

      $('.header__cart .cart-contents form input.delete-line-item').val('');

      var total = $('.header__cart .cart-contents form .line-item-summary .line-item-total .line-item-total-raw').html();

      $('.header__cart .cart-contents .header__cart__indicator').html(total);

      var count_item = $('.wrapper-done-header-cart .done-cart-item').length;

      $('.header__cart .cart-contents .shopping-cart__top-done').html('Your Cart('+count_item+')');

      $('.header__cart .header__cart__button span.badge--menu').html(count_item);

      $('.done-search---page form.search-form input[type=text]').addClass('input--wd');

      $('.done-search---page form.search-form input[type=submit]').addClass('btn btn--wd');

      var artcount = $('#landingBanners > article').length;

      if(artcount != 0){

        for(var i = 0 ; i < artcount ; i++){

          $('.node-type-landing-page .article-nav > ul').append('<li data-target="Slide'+(i+1)+'"><a href="#Slide'+(i+1)+'">'+(i+1)+'</a></li>');

        }

      }

      //alert(artcount);

});



//}

/*********update ends*********/

