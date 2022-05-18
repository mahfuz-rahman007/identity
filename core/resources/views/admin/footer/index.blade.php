@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Footer') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Footer') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Footer Information') }} </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.footer.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
   
                            <div class="form-group row">
                                <label for="footer_logo" class="col-sm-2 control-label">{{ __('Site Footer Logo') }} <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" src="{{ asset('assets/front/img/'.$setting->footer_logo) }}" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="footer_logo">{{ __('Choose New Image') }}</label>
                                        <input type="file" class="custom-file-input up-img" name="footer_logo" id="footer_logo">
                                    </div>
                                    <p class="help-block text-info">{{ __('Upload 150X40 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Copyright Text') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control textarea" name="copyright_text" placeholder="{{ __('Copyright Text') }}">{{ $setting->copyright_text }}</textarea>
                                    @if ($errors->has('copyright_text'))
                                    <p class="text-danger"> {{ $errors->first('copyright_text') }} </p>
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
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>


</section>

@endsection

