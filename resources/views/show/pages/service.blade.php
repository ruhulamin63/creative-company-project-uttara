@extends('layout.content.customer-content')
<?php 
	$title= "Service";
?>

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 pt-5 d-flex align-items-center">
                    <h1>Our Service</h1>
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
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
        <div class="container">
            <div class="row">

                @foreach ($services as $item)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="bx bx-file"></i>
                            
                            {{-- @if($item->service_image)
                                <?php if (file_exists("../public/".$item->service_image)){ ?>
                                    <img src="{{asset($item->service_image)}}" >
                                <?php } else{ ?>
                                    <img src="{{asset('/media/avatars/blank.png')}}">
                                <?php } ?>
                            @else
                                <img src="{{asset('/media/avatars/blank.png')}}" >
                            @endif --}}
                        </div>
                        <h4 class="title"><a href="">{{$item->service_name}}</a></h4>
                        <p class="description">{{$item->service_desc}}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        </section><!-- End Services Section -->
        <!-- Client & Partner -->
    </main>
    <!-- End #main -->

@endsection