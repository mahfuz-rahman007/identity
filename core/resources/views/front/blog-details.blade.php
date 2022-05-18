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
                        {{ __('Blog Details') }}
                    </h2>
                    <ul class="links">
                        <li>
                            <a href="{{ route('front.index') }}">
                                <i class="fas fa-home"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            {{ __('Blog Details') }}
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</header>
	<!-- Bread Crumb Area End -->

    <!-- Blog Details Area Strat -->
    <section class="blog-details" id="blog-details">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="blog-content">
                <div class="feature-image">
                    <img class="img-fluid" src="{{asset('assets/front/img/'.$blog->main_image)}}" alt="">
                </div>
                <div class="content">
                    <h3 class="title">
                        {{ $blog->title }}
                    </h3>
                    <ul class="post-meta">
                    <li>
                        <a href="#">
                        <i class="fa fa-user"></i>
                        <span>{{__('By')}} {{__('Admin')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>
                                {{date('F d, Y', strtotime($blog->created_at))}}
                        </span>
                        </a>
                    </li>
                    </ul>
                    <div class="content-body">
                        {{ $blog->content }}
                    </div>
                </div>
                </div>
                @if($setting->is_disqus	== 1)
                    <div id="disqus_thread" class="mt-5"></div>
                    <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = '//{{ $setting->disqus_username }}.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
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
                                        <li class="@if(request()->input('bcategory') == $bcategory->id) active @endif">
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
    <!-- Blog Details Area End -->

@endsection
