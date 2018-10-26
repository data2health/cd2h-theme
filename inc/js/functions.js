/**
 * General Javascript
 */
(function ($) {
  var $win = $(window);
  var $doc = $(document);
  var $body;
  var $classes = {
    FsrHolder: 'fsr-holder',
    FsrImage: 'image-full',
  };
  var $fade_elements = $('.fade-item');

  $(document).on( 'post-load', function () {
    check_if_in_view();
    fullscreener(jQuery('.' + $classes.FsrImage));
    //console.log('Loading more content');
  });


  $doc.ready(function () {
    $body = $('body');
    check_if_in_view();
    makeSquare();
    fullscreener($('.' + $classes.FsrImage));

    // Open the shop menu by default on woocommerce pages
    if($body.hasClass('woocommerce-page')){
      $('.shop-menu-link > a ').trigger('click');
    }
    // stop collapsing the menu if an item was clicked
    $('.dropdown-menu').click(function(e) {
      e.stopPropagation();
    });

    if($(".hero-owl-carousel").length){
      $('.hero-owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<span class="prev-arrow-ico"></span>', '<span class="next-arrow-ico"></span>'],
        margin: 0,
        rewind: false,
        dots: false,
        items: 1,
        //onInitialized: counter, //When the plugin has initialized.
        //onTranslated: counter, //When the translation of the stage has finished.
      });
    }
    if($(".posts-owl-carousel").length){
      $('.posts-owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<span class="prev-arrow-ico"></span>', '<span class="next-arrow-ico"></span>'],
        margin: 30,
        padding: 60,
        rewind: false,
        dots: false,
        items: 3,
        responsive: {
          0: { items: 1, margin: 15 },
          768: { items: 3,margin: 30 }
        }
      });
    }
    if($(".workgroup-owl-carousel").length){
      $('.workgroup-owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<span class="prev-arrow-ico"></span>', '<span class="next-arrow-ico"></span>'],
        margin: 30,
        rewind: false,
        dots: false,
        items: 1,
        responsive: {
          0: { margin: 15 },
          768: { margin: 30 }
        }
      });
    }
    if($(".dream-current-owl-carousel").length){
      $('.dream-current-owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<span class="prev-arrow-ico"></span>', '<span class="next-arrow-ico"></span>'],
        margin: 30,
        padding: 10,
        rewind: false,
        dots: false,
        items: 3,
        responsive: {
          0: { items: 1, margin: 15 },
          768: { items: 3,margin: 30 }
        }
      });
    }
    if($(".dream-ideas-owl-carousel").length){
      $('.dream-ideas-owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        nav: true,
        navText: ['<span class="prev-arrow-ico"></span>', '<span class="next-arrow-ico"></span>'],
        margin: 30,
        padding: 10,
        rewind: false,
        dots: false,
        items: 2,
        responsive: {
          0: { items: 1, margin: 15 },
          768: { items: 2,margin: 30 }
        }
      });
    }
    if($(".lab-project-list").length){
      jQuery('.lab-project-list .nav-link').click(function(){
        console.log('showing tab');
        jQuery('.lab-project-list .nav-link').not(this).removeClass('active');
        jQuery(this).tab('show');
      });
    }

    // Handle scrolling anchor links
    $doc.on('click', '.scroll-to a', function(e){
      var href = $(this).attr('href');
      var hash_index = href.indexOf('#');
      if(hash_index != -1){
        href = href.substring(hash_index, href.length);
        //console.log(href);
        var target = $(href);
        if(target.length){
          e.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 150
          }, 1000);
        }
      }
    });
  });

  $win.bind('scroll',function(e){
    check_if_in_view();
  });

  function fullscreener(_container) {
    _container.each(function () {
      var _this = $(this);
      //debugger;
      var _src = _this.attr('src');
      var _srcset = _this.attr('srcset');
      if (_srcset != null)
      {
        var screenWidth = $win.width();
        var src_arr = _parse_srcset(_srcset);
        for (var i in src_arr)
        {
          if (src_arr[i].width >= screenWidth)
          {
            _src = src_arr[i].url;
            break;
          }
        }
      }
      _this.parent().addClass($classes.FsrHolder).css('background-image', 'url(' + _src + ')');
    });
  }


  function makeSquare(){
    var $squared = jQuery('.squared');
    $.each($squared, function() {
      var $element = jQuery(this);
      var elementWidth = $element.outerWidth();
      $element.css('height', elementWidth);
      //console.log('Made a square');
    });
  }

  function check_if_in_view(){
    var window_height = $win.height();
    var window_top_position = $win.scrollTop();
    var window_bottom_position = (window_top_position + window_height);
    $.each($fade_elements, function() {
      var $element = jQuery(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      var element_bottom_position = (element_top_position + element_height);

      //check to see if this current container is within viewport
      if ((element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position)) {
        $element.addClass('in-view');
      } else {
        $element.removeClass('in-view');
      }
    });
  }

})(jQuery);
