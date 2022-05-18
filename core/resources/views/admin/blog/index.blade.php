@extends('admin.layouts')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Blogs') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Blogs') }}</li>
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
                    <h3 class="card-title">{{ __('Blog List:') }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blog.add') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> {{ __('Add Blog') }}
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="bloglist" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($blogs as $id=>$blog)
                            <tr>
                                <td>{{ ++$id }}</td>
                                <td>
                                    <img class="w-80" src="{{ asset('assets/front/img/'.$blog->main_image) }}" alt="">
                                </td>
                                <td>
                                    {{ $blog->title }}
                                </td> 
                                <td>
                                    {{ $blog->bcategory->name }}
                                </td> 
                                <td>
                                        @if($blog->status == 1)
                                            <span class="badge badge-success">{{ __('Publish') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                        @endif
                                        
                                    </td>
                                <td>
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.blog.delete', $blog->id ) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                     <!-- /.card-body -->
                     @if ($count > 10)
                     <div class="card-footer clearfix">
                         {{ $blogs->links() }}
                     </div>
                     @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection

