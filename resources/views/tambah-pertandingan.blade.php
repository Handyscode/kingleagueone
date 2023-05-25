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
          <h1 class="h3 mb-0 text-gray-800">Tambah Pertandingan</h1>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pertandingan</h6>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Tim Home</label>
                    <select name="tim_home" id="tim_home" class="form-control @error('tim_home') is-invalid @enderror form-control-sm">
                      <option selected disabled>--- PILIH TIM HOME ---</option>
                      @foreach ($tims as $tim)
                        <option value="{{ $tim->id_tim }}">{{ $tim->nama_tim }}</option>
                      @endforeach
                    </select>
                    @error('tim_home')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Tim Away</label>
                    <select name="tim_away" id="tim_away" class="form-control @error('tim_away') is-invalid @enderror form-control-sm">
                      <option selected disabled>--- PILIH TIM AWAY ---</option>
                      @foreach ($tims as $tim)
                        <option value="{{ $tim->id_tim }}">{{ $tim->nama_tim }}</option>
                      @endforeach
                    </select>
                    @error('tim_away')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Tanggal Pertandingan</label>
                    <input type="datetime-local" name="tgl_pertandingan" id="tgl_pertandingan" class="form-control @error('tgl_pertandingan') is-invalid @enderror form-control-sm">
                    @error('tgl_pertandingan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="actionBtn d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-danger px-4">
                      Tambah
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