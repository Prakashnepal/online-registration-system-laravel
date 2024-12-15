@extends('layouts.layout')
@section('main-section')
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="{{ asset('home/img/logo.svg') }}" alt="Edura" /></a>
            </div>
            <div class="th-mobile-menu">
                <ul></ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout3 onepage-nav">
        <div class="sticky-wrapper">
            <div class="container th-container2">
                <div class="menu-area">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="index.html"></a>
                            </div>
                        </div>

                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>



                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-block d-lg-none">
                                <i class="far fa-bars"></i>
                            </button>
                        </div>
                        <div class="col-auto d-none d-xl-block">


                            <a href="{{ route('student.form') }}" class="th-btn ml-25">Online Registration</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="logo-bg" data-bg-src="{{ asset('home/img/bg/logo-bg-3.png') }}" style="height: 200px"></div>
        </div>
    </header>
    <div class="th-hero-wrapper hero-3" id="hero">
        <div class="hero-slider-2 th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1"
            data-arrows="true">
            <div class="th-hero-slide">
                <div class="th-hero-bg" data-bg-src="{{ asset('home/img/hero/hero_bg_3_1.jpg') }}"></div>
                <div class="th-hero-bg-overlay" data-bg-src="{{ asset('home/img/hero/hero_overlay_3_1.jpg') }}"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12">
                            <div class="hero-style3 text-center">
                                <span class="hero-subtitle text-white" data-ani="slideinup" data-ani-delay="0.1s">Easy Way
                                    to Book Your Seat</span>
                                <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.4s">
                                    Online Registration
                                </h1>
                                <div class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s">
                                    <p>Registration Going On, Hurry Up To Book Your Seat</p>
                                    <ul class="counter-list cta-countdown" data-offer-date="10/24/2023">
                                        <li>
                                            <div class="day count-number">00</div>
                                            <span class="count-name">Days</span>
                                        </li>
                                        <li>
                                            <div class="minute count-number">00</div>
                                            <span class="count-name">Mins</span>
                                        </li>
                                        <li>
                                            <div class="seconds count-number">00</div>
                                            <span class="count-name">Secs</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.7s">
                                    <a href="{{ route('student.form') }}" class="th-btn style3">Click For Registration<i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="th-hero-slide">
                <div class="th-hero-bg" data-bg-src="{{ asset('home/img/hero/hero_bg_3_2.jpg') }}"></div>
                <div class="th-hero-bg-overlay" data-bg-src="{{ asset('home/img/hero/hero_overlay_3_1.jpg') }}"></div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12">
                            <div class="hero-style3 text-center">
                                <span class="hero-subtitle text-white" data-ani="slideinup" data-ani-delay="0.1s">Unlock The
                                    Power Of Learning</span>
                                <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.4s">
                                    Empower Your Future
                                </h1>
                                <div class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s">
                                    <p>Registration Going On, Hurry UPp To Book Your Seat</p>
                                    <ul class="counter-list cta-countdown" data-offer-date="10/24/2023">
                                        <li>
                                            <div class="day count-number">00</div>
                                            <span class="count-name">Days</span>
                                        </li>
                                        <li>
                                            <div class="minute count-number">00</div>
                                            <span class="count-name">Mins</span>
                                        </li>
                                        <li>
                                            <div class="seconds count-number">00</div>
                                            <span class="count-name">Secs</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.7s">
                                    <a href="{{ route('student.form') }}" class="th-btn style3">Click For Registration<i
                                            class="fa-regular fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-shape shape1 movingX d-md-block d-none">
            <img src="assets/img/hero/shape_3_1.png" alt="shape" />
        </div>
        <div class="hero-shape shape2 d-sm-block d-none">
            <img class="spin" src="assets/img/hero/shape_3_2.png" alt="shape" />
        </div>
        <div class="hero-shape shape3 spin d-sm-block d-none">
            <img src="assets/img/hero/shape_2_4.png" alt="shape" />
        </div>
    </div>
@endsection
