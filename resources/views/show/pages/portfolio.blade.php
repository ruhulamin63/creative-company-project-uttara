@extends('layout.content.main-content')
<?php 
	$title= "Portfolio";
?>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 pt-5 d-flex align-items-center">
                    <h1>Our Portfolio</h1>
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
    
        <!-- ======= Our Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">Show All</li>
                  <li data-filter=".filter-app">Web Application</li>
                  <li data-filter=".filter-card">Mobile Apps Design</li>
                  <li data-filter=".filter-web">Graphic Design</li>
                </ul>
              </div>
            </div>
    
            <div class="row portfolio-container">
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 1</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                  <img src="{{asset('assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                  </div>
                  <div class="portfolio-links">
                    <a href="{{asset('assets/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Our Portfolio Section -->
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