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
					{{ __('Portfolio Details') }}
                    </h2>
                    <ul class="links">
                        <li>
                            <a href="{{ route('front.index') }}">
                                <i class="fas fa-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            {{ __('Portfolios') }}
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
                        <img src="{{ asset('assets/front/img/'.$portfolio->featured_image) }}" alt="">
                    </div>
                    <div class="content">
                        <h3 class="title">{{ $portfolio->title }}</h3>
                        {{ $portfolio->content }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <ul>
                            <li>
                                    {{ __('Service :') }} <span>{{ $portfolio->service->title }}</span>
                            </li>
                            <li>
                                    {{ __('Client name :') }}  <span>{{ $portfolio->client_name }}</span>
                            </li>
                            <li>
                                    {{ __('Start Date :') }} <span>{{date('jS M, Y', strtotime($portfolio->start_date))}}</span>
                            </li>
                            <li>
                                    {{ __('End Date :') }} <span>{{date('jS M, Y', strtotime($portfolio->submission_date))}}</span>
                            </li>
                            <li>
                                    {{__('Status :')}} <span>{{ $portfolio->status == 1 ? 'Completed' : 'In Progress' }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="aside-contact-form">
                        <div class="heading">
                            <h4 class="title">
                                Get In Tuch
                            </h4>
                        </div>
                            <div class="contact-form">
                                    <form id="contact-form" method="post" action="{{route('front.sendmail')}}">
                                        @csrf
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <i class="fa fa-user-o"></i>
                                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Name*" required="required"
                                                            data-error="Name is required.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
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
        </div>
    </div>
    <!-- Portfolio Details Area End -->
@endsection
