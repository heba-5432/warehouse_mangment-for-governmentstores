
<html>
<head>
@extends('layouts.master')
@section('css')
<!--- Internal Fontawesome css-->
<link href="assets/plugins/fontawesome-free/css/all.min.css rel="stylesheet">
<!---Ionicons css-->
<link href="assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
<!---Internal Typicons css-->
<link href="assets/plugins/typicons.font/typicons.css" rel="stylesheet">
<!---Internal Feather css-->
<link href="assets/plugins/feather/feather.css'" rel="stylesheet">
<!---Internal Falg-icons css-->
<link href="assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
@endsection

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
	</head>



</head>
<body>
    <body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('layouts.main-sidebar')
		<!-- main-content -->
		<div class="main-content app-content">
			@include('layouts.main-header')
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				@include('layouts.sidebar')
				@include('layouts.models')
            	@include('layouts.footer')
				@include('layouts.footer-scripts')
	</body>
@section('content')
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">
			<img src="assets/img/media/404.png" class="error-page" alt="error">
			<h2>Oopps. The page you were looking for doesn't exist.</h2>
			<h6>You may have mistyped the address or the page may have moved.</h6><a class="btn btn-outline-danger" href="{{ url('/' . $page='index') }}">Back to Home</a>
		</div>
		<!-- /Main-error-wrapper -->
@endsection
</body>
@section('js')
@endsection
</html>
