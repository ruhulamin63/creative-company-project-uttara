@extends('layout.content.customer-content')
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
								@foreach ($company as $item)
									<tbody>
										<tr>
											<td>Company Name</td>
											<td>{{ $item->company_name }}</td>
										</tr>
										<tr>
											<td>Reg. No.</td>
											<td>{{ $item->reg_no }}</td>
										</tr>
										<tr>
											<td>Trade Lisence No.</td>
											<td>{{ $item->trade_licence_no }}</td>
										</tr>
										<tr>
											<td>Logo (up)</td>
											<td>
												
													@if($item->company_logo)
														<?php if (file_exists("../public/".$item->company_logo)){ ?>
															<img src="{{asset($item->company_logo)}}" style="height:50px; width:50px">
														<?php } else{ ?>
															<img src="{{asset('/media/avatars/blank.png')}}" style="height:50px; width:50px">
														<?php } ?>
													@else
														<img src="{{asset('/media/avatars/blank.png')}}" style="height:50px; width:50px">
													@endif
												
											</td>
										</tr>
										<tr>
											<td>Tagline</td>
											<td>{{ $item->tagline }}</td>
										</tr>
										<tr>
											<td>Web Site</td>
											<td>{{ $item->website }}</td>
										</tr>
										<tr>
											<td>Facebook Link</td>
											<td>{{ $item->facebook_id }}</td>
										</tr>
										<tr>
											<td>Skype Id</td>
											<td>{{ $item->skype_id }}</td>
										</tr>
										<tr>
											<td>Bank Account Name</td>
											<td>{{ $item->bank_account_name }}</td>
										</tr>
										<tr>
											<td>Bank Name</td>
											<td>{{ $item->bank_name }}</td>
										</tr>
										<tr>
											<td>Baranch Name</td>
											<td>{{ $item->branch_name }}</td>
										</tr>
									</tbody>
								@endforeach	
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

  	</main>
  	<!-- End #main -->

@endsection