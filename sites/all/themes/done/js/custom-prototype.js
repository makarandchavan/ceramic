var $j = jQuery.noConflict();

// Uncommenting these lines if prototype.js is used

if (Prototype.BrowserFeatures.ElementExtensions) {  
    var disablePrototypeJS = function (method, pluginsToDisable) {
            var handler = function (event) {
                event.target[method] = undefined;
                setTimeout(function () {
                    delete event.target[method];
                }, 0);
            };
            pluginsToDisable.each(function (plugin) { 
                jQuery(window).on(method + '.bs.' + plugin, handler);
            });
        },
    pluginsToDisable = ['collapse', 'dropdown', 'modal', 'tooltip', 'popover', 'tab'];
    disablePrototypeJS('show', pluginsToDisable);
    disablePrototypeJS('hide', pluginsToDisable);
}

// Set Product Size 

function setProductSize(grid,width) {
			console.log('setProductSize');
			productW = width;
            var productCount = 0;
			var marginW = 0;
            if (grid.hasClass('row-view')) {
                var list_width = parseInt(grid.width());
                productW = list_width;
				productCount = 1;
            }
			else {
				var marginW = parseInt(grid.find('.product-preview-wrapper:first-child').css("margin-right"));
				var gridW = parseInt(grid.width());
				while (productW >= width) {
					productCount++;
					productW = gridW / productCount
				}
				if (productCount > 1) productCount = productCount - 1;
			}
            count_visible_items = productCount;
            productW = parseInt(gridW / productCount);
            grid.find('.product-preview-wrapper').css("width", productW - marginW);
			if (!grid.hasClass('row-view')) {
				grid.find('.product-preview').each(function() {
					setProductHeight()
				});
			}
			else {
				grid.find('.product-preview').each(function() {
					$j(this).find('.product-preview__image').css({
						'margin-bottom': ''
					})
				});
			}
}
function setProductHeight() {
	$j('.product-preview').each(function() {
		var infoH = $j(this).find('.product-preview__info').outerHeight();
		console.log(infoH);
		$j(this).find('.product-preview__image').css({
			'margin-bottom': infoH + 'px'
		})
	});
}

function debouncer(func, timeout) {
    var timeoutID, timeout = timeout || 500;
    return function() {
        var scope = this,
            args = arguments;
        clearTimeout(timeoutID);
        timeoutID = setTimeout(function() {
            func.apply(scope, Array.prototype.slice.call(args));
        }, timeout);
    }
}

//Set product height

jQuery(function($j) {

    "use strict";
	
	var windowW = window.innerWidth || $j(window).width();

	if (windowW > 767) {
		setProductHeight()
	}
		
    // var prevW = windowW;

    // $j(window).resize(debouncer(function(e) {
        // var currentW = window.innerWidth || $j(window).width();
	
        // if (currentW != prevW) {
            // // start resize events
			// if (currentW > 767) {
				// setProductHeight()
			// }
            // // end resize events		
        // }

        // prevW = window.innerWidth || $j(window).width();

    // }));
});

// jQuery(function($j) {

    // "use strict";
	
	// setProductSize() 

	// var prevW = window.innerWidth || $j(window).width();
	
	// $j(window).resize(function() {
        // var currentW = window.innerWidth || $j(window).width();

        // if (currentW != prevW) {
            // // start resize events
			
			// setProductSize() 

            // // end resize events
        // }

        // prevW = window.innerWidth || $j(window).width();

    // });

// });


// MENU HOVER

jQuery(function($j) {

  "use strict";
 
  var windowW = window.innerWidth || $j(window).width();
   
  function menuIni(windowW) {

	  if (windowW > 767) {
		$j('ul.navbar-nav > li').addClass('hovernav');
		$j('ul.navbar-nav > li.hovernav').hover(
			function(){
				$j(this).addClass("open")
			},
			function(){
				$j(this).removeClass("open")
			}
		);
		$j('ul.navbar-nav > li li').hover(
			function(){
			  if ($j(this).children('ul.level-menu__dropdown').length) {
				$j(this).addClass('active');
				$j(this).children('ul.level-menu__dropdown').show().css({'opacity' : 0, 'left' : $j(this).width()})
				var off = $j(this).children('ul.level-menu__dropdown').offset();
				var l = off.left;
				var w = $j(this).children('ul.level-menu__dropdown').width();
				var docW = $j(".container").width();
				var isEntirelyVisible = (l + w <= docW);
							
				if (!isEntirelyVisible) {
					console.log('notEntirelyVisible');
					$j(this).children('ul.level-menu__dropdown').show().css({'opacity' : 1, 'right' : $j(this).width(), 'left' : 'auto'})
				} else {
					console.log('isEntirelyVisible');				
					$j(this).children('ul.level-menu__dropdown').show().css({'opacity' : 1, 'left' : $j(this).width()})
				}
					  
			  }
			},
			function(){
			  if ($j(this).children('ul.level-menu__dropdown').length) {
				$j(this).removeClass('active');
				$j(this).children('ul.level-menu__dropdown').hide().css({'left':'auto', 'right':'auto'})
			  }
			}
	  );
	  } else {
		$j('ul.navbar-nav > li').removeClass('hovernav');
		$j('ul.navbar-nav > li li').unbind('mouseenter mouseleave');
		$j('.touch ul.navbar-nav > li > a').click(function( e ) {
			e.preventDefault();
		})
		$j('.touch ul.navbar-nav > li a span.caret').click(function() {
		  $j(this).parent().parent('li').toggleClass('open');
		});
		$j('.touch ul.navbar-nav > li a span.link-name').click(function() {
		  var  url = $j(this).parent('a').attr("href");
		  window.location = url;
		});
		
		//$j('ul.navbar-nav > li').unbind('mouseenter mouseleave');
		
		
	  };
  
  }
  
  menuIni(windowW);
  
  $j('.no-touch .hovernav a').click(function () {
    window.location = this.href;
  });
  
  var   prevW = windowW;
    
	$j(window).resize(debouncer(function(e) {

			var currentW = window.innerWidth || $j(window).width();
			if (currentW != prevW) {
				// start resize events					
					menuIni(currentW);
				// end resize events		
			}
			prevW = window.innerWidth || $j(window).width();
	}));
		
  
});

// Slide menu small Header

jQuery(function($j) {

    "use strict";

    $j("#openSlidemenu").click(function() {
        $j(".header--small #slidemenu").slideToggle(250, function() {
			$j(".header--small #slidemenu").toggleClass('open')
		});
        return false;
    });
	
	var prevW = window.innerWidth || $j(window).width();

    $j(window).resize(debouncer(function(e) {
			var currentW = window.innerWidth || $j(window).width();
			if (currentW != prevW) {
				// start resize events	
				if (currentW < 767) {
					$j(".header--small #slidemenu").show().removeClass('open');
				}
				else {
					$j(".header--small #slidemenu").hide()
				}
				// end resize events		
			}
			prevW = window.innerWidth || $j(window).width();
    }));

});


// Price Slider initialize

jQuery(function($j) {

    "use strict";
	
	if ($j('.price-slider').length) {
	
	var priceSlider = document.getElementById('priceSlider');

	noUiSlider.create(priceSlider, {
		start: [200, 800],
		connect: true,
		step: 1,
		range: {
			'min': 0,
			'max': 1000
		}
	});
	var tipHandles = priceSlider.getElementsByClassName('noUi-handle'),
		tooltips = [];

	// Add divs to the slider handles.
	for ( var i = 0; i < tipHandles.length; i++ ){
		tooltips[i] = document.createElement('div');
		tipHandles[i].appendChild(tooltips[i]);
	}

	tooltips[0].className += 'tooltip top';
	tooltips[0].innerHTML = '<div class="tooltip-inner"><span></span><div class="tooltip-arrow"></div></div>';
	tooltips[0] = tooltips[0].getElementsByTagName('span')[0];
	tooltips[1].className += 'tooltip top';
	tooltips[1].innerHTML = '<div class="tooltip-inner"><span></span><div class="tooltip-arrow"></div></div>';
	tooltips[1] = tooltips[1].getElementsByTagName('span')[0];

	// When the slider changes, write the value to the tooltips.
	priceSlider.noUiSlider.on('update', function( values, handle ){
		tooltips[handle].innerHTML = Math.round(values[handle]);
	});
	}

});

