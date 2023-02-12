@extends('layout/master')
@section('title', 'Kingleagueone - Dashboard')
@push('css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endpush
@section('content')
<div id="wrapper">
  @include('layout/partials/sidebar')
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @include('layout/partials/headers')
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Registrasi Peserta</h1>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Registrasi Peserta</h6>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="formFileSm" class="form-label">Small file input example</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    @include('layout/partials/footer')
  </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
    
@endpush