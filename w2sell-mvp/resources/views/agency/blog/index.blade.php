﻿@extends('layout.base')
@section('content')
        <!-- start page title -->
        <section class="p-0 top-space-margin page-title-center-alignment">
            <div class="container">
                <div class="row align-items-center justify-content-center extra-very-small-screen">
                    <div class="col-xl-8 col-lg-10 text-center position-relative page-title-extra-large" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="fw-700 text-dark-gray mb-20px ls-minus-2px">Latest Blog</h1>
                        <h2 class="fw-400 ls-0px mb-0">News from the digital web agency</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="p-0">
            <div class="container">
                <div class="row mt-7">
                    <div class="col-lg-5 md-mb-35px">
                        <h2 class="text-dark-gray fw-600 mb-10 ls-minus-2px md-mb-0">Most popular agency articles.</h2>
                        <div class="outside-box-left-25 d-none d-lg-inline-block">
                            <div class="fs-350 xl-fs-300 lg-fs-250 text-base-color fw-600 ls-minus-20px word-break-normal" data-bottom-top="transform:scale(1, 1) translate3d(0px, 0px, 0px);" data-top-bottom="transform:scale(1, 1) translate3d(-50px, 0px, 0px);" >article</div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <ul class="popular-post-sidebar position-relative" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            @forelse($popularPosts as $post)
                                <li class="d-sm-flex align-items-center mb-35px">
                                    <figure>
                                        <a href="demo-web-agency-blog-single-creative.html"><img style="min-height: 195px" src="{{ $post->image_url }}" class="border-radius-4px" alt=""></a>
                                    </figure>
                                    <div class="col media-body">
                                        <a href="demo-web-agency-blog-single-creative.html" class="fw-600 fs-22 lh-30 ls-minus-05px text-dark-gray text-dark-gray-hover d-inline-block mb-15px w-85 xl-w-100">{{$post->title}}</a>
                                        <div>
                                            <a href="demo-web-agency-blog.html" class="d-inline-block fs-14 fw-700 text-uppercase text-dark-gray text-dark-gray-hover">{{$post->blogCategory->name}}</a>
                                            <span class="d-inline-block fs-10 alt-font align-middle opacity-7 ms-5px me-5px">•</span>
                                            <a href="#" class="d-inline-block fs-14 text-uppercase fw-500 text-medium-gray-hover">{{$post->published_at->diffForHumans('',['short'=>true])}}</a>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse

