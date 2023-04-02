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
        <div class="card shadow-none my-3">
          <div class="card-body">
            <div class="title">
              <h1 class="h3 text-gray-800">Profile Peserta</h1>
            </div>
            <div class="row">
              <div class="col-5">
                <div class="images bg-white d-flex align-items-center justify-content-center">
                  <img src="{{ asset('storage/'. $peserta->photo) }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-7">
                <ul class="list-unstyled">
                  <li>
                    <div class="row border-bottom py-3">
                      <div class="col-5">
                        <div class="label">
                          <h6 class="mb-0">Nama Peserta</h6>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="content">
                          <p class="mb-0">{{ $peserta->nama }}</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row border-bottom py-3">
                      <div class="col-5">
                        <div class="label">
                          <h6 class="mb-0">Asal Tim</h6>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="content">
                          <p class="mb-0">{{ $peserta->asal_tim }}</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row border-bottom py-3">
                      <div class="col-5">
                        <div class="label">
                          <h6 class="mb-0">Kategori Usia</h6>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="content">
                          <p class="mb-0">{{ $peserta->kategori_usia }}</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row border-bottom py-3">
                      <div class="col-5">
                        <div class="label">
                          <h6 class="mb-0">Nomor Punggung</h6>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="content">
                          <p class="mb-0">{{ $peserta->no_punggung }}</p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row border-bottom py-3">
                      <div class="col-5">
                        <div class="label">
                          <h6 class="mb-0">Posisi</h6>
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="content">
                          <p class="mb-0">{{ $peserta->posisi }}</p>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @if (Auth::user()->role == 'admin')
          <div class="card shadow-none my-3">
            <div class="card-body">
              <div class="title">
                <h1 class="h3 text-gray-800">Dokumen Peserta</h1>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="images bg-white d-flex align-items-center justify-content-center border">
                    <img src="{{ asset('storage/'. $peserta->foto_kk) }}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-4">
                  <div class="images bg-white d-flex align-items-center justify-content-center border">
                    <img src="{{ asset('storage/'. $peserta->foto_akte) }}" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-4">
                  <div class="images bg-white d-flex align-items-center justify-content-center border">
                    <img src="{{ asset('storage/'. $peserta->foto_ijazah) }}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
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