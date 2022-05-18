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
					{{$setting->service_title}}
                    </h2>
                    <ul class="links">
                        <li>
                            <a href="{{ route('front.index') }}">
                                <i class="fas fa-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            {{ __('Services') }}
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</header>
	<!-- Bread Crumb Area End -->

	<!-- Blog List  Area Start -->
	<section class="blogs blog-page sidebar" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="row">
						@if (count($services) == 0)
							<div class="col-md-12">
							  <div class="bg-light py-5">
								<h3 class="text-center">{{__('NO BLOG FOUND')}}</h3>
							  </div>
							</div>
						@else
						@foreach ($services as $service)
							<div class="col-lg-6 col-md-6">
								<div class="blog-box">
									<div class="blog-images">
										<img src="{{asset('assets/front/img/'.$service->image) }}" class="img-fluid" alt="">
									</div>
									<div class="blog-details">
										<ul class="post-meta-one">
											<li><p><i class="fa fa-user"></i> {{__('By')}} <span class="username">{{__('Admin')}}</span> </p></li>
											<li><p><i class="fa fa-clock-o"></i> {{date ( 'd M, Y', strtotime($service->created_at) )}} </p></li>
										</ul>

										<h3>
											<a class="blog-title" href='{{route('front.blogdetails', $service->id)}}'>
												{{strlen($service->title) > 40 ? substr($service->title, 0, 40) . '...' : $service->title}} 
											</a>
										</h3>

										<p class="post-body">
												{{ (strlen(strip_tags($service->description)) > 100) ? substr(strip_tags($service->description), 0, 100) . '...' : strip_tags($service->description) }}
										</p>

										<a href="{{route('front.servicedetails', $service->slug)}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>

									</div>
								</div>
							</div>
						@endforeach
						@endif
					</div>
						
					@if ($services->total() > 6)
					<div class="row">
					   <div class="col-md-12">
						  <nav class="pagination-nav {{$services->total() > 6 ? 'mb-4' : ''}}">
							{{$services->appends(['term'=>request()->input('term'), 'month'=>request()->input('month'), 'year'=>request()->input('year'), 'category' => request()->input('category')])->links()}}
						  </nav>
					   </div>
					</div>
				  @endif

                </div>
    
            </div>
        </div>
	</section>
	<!-- Blog List  Area End -->

@endsection