// Back to top button

jQuery(function($j) {

    "use strict";

	var windowH = $j(window).height();
	var backPos;
	if ($j("footer .back-to-top").length) {
		var backPos = $j("footer .back-to-top").offset();
		if (backPos.top < windowH) {
			$j("footer .back-to-top").hide();
		}	
	}
	
    $j("a[href='#top']").click(function() {
        $j("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

});

// show newsletter Modal

jQuery(function($j) {

    "use strict";
	if ($j('#newsletterModal').length) {
		var pause = $j('#newsletterModal').attr('data-pause');
		setTimeout(function() {
			$j('#newsletterModal').modal('show');
		}, pause);
	}

})


// If Header line not exists

jQuery(function($j) {

    "use strict";
    if (!$j('.header-line').length) {
        //$j('.header').addClass('header--no-line');
    }

});

// Slide menu small Header

// jQuery(function($j) {

    // "use strict";

    // $j("#openSlidemenu").click(function() {
        // $j("#slidemenu").slideToggle(250, function() {
			// $j("#slidemenu").toggleClass('open');
			// document.ontouchmove = function(e){ e.preventDefault(); }
		// });
        // return false;
    // });

// });


// Categories menu mobile

jQuery(function($j) {

    "use strict";
	
	var windowW = window.innerWidth || $j(window).width();

	
    if (windowW < 991) {
		$j("#categoriesMenu").click(function() {
				$j(".navbar-nav--vertical").slideToggle(250, function() {
					$j("#categoriesMenu").toggleClass('open');
					$j(".navbar-nav--vertical").toggleClass('open')
				});
				return false;
		});	
	}
	
	var   prevW = windowW;

    $j(window).resize(function() {
        var currentW = window.innerWidth || $j(window).width();

        if (currentW != prevW) {
            // start resize events
			if (currentW > 991) {
				$j(".navbar-nav--vertical").show().addClass('open')
			}
            // end resize events		
        }


        prevW = window.innerWidth || $j(window).width();


    });

})

// Slide menu mobile

jQuery(function($j) {

    "use strict";

    var windowW = window.innerWidth || $j(window).width();

    if (windowW < 768) {
        $j('#slidemenu').css({
            'height': $j(window).height()
        });
		//var closeMenu=$j('<div class="slidemenu-close">✕</div>');
		//$j('#slidemenu').append(closeMenu);
    }
    var toggler = '.navbar-toggle';
    var pagewrapper = '#pageContent';
    var footer = '.footer';
    var navigationwrapper = '.navbar-header';
    var menuwidth = '100%';
    var slidewidth = '80%';
    var menuneg = '-100%';

	$j("#slidemenu .slidemenu-close").on("click", function(e) {
	
		$j('body').removeClass('modal-open');
		
		$j('#slidemenu').stop().animate({
			left: menuneg
		});
		
    });
	
    $j("#navbar").on("click", toggler, function(e) {
	
		$j('body').addClass('modal-open');

        var selected = $j(this).hasClass('slide-active');

        $j('#slidemenu').stop().show().animate({
            left: selected ? menuneg : '0px'
        });

    });

    var windowW = window.innerWidth || $j(window).width();

    var   prevW = windowW;


    $j(window).resize(function() {
        var currentW = window.innerWidth || $j(window).width();

        if (currentW != prevW) {
            // start resize events
        if (currentW > 767) {
            $j('#slidemenu').css({
                'height': ''
            });
			$j('body').removeClass('modal-open');
			$j('#slidemenu').stop().animate({
				left: menuneg
			});
        } else {
            $j('#slidemenu').css({
                'height': $j(window).height()
            });
        }			
			
            // end resize events		
        }
        prevW = window.innerWidth || $j(window).width();


    });
});


// Listing page - mobile version - Filters slide

jQuery(function($j) {

    "use strict";

    var windowW = window.innerWidth || $j(window).width();

    if (windowW < 768) {
        $j('#filtersCol').css({
            'height': $j(window).height()
        });
    }

    var filterneg = '-100%';

    $j("#showFilterMobile").click(function() {

        var active = $j('#filtersCol').hasClass('filter-active');
		
		$j('body').toggleClass('modal-open');

        $j('#filtersCol').stop().animate({
            right: active ? filterneg : '0px'
        });

        $j('#filtersCol').toggleClass('filter-active');

    });
	
	$j("#filtersColClose").click(function() {

        $j('#filtersCol').stop().animate({
            right: filterneg
        });
		
		$j('body').removeClass('modal-open');
		
        $j('#filtersCol').toggleClass('filter-active');

    });
	

});


// Custom select initialized

jQuery(function($j) {

    "use strict";
    if ($j('.selectpicker').length) {
        $j('.selectpicker').selectpicker({
            showSubtext: true
        });
    }
})

// Without zoom previews switcher

jQuery(function($j) {
			

	if (!$j('.product-zoom').length) {
	
		$j('#mainProductImg').css({'min-height': $j('#mainProductImg img').height(), 'min-width': $j('#mainProductImg img').width() })		
			

		$j('#smallGallery a').click(function(e){
			e.preventDefault();
			$j('#smallGallery a').removeClass('active');
			$j(this).addClass('active');
			var targ = $j(this).parent('li').index();
			console.log(targ)
			var curImg = $j('#mainProductImg').find('div.product-main-image__item.active');
			var cur = curImg.index();
			console.log(cur)
			if (targ == cur) {
				return false;
			}
			else {
				var newImg = $j('#mainProductImg').find('div.product-main-image__item:nth-child('+ (targ+1) +')');
				//console.log (targ);
				curImg.removeClass('active');
				newImg.addClass('active')
			}
		})
		
	}

	var prevW = window.innerWidth || $j(window).width();
		
		$j(window).resize(debouncer(function(e) {
	
				var currentW = window.innerWidth || $j(window).width();
				if (currentW != prevW) {
					// start resize events	
					
					if (!$j('.product-zoom').length) {
	
						$j('#mainProductImg').css({'min-height': '', 'min-width': '' })	
						$j('#mainProductImg').css({'min-height': $j('#mainProductImg img').height(), 'min-width': $j('#mainProductImg img').width() })		

					}	
					
					// end resize events		
				}
				prevW = window.innerWidth || $j(window).width();
		}));
		
})

// Magnific Popup on Product Image click

jQuery(function($j) {

	if ($j('#mainProductImg .zoom-link').length) {
		$j('#mainProductImg').magnificPopup({
          disableOn: 767,
		  delegate: '.zoom-link',
          type: 'image',
          mainClass: 'mfp-fade',
          preloader: true,
          fixedContentPos: false,
		  gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          }
        });
	}
})

// Elevate Zoom

jQuery(function($j) {

    var windowW = window.innerWidth || document.documentElement.clientWidth;
	$j('.product-zoom').imagesLoaded(function() {
    if ($j('.product-zoom').length) {
        if (windowW > 767) {
            $j('.product-zoom').elevateZoom({
                zoomWindowHeight: $j('.product-zoom').height(),
                gallery: "smallGallery",
				galleryActiveClass: 'active'
            })
        } else {
            $j(".product-zoom").elevateZoom({
                gallery: "smallGallery",
                zoomType: "inner",
				galleryActiveClass: 'active'
            });
        }
    }
	})
	
	
	$j('.product-main-image > .product-main-image__zoom ').bind('click', function(){
	
		
			galleryObj = [];
			current = 0;
			itemN = 0;
			
		if ($j('#smallGallery').length){
			console.log('1');
			$j('#smallGallery li a').not('.video-link').each(function() {
				if ($j(this).hasClass('active')) {
					current = itemN;
				}
				itemN++;
				var src = $j(this).data('zoom-image'),
					type = 'image';
					image = {};
					image ["src"] = src;
					image ["type"] = type;

				galleryObj.push(image);
			});
		}
		
		else {
			console.log('2');
				itemN++;
				var src = $j(this).parent().find('.product-zoom').data('zoom-image'),
					type = 'image';
					image = {};
					image ["src"] = src;
					image ["type"] = type;

				galleryObj.push(image);
		}

	    $j.magnificPopup.open({
			items: galleryObj,
			gallery: {
				enabled: true,
			}
		}, current);
		
	});
	
    var  prevW = windowW;


    $j(window).resize(debouncer(function(e) {
        var currentW = window.innerWidth || $j(window).width();

        if (currentW != prevW) {
            // start resize events

	        $j('.zoomContainer').remove();
			$j('.elevatezoom').removeData('elevateZoom');

			if ($j('.product-zoom').length) {
				if (currentW > 767) {
					$j('.product-zoom').elevateZoom({
						zoomWindowHeight: $j('.product-zoom').height(),
						gallery: "smallGallery"
					})
				} else {
					$j(".product-zoom").elevateZoom({
						gallery: "smallGallery",
						zoomType: "inner"
					});
				}
			}		
			
			
            // end resize events		
        }


        prevW = window.innerWidth || $j(window).width();


    }));
})

// Show rev slider when page loaded

jQuery(function($j) {

    "use strict";

    if ($j(".tp-banner-container").length) {

        $j(".tp-banner-container").css({
            height: 'auto'
        }).animate({
            "opacity": "1"
        }, 500);

    }

});

jQuery(function($j) {

    "use strict";

    $j(".scroll-to-content").click(function() {
        $j('html, body').animate({
            scrollTop: $j(window).height()
        }, 500);
        $j(".scroll-to-content").hide(200);
    });

});

jQuery(function($j) {

    "use strict";
	
	var slideIndex = 0;
	
	function addToCompare(button) {
		var image = button.closest('.product-preview').find('.product-preview__image img').attr('src');
		var link = button.closest('.product-preview').find('.product-preview__image a').attr('href');
		var list = $j('.compare-box__items__list')
		slideIndex++;
		var addRow = '<div class="compare-box__items__list__item__delete"><a href="'+link+'" class="icon icon-clear"></a></div><a href="#"><img src="'+image+'" alt=""/></a>';
		//list.append(addRow);
		if (list.find('.empty').length){
			//console.log ('empty are')
			list.find('.empty:first').html(addRow).removeClass('empty');
		}
	}

	function removeAllFromCompare() {
		var item = $j('.compare-box__items__list__item');
		var list = $j('.compare-box__items__list');
		var addEmptyRow = '<li class="compare-box__items__list__item empty"><div class="compare-box__items__list__item__num"></div><img src="images/products/product-empty.png" alt=""/></li>';
		item.each(function() {
			if (!$j(this).hasClass('empty')) {
				$j(this).remove()
				list.append(addEmptyRow);
			}
		})
	}
	
	function removeFromCompare(button) {
		var item = button.parent('.compare-box__items__list__item');
		var list = $j('.compare-box__items__list');
		//var itemOrder = item.index() + 1;
		//var count = list.find('li').length - 1;
		item.remove();
		var addEmptyRow = '<li class="compare-box__items__list__item empty"><div class="compare-box__items__list__item__num"></div><img src="images/products/product-empty.png" alt=""/></li>';
		list.append(addEmptyRow);
		var empty = 0;
		list.find('li').each(function() {
			var thisCount = $j(this).index() + 1;
			//console.log(thisCount);
			$j(this).find('.compare-box__items__list__item__num').text(thisCount);
			if (!$j(this).hasClass('empty')) {
				empty = 1;
			}
		})
		if (empty == 0) {
			$j('#compareBox').stop(true, false).removeClass('minimize').removeClass('open');
			$j('body').removeClass('compare-minimize');			
		}
	}
	
    $j(document).on('click','.compare-box__items__list__item__delete', function(e) {
        e.preventDefault();
		removeFromCompare($j(this));
    });

    $j(document).on('click','#removeAllCompare', function(e) {
        e.preventDefault();
		removeAllFromCompare($j(this));
		$j('#compareBox').stop(true, false).removeClass('minimize').removeClass('open');
		$j('body').removeClass('compare-minimize');
    });
	
    //var windowW = window.innerWidth || document.documentElement.clientWidth;
	
    //if (windowW > 991) {
	
		$j('.compare-link').click(function(e) {
			e.preventDefault();
			addToCompare($j(this))
			$j('#compareBox').stop(true, false).removeClass('minimize').addClass('open');
			$j('body').removeClass('compare-minimize');
		});

		$j('.hide-compare').click(function(e) {
			e.preventDefault();
			$j('#compareBox').stop(true, false).removeClass('open').addClass('minimize');
			$j('body').addClass('compare-minimize');
		});

		$j('.show-compare').click(function(e) {
			e.preventDefault();
			$j('#compareBox').stop(true, false).removeClass('minimize').addClass('open');
			$j('body').removeClass('compare-minimize');
		});
		
		$j('.close-compare').click(function(e) {
			e.preventDefault();
			$j('#compareBox').stop(true, false).removeClass('minimize').removeClass('open');
			$j('body').removeClass('compare-minimize');
		});
		
		
	//}

});

// Sticky Header

jQuery(function($j) {

    "use strict";
		
    if ($j('header.header--sticky').length) {
		if ($j(document).scrollTop() > 150) {
			$j('header .navbar').addClass('stuck--smaller');
		}

		if ($j('header.header--max').length) {
			var sticky = new Waypoint.Sticky({
				element: $j('header #slidemenu')[0],
				offset: -1
			})
		}
		else {
			var sticky = new Waypoint.Sticky({
				element: $j('header .navbar')[0],
				offset: -1
			})
		}
    };
	
	// $j("body").on("touchstart", function(){
	// });
	
	$j("body").on("touchend", function(){
		if ($j(document).scrollTop() > 150) {
			if(!$j('header .navbar').hasClass('stuck--smaller')) {
				setTimeout(function() {
					$j('header .navbar').addClass('stuck--smaller');
				}, 300);
			}
		} else {
			$j('header .navbar').removeClass('stuck--smaller');
		}
	});

	
	var waypoints = $j('.no-touch header .navbar').waypoint(function(direction) {
        if (direction === 'down') {
			$j('.no-touch header .navbar').addClass('stuck--smaller');
        }
    }, {
        offset: -350
    })
	var waypoints = $j('.no-touch header .navbar').waypoint(function(direction) {
        if (direction === 'up') {
			$j('.no-touch header .navbar').removeClass('stuck--smaller');
        }
    }, {
        offset: -350
    })
	
	var prevW = window.innerWidth || $j(window).width();

	$j(window).resize(function() {
        var currentW = window.innerWidth || $j(window).width();

        if (currentW != prevW) {
            // start resize events
			if ($j(document).scrollTop() > 50) {
				$j('header .navbar').addClass('stuck--smaller');
			}        
            // end resize events
        }

        prevW = window.innerWidth || $j(window).width();

    });
	
	
});

// Product sticky navigation

jQuery(function($j) {
	
    "use strict";
	
	var windowW = window.innerWidth || $j(window).width();
	
	if (windowW > 767){
		if ($j('.nav-product').length){
			$j('.nav-product ul li a').click(function(e) {
				e.preventDefault();
				var targ = $j(this).attr('href');
				var posTop = $j(targ).offset().top - $j('.nav-product ul').outerHeight();
				$j('body,html').animate({
					'scrollTop': posTop
				});
			});
			var waypoints = $j('.product-additional__box').waypoint(function(direction) {
				if (direction === 'down') {
					var panel;
					panel = this.element.id;
					
					$j('.nav-product ul li.active').removeClass('active');
					$j(".nav-product ul li[data-target ='"+panel+"']").addClass('active');
				}
			}, {
				offset: $j('.nav-product').outerHeight() + 1
			})
			var waypoints = $j('.product-additional__box').waypoint(function(direction) {
				if (direction === 'up') {
					var panel;
					panel = this.element.id;
					console.log(panel + ' hit') ;
					$j('.nav-product ul li.active').removeClass('active');
					$j('.nav-product ul li[data-target ="'+panel+'"]').addClass('active');
				}
			}, {
				offset: -1
			})
			var stickyProduct = new Waypoint.Sticky({
				element: $j('.nav-product')[0]
			})
			if ($j('header.header--sticky').length) {
				var waypointsH = $j('#navProduct').waypoint(function(direction) {
					if (direction === 'down') {
						$j('header .navbar').css({'opacity': 0, 'top': '-100%'});
					}
				}, {
					offset: 50
				})
				var waypointsH = $j('#navProduct').waypoint(function(direction) {
					if (direction === 'up') {
						$j('header .navbar').css({'opacity': 1, 'top': ''});
					}
				}, {
					offset: 50
				})
			}
		}
	}
});



// Wave effect

jQuery(function($j) {

    "use strict";

    //Waves.attach('nav li .wave .link-name', ['waves-button']);
    Waves.attach('button.wave');
    Waves.attach('.wave-block');
    Waves.init();

});

// Mobile footer collapse

jQuery(function($j) {

    "use strict";


    $j('.mobile-collapse__title').click(function(e) {
        e.preventDefault;
        $j(this).parent('.mobile-collapse').toggleClass('open');
    })


});

// Filter collapse

jQuery(function($j) {

    "use strict";


    $j('.filters-col__collapse__title').click(function(e) {
        e.preventDefault;
        $j(this).parent('.filters-col__collapse').toggleClass('open');
    })


});

// Box collapse - shopping cart

jQuery(function($j) {

    "use strict";


    $j('.card--collapse .card-title').click(function(e) {
        e.preventDefault;
        $j(this).parent('.card').toggleClass('open');
    })


});

jQuery(function($j) {

    "use strict";

	// Product carousel Start	
    $j('.product-carousel.three-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });

    $j('.product-carousel.four-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });
	
	$j('.product-carousel.five-in-row').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '20px'
            }
        }]
    });
	// Product carousel End	
	
	// Category carousel Start	
    $j('.product-category-carousel').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '40px'
            }
        }]
    });
	// Category carousel End		
	
	// Category carousel Start	
    $j('.product-category-carousel-aside').slick({
        infinite: true,
        dots: false,
        lazyLoad: 'ondemand',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 560,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '40px'
            }
        }]
    });
	// Category carousel End	
	
	// Brand carousel Start	
	if ($j('.brands-carousel').closest('.aside-column').length) {
		$j('.brands-carousel').slick({
			infinite: true,
			dots: false,
			lazyLoad: 'ondemand',
			slidesToShow: 5,
			slidesToScroll: 5,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			}, {
				breakpoint: 560,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}, {
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '50px'
				}
			}]
		});
	}
	else {
		$j('.brands-carousel').slick({
			infinite: true,
			dots: false,
			lazyLoad: 'ondemand',
			slidesToShow: 7,
			slidesToScroll: 7,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			}, {
				breakpoint: 560,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}, {
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					centerMode: true,
					centerPadding: '50px'
				}
			}]
		});
	}
	// Brand carousel End	
	
	// Blog carousel Start	
	var blogCarousel = $j('.blog-carousel');
	
	if (blogCarousel.hasClass('show-2')) {
		blogCarousel.slick({
			infinite: true,
			dots: false,
			slidesToShow: 2,
			slidesToScroll: 2,
			responsive: [{
				breakpoint: 768,
				settings: {
					dots: true
				}
			}, {
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		}); 
	}
	else if (blogCarousel.hasClass('show-3')) {
		blogCarousel.slick({
			infinite: true,
			dots: false,
			slidesToShow: 3,
			slidesToScroll: 2,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots: true
				}
			}, {
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		}); 
	}	
	else if (blogCarousel.hasClass('show-4')) {
		blogCarousel.slick({
			infinite: true,
			dots: false,
			slidesToShow: 4,
			slidesToScroll: 2,
			responsive: [{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2,
					dots: true
				}
			},{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots: true
				}
			}, {
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}]
		}); 
	}
	else {
		blogCarousel.slick({
			infinite: true,
			dots: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			responsive: [{
				breakpoint: 768,
				settings: {
					dots: true
				}
			}]
		});
	}
	// Blog carousel End
	
	// Testimonials carousel Start
    $j('.testimonials-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
		arrows: false,
		dots: true
    });
	// Testimonials carousel End
	
	// Vertical products carousel Start
	
	if ($j('.products-widget-carousel').closest('.filters-col__collapse').length){

		var state = 0;
				
		if (!$j('.products-widget-carousel').closest('.filters-col__collapse').hasClass('open')) {
			var state = 1;
			$j('.products-widget-carousel').closest('.filters-col__collapse').addClass('open');
		}
		$j('.products-widget-carousel').on('init', function(event, slick){
			if (state == 1) {
			setTimeout(function() {
				$j('.products-widget-carousel').closest('.filters-col__collapse').removeClass('open');
			}, 1000);
			}
		});
		$j('.products-widget-carousel').slick({
			vertical: true,
			infinite: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			verticalSwiping: true,
			arrows: false,
			dots: true
		});
		
	}
	else {
		$j('.products-widget-carousel').slick({
			vertical: true,
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			verticalSwiping: true,
			arrows: false,
			dots: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			}]
		});
	}
	// Vertical products carousel End
	
	// Product thumbnails carousel Start	
    $j('.product-images-carousel ul').slick({
        infinite: false,
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
    });
	// Product thumbnails carousel End	
	
	// Product mobile slider Start	
    $j('#singleGallery').slick({
        infinite: false,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
	// Product mobile slider End

	// Product vertical product slider Start
	if ($j('#singleGalleryVertical').length) {
	$j('#singleGalleryVertical').on('init', function(event, slick){
		$j('#singleGalleryVertical').css({'opacity': 1})
	});
    $j('#singleGalleryVertical').css({'opacity': 0}).slick({
        infinite: false,
		vertical: true,
		verticalScrolling: true,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
    }).mousewheel(function(e) {
		e.preventDefault();

		if (e.deltaY < 0) {
			$j(this).slick('slickNext')
		}
		else {
			$j(this).slick('slickPrev')
		}
	});
	}
	// Product vertical product slider End	
	
	// Simple slider Start

	window.setTimeout(function() {
        $j('.single-slider').css({
			'opacity': '1'
		})
    },500);
	
	$j('.single-slider > ul').slick({
        infinite: false,
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
		responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
                dots: true
            }
        }]
    });
	// Simple slider End

    // $j('.compare-carousel').slick({
        // infinite: true,
        // dots: false,
        // slidesToShow: 6,
        // slidesToScroll: 1,
        // responsive: [{
            // breakpoint: 1200,
            // settings: {
                // slidesToShow: 5
            // }
        // }, {
            // breakpoint: 992,
            // settings: {
                // slidesToShow: 4
            // }
        // }, {
            // breakpoint: 768,
            // settings: {
                // slidesToShow: 3
            // }
        // }, {
            // breakpoint: 600,
            // settings: {
                // slidesToShow: 2
            // }
        // }, {
            // breakpoint: 480,
            // settings: {
                // slidesToShow: 1
            // }
        // }]
    // });

});


