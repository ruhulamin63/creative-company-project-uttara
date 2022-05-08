@extends('layout.content.customer-content')
<?php 
	$title= "About";
?>

@section('content')

      <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 d-flex align-items-center">
                        <h1>About Us</h1>
                </div>
            </div>
        </div>
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
        </svg>
    </section>
    <!-- End Hero -->

    <main id="main">
        @foreach ($about as $item)
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="Creative">
                                <p class="text-start">{{ $item->desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- OUR VISION AND MISSION -->
            <section id="about" class="about">
                <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <div class="icon-box">
                        <div class="icon">1</div>
                        <h4 class="title"><a href="">OUR VISION AND MISSION</a></h4>
                        <p class="description">{{ $item->mission_desc }}</p>
                    </div>
                    <div class="icon-box">
                        <div class="icon">2</div>
                        <h4 class="title"><a href="">OUR DIFFERENCE</a></h4>
                        <p class="description">{{ $item->difference_desc }} </p>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="ourmission-img mt-4">
                        <img src="{{asset('assets/img/home-mockup.png')}}" class="img-fluid" alt="...">
                    </div>
                    </div>
                </div>
                </div>
            </section>
            <!-- OUR VISION AND MISSION End-->
        @endforeach
    

        <!-- Client & Partner -->
        <section id="clicnt-partner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="clcnt-box">
                            <h2>6</h2>
                            <h4>Years in Business</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="clcnt-box">
                            <h2>20+</h2>
                            <h4>Client & Partner</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="clcnt-box">
                            <h2>50+</h2>
                            <h4>Successful Project</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Client & Partner -->
    </main>
    <!-- End #main -->

@endsection