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
                <form action="" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control form-control-sm" id="photo" type="file" name="photo">
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input class="form-control form-control-sm" id="name" name="nama_peserta" type="text">
                  </div>
                  <div class="mb-3">
                    <label for="asal_tim" class="form-label">Asal Tim</label>
                    <input class="form-control form-control-sm" id="asal_tim" name="asal_tim" type="text">
                  </div>
                  <div class="mb-3">
                    <label for="kategori_usia" class="form-label">Kategori Usia</label>
                    <input class="form-control form-control-sm" id="kategori_usia" name="kategori_usia" type="text">
                  </div>
                  <div class="mb-3">
                    <label for="no_punggung" class="form-label">No Punggung</label>
                    <input class="form-control form-control-sm" id="no_punggung" name="no_punggung" type="text">
                  </div>
                  <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input class="form-control form-control-sm" id="posisi" name="posisi" type="text">
                  </div>
                  <div class="mb-3">
                    <label for="foto_kk" class="form-label">Foto KK</label>
                    <input class="form-control form-control-sm" id="foto_kk" name="foto_kk" type="file">
                  </div>
                  <div class="mb-3">
                    <label for="foto_akte" class="form-label">Foto Akte</label>
                    <input class="form-control form-control-sm" id="foto_akte" name="foto_akte" type="file">
                  </div>
                  <div class="mb-3">
                    <label for="foto_ijazah" class="form-label">Foto Ijazah</label>
                    <input class="form-control form-control-sm" id="foto_ijazah" name="foto_ijazah" type="file">
                  </div>
                  <div class="actionBtn d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-danger px-4">
                      Upload
                    </button>
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