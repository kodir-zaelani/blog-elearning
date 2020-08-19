<div>
    <div class="rev-slider">
        <div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
            <div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                <ul>	<!-- SLIDE  -->
                    @foreach ($sliders as $slider)

                    <li data-index="rs-100" 
                    data-transition="parallaxvertical" 
                    data-slotamount="default" 
                    data-hideafterloop="0" 
                    data-hideslideonmobile="off" 
                    data-easein="default" 
                    data-easeout="default" 
                    data-masterspeed="default" 
                    data-rotate="0" 
                    data-fstransition="fade" 
                    data-fsmasterspeed="1500" 
                    data-fsslotamount="7" 
                    data-saveperformance="off" 
                    data-param1="" data-param2="" 
                    data-param3="" data-param4="" 
                    data-param5="" data-param6="" 
                    data-param7="" data-param8="" 
                    data-param9="" data-param10="" 
                    data-description="">
                        <img src="{{ asset($slider->ImageUrl)}}" alt="" 
                            data-bgposition="center" 
                            data-bgfit="cover" 
                            data-bgrepeat="no-repeat" 
                            data-bgparallax="10" 
                            class="rev-slidebg" 
                            data-no-retina />
                    </li>
                    @endforeach
                    <!-- SLIDE  -->
                </ul>
            </div> 
        </div>  
    </div>
</div>
