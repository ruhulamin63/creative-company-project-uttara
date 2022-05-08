	<!--begin::Head-->
	<head>
        <base href="">
		<meta charset="utf-8" />

		<title><?=$title?></title>

		<meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Craft, bootstrap, Angular 10, Vue, React, Laravel, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<link rel="canonical" href="Https://preview.keenthemes.com/start" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />


		<meta name="csrf-token" content="{{ csrf_token() }}">


		<link rel="shortcut icon" href="{{asset('media/fabric icon/fabric-logo.png')}}" />

		<!--begin::Fonts-->
        <link rel="stylesheet" href="{{asset('css/fonts_googleapis_300_400_500_600_700.css')}}"/>
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	
		<!-- Custom fonts for this template-->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template-->

		{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> --}}

    	<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

	</head>
    <!--end::Head-->