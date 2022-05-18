@extends('admin.layouts')

@section('content')

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Experinces') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                <li class="breadcrumb-item">{{ __('Experinces') }}</li>
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
                        <h3 class="card-title mt-1">{{ __('Add Experince') }}</h3>
                        <div class="card-tools">
                        <a href="{{ route('admin.experince') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                        </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.experince.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="company" class="col-sm-2 control-label">{{ __('Company') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="company" placeholder="{{ __('Company') }}" value="{{ old('company') }}">
                                    @if ($errors->has('company'))
                                        <p class="text-danger"> {{ $errors->first('company') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="field" class="col-sm-2 control-label">{{ __('Field') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="field" placeholder="{{ __('Field') }}" value="{{ old('field') }}">
                                    @if ($errors->has('field'))
                                        <p class="text-danger"> {{ $errors->first('field') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 control-label">{{ __('Description') }}<span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" rows="3" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-danger"> {{ $errors->first('description') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="from_date">{{ __('From Year') }}<span class="text-danger">*</span></label>
                                <div class="input-group col-sm-10">
                                        <input type="text" class="form-control" name="from_date" id="from_date" placeholder="{{ __('From Year') }}" value="{{ old('from_date') }}">
                                        @if ($errors->has('from_date'))
                                            <p class="text-danger"> {{ $errors->first('from_date') }} </p>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row" id="date_to_grup">
                                <label class="col-sm-2 control-label" for="date_to">{{ __('Year To') }}<span class="text-danger">*</span></label>
                                <div class="input-group col-sm-10">
                                    <input type="text" class="form-control" name="date_to" id="date_to" placeholder="{{ __('Year To') }}" value="{{ old('date_to') }}">
                                    @if ($errors->has('date_to'))
                                        <p class="text-danger"> {{ $errors->first('date_to') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="icheck-success d-inline date_to_grup_target">
                                        <input type="checkbox" id="date_check" value="1" name="current">
                                        <label for="date_check">
                                            {{ __('I Currently Study ') }}
                                        </label>
                                    </div>
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