{{--                            <li class="d-sm-flex align-items-center mb-35px">--}}
{{--                                <figure>--}}
{{--                                    <a href="demo-web-agency-blog-single-creative.html"><img src="https://via.placeholder.com/600x415" class="border-radius-4px" alt=""></a>--}}
{{--                                </figure>--}}
{{--                                <div class="col media-body">--}}
{{--                                    <a href="demo-web-agency-blog-single-creative.html" class="fw-600 fs-22 lh-30 ls-minus-05px text-dark-gray text-dark-gray-hover d-inline-block mb-15px w-85 xl-w-100">The golden rule finds no limit application in business.</a>--}}
{{--                                    <div>--}}
{{--                                        <a href="demo-web-agency-blog.html" class="d-inline-block fs-14 fw-700 text-uppercase text-dark-gray text-dark-gray-hover">Application</a>--}}
{{--                                        <span class="d-inline-block fs-10 alt-font align-middle opacity-7 ms-5px me-5px">•</span>--}}
{{--                                        <a href="#" class="d-inline-block fs-14 text-uppercase fw-500 text-medium-gray-hover">08 December 2023</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="d-sm-flex align-items-center">--}}
{{--                                <figure>--}}
{{--                                    <a href="demo-web-agency-blog-single-creative.html"><img src="https://via.placeholder.com/600x415" class="border-radius-4px" alt=""></a>--}}
{{--                                </figure>--}}
{{--                                <div class="col media-body">--}}
{{--                                    <a href="demo-web-agency-blog-single-creative.html" class="fw-600 fs-22 lh-30 ls-minus-05px text-dark-gray text-dark-gray-hover d-inline-block mb-15px w-85 xl-w-100">Ambition is to be the spider in the world wide web.</a>--}}
{{--                                    <div>--}}
{{--                                        <a href="demo-web-agency-blog.html" class="d-inline-block fs-14 fw-700 text-uppercase text-dark-gray text-dark-gray-hover">Development</a>--}}
{{--                                        <span class="d-inline-block fs-10 alt-font align-middle opacity-7 ms-5px me-5px">•</span>--}}
{{--                                        <a href="#" class="d-inline-block fs-14 text-uppercase fw-500 text-medium-gray-hover">08 December 2023</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="half-section pb-0">
            <div class="container">
                <div class="row align-items-center mb-4 lg-mb-3">
                    <div class="col-12 tab-style-04">
                        <!-- filter navigation -->
                        <ul class="portfolio-filter nav nav-tabs justify-content-center text-center border-0 fw-500">
                            <li class="nav active"><a data-filter="*" href="#">All</a></li>
                            @forelse($categoryNames as $slug => $category)
                                <li class="nav"><a data-filter=".{{$slug}}" href="#">{{$category}}</a></li>
                            @empty
                            @endforelse
                        </ul>
                        <!-- end filter navigation -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 filter-content p-md-0">
                        <ul class="blog-classic portfolio-wrapper grid-loading grid grid-4col xxl-grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-1col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @forelse($posts as $post)

                                <!-- start blog item -->
                                <li class="grid-item {{$post->blogCategory->slug}} other">
                                    <div class="card bg-transparent border-0 h-100">
                                        <div class="blog-image position-relative overflow-hidden border-radius-4px">
                                            <a href="demo-web-agency-blog-single-creative.html"><img style="min-height: 275px" src="{{ $post->image_url }}" alt="{{$post->title}}"></a>
                                        </div>
                                        <div class="card-body px-0 pt-30px pb-30px xs-pb-15px">
                                            <span class="fs-14 text-uppercase d-block mb-5px fw-500"><a href="demo-web-agency-blog.html" class="text-dark-gray text-dark-gray-hover fw-700 categories-text">{{$post->blogCategory->name}}</a><a href="#" class="blog-date text-medium-gray-hover">{{$post->published_at->diffForHumans('',['short'=>true])}}</a></span>
                                            <a href="demo-web-agency-blog-single-creative.html" class="card-title fw-600 fs-17 lh-28 text-dark-gray text-dark-gray-hover d-inline-block w-95 sm-w-100">{{$post->short_description}}</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- end blog item -->
                            @empty
                                No posts
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="pb-4 sm-pt-30px sm-pb-40px overflow-hidden position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center text-sm-start">
                        <div class="outside-box-left-25 xl-outside-box-left-10 sm-outside-box-left-0">
                            <div class="fs-350 xl-fs-250 lg-fs-200 md-fs-170 sm-fs-100 text-dark-gray fw-600 ls-minus-20px word-break-normal">work</div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-center text-sm-end">
                        <div class="outside-box-right-5 sm-outside-box-right-0">
                            <div class="fs-350 xl-fs-250 lg-fs-200 md-fs-170 sm-fs-100 text-base-color fw-600 ls-minus-20px position-relative d-inline-block word-break-normal">together
                                <div class="position-absolute left-minus-140px top-minus-140px z-index-9 xl-left-minus-110px top-minus-140px xl-top-minus-100px md-top-minus-90px z-index-9 xl-w-230px md-w-200px d-none d-md-block" data-anime='{ "translateY": [-15, 0], "scale": [0.5, 1], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                    <img src="images/demo-web-agency-05.png" class="animation-rotation" alt="">
                                    <div class="absolute-middle-center w-100 z-index-minus-1"><img src="images/demo-web-agency-04.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
@endsection('content')
