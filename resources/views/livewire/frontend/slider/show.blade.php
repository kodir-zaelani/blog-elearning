<div>
    <!-- Hero Area -->
<section class="hero-area">
    <div class="hero-slider">
        <!-- Single Slider -->
        @foreach ($sliders as $slider)
            <div class="single-slider" style="background-image:url('{{ asset($slider->imageUrl)}}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="slider-text">
                            <div class="text-inner">
                                {{--  <span class="short">{{ $slider->title }}</span>
                                <h1>{{ $slider->title }}</h1>
                                <p>{{ $slider->description }}</p>
                                <div class="button">
                                    <a href="{{ $slider->url_link }}" target="_blank" class="btn icon">{{ $slider->title_link }}<i class="fa fa-paper-plane"></i></a>
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
        @endforeach

    </div>
</section>
<!--/ End Hero Area -->
</div>
