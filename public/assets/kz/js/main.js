/* =====================================
Template Name: Bizlamp
Author Name: ThemeLamp
Author URI: http://themelamp.com
Description: Bizlamp is a multipurpose business html5 template. This template is perfect for any business purpose.
Version:	1.0
========================================*/
/*=======================================
[Start Activation Code]
=========================================
	01. Search JS
	02. Side Area JS
	03. Sticky Header JS
	04. Home Slider JS
	05. Service Slider JS
	06. Service Gallery JS
	07. Service Popular Slider JS
	08. Testimonial Slider JS
	09. Brand Slider JS
	10. Blog Slider JS
	11. Blog Image Gallery JS
	12. About Gallery JS
	13. Portfolio Gallery JS
	14. Portfolio More Slider JS 
	15. Product Slider JS
	16. Flex Slider JS
	17. Text Rotating JS
	18. Nice Select JS
	19. Circle Progress JS
	20. Video Popup JS
	21. CountDown JS
	22. Other JS
=========================================
[End Activation Code]
=========================================*/ 

(function($) {
    "use strict";
     $(document).on('ready', function() {
	
		/*====================================
			01. Search JS
		======================================*/ 
		$('.search .icon').on( "click", function(){
			$('.search-form, .right-bar .search').toggleClass('active');
		});	
		
		/*====================================
		02. Side Area JS
		======================================*/ 
		$('.nav-icon .bar, .cross .btn').on( "click", function(){
			$('.side-area').toggleClass('active');
		});	
		
		/*====================================
		03. Sticky Header JS
		======================================*/ 
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('.header').addClass("sticky");
			} else {
				$('.header').removeClass("sticky");
			}
		});
		
		/*====================================
		04. Home Slider JS
		======================================*/
		$('.hero-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayHoverPause:true,
			autoplayTimeout:4000,
			smartSpeed:600,
			merge:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots:true,
			loop:true,
			responsive:{
				300: {
					nav:false,
				},
				480: {
					nav:false,
				},
				768: {
					nav:false,
				},
				1170: {
					nav:true,	
				},
			}
		});
		
		/*===============================
		05. Service Slider JS
		=================================*/ 
		$(".service-slider").owlCarousel({
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			dots:false,
			nav:true,
			loop:true,
			margin:10,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:2,
				},
				768: {
					items:2,
				},
				1170: {
					nav:true,
					items:4,
				},
			}
		});	
		
		/*====================================
		06. Service Gallery JS
		======================================*/		
		$('.service-gallery').owlCarousel({
			items:1,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		});
		
		
		/*====================================
		07. Service Popular Slider JS
		======================================*/		
		$('.more-service-slider').owlCarousel({
			items:1,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:false,
			dots:true,
		});	
		
		/*====================================
		08. Testimonials Slider JS
		======================================*/
		$('.testimonials-slider').owlCarousel({
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			dots:true,
			items:1,
		});	
		
		/*====================================
		09. Brand Slider JS
		======================================*/
		$('.brands-slider').owlCarousel({
			autoplay:true,
			smartSpeed: 400,
			autoplayTimeout:2500,
			margin:15,
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots:false,
			responsive:{
				300: {
					items:2,
					nav:false,
				},
				480: {
					items:3,
					nav:false,
				},
				768: {
					items:4,
					nav:false,
				},
				1170: {
					nav:true,			
					items:6,
				},
			}
		});	
		
		/*====================================
		10. Blog Slider JS
		======================================*/
		$('.blog-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:3000,
			smartSpeed:500,
			margin:0,
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			dots:true,
		});	
		
		/*====================================
		11. Blog Image Gallery JS
		======================================*/
		$('.blog-image-gallery').owlCarousel({
			autoplay:true,
			autoplayTimeout:4000,
			smartSpeed:600,
			autoplayHoverPause:true,
			loop:true,
			dots:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			items:1,
		});	

		/*====================================
		12. About Gallery JS
		======================================*/
		$('.about-gallery').owlCarousel({
			autoplay:true,
			autoplayTimeout:4000,
			smartSpeed:500,
			autoplayHoverPause:true,
			loop:true,
			nav:true,
			navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
			dots:false,
			items:1,
		});		

		/*====================================
		13. Portfolio Gallery JS
		======================================*/		
		$('.portfolio-gallery').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:4000,
			smartSpeed:600,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			dots:false,
		});				
		
		/*====================================
		14. Portfolio More Slider JS
		======================================*/		
		$('.portfolio-more-slider').owlCarousel({
			items:1,
			autoplay:true,
			autoplayTimeout:3500,
			smartSpeed:500,
			autoplayHoverPause:true,
			loop:true,
			merge:true,
			nav:false,
			dots:true,
		});		
		
		/*====================================
		15. Product Slider JS
		======================================*/
		$('.product-slide').owlCarousel({
			autoplay:true,
			autoplayTimeout:3000,
			smartSpeed:500,
			autoplayHoverPause:true,
			loop:true,
			nav:false,
			dots:true,
			items:1,
		});		
		
		/*====================================
		16. Flex Slider JS
		======================================*/
		(function($) {
			'use strict';	
				$('.flexslider-thumbnails').flexslider({
					animation: "slide",
					controlNav: "thumbnails",
				});
		})(jQuery);
		
		/*===============================
		17. Text Rotating JS
		=================================*/ 
		$("#text-rotating").Morphext({
			// The [in] animation type. Refer to Animate.css for a list of available animations.
			animation: "flipInX",
			// An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
			separator: ",",
			// The delay between the changing of each phrase in milliseconds.
			speed: 2500,
			complete: function () {
				// Called after the entrance animation is executed.
			}
		});		

		/*====================================
		18. Nice Select JS
		======================================*/	
		$('select').niceSelect();
		
		/*====================================
		19. Circle Progress JS
		======================================*/		
		$('.circle').circleProgress({
			fill: {
			color: '#1BBC9B'
			}
		})
		
		/*===============================
		20. Video Popup JS
		=================================*/
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
		/*====================================
		21. CountDown JS
		======================================*/		
		$('[data-countdown]').each(function() {
			var $this = $(this),
				finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
				$this.html(event.strftime(
					'<div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>Minutes.</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>Seconds.</p></span></div>'
				));
			});
		});	

		/*=====================================
		22.	Others JS
		======================================*/ 
		/* Mobile Menu */
		$('.main-menu').slicknav({
			prependTo:".mobile-nav",
		});
		
		/* Slider Range */
		$( function() {
			$( "#slider-range" ).slider({
			  range: true,
			  min: 0,
			  max: 500,
			  values: [ 120, 250 ],
			  slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			  }
			});
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
		} );
		
		/* Counter Up */
		$('.counter').counterUp({
			time: 1000
		}); 
		$('.number').counterUp({
			time: 1000
		});
		
		$('#accordion-one .single-faq').on('click', function() {
            $("#accordion-one .single-faq, #accordion-one .single-faq a").removeClass("active");
            $(this).addClass("active");
		});
	
		/* Scroll Up JS */
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			easingType: 'easeInOutQuart',        // Scroll to top easing (see http://easings.net/)
			animation: 'fade',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647           // Z-Index for the overlay
		});
	});
	
})(jQuery);
