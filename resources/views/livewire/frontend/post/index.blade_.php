<div>
            <div class="content-block">
                
                <!-- Blog Grid ==== -->
                <div class="section-area section-sp1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 heading-bx left">
                                <h2 class="title-head">
                                    Recent <span>Blog</span>
                                </h2>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                            </div>
                        </div>
                        {{-- <div class="row"> --}}
                        <div class="ttr-blog-grid-3 row" id="masonry">
                            @foreach ($posts as $post)
                            <div class="post col-xl-4 col-lg-4 col-md-12 col-xs-12 mb-4">
                                <div class="card h-100 shadow-sm border-0 rounded-lg">
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
                                    <div class="card-body">
                                        <div class="media-post">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at }}</a></li>
                                            <li><a href="{{ route('author.show',$post->author->slug) }}"><i class="fa fa-user"></i>{{ $post->author->name  }}</a></li>
                                        </div>
                                        <h5 class="post-title"><a href="{{ route('post.show', $post->slug) }}">{{ ($post->title)}}</a></h5> 

                                    </div>
                                    <div class="card-footer post-extra">
                                        <a href="{{ route('author.show',$post->author->slug) }}" class="btn-link">READ MORE</a>
                                        <a href="#" class="comments-bx"><i class="fa fa-folder" ></i> Pendidikan</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- Pagination ==== -->
                        <div class="text-center">
                            <a href="#" class="btn btn-primary text-white animation:el-icon-view">View more...</a>
                        </div>
                        <!-- Pagination END ==== -->
                        {{-- </div> --}}
                    </div>
                </div>
                <!-- Blog Grid END ==== -->
            </div>
</div>
