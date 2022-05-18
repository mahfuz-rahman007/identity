<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@if (request()->is('blog-details/*'))
	<meta name="description" content="{{ $blog->meta_description }}">
	<meta name="keywords" content="{{ $blog->meta_keywords }}">
	@else
	<meta name="description" content="{{ $setting->meta_description }}">
	<meta name="keywords" content="{{ $setting->meta_keywords }}">
	@endif
	<!-- Site Title -->
	<title>{{ $setting->website_title }}</title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{  asset('assets/front/img/'.$setting->fav_icon) }}" type="image/png">
	<!-- bootstrap -->
	<link href="{{asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- font-awesome -->
	<link href="{{asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- magnific-popup -->
	<link href="{{asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet">
	<!-- owl carousel -->
	<link href="{{asset('assets/front/css/owl.carousel.css') }}" rel="stylesheet">
	<!-- Main Style css -->
	<link href="{{asset('assets/front/css/style.css') }}" rel="stylesheet">
	<!-- responsive css -->
	<link href="{{asset('assets/front/css/responsive.css') }}" rel="stylesheet">
	<!-- dynamic Style change -->
	<link href="{{url('/')}}/assets/front/css/dynamic-style.php?color={{$setting->base_color}}" rel="stylesheet">

</head>

<body>
	<!-- Preloader Start -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- Preloader End -->

	<!-- Header Area Start -->
	<header class="header">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="{{ route('front.index') }}">
					<img src="{{ asset('assets/front/img/'.$setting->header_logo) }}" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="ca-navbar">
					<ul class="navbar-nav ml-auto" id="nav">
						<li class="nav-item">
							<a class="nav-link smoth-scroll" href="@if(request()->path() == '/') #home @else {{route('front.index')}}#home @endif">{{ __('Home') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link smoth-scroll" href="@if(request()->path() == '/') #about @else {{route('front.index')}}#about @endif">{{ __('About') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link @if(request()->path() == 'services') active  @endif " href="{{ route('front.services') }}"  >{{ __('Service') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link smoth-scroll" href="@if(request()->path() == '/') #eduandex @else {{route('front.index')}}#eduandex @endif">{{ __('Resume') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link @if(request()->path() == 'portfolios') active  @endif" href="{{ route('front.portfolios') }}">{{ __('Portfolio') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  @if(request()->path() == 'blogs') active  @endif" href="{{ route('front.blogs') }}">{{ __('Blogs') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link smoth-scroll" href="@if(request()->path() == '/') #contact @else {{route('front.index')}}#contact @endif">{{ __('Contact') }}</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- Header Area End -->

	@yield('content')


	<!-- Footer Area Start -->
	<footer class="footer">
		<div class="curve curve-top"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<a class="f-logo" href="{{ route('front.index') }}">
						<img src="{{ asset('assets/front/img/'.$setting->footer_logo) }}" alt="">
					</a>
					<div class="social-link d-flex justify-content-center">
						<ul class="wrap">
							@foreach ($socials as $social)
							<li >
								<a href="{{ $social->url }}"><i class="{{ $social->icon }}"></i></a>
							</li>
							@endforeach
						</ul>
					</div>
					<div>
						{{ $setting->copyright_text }}
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->

	<!-- back to top button Start -->
	<a href="#" class="back-top-btn">
		<i class="fa fa-angle-up"></i>
	</a>
	<!-- back to top button End -->

	<!-- All js links Start -->
	<script src="{{ asset('assets/front/js/jquery-1.12.4.min.js') }}"></script>
	<!-- plugins js -->
	<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
	<!-- plugins js -->
	<script src="{{asset('assets/front/js/plugins.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets/front/js/main.js')}}"></script>

</body>
</html>