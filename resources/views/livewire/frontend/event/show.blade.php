<div>
    @section("title")Detail Event @endsection
    <!-- Breadcrumbs -->
    <section class="breadcrumbs overlay bg-image">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Bread Title -->
                    <div class="bread-title">
                        <h2>Detail Event</h2>
                    </div>
                    <!-- Bread List -->
                    <ul class="bread-list">
                        <li><a href="{{ route('root') }}"><i class="fa fa-home"></i>Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-clone"></i>Detail Event</a></li>
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
                                    @if ($event->imageUrl)
                                     <img src="{{ $event->imageUrl }}" alt="{{ $event->title }}">   
                                    @else
                                     <img src="/assets/kz/images/1200x600.png" alt="#">
                                    @endif
                                </div>
                                <div class="blog-description">
                                    <h1>{{ $event->title}}</h1>
                                    {{-- <ul class="blog-meta">
                                        <li>
                                            <i class="fa fa-calendar"></i>{{ $event->created_at }} 
                                        </li>
                                        <li><i class="fa fa-user"></i> 
                                             <a href="{{ route('author.show', $event->author->slug) }}"> {{ $event->author->name  }}</a> 
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-tags"></i>{!! $event->tags_html !!}</a> 
                                        </li>
                                        <li> <i class="fa fa-folder"></i>
                                             <a href="{{ route('category.show', $event->category->slug) }}"> {{ $event->category->title }}</a> 
                                        </li>
                                        
                                    </ul> --}}
                                    <div>{{ $event->date }}</div>
                                    <div>{{ $event->location }}</div>
                                    {!! $event->content !!}
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                   <livewire:frontend.main.sidebarevent />
               </div>
            </div>
        </div>
    </section>
 
 </div>
 