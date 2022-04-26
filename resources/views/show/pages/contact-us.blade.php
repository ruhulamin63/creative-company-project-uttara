@extends('layout.content.main-content')
<?php 
	$title= "Contact Us";
?>

@section('content')

	<!-- ======= Hero Section ======= -->
	<section id="hero">
		<div class="container">
		<div class="row">
			<div class="col-lg-12 pt-5 d-flex align-items-center">
					<h1>Contact Us</h1>
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
		<!-- ======= Contact Section ======= -->
		<section id="contact" class="contact">
		  <div class="container" data-aos="fade-up">
			<div class="row gy-4">
	
			  <div class="col-lg-6">
	
				<div class="row gy-4">
				  <div class="col-md-6">
					<div class="info-box">
					  <i class="bi bi-geo-alt"></i>
					  <h3>Address</h3>
					  <p>A108 Adam Street,<br>New York, NY 535022</p>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="info-box">
					  <i class="bi bi-telephone"></i>
					  <h3>Call Us</h3>
					  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="info-box">
					  <i class="bi bi-envelope"></i>
					  <h3>Email Us</h3>
					  <p>info@example.com<br>contact@example.com</p>
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="info-box">
					  <i class="bi bi-clock"></i>
					  <h3>Open Hours</h3>
					  <p>Monday - Friday<br>9:00AM - 05:00PM</p>
					</div>
				  </div>
				</div>
	
			  </div>
	
			  <div class="col-lg-6">
				<form action="forms/contact.php" method="post" class="php-email-form">
				  <div class="row gy-4">
	
					<div class="col-md-6">
					  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
					</div>
	
					<div class="col-md-6 ">
					  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
					</div>
	
					<div class="col-md-12">
					  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
					</div>
	
					<div class="col-md-12">
					  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
					</div>
	
					<div class="col-md-12 text-center">
					  <div class="loading">Loading</div>
					  <div class="error-message"></div>
					  <div class="sent-message">Your message has been sent. Thank you!</div>
	
					  <button type="submit">Send Message</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</section>
		<!-- End Contact Section -->
	</main>
	<!-- End #main -->

@endsection