// Quick view

jQuery(function($j) {

    "use strict";

    $j('.btn-quickview').click(function(e) {
        e.preventDefault();
        var $jthis = $j(this),
            url = $jthis.attr("href");
        $j.ajax({
            url: url,
            cache: false,
            success: function(data) {
                var $jdata = $j(data);
                $j('#quickview .modal-content').empty().append($jdata);
            },
            complete: function() {
                setTimeout(function() {
                    $j('.product-images-carousel ul').on('init', function(e) {
                            $j('.product-images-carousel').addClass('loaded');
                        })
                        .slick({
                            infinite: false,
                            dots: false,
                            slidesToShow: 5,
                            slidesToScroll: 1
                        });
                }, 1000);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                return false;
            }
        })
    });
});

// Parallax

jQuery(function($j) {

    "use strict";
	if ($j('.content--parallax').length) {
		$j('.content--parallax').each(function() {
			var attr = $j(this).attr('data-image');		
			$j(this).css({'background-image': 'url('+attr+')'}).parallax("50%", 0.01);
		})
	}
	
	if ($j('.parallax').length) {
		$j('.parallax').each(function() {
			var attr = $j(this).attr('data-image');		
			$j(this).css({'background-image': 'url('+attr+')'}).parallax("50%", 0);
		})
	}

});

