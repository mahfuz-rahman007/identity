@extends('front.layouts')

@section('content')


    <!-- Bread Crumb Area Start -->
    <header class="breadcrumb-area">
		<div class="curve curve-bottom"></div>
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
                <div class="col-12">
                    <h2 class="title">
					{{ __('Service Details') }}
                    </h2>
                    <ul class="links">
                        <li>
                            <a href="{{ route('front.index') }}">
                                <i class="fas fa-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            {{ __('Service') }}
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</header>
	<!-- Bread Crumb Area End -->

    <!-- Portfolio Details Area Start -->
	<div class="portfolio-details default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-image">
                        <img src="{{ asset('assets/front/img/'.$service->service_image) }}" alt="">
                    </div>
                    <div class="content">
                        <h3 class="title">{{$service->title }}</h3>
                        {{ $service->description }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <ul>
                            @foreach ($services as $service)
                                 <li class="{{ request()->slug == $service->slug ? 'text-danger' : '' }}">
                                     <a href="{{route('front.servicedetails', $service->slug)}}">{{ $service->title }}</a>
                                 </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Details Area End -->
@endsection
