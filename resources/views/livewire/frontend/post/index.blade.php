<div>
    <section class="blogs archive section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest Post</h2>
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
                        <div class="card-body blog-bottom">
                                <ul class="blog-meta1">
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at }}</a></li>
                                    <li><a href="{{ route('author.show',$post->author->slug) }}"><i class="fa fa-user"></i>{{ $post->author->name  }}</a></li>
                                </ul>
                                <h4 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ ($post->title)}}</a></h4> 
                                {!!  $post->excerpt !!}
                        </div>
                        <div class="card-footer">
                            <ul class="blog-meta3">
                                <li><a href="{{ route('category.show',$post->author->slug) }}"><i class="fa fa-folder"></i>{{ $post->category->title  }}</a></li>
                                <li><a href="{{ route('tag.show',$post->author->slug) }}"><i class="fa fa-tags"></i>{!! $post->tags_html !!}</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div> 
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <div class="pagination-main text-center">
                        <ul class="pagination" style="padding:30px;">
                            <a class="btn animate" href="{{ route('post.all') }}">Read All Post </a>
                        </ul>
                    </div>
                    <!--/ End Pagination -->
                </div>
            </div>	
        </div>
    </section>
</div>