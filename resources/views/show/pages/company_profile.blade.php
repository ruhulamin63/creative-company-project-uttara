@extends('layout.content.main-content')
<?php 
	$title= "Company Profile";
?>

@section('content')

	<main id="main">
		<section class="py-5 view-detiles">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table_main table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr class="table-primary">
										<th scope="col">Type</th>
										<th scope="col">Company Information</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Company Name</td>
									</tr>
									<tr>
										<td>Reg. No.</td>
									</tr>
									<tr>
										<td>Trade Lisence No.</td>
									</tr>
									<tr>
										<td>Logo (up)</td>
									</tr>
									<tr>
										<td>Tagline</td>
									</tr>
									<tr>
										<td>Web Site</td>
									</tr>
									<tr>
										<td>Facebook Link</td>
									</tr>
									<tr>
										<td>Skype Id</td>
									</tr>
									<tr>
										<td>Bank Account Name</td>
									</tr>
									<tr>
										<td>Bank Name</td>
									</tr>
									<tr>
										<td>Baranch Name</td>
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