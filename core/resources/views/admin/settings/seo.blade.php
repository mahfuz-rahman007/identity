@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('SEO Information') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('SEO Information') }}</li>
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
                        <h3 class="card-title">{{ __('Update SEO Information') }} </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.setting.updateSeoinfo') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="meta_keywords" class="col-sm-2 control-label">{{ __('Meta Keywords') }} </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Enter Meta Keywords') }}" value="{{ $setting->meta_keywords }}">
                                    @if ($errors->has('meta_keywords'))
                                        <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="meta_description" class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $setting->meta_description }}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
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
