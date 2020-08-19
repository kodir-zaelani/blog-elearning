<div>
    <section class="portfolio section my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Gallery Photo</h2>
                    <p>Sed lorem enim, faucibus at erat eget, laoreet tincidunt tortor. Ut sed mi nec ligula bibendum aliquam. Sed scelerisque maximus magna, a vehicula turpis Proin</p>
                </div>
            </div> 
        </div> 
        <div class="row">
            <div class="col-12">
                <!-- portfolio Nav -->
                <div class="portfolio-nav">
                    <ul class="tr-list list-inline cbp-l-filters-work" id="portfolio-menu">
                        <li data-filter="*" class="cbp-filter-item active">All<div class="cbp-filter-counter"></div></li>  
                        @foreach ($albums as $album)
                            <li data-filter=".{{ $album->title }}" class="cbp-filter-item">{{ $album->title }}<div class="cbp-filter-counter"></div></li>
                        @endforeach

                    </ul>  		
                </div>
                <!--/ End portfolio Nav -->
            </div>
        </div>
        <div class="portfolio-inner">
            <div id="portfolio-item">
                @foreach ($photos as $photo)
                    
                <!-- Single portfolio -->
                <div class="cbp-item {{ $photo->album->title }} package">
                    <div class="portfolio-single">
                        <div class="portfolio-head">
                            @if ($photo->ImageThumbUrl)
                            <a data-fancybox="portfolio" href="{{ $photo->ImageUrl }}" ><img src="{{ $photo->ImageThumbUrl }}" alt="#"/></a>
                            @else
                            <img src="assets/kz/images/gallery-1.jpg" alt="#"/>
                            @endif
                            <div class="portfolio-hover">
                                <h4>{{ $photo->caption }}</h4>
                                {{-- <h4><a href="{{ route('portfolio') }}">{{ $photo->caption }}</a></h4> --}}
                                <div class="p-button">
                                    <a data-fancybox="portfolio" data-caption="{{ $photo->caption }}" href="{{ $photo->ImageUrl }}" class="btn primary" data-caption="{{ $photo->caption }}"><i class="fa fa-photo"></i></a>
                                    {{-- <a href="{{ route('portfolio') }}" class="btn"><i class="fa fa-link"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row text-center mt-4">
                <div class="col-12 ">
                    <a href="{{ route('portfolio') }}" class="btn animate">View More</a>
                </div>
            </div>	
          </div>
    </div>
</section>
</div>
