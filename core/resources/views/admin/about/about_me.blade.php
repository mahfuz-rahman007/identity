@extends('admin.layouts')

@section('content')
    
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    {{ __('About') }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i class="fas fa-home"> {{ __('Home') }} </i> </a></li>
                    <li class="breadcrumb-item">  {{ __('About') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <div class="card  card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Update About Information') }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.update_about_me') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label">{{ __('Profile Image') }} <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/front/img/'.$about->avatar) }}" alt="">
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="avatar">{{ __('Choose New Image') }}</label>
                                                        <input type="file" class="custom-file-input up-img" name="avatar" id="avatar">
                                                    </div>
                                                    <p class="help-block text-info">{{ __('Upload 180X180 (Pixel) Size image for best quality.
                                                        Only jpg, jpeg, png image is allowed.') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label">{{ __('Big Profile Image') }}  <span class="text-danger">*</span></label>
                                                <div class="col-sm-10">
                                                    <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/front/img/'.$about->profile_image) }}" alt="">
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="profile_image">{{ __('Choose New Image') }}</label>
                                                        <input type="file" class="custom-file-input up-img" name="profile_image" id="profile_image">
                                                    </div>
                                                    <p class="help-block text-info">{{ __('Upload 445X480 (Pixel) Size image for best quality.
                                                        Only jpg, jpeg, png image is allowed.') }}
                                                    </p>
                                                </div>
                
                                            </div>
                
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 control-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" value="{{ $about->name }}">
                                                    @if ($errors->has('name'))
                                                        <p class="text-danger"> {{ $errors->first('name') }} </p>
                                                    @endif
                                                </div>
                                            </div>
                 
                                            <div class="form-group row">
                                                <label for="age" class="col-sm-2 control-label"> {{ __('Age') }} <span class="text-danger">*</span>  </label>
                
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="age" value="{{ $about->age }}">
                                                    @if ($errors->has('age'))
                                                        <p class="text-danger"> {{ $errors->first('age') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="residence" class="col-sm-2 control-label"> {{ __('Residence') }} <span class="text-danger">*</span>  </label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="residence" value="{{ $about->residence }}">
                                                    @if ($errors->has('residence'))
                                                        <p class="text-danger"> {{ $errors->first('residence') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="position_type" class="col-sm-2 control-label"> {{ __('Position Type') }} <span class="text-danger">*</span>  </label>
                
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="position_type" value="{{ $about->position_type }}">
                                                        @if ($errors->has('position_type'))
                                                            <p class="text-danger"> {{ $errors->first('position_type') }} </p>
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="about_title" class="col-sm-2 control-label"> {{ __('About Title') }} <span class="text-danger">*</span> </label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="about_title" value="{{ $about->about_title }}">
                                                    @if ($errors->has('about_title'))
                                                        <p class="text-danger"> {{ $errors->first('about_title') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="about_text" class="col-sm-2 control-label"> {{ __('About Text') }} <span class="text-danger">*</span>  </label>
                
                                                <div class="col-sm-10">
                                                        <textarea class="form-control" name="about_text" rows="4">{{ $about->about_text }}</textarea>
                                                        @if ($errors->has('about_text'))
                                                            <p class="text-danger"> {{ $errors->first('about_text') }} </p>
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="resume" class="col-sm-2 control-label"> {{ __('Resume') }} <span class="text-danger">*</span>  </label>
                
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <label class="custom-file-label" for="resume">{{ __('Choose a PDF file...') }}</label>
                                                        <input type="file" class="custom-file-input" name="resume" id="resume">
                                                    </div>
                                                    <p class="help-block text-info">{{ __('Required Formate PDF *') }}
                                                    </p>
                                                    @if ($errors->has('resume'))
                                                        <p class="text-danger"> {{ $errors->first('resume') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="freelance" class="col-sm-2 control-label"> {{ __('Freelance') }} <span class="text-danger">*</span>  </label>
                                                <div class="col-sm-10">

                                                        <div class="icheck-success d-inline mr-2">
                                                                <input type="radio" id="available" name="freelance"  {{  $about->freelance == 'Available' ? 'checked' : ' ' }}  value="Available">
                                                                <label for="available">{{ __('Available') }}</label>
                                                        </div>

                                                        <div class="icheck-success d-inline">
                                                            <input type="radio" id="unavailable" name="freelance"  {{  $about->freelance == 'Unavailable' ? 'checked' : ' ' }} value="Unavailable">
                                                            <label for="unavailable">{{ __('Unavailable') }}</label>
                                                        </div>

                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                                                </div>
                                            </div>
                
                                        </form>
                                
                            </div>
                            <!-- /.box-body -->
                        </div>
            
                    </div>
                    <!-- /.col -->
                </div>
    </div>
  

</section>

@endsection