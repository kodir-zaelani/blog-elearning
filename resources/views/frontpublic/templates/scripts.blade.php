<!-- External JavaScripts -->
<script src="{{ asset('assets/frontpublic/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/counter/counterup.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/masonry/masonry.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/masonry/filter.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{ asset('assets/frontpublic/js/functions.js')}}"></script>
<script src="{{ asset('assets/frontpublic/js/contact.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/switcher/switcher.js')}}"></script>


<script src="{{ asset('assets/frontpublic/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('assets/frontpublic/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script>
jQuery(document).ready(function() {
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_486_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_486_1");
	}else{
		ttrevapi = tpj("#rev_slider_486_1").show().revolution({
			sliderType:"standard",
			jsFileLocation:"assets/frontpublic/vendors/revolution/js/",
			sliderLayout:"fullwidth",
			dottedOverlay:"none",
			delay:9000,
			navigation: {
				keyboardNavigation:"on",
				keyboard_direction: "horizontal",
				mouseScrollNavigation:"off",
				mouseScrollReverse:"default",
				onHoverStop:"on",
				touch:{
					touchenabled:"on",
					swipe_threshold: 75,
					swipe_min_touches: 1,
					swipe_direction: "horizontal",
					drag_block_vertical: false
				}
				,
				arrows: {
					style: "uranus",
					enable: true,
					hide_onmobile: false,
					hide_onleave: false,
					tmp: '',
					left: {
						h_align: "left",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					},
					right: {
						h_align: "right",
						v_align: "center",
						h_offset: 10,
						v_offset: 0
					}
				},
				
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%",
				presize:false
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,600,600,600],
			lazyType:"none",
			parallax: {
				type:"scroll",
				origo:"enterpoint",
				speed:400,
				levels:[5,10,15,20,25,30,35,40,45,50,46,47,48,49,50,55],
				type:"scroll",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	}
});	
</script>