<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name','Blank') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('admin.styles')
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">

  @include('admin.navbar')

  @include('admin.sidebar')

  @section('contentpage') <!-- In this section is the dashboard and more-->
  @show 
     
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
   <!-- /.control-sidebar -->

   @include('admin.footer')

</div>
<!-- ./wrapper -->


@include('admin.scripts')
</body>
</html>
