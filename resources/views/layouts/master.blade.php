<!DOCTYPE html>
<html>
<head>
  @include('layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.main-headerbar')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.main-sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  @include('layouts.aside')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
@include('layouts.footer-scripts')
</body>
</html>
