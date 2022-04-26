@extends('layout.content.main-content')
<?php 
	$title= "Career";
?>

@section('content')

	<!-- ======= Hero Section ======= -->
	<section id="hero">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 pt-5 d-flex align-items-center">
					<h1>Careers</h1>
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
		<section>
		  <div class="container">
			<div class="row">
			  <div class="col-lg-12">
				<div class="table_main table-responsive">
				  <table class="table table-bordered table-hover">
					<thead>
					  <tr class="table-primary">
						<th scope="col">Position</th>
						<th scope="col">Vacancy</th>
						<th scope="col">Type</th>
						<th scope="col">Apply Date</th>
						<th scope="col">Details</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Executive, Marketing	</td>
						<th>01</th>
						<td>Full Time	</td>
						<td>06-Sep-2021</td>
						<th><a href="view_details.html" class="btn btn-info">View Details</a></th>
					  </tr>
					  <tr>
	
						<td>UX/UI Designer	</td>
						<th>02</th>
						<td>Full Time	</td>
						<td>06-Sep-2021</td>
						<th><a href="view_details.html" class="btn btn-info">View Details</a></th>
					  </tr>
					  <tr>
						<td>Sr. Software Engineer/Software Engineer	</td>
						<th>03</th>
						<th>Full Time</th>
						<th>06-Sep-2021	</th>
						<th><a href="view_details.html" class="btn btn-info">View Details</a></th>
					  </tr>
					</tbody>
				  </table>
				</div>
			  </div>
			</div>
		  </div>
		</section>
	
	</main>
	<!-- End #main -->

@endsection