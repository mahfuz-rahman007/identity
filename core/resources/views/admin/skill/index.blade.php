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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title mt-1">{{ __('Skills List') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.skill.add') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add Service') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body no-padding">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Level') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($skills as $id=>$skill)
                            <tr>
                                <td>{{ ++$id }}</td>
                                <td>
                                    {{ $skill->name }}
                                </td>
                                <td class="vmidle" width="30%">
                                            {{ $skill->level }}%
                                </td>
                                <td>
                                    {{ $skill->scategory->name }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.skill.edit', $skill->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.skill.delete', $skill->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $skills->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
