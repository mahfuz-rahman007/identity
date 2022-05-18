@extends('admin.layouts')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Portfolios ') }}</h1>
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

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- card-header --}}
                    <div class="card-header with-border">
                        <h1 class="card-title mt-1">{{ __('Add Portfolios') }}</h1>
                        <div class="card-tools">
                            <a href="{{ route('admin.portfolio') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-angle-double-left"></i>{{ __('Back') }}
                            </a>
                        </div>
                    </div>
                    {{-- Card body --}}
                    <div class="card-body no-padding">
                       <form action="{{ route('admin.portfolio.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                              <label for="" class="col-sm-2 control-label">
                                  {{ __('Feature Image') }} <span class="text-danger">*</span>
                              </label>
                              <div class="col-sm-10">
                                  <img src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" class="mw-400 mb-3 show-img img-demo">
                                  <div class="custom-file">
                                    <label class="custom-file-label" for="featured_image">{{ __('Choose Image') }}</label>
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
                          {{-- Title --}}
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>
                            </div>
                            {{-- Client Name --}}
                            <div class="form-group row">
                                <label for="client_name" class="col-sm-2 control-label">{{ __('Client Name') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="client_name" placeholder="Client Name" value="{{ old('client_name') }}">
                                    @if ($errors->has('client_name'))
                                        <p class="text-danger"> {{ $errors->first('client_name') }} </p>
                                    @endif
                                </div>
                            </div>
                            {{-- Category --}}
                            <div class="form-group row">
                                <label for="service_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="service_id">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                      </select>
                                    @if ($errors->has('service_id'))
                                        <p class="text-danger"> {{ $errors->first('service_id') }} </p>
                                    @endif
                                </div>
                            </div>
                            {{-- start date --}}
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-2 control-label">{{ __('Start Date') }}<span class="text-danger">*</span></label>

                                <div class="input-group col-sm-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="start_date" id="start_date" placeholder="{{ __('Start Date') }}" value="{{ old('start_date') }}">
                                    @if ($errors->has('start_date'))
                                        <p class="text-danger"> {{ $errors->first('start_date') }} </p>
                                    @endif
                                </div>
                            </div>
                            {{-- submission date --}}
                            <div class="form-group row">
                                <label for="submission_date" class="col-sm-2 control-label">{{ __('Submission Date') }}<span class="text-danger">*</span></label>

                                    <div class="input-group col-sm-10">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="submission_date" id="submission_date" placeholder="{{ __('Submission Date') }}" value="{{ old('submission_date') }}">
                                        @if ($errors->has('submission_date'))
                                            <p class="text-danger"> {{ $errors->first('submission_date') }} </p>
                                        @endif
                                    </div>
                            </div>
                            {{-- status --}}
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="status">
                                       <option value="0">{{ __('In Progress') }}</option>
                                       <option value="1" selected>{{ __('Completed') }}</option>
                                      </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
                                    @endif
                                </div>
                            </div>
                            {{-- content --}}
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control textarea"  rows="4" placeholder="{{ __('Description') }}">{{ old('content') }}</textarea>
                                    @if ($errors->has('content'))
                                        <p class="text-danger"> {{ $errors->first('content') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection