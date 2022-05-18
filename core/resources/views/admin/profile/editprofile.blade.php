@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Admin Profile') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Admin Profile') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <div class="card-title">{{ __('Update Admin Profile') }}</div>
                    </div>

                    {{-- box header --}}

                    <div class="card-body">
                        <form action="{{ route('admin.updateProfile') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="w-100 mb-3 img-demo show-img" src="{{ asset('assets/front/img/'.$adminProfile->image) }}" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input  up-img" name="image" id="image">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 70X70 (Pixel) Size image for best quality. 
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-2 control-label">{{ __('First Name') }} <span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="first_name" value="{{ $adminProfile->first_name }}" placeholder="{{ __('First Name') }}">
                                    @if ($errors->has('first_name'))
                                    <p class="text-danger"> {{ $errors->first('first_name') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-sm-2 control-label">{{ __('Last Name ') }}<span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="last_name" value="{{ $adminProfile->last_name }}" placeholder="{{ __('Last Name ') }}">
                                    @if ($errors->has('last_name'))
                                    <p class="text-danger"> {{ $errors->first('last_name') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 control-label">{{ __('Username') }}<span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="{{ $adminProfile->username }}" placeholder="{{ __('Username') }}">
                                    @if ($errors->has('username'))
                                    <p class="text-danger"> {{ $errors->first('username') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 control-label">{{ __('Email') }}<span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{ $adminProfile->email }}" placeholder="{{ __('Email') }}">
                                    @if ($errors->has('email'))
                                    <p class="text-danger"> {{ $errors->first('email') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-sm-2 control-label">{{ __('Position') }}<span
                                    class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="position" value="{{ $adminProfile->position }}" placeholder="{{ __('Position') }}">
                                    @if ($errors->has('username'))
                                    <p class="text-danger"> {{ $errors->first('position') }} </p>
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
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection