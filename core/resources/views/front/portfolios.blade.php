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
                        {{$setting->portfolio_title}}
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

        <div id="work" class="work-area section-padding work-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="portfolio-category">
                            <li class="@if(empty(request()->input('category'))) active @endif">
                                <a href="{{route('front.portfolios')}}">{{ __('All') }}</a>
                            </li>
                            @foreach ($scategories as $key=>$scategory)
                            <li class="@if(request()->input('category') == $scategory->id) active @endif">
                                <a href="{{route('front.portfolios', ['category'=>$scategory->id])}}">
                                    {{ $scategory->title }}
                                </a>      
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @if (count($portfolios) == 0)
                    <div class="col-lg-12 py-5 bg-light text-center mb-4">
                        <h3 class="mb-0">{{__('NO PORTFOLIO FOUND')}}</h3>
                    </div>
                    @else
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
                    @endif
                </div>
                @if ($portfolios->total() > 9)
                <div class="row">
                    <div class="col-md-12">
                        <nav class="pagination-nav {{$portfolios->total() > 9 ? 'mb-4' : ''}}">
                        {{ $portfolios->appends(['category' => request()->input('category')])->links() }}
                        </nav>
                    </div>
                </div>
                @endif
            </div>
        </div>
@endsection