@extends('frontend.templates.default')

@section('content')
<section class="breadcrumbs overlay bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Bread Title -->
                <div class="bread-title">
                    <h2><span>404 Error Page</span>a Error Page</h2>
                </div>
                <!-- Bread List -->
                <ul class="bread-list">
                    <li><a href="{{ route('root') }}"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-clone"></i>Pages</a></li>
                    <li class="active"><a href="#"><i class="fa fa-clone"></i>404</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="error-page section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="error-inner">
                    <h1>4<span>0</span>4</h1>
                    <p>Aenean eget sollicitudin lorem, et pretium felis. Nullam euismod diam libero, sed dapibus leo laoreet ut. Suspendisse potenti. Phasellus urna lacus</p>
                    <!-- Search Form -->
                    <form class="search-form" action="#">
                        <input placeholder="Search Something" type="text">
                        <button class="btn" type="submit">Search</button>
                    </form>
                    <!--/ End Search Form -->
                </div>
            </div>
        </div>
    </div>
</section>	
@endsection
