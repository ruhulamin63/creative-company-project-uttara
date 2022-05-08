@extends('layout.content.customer-content')
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
              @foreach ($web_app as $item)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  
                  <div class="portfolio-wrap">
                      @if($item->web_app_image)
                        <?php if (file_exists("../public/".$item->web_app_image)){ ?>
                          <img src="{{asset($item->web_app_image)}}" alt="..." class="img-fluid">
                        <?php } else{ ?>
                          <img src="{{asset('/media/avatars/blank.png')}}">
                        <?php } ?>
                      @else
                        <img src="{{asset('/media/avatars/blank.png')}}" >
                      @endif 
                    <div class="portfolio-info">
                      <h4>App 1</h4>
                      <p>App</p>
                    </div>
                  </div>
                </div>
              @endforeach
              
              @foreach ($mobile_app as $item)
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    @if($item->mobile_app_image)
                      <?php if (file_exists("../public/".$item->mobile_app_image)){ ?>
                        <img src="{{asset($item->mobile_app_image)}}" alt="..." class="img-fluid">
                      <?php } else{ ?>
                        <img src="{{asset('/media/avatars/blank.png')}}">
                      <?php } ?>
                    @else
                      <img src="{{asset('/media/avatars/blank.png')}}" >
                    @endif 
                    <div class="portfolio-info">
                      <h4>Card 2</h4>
                      <p>Card</p>
                    </div>
                  </div>
                </div>
              @endforeach

              @foreach ($graphic_design as $item)
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">
                    @if($item->graphic_design_image)
                      <?php if (file_exists("../public/".$item->graphic_design_image)){ ?>
                        <img src="{{asset($item->graphic_design_image)}}" alt="..." class="img-fluid">
                      <?php } else{ ?>
                        <img src="{{asset('/media/avatars/blank.png')}}">
                      <?php } ?>
                    @else
                      <img src="{{asset('/media/avatars/blank.png')}}" >
                    @endif 

                    <div class="portfolio-info">
                      <h4>Web 3</h4>
                      <p>Web</p>
                    </div>
                  </div>
                </div>
              @endforeach
      
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