@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="/user/dist/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="/user/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/user/dist/css/templatemo-video-catalog.css">

</head>

<body>
<div class="tm-page-wrap mx-auto">
    <div class="position-relative">
        <div class="position-absolute tm-site-header">
            <div class="container-fluid position-relative">
                <div class="row">
                    <div class="col-7 col-md-4">
                        <a href="{{ route('home') }}" class="tm-bg-black text-center tm-logo-container">
                            <i class="far fa-address-book tm-site-logo mb-3"></i>
                            <h1 class="tm-site-name">Posts</h1>
                        </a>
                    </div>
                    <div class="col-5 col-md-8 ml-auto mr-0">
                        <div class="tm-site-nav">
                            <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                                <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button"
                                        data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span>
                                            <i class="fas fa-bars tm-menu-closed-icon"></i>
                                            <i class="fas fa-times tm-menu-opened-icon"></i>
                                        </span>
                                </button>
                                <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                    <ul class="navbar-nav text-uppercase">
                                        <li class="nav-item active">
                                            <a class="nav-link tm-nav-link" href="{{ route('home') }}">Posts <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link tm-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                @if($role == 'admin')
                                                    <a class="dropdown-item" href="{{ route('homeAdmin') }}">
                                                        {{ __('Admin panel') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-welcome-container text-center text-white">
            <div class="tm-welcome-container-inner">
                <p class="tm-welcome-text mb-1 text-white">PC Herrington – Computer Hardware News, Reviews and More</p>
                <p class="tm-welcome-text mb-5 text-white">Here you will find everything you were looking for.</p>
                <a href="#content" class="btn tm-btn-animate tm-btn-cta tm-icon-down">
                    <span>Discover</span>
                </a>
            </div>
        </div>

        <div id="tm-video-container">
            <video autoplay muted loop id="tm-video">
                <!-- <source src="video/sunset-timelapse-video.mp4" type="video/mp4"> -->
                <source src="/user/dist/video/video-field.mp4" type="video/mp4">
            </video>
        </div>

        <i id="tm-video-control-button" class="fas fa-pause"></i>
    </div>

    <div class="container-fluid">
        <div id="content" class="mx-auto tm-content-container">
            <main>
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-page-title mb-4">Our Posts Catalog</h2>

                        <div>
                            <div>
                                <div class="col-md-6 pl-0">
                                    <form method="GET" action="#">
                                        <input type="text" name="search" class="form-control form-input" placeholder="Search anything..."
                                               value="{{request('search')}}">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tm-categories-container mb-5">
                            <h3 class="tm-text-primary tm-categories-text">Categories:</h3>
                            <ul class="nav tm-category-list">
                                <li class="nav-item tm-category-item"><a href="{{ route('home') }}" class="nav-link tm-category-link active">All</a></li>
                                @foreach($categories as $cat)
                                    <li class="nav-item tm-category-item"><a href="/category/{{$cat->id}}" class="nav-link tm-category-link">{{ ucwords($cat->title) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row tm-catalog-item-list">
                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                        <div class="position-relative tm-thumbnail-container">
                            <img src="/{{$post->image}}" alt="Image" class="img-fluid tm-catalog-item-img">
                            <a href="{{ route('postPage', $post->id) }}" class="position-absolute tm-img-overlay"></a>
                        </div>
                        <div class="p-4 tm-bg-gray tm-catalog-item-description">
                            <a href="{{ route('postPage', $post->id) }}"><h3 class="tm-text-primary mb-3 tm-catalog-item-title">{{ $post->title }}</h3></a>
                            <p class="tm-catalog-item-text">{!! $post->text !!}</p>
                            <small><p>Created at {{ $post->created_at->diffForHumans() }}</p></small>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Catalog Paging Buttons -->
                {{ $posts->links() }}
            </main>

            <!-- Subscribe form and footer links -->
            <div class="row mt-5 pt-3">
                <div class="col-xl-6 col-lg-12 mb-4">
                    <div class="tm-bg-gray p-5 h-100">
                        <h3 class="tm-text-primary mb-3">Do you want to get our latest updates?</h3>
                        <p class="mb-5">Please subscribe our newsletter for upcoming new videos and latest information about our
                            work. Thank you.</p>
                        <form action="" method="GET" class="tm-subscribe-form">
                            <input type="text" name="email" placeholder="Your Email..." required>
                            <button type="submit" class="btn rounded-0 btn-primary tm-btn-small">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="p-5 tm-bg-gray">
                        <h3 class="tm-text-primary mb-4">Quick Links</h3>
                        <ul class="list-unstyled tm-footer-links">
                            <li><a href="#">Duis bibendum</a></li>
                            <li><a href="#">Purus non dignissim</a></li>
                            <li><a href="#">Sapien metus gravida</a></li>
                            <li><a href="#">Eget consequat</a></li>
                            <li><a href="#">Praesent eu pulvinar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="p-5 tm-bg-gray h-100">
                        <h3 class="tm-text-primary mb-4">Our Pages</h3>
                        <ul class="list-unstyled tm-footer-links">
                            <li><a href="#">Posts</a></li>
                            <li><a href="#">License Terms</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Privacy Policies</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- tm-content-container -->
    </div>

</div> <!-- .tm-page-wrap -->
</body>

@endsection
