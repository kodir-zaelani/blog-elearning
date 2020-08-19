<div>
    <section class="services section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Gallery Video</h2>
                        <p>Sed lorem enim, faucibus at erat eget, laoreet tincidunt tortor. Ut sed mi nec ligula bibendum aliquam. Sed scelerisque maximus magna, a vehicula turpis Proin</p>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="service-slider">
                        @foreach ($videos as $video)
                        <div class="card h-100 shadow-sm border-0 rounded-lg single-service ">
                            <div class="card-img">
                                <iframe width="100%" height="200px" src="{{ $video->embed }}" 
                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                            </div>
                            <div class="card-body blog-bottom">
                                <h6><a href="#">{{ $video->title }}</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
