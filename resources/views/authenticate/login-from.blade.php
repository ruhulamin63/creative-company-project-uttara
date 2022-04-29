<!DOCTYPE html>
<!--
Product Name: Metronic - Bootstrap 5 HTML Multi-purpose Admin Dashboard ThemeAuthor: KeenThemes
Purchase: https://1.envato.market/EA4JPWebsite: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />

		<title>Login | Page</title>

		<meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Craft, bootstrap, Angular 10, Vue, React, Laravel, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/start" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		{{-- <link rel="shortcut icon" href="{{asset('media/fabric icon/car-service.png')}}" /> --}}
		<!--begin::Fonts-->
        <link rel="stylesheet" href="{{asset('css/fonts_googleapis_300_400_500_600_700.css')}}"/>
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size1: 100% 50%; background-image: {{url(asset('media/svg/illustrations/progress.svg'))}}">

				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20"  style="background-color: cadetblue;">
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->

						@include('alert-message.success-error-show')

						<form action="{{ route('login.post') }}" enctype="multipart/form-data" method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
							@csrf

							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<!-- <h1 class="text-dark mb-3" align="right">Create an Account</h1> -->

								<div>
									<img alt="Logo" src="{{asset('assets/img/CST_LOGO.svg')}}" class="h-80px" />
									<span><h1 class="text-dark mb-3">Sign In To Sheba Automation Ltd</h1></span>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Heading-->

							<!--begin::Separator-->
							<div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div>
							<!--end::Separator-->

							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									<label class="form-label fw-bolder text-dark fs-6">Username</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="username" name="username" value="{{ old('username')}}" autocomplete="off" /> {{-- {{ old('username')}} --}}
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" name="password" value="{{ old('password')}}" placeholder="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<a href="#" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
							</div>
							<!--end::Input group=-->

							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2">
									<span class="indicator-label">Sign In</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>

								<!--begin::Link-->
								{{-- <div class="text-gray-400 fw-bold fs-4">Don't have an account ?
									<a href="#" class="link-primary fw-bolder">Sign up here</a>
								</div> --}}
								<!--end::Link-->
							</div>
							<!--end::Actions-->

							<!--begin::Action-->
							<!-- <span >Login with
								<a href="#" class="fa fa-google"></a>
								<a href="#" class="fa fa-facebook"></a>
							</span> -->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				</div>
				<!--begin::Footer-->
				
				<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
				
					<!--begin::Container-->
				<div class="container-fluid align-items-center">
					<!--begin::Copyright-->
					<div class="text-dark order-2 order-md-1" style=" margin: auto; width: 50%; display: flex; align-content: center; justify-content: center; align-items: center;">
						<span class="text-muted fw-bold me-1">Copyright@2022</span>
						<a href="#" target="_blank" class="text-gray-800 text-hover-primary">shebaautomationltd.com * All rights reserved</a>
					</div>
					<!--end::Copyright-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Footer-->
			</div>
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('js/custom/authentication/sign-up/general.js')}}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
		
	</body>
	<!--end::Body-->
</html>
