@extends('layout.content.main-content')
<?php 
	$title= "Creative | Index";
?>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 pt-4 d-flex align-items-center">
            <div class="heoro-heading-tetx">
              <h1>We Provides Best Technology Solution Worldwide</h1>
              <h2>Creative soft Technology is a Leading Global IT provider . Creative soft Technology was started to provide software solutions, website development, Digital Marketing and consulting services to Small, Medium, Large and Blue Chip Companies. We also provide IT solutions and services to National Government, Local Government, and Private Agencies.</h2>
              <div class="text-center text-lg-start">
                <a href="portfolio.html" class="btn-get-started scrollto">PORTFOLIO</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="" data-aos-delay="300">
            <div class="Creative_Design_all">
              <div class="c_design_img">
                <img src="{{asset('assets/img/1.png')}}" alt="...">
              </div>
              <div class="c_design_text">
                <h3><strong>Creative Design</strong></h3>
              </div>
            </div>
            <div class="Creative_Design_all">
              <div class="c_design_img">
                <img src="{{asset('assets/img/sd.png')}}" alt="...">
              </div>
              <div class="c_design_text">
                <h3><strong>Softwere Development</strong></h3>
              </div>
            </div>
            <div class="Creative_Design_all">
              <div class="c_design_img">
                <img src="{{asset('assets/img/mobile.png')}}" alt="...">
              </div>
              <div class="c_design_text">
                <h3><strong>Mobile Application</strong></h3>
              </div>
            </div>
            <div class="Creative_Design_all">
              <div class="c_design_img">
                <img src="{{asset('assets/img/digital-marketing.png')}}" alt="...">
              </div>
              <div class="c_design_text">
                <h3><strong>Digital marketing</strong></h3>
              </div>
            </div>
            <div class="Creative_Design_all">
              <div class="c_design_img">
                <img src="{{asset('assets/img/it.jpg')}}" alt="...">
              </div>
              <div class="c_design_text">
                <h3><strong>IT Consultant</strong></h3>
              </div>
            </div>
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
    </section><!-- End Hero -->
  
    <main id="main">
      <!-- ======= Our Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
          <div class="section-title text-center">
            <h2 class="section-title">SOLUTION THATS YOU NEED!</h2>
            <p class="">Creative Soft Technology Provides Best Technology Solution Worldwide.</p>
          </div>
          <div class="row">
            <div class="col-lg-6 order-2">
                  <div class="our_technology">
                    <h1 class="mt-4  text-uppercase">Our Technology</h1>
                    <hr class="mb-5">
              <div class="our-clicntt owl-carousel owl-theme">
                <div class="item">
                  <img src="{{asset('assets/img/clicnt/Untitled design (10).png')}}" alt="">
                </div>
                <div class="item">
                  <img src="{{asset('assets/img/11c.png')}}" alt="">
                </div>
                <div class="item">
                  <img src="{{asset('assets/img/clicnt/Untitled design (6).png')}}" alt="">
                </div>
                <div class="item">
                  <img src="{{asset('assets/img/clicnt/Untitled design (7).png')}}" alt="">
                </div>
                <div class="item">
                  <img src="{{asset('assets/img/clicnt/Untitled design (8).png')}}" alt="">
                </div>
                <div class="item">
                  <img src="{{asset('assets/img/clicnt/Untitled design (9).png')}}" alt="">
                </div>
              </div>
          </div>
        </div>
            <div class="col-lg-6 bg-color order-1">
              <div class="our_technology">
                <h1 class="mb-3 mt-3 margint-tr text-uppercase">Our Activities</h1>
                <div class="our-active">
                    <img class="img-fluid" src="{{asset('assets/img/active.png')}}" alt="">
                    <p class="text-start text-light">Tap in the top right of Facebook, then tap your name. Tap below your profile picture, then tap Activity Log. Tap Filter at the top, then scroll down and tap Search History. In the top left, tap Clear Searches.
                    </p>
                </div>
          </div>
        </div>
          </div>
        </div>
      </section><!-- End Our Services Section End-->
      <!-- ======= Gallery SectionOur Clicnt ======= -->
      <section id="gallery" class="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                    <h1 class="mb-4">Our Clients</h1>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item mobile-responsive1">
                <a href="{{asset('assets/img/gallery/gallery-1.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-1.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item responsive2">
                <a href="{{asset('assets/img/gallery/gallery-2.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-3.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-3.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-4.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-4.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-5.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-5.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-6.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-6.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-7.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-7.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/gallery/gallery-8.jpg')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/gallery/gallery-8.jpg')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Gallery Section -->
      <!-- ======= Gallery SectionOur Clicnt ======= -->
      <section id="gallery" class="gallery our-clicnt">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
                    <h1 class="mb-4">Our Partners</h1>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item mobile-responsive1">
                <a href="{{asset('assets/img/partner/1.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/1.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item responsive2">
                <a href="{{asset('assets/img/partner/2.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/2.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/partner/3.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/3.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/partner/4.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/4.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/partner/5.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/5.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="gallery-item">
                <a href="{{asset('assets/img/partner/6.png')}}" class="galleery-lightbox" data-gallery="gallery-item">
                  <img src="{{asset('assets/img/partner/6.png')}}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Gallery Section -->
    </main>
    <!-- End #main -->

@endsection