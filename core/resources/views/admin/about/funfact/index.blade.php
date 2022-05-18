@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Fun Facts') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Fun Facts') }}</li>
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
                    <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Fun Facts List') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.funfact_add') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add Client') }}
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body no-padding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Value') }}</th>
                        <th>{{ __('Action') }}</th>
                        </tr>
                        @foreach ($funfacts as $id=>$funfact)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>{{ $funfact->name }}</td>
                            <td>{{ $funfact->value }}</td>
                            <td>
                                <a href="{{ route('admin.funfact_edit', $funfact->id )  }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                <a href="{{ route('admin.funfact_delete', $funfact->id )  }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody></table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
