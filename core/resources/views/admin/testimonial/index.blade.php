@extends('admin.layouts')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Testimonials') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Testimonials') }}</li>
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
                    <h3 class="card-title mt-1">{{ __('Testimonials List') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.testimonial.add') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>{{ __(' Add Service') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body no-padding">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                        <th>#</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Message') }}</th>
                        <th>{{ __('Action') }}</th>
                        </tr>
                        @foreach ($testimonials as $id=>$testimonial)
                        <tr>
                            <td>{{ ++$id }}</td>
                            <td>
                                <img class="w-80" src="{{ asset('assets/front/img/'.$testimonial->image) }}" alt="">
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->position}}</td>
                            <td width="40%">{{ $testimonial->message}}</td>
                            <td width="18%">
                                <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                <a href="{{ route('admin.testimonial.delete', $testimonial->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
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
