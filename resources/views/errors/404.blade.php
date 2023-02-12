@extends('layout/master')
@section('title', '404 : Page Not Found')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">
      <!-- 404 Error Text -->
      <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">The page you are looking for are not available</p>
        <a href="/">&larr; Back to Dashboard</a>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->
</div>
@endsection