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
					{{$setting->blog_title}}
                    </h2>
                    <ul class="links">
                        <li>
                            <a href="{{ route('front.index') }}">
                                <i class="fas fa-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            {{ __('Blogs') }}
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
                <div class="col-lg-8">
					<div class="row">
						@if (count($blogs) == 0)
							<div class="col-md-12">
							  <div class="bg-light py-5">
								<h3 class="text-center">{{__('NO BLOG FOUND')}}</h3>
							  </div>
							</div>
						@else
						@foreach ($blogs as $blog)
							<div class="col-lg-6 col-md-6">
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
						@endif
					</div>
						
					@if ($blogs->total() > 6)
					<div class="row">
					   <div class="col-md-12">
						  <nav class="pagination-nav {{$blogs->total() > 6 ? 'mb-4' : ''}}">
							{{$blogs->appends(['term'=>request()->input('term'), 'month'=>request()->input('month'), 'year'=>request()->input('year'), 'category' => request()->input('category')])->links()}}
						  </nav>
					   </div>
					</div>
				  @endif

                </div>
                <div class="col-lg-4">
					<div class="blog-aside">
						<div class="serch-form">
								<form action="#">
									<form action="{{route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])}}" method="GET">
										<div class="searchbar">
											<input name="category" type="hidden" value="{{request()->input('category')}}">
											<input name="month" type="hidden" value="{{request()->input('month')}}">
											<input name="year" type="hidden" value="{{request()->input('year')}}">
											<input name="term" type="text" placeholder="Search Blogs" value="{{request()->input('term')}}">
											<button type="submit"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</form>
								</div>
								<div class="categori">
								<h4 class="title">{{ __('Categories') }}</h4>
								<span class="separator"></span>
								<ul class="categori-list">
									@foreach ($bcategories as $bcategory)
										<li class=" @if(request()->input('category') == $bcategory->id) active @endif">
											<a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>$bcategory->id, 'month' => request()->input('month'), 'year' => request()->input('year')])}}">
												<span>{{ $bcategory->name }}</span>
											</a>
										</li>
									@endforeach
								</ul>
								</div>
								<div class="recent-post-widget">
								<h4 class="title">{{ __('Recent Post') }}</h4>
								<span class="separator"></span>
									<ul class="post-list">
									@foreach ($latestblogs as $latestblog)
                                            <li>
                                                <div class="post">
                                                    <div class="post-img">
                                                        <img src="{{asset('assets/front/img/'.$latestblog->main_image)}}" alt="">
                                                    </div>
                                                    <div class="post-details">
                                                        <a href="{{route('front.blogdetails', $latestblog->slug)}}">
                                                            <h4 class="post-title">
                                                                    {{strlen($latestblog->title) > 40 ? substr($latestblog->title, 0, 40) . '...' : $latestblog->title}} 
                                                            </h4>
                                                        </a>
                                                        <p class="date">
                                                                {{date ( 'd M, Y', strtotime($latestblog->created_at) )}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li> 
                                        @endforeach
									</ul>
								</div>
								<div class="archives">
								<h4 class="title">{{ __('Archives') }}</h4>
								<span class="separator"></span>
								<ul class="archives-list">
										@foreach ($archives as $key => $archive)
										  @php
											$myArr = explode('/', $archive->date);
											$monthNum  = $myArr[0];
											$dateObj   = DateTime::createFromFormat('!m', $monthNum);
											$monthName = $dateObj->format('F');
										  @endphp
										  <li class="single-category @if(request()->input('month') == $myArr[0] && request()->input('year') == $myArr[1]) active @endif">
											<a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>request()->input('category'),'month'=>$myArr[0], 'year'=>$myArr[1]])}}">{{$monthName}} {{$myArr[1]}}</a>
										</li>
										@endforeach
									 </ul>
								</div>
				</div>
                </div>
            </div>
        </div>
	</section>
	<!-- Blog List  Area End -->

@endsection