// Image background

jQuery(function($j) {

    "use strict";
	if ($j('.image-bg').length) {
		$j('.image-bg').each(function() {
			var attr = $j(this).attr('data-image');		
			$j(this).css({'background-image': 'url('+attr+')'});
		})
	}

});

jQuery(function($j) {

    "use strict";

    $j('#productOther > li').hover(function() {
        $j(this).toggleClass('show-image');
    });

});

jQuery(function($j) {

    "use strict";
	
    $j('.header__search input').focus(function() {

        $j('.search-focus-fade').stop().animate({
            "opacity": "0"
        }, 200);

    }).blur(function() {

        $j('.search-focus-fade').stop().animate({
            "opacity": "1"
        }, 200);

    });

})


jQuery(function($j) {

    "use strict";

    function onScrollInit(items, container) {
        items.each(function() {
            var element = $j(this),
                animationClass = element.attr('data-animation'),
                animationDelay = element.attr('data-animation-delay');

            element.css({
                '-webkit-animation-delay': animationDelay,
                '-moz-animation-delay': animationDelay,
                'animation-delay': animationDelay
            });

            var trigger = (container) ? container : element;

            trigger.waypoint(function() {
                element.addClass('animated').addClass(animationClass);
            }, {
                triggerOnce: true,
                offset: '90%'
            });
        });
    }

    onScrollInit($j('.animation'));
    onScrollInit($j('.staggered-animation'), $j('.staggered-animation-container'));
});

