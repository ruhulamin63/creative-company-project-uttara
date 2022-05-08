@extends('layout.content.admin-content')
<?php 
	$title= "Dashboard";
?>

@section('content')

    <!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Toolbar-->
					<div class="toolbar" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
							<!--begin::Page title-->
							<div class="d-flex align-items-center me-3">
								<!--begin::Title-->
								<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
								<!--begin::Separator-->
								<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
								<!--end::Separator-->
								<!--begin::Description-->
								<small class="text-muted fs-7 fw-bold my-1 ms-1">#All View</small>
								<!--end::Description--></h1>
								<!--end::Title-->
							</div>
							<!--end::Page title-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->

                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container">
                            <!--begin::Row-->
                            <div class="row gy-5 gx-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <!--begin::Tables Widget 9-->
                                    <div class="card card-xxl-stretch mb-5 mb-xl-8">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_new_address_header">
                                            <div class="row col-md-12">
                                                <div class="col-md-3">
                                                    <!--begin::Col-->
                                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7" style="background-color:#FF5F7E;">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2" style="color: white !important;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                                                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <a href="#" class="text-primary fw-bold fs-6" style="color: white !important;">Total Order</a>
                                                        <span class="text-dark fw-bold text-dark d-block fs-1" style="color: white !important;">*</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="col-md-3">
                                                    <!--begin::Col-->
                                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7" style="background-color:#009EF7;">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2" style="color: white !important;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <a href="#" class="text-primary fw-bold fs-6" style="color: white !important;">Monthly Order</a>
                                                        <span class="text-dark fw-bold text-dark d-block fs-1" style="color: white !important;">*</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="col-md-3">
                                                    <!--begin::Col-->
                                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7" style="background-color:#2F86A6;">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2" style="color: white !important;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <a href="#" class="text-primary fw-bold fs-6" style="color: white !important;">Total Income</a>
                                                        <span class="text-dark fw-bold text-dark d-block fs-1" style="color: white !important;">*</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="col-md-3">
                                                    <!--begin::Col-->
                                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7" style="background-color:#B91646;">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2" style="color: white !important;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <a href="#" class="text-primary fw-bold fs-6" style="color: white !important;">Monthly Income</a>
                                                        <span class="text-dark fw-bold text-dark d-block fs-1" style="color: white !important;">*</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Modal header-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Post-->

                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container">
                            <!--begin::Row-->
                            <div class="row gy-5 gx-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <!--begin::Today Order body-->
                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary fs-6"><h4>Today Orders</h4></span>
                                                <span class="text-muted mt-1 fw-bold fs-7">All Order List Information</span>
                                            </h3>
                                        </div>
                                        <!--end::Card header-->

                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <!--begin::Table container-->
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-condensed" id="today-order-table">
                                                        <thead>
                                                            <tr style="background-color: #E74C3C; color:white !important">
                                                                <th style="text-align: center;" class="min-w-100px">Customer Name</th>
                                                                <th style="text-align: center;" class="min-w-100px">Product Name</th>
                                                                <th style="text-align: center;" class="min-w-100px">Price</th>
                                                                <th style="text-align: center;" class="min-w-100px">Status</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody></tbody>

                                                        
                                                       
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Today Appointment body-->
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
				<!--end::Content-->
			</div>
			<!--end::Wrapper-->
		</div>
	</div>
	<!--end::Root-->
  

@endsection