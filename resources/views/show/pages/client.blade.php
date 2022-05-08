@extends('layout.content.customer-content')
<?php 
	$title= "Client";
?>

@section('content')

	<!-- ======= Hero Section ======= -->
	<section id="hero">
		<div class="container">
		<div class="row">
			<div class="col-lg-12 pt-5 d-flex align-items-center">
					<h1>Our Clients</h1>
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
		<!-- ======= Gallery Section ======= -->
		<section id="gallery" class="gallery">
			<div class="container">
				<div class="row no-gutters">
					@foreach ($clients as $item)
						<div class="col-lg-3 col-sm-6">
							<div class="gallery-item mobile-responsive1">
								<a href="{{asset($item->client_image)}}" class="galleery-lightbox" data-gallery="gallery-item">
									@if($item->client_image)
										<?php if (file_exists("../public/".$item->client_image)){ ?>
										<img src="{{asset($item->client_image)}}" alt="..." class="img-fluid">
										<?php } else{ ?>
										<img src="{{asset('/media/avatars/blank.png')}}">
										<?php } ?>
									@else
										<img src="{{asset('/media/avatars/blank.png')}}" >
									@endif 
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- End Gallery Section -->
		<!-- Client & Partner -->
	</main>
	<!-- End #main -->

@endsection