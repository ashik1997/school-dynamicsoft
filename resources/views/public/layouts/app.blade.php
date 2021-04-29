<!--
Developer info: 
=================
|---------------------------------------------------------|
| Name  | Ashik                                 		  |
| Skype | ashikur551                  		      		  |
| Phone | +880 1731002123                        		  |
| Email | ashikurashik.sc@gmail.com                       |
|---------------------------------------------------------|
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ App\Models\SiteInfo::pluck('site_name')[0] }} - @yield('title')</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	@include('public.inc.link')
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script type="text/javascript">
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})
	</script>
</head>

<body>
	<div id="app">
	    @if(Session::has('flash_success'))
		{!! session('flash_success') !!}
		@endif
		@include('public.inc.header')
	    @yield('content')
	    @include('public.inc.footer')
		@include('public.inc.script')
	<div id="app">
</body>
</html>
