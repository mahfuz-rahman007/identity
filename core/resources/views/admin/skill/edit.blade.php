@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Skills') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Skills') }}</li>
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
                                <h3 class="card-title mt-1">{{ __('Edit Skill') }}</h3>
                                <div class="card-tools">
                                <a href="{{ route('admin.skill') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.skill.update', $skill->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="scategory_id" class="col-sm-2 control-label">{{ __('Skill Category') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="scategory_id">
                                                <option value="" disabled selected>{{ __('Select Category') }}</option>
                                                @foreach ($scategories as $scategory)
                                                    <option value="{{ $scategory->id }}" 
                                                        {{ $scategory->id == $skill->scategory_id ? 'selected' : '' }}
                                                        >{{ $scategory->name }}</option>
                                                @endforeach
                                                </select>
                                            @if ($errors->has('scategory_id'))
                                                <p class="text-danger"> {{ $errors->first('scategory_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">{{ __('Name') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="{{ __('Name') }}" value="{{ $skill->name }}">
                                            @if ($errors->has('name'))
                                                <p class="text-danger"> {{ $errors->first('name') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">{{ __('Level') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="level" placeholder="{{ __('Level') }}" value="{{ $skill->level }}">
                                            @if ($errors->has('level'))
                                                <p class="text-danger"> {{ $errors->first('level') }} </p>
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
