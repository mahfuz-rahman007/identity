@extends('admin.layouts')

@section('content')

<section class="content-header">
    <h1>
       {{ __('About') }}
    </h1>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header  with-border">
                                <h3 class="card-title mt-1">{{ __('Edit Fact') }}</h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.funfact') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.funfact_update', $funfact->id) }}" method="POST">
                                        @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" placeholder="{{ __('Enter Fact Name') }}" value="{{ $funfact->name }}">
                                                </div>
                                            </div>
                
                                            <div class="form-group row">
                                                <label for="value" class="col-sm-2 control-label">{{ __('Value') }}<span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="value" placeholder="{{ __('Enter Fact Value') }}" value="{{ $funfact->value }}">
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
