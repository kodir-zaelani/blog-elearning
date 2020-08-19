<div>
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- About Widget -->
                        <div class="single-widget about">
                             {{-- <a href="index.html"><img src="/uploads/images/logo/logo.png" alt="logo"></a> --}}
                            <p>Website ini dibangun merupakan hasil pembelajaran PHP Basic, OOP serta Framework Laravel. Website ini dibangun Framework Laravel 7.x, Laravel Livewire dan MySQL. Adapun Tema halaman dengan menggunakan Trendbiz yang telah dilakukan penyesuaian, 
                                sedangkan untuk halaman manajamen saya gunakan Tema AdminLTE v.3.x yang telah disesuaikan dengan keperluan sistem<a href="{{ route('about.index') }}">Read more<i class="icofont icofont-caret-right"></i></a></p>	
                            <ul class="social">
                                <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-youtube"></i></a></li>
                                <li><a href="#"><i class="icofont icofont-social-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <!--/ End About Widget -->
                    </div>	
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Links Widget -->
                        <div class="single-widget links">
                            <h2>Category Link</h2>
                            <ul class="list">
                                 {{--  @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('category.show', $category->slug) }}"><i class="fa fa-caret-right"></i> {{ $category->title }}</a>
                                </li>
                                @endforeach	   --}}
                            </ul>
                        </div>
                        <!--/ End Links Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Posts Widget -->
                        <div class="single-widget posts">
                            <h2>Popular Posts</h2>
                            <ul>
                                 {{--  @foreach ($popularPostfooter as $post)
                                <li>
                                    @if ($post->imageThumbUrl)
                                        <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>   
                                    @else
                                    <div class="post-img">
                                        <a href="{{ route('post.show', $post->slug) }}"><img src="/assets/kz/images/65x60.png" alt="{{ $post->title }}"></a>
                                    </div>
                                    @endif
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </li>
                                @endforeach   --}}
                            </ul>
                        </div>
                        <!--/ End Posts Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Address Widget -->
                        <div class="single-widget address">
                            <h2>Contact</h2>
                            <p>Kodir Zaelani</p>
                            <ul class="list">
                                {{-- <li><i class="icofont icofont-phone"></i>+990123-456-789</li> --}}
                                <li><i class="icofont icofont-ui-email"></i><a href="mailto:kodir.zaelani78@gmail.com">kodir.zaelani78@gmail.com</a></li>
                                <li><i class="icofont icofont-location-arrow"></i>Samarinda, Kalimantan Timur, Indonesia</li>
                            </ul>	
                        </div>
                        <!--/ End Address Widget -->
                    </div>	
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Copyright -->
                        <div class="copyright text-left">
                            <p>&copy; 2019 - 2020 All Right Reserved <a href="/" style="box-decoration: none">zaelani.id</a> - Created by: <a href="#">Kodir Zaelani</a></p>
                        </div>
                        <!--/ End Copyright -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
