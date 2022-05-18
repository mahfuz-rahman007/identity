@extends('admin.layouts')

@section('content')
       <!-- Content Header (Page header) -->

   <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ __('Welcome back,') }} {{ $adminProfile->first_name }} {{ $adminProfile->last_name }}!</h1>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
      <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Services') }}</span>
                  <h4 class="info-box-number font-weight-normal">{{ $services_count->count() }}</h4>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Projects') }}</span>
                  <h4 class="info-box-number font-weight-normal">{{ $portfolios->count() }}</h4>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Clients') }}</span>
                  <h4 class="info-box-number font-weight-normal">{{ $clients->count() }}</h4>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">{{ __('Blogs') }}</span>
                  <h4 class="info-box-number font-weight-normal">{{ $blogs_count->count() }}</h4>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

        </div>
           <!-- Main row -->
      <div class="row">
        <section class="col-lg-5">
          <div class="card card-success card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  {{ __('About Me') }}
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.about_me') }}" class="btn btn-tool btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/front/img/'.$abouts->avatar) }}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><b>{{ $abouts->name }}</b></h3>

              <p class="text-muted text-center">{{ $abouts->position_type }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>{{ __('Age :') }}</b> <a class="float-right">{{ $abouts->age }}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ __('Residence :') }}</b> <a class="float-right">{{ $abouts->residence }}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ __('E-mail :') }}</b> <a class="float-right">{{ $abouts->mail }}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ __('Phone :') }}</b> <a class="float-right">{{ $abouts->phone }}</a>
                </li>
              </ul>
              <a href="#" class="btn btn-success btn-block">{{ __('My Resume') }}</a>
            </div>
            <!-- /.card-body -->
          </div>
        </section>
        <section class="col-lg-7">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h3 class="card-title">
               {{ __('Latest Services') }}
              </h3>
              <div class="card-tools">
                  <a href="{{ route('admin.service') }}" class="btn btn-tool btn-sm">
                      <i class="fas fa-edit"></i>
                  </a>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $id=>$service)
                    <tr>
                        <td>{{ ++$id }}</td>
                        <td>
                            <img class="w-50" src="{{ asset('assets/front/img/'.$service->image) }}" alt="">
                        </td>
                        <td>{{ $service->title }}</td>
                        <td width="45%">{{ $service->description}}</td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
        </section>
      </div>
      </div>
  </div>
@endsection