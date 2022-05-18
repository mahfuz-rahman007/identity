@extends('admin.layouts')

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Services') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Services') }}</li>
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
                            <div class="card-header  with-border">
                                <h3 class="card-title mt-1">{{ __('Edit Service') }}</h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.service') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="w-100 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$service->image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality.<br>
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="w-100 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$service->service_image) }}" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="service_image">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="service_image" id="service_image">
                                            </div>
                                            <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality.<br>
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                            @if ($errors->has('service_image'))
                                                <p class="text-danger"> {{ $errors->first('service_image') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ $service->title }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Short Description') }}<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control" placeholder="{{ __('Short Description') }}" rows="3">{{ $service->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <p class="text-danger"> {{ $errors->first('description') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                                </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
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
