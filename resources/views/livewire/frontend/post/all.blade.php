<div>
    @section("title")All Post @endsection
    {{-- @section("sub_title")Category @endsection --}}
    
    <!-- Breadcrumbs -->
    <section class="breadcrumbs overlay bg-image">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Bread Title -->
                    <div class="bread-title">
                        <h2>Latest Post</h2>
                    </div>
                    <!-- Bread List -->
                    <ul class="bread-list">
                        <li><a href="{{ route('root') }}"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="{{ route('post.all') }}"><i class="fa fa-clone"></i>Blog</a></li>
                        <li class="active"><a href="#"><i class="fa fa-clone"></i>All Post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->
    
    <!-- Blog Archive -->
    <section class="blogs grid-sidebar archive section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 col-12 mb-5">
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
                                        <li><a href="{{ route('category.show',$post->category->slug) }}"><i class="fa fa-folder"></i>{{ $post->category->title  }}</a></li>
                                        <li><i class="fa fa-tags"></i>{!! $post->tags_html !!}</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div> 
                        @endforeach
                    </div>
                    <div class="row ">
                        <div class="col-12 ">
                            <!-- Pagination -->
                            <div class="pagination-main" style="padding:30px;">
                                {{$posts->appends(Request::all())->links()}}
                                {{--  {{$posts->appends(Request::all('vendor.pagination.bootstrap-4'))->links()}}  --}}
                            </div>
                            <!--/ End Pagination -->
                        </div>
                    </div>	
                </div>
                <div class="col-lg-3 col-12">
                    <livewire:frontend.main.sidebar />
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Archive -->
    <!-- Newsletter -->
    {{--  <livewire:main.newsletter></livewire:main.newsletter>  --}}
    <!--/ End Newsletter -->
    </div>
    