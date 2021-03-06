@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Testimonials') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Testimonials') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Add Testimonial') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.testimonial') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                  </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <p class="text-danger"> {{ $errors->first('name') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-sm-2 control-label">{{ __('Position') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="position" placeholder="{{ __('Position') }}" value="{{ old('position') }}">
                                            @if ($errors->has('position'))
                                                <p class="text-danger"> {{ $errors->first('position') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="freelance" class="col-sm-2 control-label"> {{ __('Rating') }}<span class="text-danger">*</span> </label>
                                        <div class="col-sm-10">
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="onestar" name="rating" value="1">
                                                    <label for="onestar">{{ __('1 Star') }}</label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="twostar" name="rating"  value="2">
                                                    <label for="twostar">{{ __('2 Star') }}</label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="threestar" name="rating"  value="3">
                                                    <label for="threestar">{{ __('3 Star') }}</label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="fourstar" name="rating"  value="4">
                                                    <label for="fourstar">{{ __('4 Star') }}</label>
                                                </div>
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="fivestar" name="rating"  value="5">
                                                    <label for="fivestar">{{ __('5 Star') }}</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="message" class="col-sm-2 control-label">{{ __('Message') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message" placeholder="{{ __('Message') }}" " rows="5">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <p class="text-danger"> {{ $errors->first('message') }} </p>
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
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