// Countdown ini

jQuery(function ($) {

	if ($j("#countdown1").length > 0){$j('#countdown1').countdown({until: new Date(2015, 10, 1)});}

});


//Isotope

jQuery(function($j) {

    "use strict";
	
	if ($j('.products-isotope').length){
		$j('.products-isotope').imagesLoaded(function() {
			
			window.setTimeout(function() {
				$j('.products-isotope').isotope({
				  itemSelector: '.product-preview-wrapper',
				  layoutMode: 'fitRows'
				});
			},500);
			
		});	
	}
	
	
	var minW =  parseInt($j('.products-col').find('.product-preview-wrapper:first-child').width());
	if ($j('.products-isotope').hasClass('two-in-row')){
			minW = minW-200;
	}
	
	if ($j('.products-col').parent().parent().hasClass('open')) {
		$j('.products-col').stop(true,false).animate({marginLeft: '280px'}, 200, 
			function() { 
				setProductSize($j('.products-col'),minW);
				$j('.products-isotope').isotope().isotope('layout');
		});
	}

	
	
	$j('#showFilter').click(function(e) {
        e.preventDefault();
		
		var minW =  parseInt($j('.products-col').find('.product-preview-wrapper:first-child').width());
		if ($j('.products-isotope').hasClass('two-in-row')){
				minW = minW-200;
		}
		if (!$j('.products-col').parent().parent().hasClass('open')) {
			$j('.products-col').parent().parent().addClass('open');
			$j('.products-col').stop(true,false).animate({marginLeft: '280px'}, 200, 
				function() { 
					setProductSize($j('.products-col'),minW);
					$j('.products-isotope').isotope().isotope('layout');
			});
		}
		else {
			$j('.products-col').parent().parent().removeClass('open');

			$j('.products-col').stop(true,false).animate({marginLeft: '0'}, 200, 
				function() {
					
					if ($j('.products-isotope').hasClass('two-in-row')){
						minW = $j('.products-isotope').width()/2;
					} else if ($j('.products-isotope').hasClass('three-in-row')){
						minW = $j('.products-isotope').width()/3;
					} else if ($j('.products-isotope').hasClass('four-in-row')){
						minW = $j('.products-isotope').width()/4;
					} else if ($j('.products-isotope').hasClass('five-in-row')){
						minW = $j('.products-isotope').width()/5;
					} else if ($j('.products-isotope').hasClass('six-in-row')){
						minW = $j('.products-isotope').width()/6;
					} else if ($j('.products-isotope').hasClass('seven-in-row')){
						minW = $j('.products-isotope').width()/7;
					} else if ($j('.products-isotope').hasClass('eight-in-row')){
						minW = $j('.products-isotope').width()/8;
					}
					
					setProductSize($j('.products-col'),minW);
					$j('.products-isotope.products-col').isotope().isotope('layout');
			});		
		}
	})

	var prevW = window.innerWidth || $j(window).width();
	
	$j(window).resize(function() {
        var currentW = window.innerWidth || $j(window).width();

        if (currentW != prevW) {
            // start resize events
			if($j('.products-isotope').length) {
				if ($j('.products-col').parent().parent().hasClass('open')) {
					$j('.products-col').stop(true,false).animate({marginLeft: '0'}, 0);
					$j('.products-col').find('.product-preview-wrapper').css("width", "");
					var minW =  parseInt($j('.products-col').find('.product-preview-wrapper:first-child').width());
					if ($j('.products-isotope').hasClass('two-in-row')){
						minW = minW-200;
					}
					$j('.products-col').stop(true,false).animate({marginLeft: '280px'}, 0, 
						function() { 
							setProductSize($j('.products-col'),minW);
							$j('.products-isotope.products-col').isotope().isotope('layout');
					});			
				}
				else {
					$j('.products-col').find('.product-preview-wrapper').css("width", "");
					setProductSize($j('.products-col'),minW);
					$j('.products-isotope.products-col').isotope().isotope('layout');
				}
			}


            // end resize events
        }

        prevW = window.innerWidth || $j(window).width();

    });

});

// Isotope Filters (for index-original.html)

jQuery(function ($) {
    "use strict";
    var hoverfold = $j(".products-isotope");
    if (hoverfold.length != 0) {
        var container = hoverfold;
        //$container.isotope();
        var optionSets = $j(".filters-by-category .option-set"),
            optionLinks = optionSets.find("a");
        optionLinks.click(function () {
            var thisLink = $(this);
            if (thisLink.hasClass("selected")) return false;
            var optionSet = thisLink.parents(".option-set");
            optionSet.find(".selected").removeClass("selected");
            thisLink.addClass("selected");
            var options = {},
                key = optionSet.attr("data-option-key"),
                value = thisLink.attr("data-option-value");
            value = value === "false" ? false : value;
            options[key] = value;
            if (key === "layoutMode" && typeof changeLayoutMode === "function") changeLayoutMode($this, options);
            else container.isotope(options);
            return false
        })
    }
});


// Grid / Row listing view

jQuery(function($j) {

    "use strict";
	
	$j('.products-isotope.products-col').on( 'layoutComplete',  function() {
		window.setTimeout(function() {
            $j('.products-isotope.products-col').removeClass('no-transition');
         },1000);
	})

	
	$j('a.link-row-view').click(function(e) {
        e.preventDefault();
		$j(this).addClass('active');
		$j('a.link-grid-view').removeClass('active');
		$j('.products-listing').addClass('row-view');
		$j('.products-col').find('.product-preview-wrapper').css("width", "");
			if ($j('.products-col').parent().hasClass('open')) {
				$j('.products-isotope.products-col').addClass('no-transition');
				$j('.products-col').stop(true,false).animate({marginLeft: '0'}, 0);
				var minW =  parseInt($j('.products-col').find('.product-preview-wrapper:first-child').width());
				$j('.products-col').stop(true,false).animate({marginLeft: '280px'}, 0, 
					function() { 
						setProductSize($j('.products-col'),minW);
						$j('.products-isotope.products-col').isotope('layout');
				});			
			}
			else {
				$j('.products-isotope.products-col').addClass('no-transition').isotope('layout');
			}	})
	
	$j('a.link-grid-view').click(function(e) {
        e.preventDefault();
		$j(this).addClass('active');
		$j('a.link-row-view').removeClass('active');
		$j('.products-listing').removeClass('row-view');
		$j('.products-col').find('.product-preview-wrapper').css("width", "");
			if ($j('.products-col').parent().hasClass('open')) {
				$j('.products-isotope.products-col').addClass('no-transition');
				$j('.products-col').stop(true,false).animate({marginLeft: '0'}, 0);
				$j('.products-col').find('.product-preview-wrapper').css("width", "");
				var minW =  parseInt($j('.products-col').find('.product-preview-wrapper:first-child').width());
				if ($j('.products-isotope').hasClass('two-in-row')){
					minW = minW-200;
				}
				$j('.products-col').stop(true,false).animate({marginLeft: '280px'}, 0, 
					function() {
						setProductSize($j('.products-col'),minW);
						$j('.products-isotope.products-col').isotope('layout');
				});			
			}
			else {
				$j('.products-isotope.products-col').addClass('no-transition').isotope('layout');
			}	})	
})


