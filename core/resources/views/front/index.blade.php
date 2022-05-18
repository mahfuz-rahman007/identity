@extends('front.layouts')

@section('content')

    {{-- Header Area Start Here --}}
    <section class="home-bg section h-100vh" id="home">
        <div class="bg-overlay"></div>
        <div class="curve curve-bottom"></div>
        <div class="home-table">
            <div class="home-table-center">
                <div class="container">
                    <div class="row juatify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="profile-img">
                                    <img src="{{ asset('assets/front/img/'.$abouts->avatar) }}" alt="">
                                </div>
                                <h2 class="name">
									{{ $abouts->name }}
								</h2>
                                <h2 class="header_title">{{ $abouts->position_type }}</h2>
                                <ul class="social_home list-unstyled text-center pt-4 wrap">
									@foreach ($socials as $social)
									<li class="list-inline-item">
										<a href="{{ $social->url }}"><i class="{{ $social->icon }}"></i></a>
									</li>
									@endforeach
								</ul>
								<div class="header_btn">
									<a href="{{ asset('assets/front/file/'.$abouts->resume) }}" class="mybtn mybtn-light" download><span>{{ __('Download CV') }}</span></a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll_down">
			<a href="#about" class="scroll">
					<i class="fas fa-long-arrow-alt-down"></i>
			</a>
		</div>
    </section>
    {{-- Header Area End Here --}}

    {{-- About Area Start Here --}}
    <div id="about" class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 d-flex align-self-center">
                    <div class="author-image">
                        <img src="{{asset('assets/front/img/'.$abouts->profile_image) }}" alt="Author Image">
                    </div>
                </div>
                <div class="col-md-7 d-flex align-self-center">
                    <div class="about-content">
                        <!-- Single Tab -->
						<h4 class="about-heading">{{ $abouts->about_title }}</h4>
						<p>
							{{ $abouts->about_text }}
						</p>
                        <ul class="info-list">
                            <li>
                                <span class="title">{{ __('Age :') }}</span>
                                <span class="value">{{ $abouts->age }}</span>
                            </li>
                            <li>
                                <span class="title">{{ __('Residence :') }}</span>
                                <span class="value">{{ $abouts->residence }}</span>
                            </li>
                            <li>
                                <span class="title">{{ __('Address :') }}</span>
                                <span class="value">{{ $abouts->address }}</span>
                            </li>
                            <li>
                                <span class="title">{{ __('E-mail :') }}</span>
                                <span class="value"><a href="mailto:{{ $abouts->mail }}">{{ $abouts->mail }}</a></span>
                            </li>
                            <li>
                                <span class="title">{{ __('Phone :') }}</span><span class="value">{{ $abouts->phone }}</span>
                            </li>
                            <li>
                                <span class="title">{{ __('Freelance :') }}</span><span class="value">{{ $abouts->freelance }}</span>
                            </li>
                        </ul>
                        <a href="#contact" class="mybtn mybtn-bg"><span>{{ __('Contact Me') }}</span></a>
                    </div>
                </div>
            </div>
            <div class="row myclient-area">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>{{ $setting->client_title }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="client-slider">
                                @foreach ($clients as $client)
                                  <div class="item">
                                    <a href="{{ $client->url }}" target="_blank" >
                                      <img src="{{ asset('assets/front/img/'.$client->image) }}" alt="">
                                    </a>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Anout Area End Here --}}

    {{-- Service Area Start --}}
     <div id="services">
        <div class="curve curve-top"></div>
		<div class="curve curve-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<div class="section-title">
						<h2>{{ $setting->service_title }}</h2>
					</div>
				</div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-4">
                        <div class="item">
                            <img src="{{asset('assets/front/img/'.$service->image) }}" alt="">
							<h6 class="title">{{ $service->title }}</h6>
							<p>{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a class="mybtn mybtn-bg" href="{{ route('front.services') }}"><span>{{ __('View All') }}</span></a>
				</div>
			</div>
        </div>
     </div>
    {{-- Service Area End --}}


    	<!-- Resume Area Start -->
	<div id="eduandex">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>{{ $setting->resume_title }}</h2>
					</div>
				</div>
			</div>
			<div class="row skill-area"  id="statisticsSection">
				@foreach ($scategories as $scategory)
					<div class="col-lg-6">
						<div class="skill-box">
							<h4 class="title">
									{{ $scategory->name }}
							</h4>
							<div class="skill-list">
								@foreach ($scategory->skills as $key=>$skill)
								<div class="single-skill">
										<div class="round"
										data-value="1"
										data-number="{{ $skill->level }}"
										data-size="100"
										data-thickness="6"
										data-fill="{
										&quot;color&quot;: &quot;{{ $setting->base_color }}&quot;
										}">
										<strong></strong>
										<h6 class="mt-1">{{ $skill->name }}</h6>
									 	</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="edu-box">
						<h2 class="title">{{ $setting->education_title }}</h2>
						<div class="row">
							<div class="col-12">
								<div class="education-list">
									@foreach ($educations as $education)
										<div class="single-education">
											<h4 class="collage-name">
												{{ $education->school }}
											</h4>
											<p class="degree">{{ $education->field }}<span class="year">{{ $education->from_date }}  - {{ empty($education->date_to) ? 'Present' : $education->date_to }}</span></p> 
											<div class="description">
												<p>
														{{ $education->description }}
												</p>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
						<div class="edu-box">
						<h2 class="title">{{ $setting->experince_title }}</h2>
						<div class="row">
							<div class="col-12">
								<div class="education-list">
									@foreach ($experinces as $experince)
										<div class="single-education">
											<h4 class="collage-name">
												{{ $experince->company }}
											</h4>
											<p class="degree">{{ $experince->field }}  <span class="year">{{ $experince->from_date }} - {{ empty($experince->date_to) ? 'Present' : $experince->date_to }}</span></p> 
											<div class="description">
												<p>
													{{ $experince->description }}
												</p>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row download-cv-area">
				<div class="col-lg-12 text-center">
						<a href="{{ asset('assets/front/file/'.$abouts->resume) }}" class="mybtn mybtn-bg" download><span>{{ __('Download Resume') }}</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Resume Area End -->


	{{-- portflio  Area Start--}}
	<div id="work" class="work-area section-padding">
		<div class="curve curve-top"></div>
		<div class="curve curve-bottom"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>{{ $setting->portfolio_title }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($portfolios as $portfolio)
					<div class="col-lg-4 col-md-6">
						<div class="single-work">
							<img src="{{asset('assets/front/img/'.$portfolio->featured_image) }}" alt=""> 
							<div class="item-hover">
								<div class="work-table">
									<div class="work-tablecell">
										<div class="hover-content">
											<h4>{{ strlen($portfolio->title) > 35 ? substr($portfolio->title, 0, 35).'...' :  $portfolio->title}}</h4>
											<a href="{{ route('front.portfoliodetails', $portfolio->slug) }}" class="work-link"><i class="fa fa-link"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a class="mybtn mybtn-bg" href="{{ route('front.portfolios') }}"><span>{{ __('View All') }}</span></a>
				</div>
			</div>
		</div>
	</div>
	{{-- Portfolio Area end --}}

	<!-- Fun Fact Area Start -->
	<div id="counterArea">
		<div class="container">
			<div class="row">
				@foreach ($funfacts as $funfact)
					<div class="col-lg-3 col-md-6">
						<!-- Single stat  -->
						<div class="counter_box">
							<div class="counter-w">
								<h2 class="count">{{ $funfact->value }}</h2> <span>+</span>
							</div>
							<h3>{{ $funfact->name }}</h3>
						</div>
					</div>
				@endforeach
			</div>
			<!--/.row -->
		</div>
		<!--/.container -->
	</div>
	<!-- Fun Fact Area End -->

		<!-- Testimonial Area Start -->
		<section class="testimonial" id="testimonial">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="section-title">
							<h2>{{ $setting->testimonial_title }}</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="testimonial-slider">
							@foreach ($testimonials as $testimonial)
								<div class="slider-item">
									<div class="single-review">
											<div class="reviewr">
												<div class="img">
													<img src="{{asset('assets/front/img/'.$testimonial->image) }}" alt="">
												</div>
												<div class="content">
													<h4 class="name">
														{{ $testimonial->name }}
													</h4>
													<p>
														{{ $testimonial->position }}
													</p>
												</div>
											</div>
										<div class="stars">
											@for ($i = 0; $i < $testimonial->rating; $i++)
												<i class="fas fa-star"></i>
											@endfor
										</div>
										<div class="content">
											<p>
													{{ $testimonial->message }}
											</p>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Testimonial Area End -->\


			<!-- Blog Area Start -->
	<section id="blog" class="all_blogs blogs">
		<div class="curve curve-top"></div>
		<div class="curve curve-bottom"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>{{ $setting->blog_title }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				  <div class="blog-slider">
					  @foreach ($blogs as $blog)
					  	<div class="item">
							<div class="blog-box">
							  <div class="blog-images">
								<img src="{{asset('assets/front/img/'.$blog->main_image) }}" class="img-fluid" alt="">
							  </div>
							  <div class="blog-details">
								<ul class="post-meta-one">
								  <li><p><i class="fa fa-user"></i> {{__('By')}} <span class="username">{{__('Admin')}}</span> </p></li>
								  <li><p><i class="fa fa-clock-o"></i> {{date ( 'd M, Y', strtotime($blog->created_at) )}} </p></li>
								</ul>
								<h3>
								  <a class="blog-title" href='{{route('front.blogdetails', $blog->slug)}}'>
									 {{strlen($blog->title) > 40 ? substr($blog->title, 0, 40) . '...' : $blog->title}} 
								  </a>
								</h3>
								<p class="post-body">
									{{ (strlen(strip_tags($blog->content)) > 100) ? substr(strip_tags($blog->content), 0, 100) . '...' : strip_tags($blog->content) }}
								</p>
								<a href="{{route('front.blogdetails', $blog->slug)}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>
							  </div>
							</div>
						  </div>
					  @endforeach
				  </div>
				</div>
			  </div>
		</div>
	</section>
	<!-- Blog Area End -->


	<!-- Contact Us Area Start -->
	<div id="contact" class="contact-info-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>{{ $setting->contact_title }}</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
					<!-- Single Info -->
					<div class="single-info">
						<div class="info-icon">
							<i class="fa fa-rocket"></i>
						</div>
						<div class="info-content">
							<h5>{{ __('My Location:') }}</h5>
							<p>{{ $abouts->address }}</p>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Single Info -->
					<div class="single-info">
						<div class="info-icon">
							<i class="fa fa-phone"></i>
						</div>
						<div class="info-content">
							<h5>{{ __('Phone Number:') }}</h5>
							<p>{{ $abouts->phone }}</p>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Single Info -->
					<div class="single-info">

						<div class="info-icon">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="info-contentr">
							<h5>{{ __('Email Address:') }}</h5>
							<p>{{ $abouts->mail }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row cAndm">
				<div class="col-lg-12">
					<div class="home-page-form">
						<div class="contact-form">
							<form id="contact-form" method="post" action="{{route('front.sendmail')}}">
								@csrf
								<div class="controls">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<i class="fa fa-user-o"></i>
												<input id="form_name" type="text" name="name" class="form-control" placeholder="Name*" required="required"
													data-error="Name is required.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<i class="fa fa-envelope-o"></i>
												<input id="form_email" type="email" name="email" class="form-control" placeholder="Email*" required="required"
													data-error="Valid email is required.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<i class="fa fa-question-circle-o"></i>
												<input id="form_subject" type="text" name="subject" class="form-control" placeholder="Subject*" required="required"
													data-error="Subject is required.">
												<div class="help-block with-errors"></div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<i class="fa fa-comment-o"></i>
												<textarea id="form_message" name="message" class="form-control" placeholder="Message*" rows="7" required="required"
													data-error="Please,leave us a message."></textarea>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" class="mybtn mybtn-bg"><span>{{ __('Send Message') }}</span></button>
										</div>
									</div>
								</div>
							</form> <!-- End Contact From -->
						</div>
					</div>
				</div>
			</div>
			<!--/.row-->
		</div>
		<!--/.container-->
	</div>
	<!-- Contact Us Area End -->

    
@endsection