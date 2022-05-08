@extends('layout.content.customer-content')
<?php 
	$title= "Product";
?>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-5 d-flex align-items-center">
                    <h1>Our Products</h1>
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
        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="Ipo_service" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    
                    @foreach ($products as $item)
                        <div class="col-lg-3 mt-4">
                            <div class="post-box">
                                <div class="post-img">
                                    @if($item->product_image)
                                        <?php if (file_exists("../public/".$item->product_image)){ ?>
                                            <img src="{{asset($item->product_image)}}" class="img-fluid" alt="">
                                        <?php } else{ ?>
                                            <img src="{{asset('/media/avatars/blank.png')}}" class="img-fluid" alt="">
                                        <?php } ?>
                                    @else
                                        <img src="{{asset('/media/avatars/blank.png')}}" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <h3 class="post-title">{{$item->product_name}}</h3>
                                <button class="btn mt-5">Request For Product</button>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- End Recent Blog Posts Section -->
    </main>
    <!-- End #main -->

@endsection