jQuery(function($j) {

    "use strict";

    var posts = $j('.posts-isotope');
	
	if (posts.length) {
		posts.isotope({
			itemSelector: '.post',
			masonry: {
				isFitWidth: true
			}
		});
		posts.imagesLoaded(function() {
			setPostSize();
		});	
	}
    function setPostSize() {
        var windowW = window.innerWidth || $(window).width(),
            itemsInRow = 1;
        if (windowW > 1199) {
            itemsInRow = 5;
        } else if (windowW > 991) {
            itemsInRow = 4;
        } else if (windowW > 767) {
            itemsInRow = 3;
        } else if (windowW > 480) {
            itemsInRow = 2;
        }
		// console.log(itemsInRow);
        var containerW = posts.parent('.container').width(),
            postW = Math.floor(containerW / itemsInRow);
        posts.find('.post').each(function() {
            $j(this).css({
                width: postW + 'px'
            });
        });
        posts.isotope('layout');
    }
	
	$j('.view-more').on( 'click', function() {
  
	  var item;
	  var target =  $j(this).attr('data-load');
	  
	  $j(this).hide();
  
  	  $j.ajax({
		  url: target,
		  success: function( data ) {
		  $j('#postPreload').append(data);  	  
		  
		  $j('#postPreload > div').each(function() {
			item = $j(this);
			posts.append(item).isotope('appended', item);
			setPostSize();
		  });


		 }
	  });
	  
    })
  

	
    var prevW = window.innerWidth || $j(window).width();

    $j(window).resize(debouncer(function(e) {
		if (posts.length) {			
			var currentW = window.innerWidth || $j(window).width();
			if (currentW != prevW) {
				// start resize events	
				setPostSize();
				// end resize events		
			}
			prevW = window.innerWidth || $j(window).width();
		}
    }));
})


jQuery(function($j) {

    "use strict";
	var gallery = $j('.gallery');
	
	
	gallery.imagesLoaded(function() {
		//console.log ('gallery images has loaded')
		if (gallery.length) {
			gallery.isotope({
				itemSelector: '.gallery__item',
				isResizeBound: false,
				masonry: {
					isFitWidth: true
				}
			});
			setGallerySize();
		}	
	})
	

    function setGallerySize() {
        var windowW = window.innerWidth || $(window).width(),
            itemsInRow = 1;
        if (windowW > 1199) {
            itemsInRow = 5;
        } else if (windowW > 991) {
            itemsInRow = 4;
        } else if (windowW > 767) {
            itemsInRow = 3;
        } else if (windowW > 480) {
            itemsInRow = 2;
        }
        var containerW = gallery.parent('.container').width(),
            galleryW = containerW / itemsInRow;
			
		gallery.find('.gallery__item').each(function() {
			if ($j(this).hasClass('gallery__item--double') && windowW > 767 ) {
				$j(this).css({
					width: galleryW*2 + 'px',
				});
			}
			else {
				$j(this).css({
					width: galleryW + 'px'
				});
			}
        });
		var galleryH = gallery.find('.gallery__item:not(.gallery__item--double)').height();
			gallery.find('.gallery__item').each(function() {
			$j(this).css({
					height: ''
			});
			if ($j(this).hasClass('gallery__item--double') && windowW > 767) {
				$j(this).css({
					height: galleryH*2 + 'px'
				});
			}
        });
		gallery.isotope('layout');
    }
	
	$j('.view-more-gallery').on( 'click', function() {
  
	  var item;
	  var target =  $j(this).attr('data-load');
	  
	  $j(this).hide();
  
  	  $j.ajax({
		  url: target,
		  success: function( data ) {
		  $j('#galleryPreload').append(data);  	  
		  
		  $j('#galleryPreload > div').each(function() {
			item = $j(this);
			gallery.append(item).isotope('appended', item);
			setGallerySize();
		  });


		 }
	  });
	  
    })
  
		var prevW = window.innerWidth || $j(window).width();
		
		$j(window).resize(debouncer(function(e) {
			if (gallery.length) {			
				var currentW = window.innerWidth || $j(window).width();
				if (currentW != prevW) {
					// start resize events	
					setGallerySize();
					// end resize events		
				}
				prevW = window.innerWidth || $j(window).width();
			}
		}));

	
})
// Art Catalogue

jQuery(function($j) {

    "use strict";
	var gallery = $j('.art-catalogue');
	
	 var windowW = window.innerWidth || $(window).width();
	 var containerW = gallery.width(),
         columnW = containerW / 4;
			
	if (gallery.length) {
		gallery.isotope({
			itemSelector: '.art-catalogue__item',
			isResizeBound: false,
			percentPosition: true,
			masonry: {
			  columnWidth: '.art-catalogue__item:not(.art-catalogue__item--double)'
			}
		});
		gallery.imagesLoaded(function() {
			setGallerySize();
		});	
	}
    function setGallerySize() {
        var windowW = window.innerWidth || $(window).width(),
            itemsInRow = 1;
        if (windowW > 1199) {
            itemsInRow = 4;
        } else if (windowW > 991) {
            itemsInRow = 4;
        } else if (windowW > 767) {
            itemsInRow = 2;
        } else if (windowW > 480) {
            itemsInRow = 2;
        }
        var containerW = gallery.parent('.container').width(),
            galleryW = containerW / itemsInRow;
			console.log(containerW);
			gallery.find('.art-catalogue__item').each(function() {
			if ($j(this).hasClass('art-catalogue__item--double') && windowW > 767 ) {
				$j(this).css({
					width: galleryW*2 + 'px',
				});
			}
			else {
				$j(this).css({
					width: galleryW + 'px'
				});
			}
        });
		gallery.isotope('layout');
    }		
		var prevW = window.innerWidth || $j(window).width();
		
		$j(window).resize(debouncer(function(e) {
			var gallery = $j('.art-catalogue');
			if (gallery.length) {			
				var currentW = window.innerWidth || $j(window).width();
				if (currentW != prevW) {
					// start resize events	
					
					setGallerySize();
					
					// end resize events		
				}
				prevW = window.innerWidth || $j(window).width();
			}
		}));

	
})
// 	Vertical Menu

jQuery(function($j) {

    "use strict";
	var windowW = window.innerWidth || $j(window).width();

	
	function setMenuSize(winW) {
		var vMenu = $j('.navbar-nav--vertical'),
		vMenuW = vMenu.innerWidth()-2,
		vMenuH = vMenu.innerHeight()+2,
		containerW = vMenu.closest('div[class^="container"]').width();		
		if (vMenu.length){
			if (winW > 991){
				vMenu.children('li').children('.dropdown-menu').css({'margin-left': vMenuW+'px'});		
				vMenu.find('.dropdown-menu.megamenu').css({"width": (containerW-vMenuW)+'px', "min-height": vMenuH +'px'});		
			}
			else {
				vMenu.children('li').children('.dropdown-menu').css({'margin-left': '', 'width': ''});	
			}
		}
	}
	
	setMenuSize(windowW);
	
	var prevW = windowW;
	
	$j(window).resize(debouncer(function(e) {
			var currentW = window.innerWidth || $j(window).width();
			if (currentW != prevW) {
				// start resize events
				setMenuSize(currentW);
				// end resize events		
			}
			prevW = window.innerWidth || $j(window).width();
	}));
});

