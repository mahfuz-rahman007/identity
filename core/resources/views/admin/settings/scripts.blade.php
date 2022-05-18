@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Scripts') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Scripts') }}</li>
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
                        <h3 class="card-title">{{ __('Update Scripts') }} </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.setting.updateScripts') }}" method="POST">
                            @csrf

                            <div class="form-group row mt-5">
                                <label class="col-sm-2 control-label">{{ __('Disqus Status') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                        <input type="checkbox" {{ $setting->is_disqus == '1' ? 'checked' : '' }} data-size="large" name="is_disqus" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                        @if ($errors->has('is_disqus'))
                                        <p class="text-danger"> {{ $errors->first('is_disqus') }} </p>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Disqus Shortname') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="disqus_username" value="{{$setting->disqus_username}}" placeholder="{{ __('Disqus Shortname') }}">
                                    @if ($errors->has('disqus_username'))
                                    <p class="text-danger"> {{ $errors->first('disqus_username') }} </p>
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
