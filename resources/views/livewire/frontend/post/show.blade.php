<div>
    @section("title")Detail Post @endsection
    <!-- Breadcrumbs -->
    <section class="breadcrumbs overlay bg-image">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Bread Title -->
                    <div class="bread-title">
                        <h2>Detail Post</h2>
                    </div>
                    <!-- Bread List -->
                    <ul class="bread-list">
                        <li><a href="{{ route('root') }}"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="{{ route('post.all') }}"><i class="fa fa-clone"></i>Blog</a></li>
                        <li class="active"><a href="#"><i class="fa fa-clone"></i>Detail Post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->
    <!-- Blog Archive -->
    <!-- Blog Archive -->
    <section class="blogs archive single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Single blog -->
                            <div class="single-blog">
                                <div class="blog-head">
                                    @if ($post->imageUrl)
                                     <img src="{{ $post->imageUrl }}" alt="{{ $post->title }}">   
                                    @else
                                     <img src="/assets/kz/images/1200x600.png" alt="#">
                                    @endif
                                </div>
                                <div class="blog-description">
                                    <h1>{{ $post->title}}</h1>
                                    <ul class="blog-meta">
                                        <li>
                                            <i class="fa fa-calendar"></i>{{ $post->created_at }} 
                                        </li>
                                        <li><i class="fa fa-user"></i> 
                                             <a href="{{ route('author.show', $post->author->slug) }}"> {{ $post->author->name  }}</a> 
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-tags"></i>{!! $post->tags_html !!}</a> 
                                        </li>
                                        <li> <i class="fa fa-folder"></i>
                                             <a href="{{ route('category.show', $post->category->slug) }}"> {{ $post->category->title }}</a> 
                                        </li>
                                        <li><i class="fa fa-comments"></i>
                                             {{-- <a href="#post-comments">{{ $post->commentsNumber('Comment') }}</a>  --}}
                                        </li>
                                    </ul>
                                    {!! $post->content !!}
                                </div>
                                <hr>
                                {{--  <div class="bottom-info">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7 col-12">
                                            <div class="comments-body">
                                                <!-- Single Comments -->
                                                <div class="single-comments">
                                                    <div class="main">
                                                        <div class="head">
                                                            @if($post->author->avatar)
                                                    <img src="{{ $post->author->avatar}}" alt="">
                                                    @else
                                                    <img src="/assets/kz/images/author1.jpg" alt="#"/>
                                                    @endif
                                                        </div>
                                                        <div class="body">
                                                            <h4><a href="{{ url('/author', $post->author->slug) }}"> {{ $post->author->name  }}</a></h4>
                                                            {!! $post->author->bio !!}
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!--/ End Single Comments -->
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <ul class="social">
                                                <li class="connect">Share article:</li>
                                                <li class="facebook"><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                                <li class="twitter"><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                                <li class="linkedin"><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                                                <li class="google-plus"><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>  --}}
                            </div>
                            <!--/ End Single blog -->
                        </div> 
                        {{-- Comments detail post --}}
                        {{--  @include('frontend.kz.comments')  --}}
                        {{-- Comments detail post --}}
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                   <livewire:frontend.main.sidebar></livewire:frontend.main.sidebar>
               </div>
            </div>
        </div>
    </section>
 
 </div>
 