@extends('layout/master')
@section('title', 'Kingleagueone - Dashboard')
@push('css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
          <h1 class="h3 mb-0 text-gray-800">Jadwal Pertandingan</h1>
          <div class="editBtn">
            <a href="/jadwal-pertandingan/tambah-pertandingan" class="btn btn-success text-white"><i class="fa-solid fa-plus"></i> Tambah Pertandingan</a>
          </div>
        </div>
        @if (session('Success'))
          <div class="alert alert-success mt-3" role="alert">
            {{ session('Success') }}
          </div>
        @endif
        @if ($jadwalPertandingan->isEmpty())
          <h4>Belum Ada Jadwal</h4>
        @else
          <div class="row">
            @foreach ($jadwalPertandingan as $jadwal)
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="top">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="home-team">
                          <div class="logo">
                            <img src="{{ asset('storage/'.$jadwal->timHome[0]->logo_tim) }}" alt="" class="img-preview" width="75" height="75">
                            <p class="mb-0 fw-bold mt-3">{{ $jadwal->timHome[0]->nama_tim }}</p>
                          </div>
                        </div>
                        <div class="tgl_tanding text-center">
                          <p class="fw-bold mb-0">{{ date('d M Y', strtotime($jadwal->tgl_pertandingan)) }}</p>
                          <p class="fw-bold mb-0">{{ date('h:i', strtotime($jadwal->tgl_pertandingan)) }}</p>
                        </div>
                        <div class="away-team h-100">
                          <div class="logo">
                            <img src="{{ asset('storage/'.$jadwal->timAway[0]->logo_tim) }}" alt="" class="img-preview" width="75" height="75">
                            <p class="mb-0 fw-bold mt-3">{{ $jadwal->timAway[0]->nama_tim }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="actionBtn w-100 mt-3">
                        <a href="" class="btn btn-primary text-white w-100"><i class="fa-solid fa-eye me-2"></i> Lihat Detail</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
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
    
@endpush