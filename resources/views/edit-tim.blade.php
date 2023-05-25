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
          <h1 class="h3 mb-0 text-gray-800">Edit Tim</h1>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Tim</h6>
              </div>
              @if (session('Error'))
                <div class="alert alert-danger mt-3" role="alert">
                  {{ session('Error') }}
                </div>
              @endif
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="logoTim" class="form-label">Logo Tim</label>
                    <input class="form-control @error('logoTim') is-invalid @enderror form-control-sm" id="logoTim" type="file" name="logoTim" onchange="readURLPhoto(this);">
                    @error('logoTim')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="images mt-3">
                      <p class="mb-0">Preview</p>
                      <img src="{{ asset('storage/'.$tim->logo_tim) }}" alt="" class="img-preview img-fluid" width="75" id="logoPreview">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Tim</label>
                    <input class="form-control @error('nama_tim') is-invalid @enderror form-control-sm" id="name" name="nama_tim" type="text" value="{{ $tim->nama_tim }}">
                    @error('nama_tim')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelatih / Coach</label>
                    <input class="form-control @error('nama_pelatih') is-invalid @enderror form-control-sm" id="name" name="nama_pelatih" type="text" value="{{ $tim->nama_pelatih }}">
                    @error('nama_pelatih')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Kategori Usia</label>
                    <input class="form-control @error('kategori_usia') is-invalid @enderror form-control-sm" id="name" name="kategori_usia" type="text" value="{{ $tim->kategori_usia }}">
                    @error('kategori_usia')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
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
@endsection

@push('script')
  <script>
    function readURLPhoto(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#logoPreview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    function readURLKK(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#KKPreview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    function readURLAkte(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#aktePreview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    function readURLIjazah(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#ijazahPreview').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endpush