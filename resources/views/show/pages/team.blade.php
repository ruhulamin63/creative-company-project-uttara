@extends('layout.content.main-content')
<?php 
	$title= "Team";
?>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 pt-5 d-flex align-items-center">
                    <h1>Our Team</h1>
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
        <!-- ======= Team Section ======= -->
        <section id="team" class="team ">
          <div class="container">
    
            <div class="row">
    
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mt-4">
                <div class="member d-flex align-items-start">
                  <div class="pic"><img src="{{asset('assets/img/team/team-1.jpg')}}" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Walter White</h4>
                    <span>Chief Executive Officer</span>
                    <div class="social">
                      <a href=""><i class="fab fa-linkedin"></i></a>
                      <a href=""><i class="fab fa-github-alt"></i></a>
                      <a href=""><i class="fab fa-facebook"></i></a>
                      <a href=""><i class="fab fa-twitter"></i></a>
                    </div>
                    <p>Explicabo voluptatem mollitia et repellat</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->

@endsection