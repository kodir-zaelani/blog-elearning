<div>
    <!-- Blog Sidebar -->
    <div class="blog-sidebar">
        <!-- Blog Category -->
        <div class="single-sidebar categorys">
            <h2>Category Post </h2>
            <ul>
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->slug) }}">{{ $category->title }}</a>
                    <span>{{ $category->posts->count() }}</span>
                </li>
                @endforeach			
            </ul>
        </div>
        <!--/ End Blog Category -->
        <!-- Post Tab -->
        <div class="single-sidebar post-tab">
            <!-- Tab Nav -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" ><a class="nav-link active" data-toggle="tab" href="#popular" role="tab" >Popular Post</a></li>
                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#recent" role="tab">Recent</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a></li> --}}
            </ul>
            <!--/ End Tab Nav -->
            <div class="tab-content" id="myTabContent">
                <!-- Popular Posts -->
                <div class="tab-pane fade show active" id="popular" role="tabpanel" >
                    <!-- Single Post -->
                    @foreach ($popularPosts as $post)
                    <div class="single-post">
                        @if ($post->imageThumbUrl)
                        <div class="post-img">
                            <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>   
                        </div>
                        @else
                        <div class="post-img">
                            <img src="/assets/kz/images/65x60.png" alt="logo">
                        </div>
                        @endif
                        <div class="post-info">
                            <h4><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h4>
                            <p><i class="fa fa-calendar"></i>{{ $post->date }}</p>
                        </div>
                    </div>
                    <!--/ End Single Post -->
                    @endforeach
                </div>
                <!--/ End Popular Posts -->
                <!-- Popular Posts -->
                <div class="tab-pane fade" id="recent" role="tabpanel" >
                    <!-- Single Post -->
                    <div class="single-post">
                        <div class="post-img">
                            <img src="" alt="#">
                        </div>
                        <div class="post-info">
                            <h4><a href="#">10 Awesome Ways for Start Your Own Website</a></h4>
                            <p><i class="fa fa-calendar"></i>05 July, 2018</p>
                        </div>
                    </div>
                    <!--/ End Single Post -->
                </div>
                <!--/ End Popular Posts -->
                <!-- Popular Posts -->
                <div class="tab-pane fade" id="featured" role="tabpanel" >
                    <!-- Single Post -->
                    <div class="single-post">
                        <div class="post-img">
                            <img src="" alt="#">
                        </div>
                        <div class="post-info">
                            <h4><a href="#">How to Earn Huge Money Without any Investment</a></h4>
                            <p><i class="fa fa-calendar"></i>09 May, 2018</p>
                        </div>
                    </div>
                    <!--/ End Single Post -->
                </div>
                <!--/ End Popular Posts -->
            </div>
        </div>
        <!--/ End Post Popular Tab -->
        <!-- Blog Tags -->
        <div class="single-sidebar tags">
            <h2>Tags Post</h2>
            <ul>
                @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('tag.show', $tag->slug) }}" class="btn btn-med-grey">
                        {{ $tag->title }}
                    </a>
                </li>
                @endforeach		
            </ul>
        </div>
        <!--/ End Blog Tags -->
        <!-- Blog Archives -->
        <div class="single-sidebar categorys">
            <h2>Archives Post</h2>
            <ul>
                @foreach ($archives as $archive)
                <li>
                    <a href="{{ route('post.archive', ['month' => $archive->month, 'year' => $archive->year]) }}">{{ month_name($archive->month) . " " . $archive->year }}</a>
                    <span class="badge pull-right">{{ $archive->post_count }}</span>
                </li>
                @endforeach			
            </ul>
        </div>
        <!--/ End Blog Archives -->

        <!-- Photo Gallery -->
        <div class="single-sidebar photo">
            <h2>Photo Gallery</h2>
            <ul>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>			
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
                <li><a href="/assets/kz/images/480x330.png" data-fancybox="photo"><img src="/assets/kz/images/480x330.png" alt="#"></a></li>
            </ul>
        </div>
        <!--/ End Photo Gallery -->
        
        <!-- Subscribe -->
        <div class="single-sidebar subscribe">
            <h2>Newsletter</h2>
            <p>Subscribe to our monthly newsletter. Every month well send you an awesome update!</p>
            <div class="single-widget subscribe">
                <form action="#">
                    <input placeholder="Email Address" type="email">
                    <button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>	
            </div>
        </div>
        <!--/ End Subscribe -->
    </div>
    <!--/ End Blog Sidebar -->
</div>
