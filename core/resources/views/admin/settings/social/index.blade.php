@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Social Links') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('Social Links') }}</li>
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
                        <h3 class="card-title">{{ __('Add Social Links') }} </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form id="slink" class="form-horizontal" action="{{ route('admin.storeSlinks') }}" method="POST" onsubmit="store(event)">
                            @csrf
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ __('Social Icon') }} <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <button class="btn btn-secondary biconpicker" data-iconset="fontawesome5" data-icon="fab fa-facebook-f" role="iconpicker"></button>
                                    <input id="inputIcon" type="hidden" name="icon" value="">
                                    @if ($errors->has('icon'))
                                    <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label">{{ __('Social URL') }}<span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" value="" placeholder="{{ __('Social URL') }}">
                                    @if ($errors->has('url'))
                                    <p class="text-danger"> {{ $errors->first('url') }} </p>
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
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Social Links List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>URL</th>
                            <th>Action</th>
                            </tr>
                            @foreach ($slinks as $id=>$slink)
                            <tr>
                                <td>{{ ++$id }}</td>
                                <td>{{ $slink->icon }}</td>
                                <td>{{ $slink->url}}</td>
                                <td>
                                    <a href="{{ route('admin.editSlinks', $slink->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
                                    <a href="{{ route('admin.deleteSlinks', $slink->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>


</section>

@endsection

