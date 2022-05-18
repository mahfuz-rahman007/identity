<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  {{-- <link rel="shortcut icon" href="{{  asset('assets/front/img/'.$setting->fav_icon) }}" type="image/png"> --}}

  @include('admin.partials.styles')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">
 
    @include('admin.partials.top-navbar')

    @include('admin.partials.side-navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="show-alert px-3 pt-3">
      @if(Session::has('success'))
          <div class="alert alert-info fade show" role="alert">
              {{ Session::get('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"> &times;</span>
              </button>
          </div>
      @endif
   </div>
   
        @yield('content')

  </div>
  <!-- /.content-wrapper -->

    @include('admin.partials.footer')

</div>
<!-- ./wrapper -->
 
    @include('admin.partials.scripts')

</body>
</html>