// Blog Post button extend

jQuery(function($j) {

    "use strict";
	
	$j('.btn-plus > a').on('click', function(e){ 
		e.preventDefault() // prevent default action - hash doesn't appear in url
   		$j(this).parent().find( 'div' ).toggleClass( 'btn-plus__links--active' );
		$j(this).toggleClass('expanded');
    });
  
});

// tooltip ini

jQuery(function($j) {

    "use strict";
    $j('.tooltip-link').tooltip();

});

// open menu button small Header

jQuery(function($j) {

    "use strict";
    $j('#openMenu').on('click', function(e){
		
	})

});



// bootstrap minus and plus

jQuery(function($j) {

    "use strict";
    
    $j('.btn-number').click(function(e) {
        e.preventDefault();
        var type = $j(this).attr('data-type');
        var input = $j(this).closest('.input-group-qty').find('input.input-qty');
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {
			if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $j(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $j(this).attr('disabled', true);
                }
            }
        } else {
            input.val(0);
        }
    });
    $j('.input-number').focusin(function() {
        $j(this).data('oldValue', $j(this).val());
    });
    $j('.input-number').change(function() {

        var minValue = parseInt($j(this).attr('min'));
        var maxValue = parseInt($j(this).attr('max'));
        var valueCurrent = parseInt($j(this).val());

        var name = $j(this).attr('name');
        if (valueCurrent >= minValue) {
            $j(this).closest('.input-group-qty').find(".btn-number[data-type='minus']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $j(this).val($j(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $j(this).closest('.input-group-qty').find(".btn-number[data-type='plus']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $j(this).val($j(this).data('oldValue'));
        }


    });
    // $j(".input-number").keydown(function(e) {
        // if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // (e.keyCode == 65 && e.ctrlKey === true) ||
            // (e.keyCode >= 35 && e.keyCode <= 39)) {
            // return;
        // }
        // if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            // e.preventDefault();
        // }
    // });
	
});

// landing category

jQuery(function($j) {

    "use strict";
	var categoryImg = $j('.category-block__image');
	var categoryList = $j('.no-touch .category-block__list');
	var categoryListT = $j('.touch .category-block__list');
	// categoryImg.each(function() {
		// $j(this).css({'min-height': $j(this).height(), 'min-width': $j(this).width() })		
	// })
	
    categoryList.find('a').hover(function(e){
		e.preventDefault();
		$j(this).closest('.category-block__list').find('a').removeClass('active');
		$j(this).addClass('active');
		var targ = $j(this).parent('li').index();
		//console.log(targ)
		var curImg = $j(this).closest('.category-block').find('.category-block__image > img.active');
		var cur = curImg.index();
		//console.log(cur)
		if (targ == cur) {
			return false;
		}
		else {
			var newImg = $j(this).closest('.category-block').find('.category-block__image > img:nth-child('+ (targ+1) +')');
			//console.log (targ);
			curImg.removeClass('active');
			newImg.addClass('active')
		}
	})
	
	categoryListT.find('a').click(function(e){
		e.preventDefault();
		$j(this).closest('.category-block__list').find('a').removeClass('active');
		$j(this).addClass('active');
		var targ = $j(this).parent('li').index();
		//console.log(targ)
		var curImg = $j(this).closest('.category-block').find('.category-block__image > img.active');
		var cur = curImg.index();
		//console.log(cur)
		if (targ == cur) {
			window.location = this.href;
		}
		else {
			var newImg = $j(this).closest('.category-block').find('.category-block__image > img:nth-child('+ (targ+1) +')');
			//console.log (targ);
			curImg.removeClass('active');
			newImg.addClass('active')
		}
	})
	// var prevW = window.innerWidth || $j(window).width();
	// $j(window).resize(debouncer(function(e) {
		// var currentW = window.innerWidth || $j(window).width();
		// if (currentW != prevW) {
			// // start resize events	
			// // categoryImg.each(function() {
				// // $j(this).css({'min-height': $j(this).height(), 'min-width': $j(this).width() })		
			// // })			
			// // end resize events		
		// }
		// prevW = window.innerWidth || $j(window).width();
	// }));

});

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );



// Modal Search Popup


jQuery(function($j) {
	
	if ($j('.overlay').length && $j('.search-open').length) {
	
    var triggerBttn = $j('.search-open'),
        overlay = document.querySelector('div.overlay'),
        closeBttn = overlay.querySelector('button.overlay-close');
		transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
        support = {
            transitions: Modernizr.csstransitions
        };

    function toggleOverlay() {
        if (classie.has(overlay, 'open')) {
			$j('body').removeClass('modal-open');
            classie.remove(overlay, 'open');
            classie.add(overlay, 'close');
            var onEndTransitionFn = function(ev) {
                if (support.transitions) {
                    if (ev.propertyName !== 'visibility') return;
                    this.removeEventListener(transEndEventName, onEndTransitionFn);
                }
                classie.remove(overlay, 'close');
            };
            if (support.transitions) {
                overlay.addEventListener(transEndEventName, onEndTransitionFn);
            } else {
                onEndTransitionFn();
            }
        } else if (!classie.has(overlay, 'close')) {
            classie.add(overlay, 'open');
			$j('body').addClass('modal-open');
        }

		return false;
    }

    triggerBttn.on('click', toggleOverlay);
    closeBttn.addEventListener('click', toggleOverlay);
	}
});


// Landing content page

jQuery(function($j) {
	
    "use strict";
	function isiPad(){
		return (navigator.platform.indexOf("iPad") != -1);
	}
	
	function setChapterHeight() {
		var windowH = $j(window).height();
		if(isiPad()) {
			windowH+=80
		}
		$j('.chapter').each(function() {
			$j(this).css({'min-height': windowH+'px'});
		})
		$j('.chapter__title').each(function() {
			$j(this).css({'min-height': windowH+'px'})
		})
		$j('.chapter__content').each(function() {
			$j(this).css({'min-height': windowH+'px'})
		})
		$j('.chapter__content .category-big-banner, .chapter__content .category-big-banner__image').each(function() {
			$j(this).css({'min-height': windowH+'px'})
		})
	}
	function addChapterEnd() {
		$j('.chapter').each(function() {
			var row_str = '<div class="chapter__end">chapter END</div>';
			$j(this).append(row_str);
		})
	}
	function setChapterWaypoint() {
			var waypoints = $j('.chapter').waypoint(function(direction) {
				if (direction === 'down') {
					$j('.chapter__title').removeClass('title--fixed').removeClass('title--bottom');
					$j('.chapter__title').removeClass('title--fixed');				
					$j(this.element).find('.chapter__title').addClass('title--fixed');
					// var panel;
					// panel = this.element.id
					// console.log(panel + ' hit') 
				}
			}, {
				offset: 0
			})
			var waypoints = $j('.chapter').waypoint(function(direction) {
				if (direction === 'up') {
					$j('.chapter__title').removeClass('title--fixed').removeClass('title--bottom');				
					// var panel;
					// panel = this.element.id
					// console.log("up " + panel + ' hit') 
				}
			}, {
				offset: 0
			})
			var waypointsEnd = $j('.chapter__end').waypoint(function(direction) {
				if (direction === 'down') {
					$j('.chapter__title').removeClass('title--fixed').removeClass('title--bottom');				
					$j(this.element).parent().find('.chapter__title').addClass('title--bottom');
					var panel;
					panel = $j(this.element).parent().attr('id');
					console.log(panel + ' End hit') 
				}
			}, {
				offset: $j(window).height()
			})
			var waypointsEnd = $j('.chapter__end').waypoint(function(direction) {
				if (direction === 'up') {
					$j('.chapter__title').removeClass('title--fixed').removeClass('title--bottom');				
					$j(this.element).parent().find('.chapter__title').addClass('title--bottom');
					// var panel;
					// panel = $j(this.element).parent().attr('id');
					// console.log("up " + panel + ' End hit') 
				}
			}, {
				offset: 0
			})
			var waypointsEndB = $j('.chapter__end').waypoint(function(direction) {
				if (direction === 'up') {
					$j('.chapter__title').removeClass('title--fixed').removeClass('title--bottom');				
					$j(this.element).parent().find('.chapter__title').addClass('title--fixed');
					// var panel;
					// panel = $j(this.element).parent().attr('id');
					// console.log("upB " + panel + ' End hit') 
				}
			}, {
				offset: $j(window).height()
			})				

	}
		
	var windowW = window.innerWidth || $j(window).width();
	
	if ($j('#landingContent').length) {
	
	if (windowW > 991){
			
			setChapterHeight();
			addChapterEnd();
			setChapterWaypoint();
			
		}
		else {
			setChapterHeight();
		}
	}

		$j(window).resize(debouncer(function(e) {
		var windowW = window.innerWidth || $j(window).width();
	
	if ($j('#landingContent').length) {
		
		if (windowW > 991){
			
			setChapterHeight();
			addChapterEnd();
			setChapterWaypoint();
			
		}
		else {
			setChapterHeight();
			Waypoint.disableAll()
		}	
	
	}
		
	}));

});



