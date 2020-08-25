<div>
    <section class="services section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Agenda</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="service-slider">
                        @foreach ($events as $event)
                        <div class="card h-100 shadow-sm border-0 rounded-lg single-service ">
                            <div class="card-img">
                                @if ($event->ImageThumbUrl)
                                <a href="{{ route('event.show', $event->slug) }}"><img src="{{ $event->ImageThumbUrl }}" alt="{{ $event->title }}" class="w-100"
                                    style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;"></a>   
                                @else
                                <a href="{{ route('event.show', $event->slug) }}"><img src="assets/frontpublic/images/blog/latest-blog/pic1.jpg" alt="{{ $event->title }}" 
                                    class="w-100"
                                style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;"></a>
                                @endif
                            </div>
                            <div class="card-body blog-bottom">
                                <h6><a href="{{ route('event.show', $event->slug) }}">{{ $event->title }}</a></h6>
                                <div>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $event->location }}
                                </div>
                                <div>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ $event->date }}
                                </div>
                                {!! $event->content !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
