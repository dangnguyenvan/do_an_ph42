<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', ' Dashboard')</title>

  @include('dashboards.layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/dashboard_template/dist/img/AdminLTELogo.png" alt="" height="60" width="60">
  </div>

  @include('dashboards.layouts.navbar')

  @include('dashboards.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('dashboards.layouts.container_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('dashboards.layouts.footer')
</div>
<!-- ./wrapper -->

@include('dashboards.layouts.js')
</body>
</html>
