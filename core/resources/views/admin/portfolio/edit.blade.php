@extends('admin.layouts')

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Portfolios') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Portfolios') }}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Portfolio') }}</h3>
                        <div class="card-tools">
                        <a href="{{ route('admin.portfolio') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                        </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="featured_image" class="col-sm-2 control-label">{{ __('Featured Image') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <img class="mb-3  show-img img-demo" src="{{ asset('assets/front/img/'.$portfolio->featured_image) }}" alt="">
                                    <div class="custom-file">
                                        <label for="featured_image" class="custom-file-label">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="featured_image" id="featured_image">
                                    </div>
                                    @if ($errors->has('featured_image'))
                                        <p class="text-danger"> {{ $errors->first('featured_image') }} </p>
                                    @endif
                                    <p class="help-block text-info">{{ __('Upload 710X360 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $portfolio->title }}">
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client_name" class="col-sm-2 control-label">{{ __('Client Name') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="client_name" placeholder="{{ __('Client Name') }}" value="{{ $portfolio->client_name }}">
                                    @if ($errors->has('client_name'))
                                        <p class="text-danger"> {{ $errors->first('client_name') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="service_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="service_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ $category->title == $portfolio_category->title ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('service_id'))
                                        <p class="text-danger"> {{ $errors->first('service_id') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-2 control-label">{{ __('Start Date') }}<span class="text-danger">*</span></label>

                                <div class="input-group col-sm-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="{{ __('Start Date') }}" value="{{ $portfolio->start_date }}">
                                   <br>
                                    @if ($errors->has('start_date'))
                                        <p class="text-danger"> {{ $errors->first('start_date') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="submission_date" class="col-sm-2 control-label">{{ __('Submission Date') }}<span class="text-danger">*</span></label>

                                    <div class="input-group col-sm-10">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="submission_date" id="submission_date" placeholder="{{ __('Submission Date') }}" value="{{ $portfolio->submission_date }}">
                                        <br>
                                        @if ($errors->has('submission_date'))
                                            <p class="text-danger"> {{ $errors->first('submission_date') }} </p>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="status">
                                       <option value="" selected disabled>{{ __('Select a Status') }}</option>
                                       <option value="0" {{ $portfolio->status == 0 ? 'selected' : '' }} >{{ __('In Progress') }}</option>
                                       <option value="1"  {{ $portfolio->status == 1 ? 'selected' : '' }}>{{ __('Completed') }}</option>
                                      </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control textarea" rows="4" placeholder="{{ __('Content') }}">{{ $portfolio->content }}</textarea>
                                    @if ($errors->has('content'))
                                        <p class="text-danger"> {{ $errors->first('content') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">{{ __('Updated') }}</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection

@section('scripts')
    <script>
        $(function () {

            // Start Date
            $('#start_date').datetimepicker({ 
                format: 'L'
             }); 

            // Submission Date
            $('#submission_date').datetimepicker({ 
                format: 'L'
            }); 

            //Bs Cistom Input
            bsCustomFileInput.init();

            // Summernote
            //$('.textarea').summernote()
        })
    </script>

@endsection