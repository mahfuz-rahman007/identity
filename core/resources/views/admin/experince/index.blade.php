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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                    <h3 class="card-title mt-1">{{ __('Experinces List') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.experince.add') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add Experince') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body no-padding">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Company') }}</th>
                                    <th>{{ __('Field') }}</th>
                                    <th>{{ __('description') }}</th>
                                    <th>{{ __('Duration') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experinces as $id=>$experince)
                                <tr>
                                    <td>{{ ++$id }}</td>
                                    <td width="10%">{{ $experince->company }}</td>
                                    <td width="14%">{{ $experince->field }}</td>
                                    <td>{{ $experince->description }}</td>
                                    <td width="14%">{{ $experince->from_date }} - {{ empty($experince->date_to) ? 'Present' : $experince->date_to }}
                                    </td>
                                    <td width="18%">
                                        <a href="{{ route('admin.experince.edit', $experince->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                        <a href="{{ route('admin.experince.delete', $experince->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
