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
                    <input class="form-control @error('photo') is-invalid @enderror form-control-sm" id="photo" type="file" name="photo" onchange="readURLPhoto(this);">
                    @error('photo')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="images mt-3">
                      <p class="mb-0">Preview</p>
                      <img src="http://placehold.it/75" alt="" class="img-preview img-fluid" width="75" id="photoPreview">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input class="form-control @error('nama_peserta') is-invalid @enderror form-control-sm" id="name" name="nama_peserta" type="text" value="{{ old('nama_peserta') }}">
                    @error('nama_peserta')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="asal_tim" class="form-label">Asal Tim</label>
                    <select name="asal_tim" id="asal_tim" class="form-control @error('asal_tim') is-invalid @enderror form-control-sm">
                      <option value="">--- Pilih Asal Tim Peserta ---</option>
                      @foreach ($tims as $tim)
                        <option value="{{ $tim->id_tim }}">{{ $tim->nama_tim }}</option>
                      @endforeach
                    </select>
                    @error('asal_tim')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="kategori_usia" class="form-label">Kategori Usia</label>
                    <input class="form-control @error('kategori_usia') is-invalid @enderror form-control-sm" id="kategori_usia" name="kategori_usia" type="text" value="{{ old('kategori_usia') }}">
                    @error('kategori_usia')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="no_punggung" class="form-label">No Punggung</label>
                    <input class="form-control @error('no_punggung') is-invalid @enderror form-control-sm" id="no_punggung" name="no_punggung" type="text" value="{{ old('no_punggung') }}">
                    @error('no_punggung')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <select name="posisi" id="posisi" class="form-control @error('posisi') is-invalid @enderror form-control-sm">
                      <option value="">--- Pilih Posisi Peserta ---</option>
                      @foreach ($posisis as $posisi)
                          <option value="{{ $posisi->id_posisi }}">{{ $posisi->nama_posisi . ' ' . '('.$posisi->kode_posisi.')' }}</option>
                      @endforeach
                    </select>
                    @error('posisi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="foto_kk" class="form-label">Foto KK</label>
                    <input class="form-control @error('foto_kk') is-invalid @enderror form-control-sm" id="foto_kk" name="foto_kk" type="file" onchange="readURLKK(this);">
                    @error('foto_kk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="images mt-3">
                      <p class="mb-0">Preview</p>
                      <img src="http://placehold.it/75" alt="" class="img-preview img-fluid" width="75" id="KKPreview">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="foto_akte" class="form-label">Foto Akte</label>
                    <input class="form-control @error('foto_akte') is-invalid @enderror form-control-sm" id="foto_akte" name="foto_akte" type="file" onchange="readURLAkte(this);">
                    @error('foto_akte')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="images mt-3">
                      <p class="mb-0">Preview</p>
                      <img src="http://placehold.it/75" alt="" class="img-preview img-fluid" width="75" id="aktePreview">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="foto_ijazah" class="form-label">Foto Ijazah</label>
                    <input class="form-control @error('foto_ijazah') is-invalid @enderror form-control-sm" id="foto_ijazah" name="foto_ijazah" type="file" onchange="readURLIjazah(this);">
                    @error('foto_ijazah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="images mt-3">
                      <p class="mb-0">Preview</p>
                      <img src="http://placehold.it/75" alt="" class="img-preview img-fluid" width="75" id="ijazahPreview">
                    </div>
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
          $('#photoPreview').attr('src', e.target.result);
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