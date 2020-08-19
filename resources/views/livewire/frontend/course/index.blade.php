<div>
    <section class="call-to-action overlay dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll out-of-bootstrap" data-options='{ direction: "normal"}'>
        <div class="overlay divimage dzsparallaxer--target bg-image" ></div>
        <div class="call-to-main">
            <div id="particles-js"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-12">
                        <div class="text-inner">
                            <div class="call-text">
                                <h2>Belajar Apa hari ini? <span id="text-rotating">Pendidikan Agama, Pengetahuan Umum, Kewarganegaraan, Bahasa</span> </h2>
                            </div>
                            <div class="button">
                                {{-- <a href="blog.html" class="btn animate">Read Our Blog</a> --}}
                                <div class="single-bar search">
                                    <div class="search-form">
                                        <!-- Search Form -->
                                        <form class="form" action="{{ route('post.search') }}">
                                            {{-- <label for="term">Silahkan ketik kata kunci pencarian pada course</label> --}}
                                            <input class="form-control" type="text" id="term" value="{{ request('term') }}" required  name="term" placeholder="Search something for Course ..."> <br/>
                                            <button type="submit" class="btn animate">Search Course</button>
                                        </form>
                                        <!--/ End Search Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="services section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Popular Course</h2>
                    </div>
                </div> 
            </div> 
            <div class="row">
                {{--  @include('frontend.kz.alert')  --}}
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="card h-100 shadow-sm border-0 rounded-lg single-blog ">
                        <div class="card-img">
                            @if ($post->ImageThumbUrl)
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->ImageThumbUrl }}" alt="{{ $post->title }}" class="w-100"
                                style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;"></a>   
                            @else
                            <a href="{{ route('post.show', $post->slug) }}"><img src="assets/frontpublic/images/blog/latest-blog/pic1.jpg" alt="{{ $post->title }}" 
                                class="w-100"
                            style="height: 200px;object-fit: cover;border-top-left-radius: .3rem;border-top-right-radius: .3rem;"></a>
                            @endif
                        </div>
                        <div class="card-body course-bottom">
                                <ul class="course-meta">
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at }}</a></li>
                                    <li><a href="{{ route('author.show',$post->author->slug) }}"><i class="fa fa-user"></i>{{ $post->author->name  }}</a></li>
                                </ul>
                                <h4 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ ($post->title)}}</a></h4> 
                                {!!  $post->excerpt !!}
                        </div>
                        <div class="card-footer">
                            <ul class="blog-meta3">
                                <li><a href="{{ route('author.show',$post->author->slug) }}"><i class="fa fa-folder"></i>{{ $post->category->title  }}</a></li>
                                <li><a href="{{ route('author.show',$post->author->slug) }}"><i class="fa fa-tags"></i>{!! $post->tags_html !!}</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div> 
                @endforeach
            </div>
            <div class="row text-center mt-4">
                <div class="col-12 ">
                    <a href="{{ route('course.all-list') }}" class="btn animate">View More</a>
                </div>
            </div>	
        </div>
    </section>
</div>