jQuery(function($j) {
	
    "use strict";
	
	 $j('.ajax-to-cart').click(function(e){
		e.preventDefault();
		 $j(this).addClass('btn--wait');
		 $j.ajax({url: "ajax.php", success: function(result){
			 console.log('ajax load');
			 $j('.ajax-to-cart').removeClass('btn--wait');
			 $j('#modalAddToCart').modal("toggle");
			}});
	});
	 $j('.ajax-to-wishlist').click(function(e){
		e.preventDefault();
		$j('#modalAddToWishlist').modal("toggle");		
		$j('#modalAddToWishlist .loading').show();
		$j('#modalAddToWishlist .success').hide();		
		$j.ajax({url: "ajax.php", success: function(result){
			$j('#modalAddToWishlist .loading').hide();
			$j('#modalAddToWishlist .success').show();

			}});
	});
});


// MD inputs label

jQuery(function($j) {
	
    "use strict";

  $j('.input-group--wd > input, .input-group--wd > textarea ').blur(function() {
    var $this = $j(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });
  
 });
 
// Remove Loader

jQuery(function($j) {
	
	"use strict";
	$j('body').addClass('loaded');
 
});

// Gallery Popup

jQuery(function($j) {
	
    "use strict";
	if ($j('#gallery').length) {
	$j('#gallery a.btn').magnificPopup({
		type:'image',
		gallery:{
			enabled:true
		}
	});
	}
	
});

// Video Popup

jQuery(function($j) {
	

    "use strict";

	if ($j('.video-link').length) {
		$j('.video-link').magnificPopup({
          disableOn: 767,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: true,
          fixedContentPos: false
        });
	}
	
});


// Set carousel nav position

jQuery(function($j) {

    "use strict";
	
	var prevW = window.innerWidth || $j(window).width();

	if ($j('body').hasClass('boxed')) {
		$j('.aside-column .slick-slider.slick-initialized').each(function() {
			if (!$j(this).hasClass('nav-top')) {
					$j(this).addClass('nav-inside');
			}
		})
	}
	
	if ($j('body').hasClass('fullwidth')) {
		$j('.slick-slider.slick-initialized').each(function() {
			if (!$j(this).hasClass('nav-top')) {
					$j(this).addClass('nav-inside');
			}
		})
	}
	else {
		$j('.slick-slider.slick-initialized').each(function() {
			if (!$j(this).closest('.single-slider').length) {
				
				if ($j('body').hasClass('boxed') && !$j(this).hasClass('blog-carousel')) {
					var outerW = prevW;
				}
				else var outerW = $j(this).closest('section').width();
				
				//console.log (outerW);
				//console.log ($j(this).width());
				//console.log ('---------------------------');
				if ((outerW - $j(this).width()) * 0.5 < 45) {
					$j(this).addClass('nav-inside');
					$j('.slick-initialized').slick('setPosition');
				}
				
			}
		});
	}

    $j(window).resize(debouncer(function(e) {
        var currentW = window.innerWidth || $j(window).width();
        if (currentW != prevW) {
            // start resize events		
		
		$j('.slick-slider.slick-initialized').each(function() {
			if (!$j(this).closest('.single-slider').length) {
				
				if ($j('body').hasClass('boxed') && !$j(this).hasClass('blog-carousel')) {
					var outerW = currentW;
				}
				else var outerW = $j(this).closest('section').width();
				
				//console.log (outerW);
				//console.log ($j(this).width());
				//console.log ('---------------------------');
				if ((outerW - $j(this).width()) * 0.5 < 45) {
					$j(this).addClass('nav-inside');
					$j('.slick-initialized').slick('setPosition');
				}
				else {
					$j(this).removeClass('nav-inside');
				}
				
			}
		});
			
            // end resize events		
        }
        prevW = window.innerWidth || $j(window).width();

    }));

});

// double click fo touch devices

jQuery(function($j) {

    "use strict";
	
	var windowW = window.innerWidth || $j(window).width();
	
	$j('.touch category-block__list a').doubleTapToGo();
	if (windowW > 767) {
		$j('.touch ul.navbar-nav > li').each(function() {
			if ($j(this).find('a').hasClass('dropdown-toggle')) {
				$j(this).doubleTapToGo()
			}
		})
	}
	//$j('.touch .navbar-nav .hovernav').doubleTapToGo();
    $j('.touch .product-preview').doubleTapToGo();
	
});

// Add active class to opened accordion panel

jQuery(function($j) {
	
    "use strict";
	
	$j('.panel-group')
	  .on('show.bs.collapse', function(e) {
		$j(e.target).prev('.panel-heading').addClass('active');
	  })
	  .on('hide.bs.collapse', function(e) {
		$j(e.target).prev('.panel-heading').removeClass('active');
	});

});

// Tools Panel

jQuery(function($j) {
	
    "use strict";
	
	// ini toggles on load
	if ($j('header').hasClass("header--sticky")) {
		 $j('#tglFloatHeader').addClass("checked");
	}
	if ($j('body').hasClass("boxed")) {
		 $j('#tglBoxed').addClass("checked");
	}	
	if ($j('body').hasClass("fullwidth")) {
		 $j('#tglFull').addClass("checked");
	}	
	
   $j('.menu-btn').click(function() {
      $j('.box-out').toggleClass('box-in');
	  $j('.box-out .icon').toggleClass('rotating');
    });

   $j('#tglFloatHeader').click(function() {
      $j(this).toggleClass("checked");
	  $j('header').toggleClass("header--sticky");
    });	
	
   $j('#tglBoxed').click(function() { 
	  $j('body').removeClass("fullwidth");
	  setTimeout(function() {
		$j('header .navbar').addClass('stuck--smaller');
	  }, 300);
	  $j('body').removeClass("wide");
	  $j('body').addClass("boxed");
	  $j('.slick-initialized').slick('setPosition');
	  setTimeout(function() {
		$j(window).trigger('resize'); 
	  }, 1);
    });	
	
   $j('#tglFull').click(function() {
	  $j('body').removeClass("boxed");  
	  $j('body').addClass("fullwidth");
	  $j('body').removeClass("wide");
	  $j('.slick-initialized').slick('setPosition');
	  setTimeout(function() {
		$j(window).trigger('resize'); 
	  }, 1);
    });	
	
	$j('#tglDefault').click(function() { 
	  $j('body').removeClass("fullwidth");
	  $j('body').removeClass("boxed");
	  $j('body').removeClass("wide");
	  $j('.slick-initialized').slick('setPosition');
	  setTimeout(function() {
		$j(window).trigger('resize'); 
	  }, 1);
    });
	
	$j('#tglWide').click(function() { 
	  $j('body').removeClass("fullwidth");
	  $j('body').removeClass("boxed");
	  $j('body').addClass("wide");
	  $j('.slick-initialized').slick('setPosition');
	  setTimeout(function() {
		$j(window).trigger('resize'); 
	  }, 1);
    });	
});
