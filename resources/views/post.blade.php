@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Catalog</title>
    <link rel="stylesheet" href="/user/dist/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="/user/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/user/dist/css/templatemo-video-catalog.css">
</head>
<!--

TemplateMo 552 Video Catalog

https://templatemo.com/tm-552-video-catalog

-->
<body>
<div class="tm-page-wrap mx-auto">
    <div class="position-relative">
        <div class="potition-absolute tm-site-header">
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
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-welcome-container tm-fixed-header tm-fixed-header-1">
            <div class="text-center">
                <p class="pt-5 px-3 tm-welcome-text tm-welcome-text-2 mb-1 text-white mx-auto">All the latest news about PC components is only on our blog.</p>
            </div>
        </div>

        <!-- Header image -->
        <div id="tm-fixed-header-bg"></div>
    </div>

    <!-- Page content -->
    <div class="container-fluid">
        <div class="mx-auto tm-content-container">
            <main>
                <div class="row mb-5 pb-4">
                    <div class="col-12">
                        <img src="/{{ $post->image }}" width="1422" height="800" alt="">
                    </div>
                </div>
                <div class="row mb-5 pb-5">
                    <div class="col-xl-8 col-lg-7">
                        <!-- Video description -->
                        <div class="tm-video-description-box">
                            <h2 class="mb-5 tm-video-title">{{ $post->title }}</h2>
                            <p class="mb-4">{!! $post->text !!}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <!-- Share box -->
                        <div class="tm-bg-gray tm-share-box">
                            <h6 class="tm-share-box-title mb-4">Share this post</h6>
                            <div class="mb-5 d-flex">
                                <a href="" class="tm-bg-white tm-share-button"><i class="fab fa-facebook"></i></a>
                                <a href="" class="tm-bg-white tm-share-button"><i class="fab fa-twitter"></i></a>
                                <a href="" class="tm-bg-white tm-share-button"><i class="fab fa-pinterest"></i></a>
                                <a href="" class="tm-bg-white tm-share-button"><i class="far fa-envelope"></i></a>
                            </div>
                            <p class="mb-4">Author: <a href="https://templatemo.com" class="tm-text-link">Billy Herrington</a></p>
                            <a href="#" class="tm-bg-white px-5 mb-4 d-inline-block tm-text-primary tm-likes-box tm-liked"> <!-- Не реализовано -->
                                <i class="fas fa-heart mr-3 tm-liked-icon"></i>
                                <i class="far fa-heart mr-3 tm-not-liked-icon"></i>
                                <span id="tm-likes-count">486 likes</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row pt-4 pb-5">
                    <div class="col-12">
                        <h2 class="mb-5 tm-text-primary">Related Posts for You</h2>
                        <div class="row tm-catalog-item-list">
                            @foreach($related as $rel)
                            <div class="col-lg-4 col-md-6 col-sm-12 tm-catalog-item">
                                <div class="position-relative tm-thumbnail-container">
                                    <img src="/{{ $rel->image }}" alt="Image" class="img-fluid tm-catalog-item-img">
                                    <a href="{{ route('postPage', $rel->id) }}" class="position-absolute tm-img-overlay"></a>
                                </div>
                                <div class="p-3 tm-catalog-item-description">
                                    <h3 class="tm-text-gray text-center tm-catalog-item-title">{{ $rel->title }}</h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
        </div> <!-- .tm-content-container -->
    </div>
</div>

<script src="/user/dist/js/jquery-3.4.1.min.js"></script>
<script src="/user/dist/js/bootstrap.min.js"></script>

</body>
@endsection
