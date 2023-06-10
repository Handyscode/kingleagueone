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
          <h1 class="h3 mb-0 text-gray-800">Detail Pertandingan</h1>
        </div>
        @if (session('Success'))
          <div class="alert alert-success mt-3" role="alert">
            {{ session('Success') }}
          </div>
        @endif
        <div class="row">
          <div class="col-12 mb-4">
            <div class="card shadow h-100 py-2">
              <div class="card-body">
                <div class="top">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="home-team">
                      <div class="logo">
                        <img src="{{ asset('storage/'.$pertandingan->timHome[0]->logo_tim) }}" alt="" class="img-preview" width="75" height="75">
                        <h5 class="mb-0 fw-bold mt-3">{{ $pertandingan->timHome[0]->nama_tim }}</h5>
                      </div>
                    </div>
                    <div class="tgl_tanding text-center">
                      <p class="fw-bold mb-0">{{ date('d M Y h:i', strtotime($pertandingan->tgl_pertandingan)) }}</p>
                      <div class="score d-flex align-items-center justify-content-center">
                        <h1 class="mb-0 fw-bold" style="font-size: 56px;">{{ $pertandingan->livescore->score_home }}</h1>
                        <h3 class="mb-0 mx-3">-</h3>
                        <h1 class="mb-0 fw-bold" style="font-size: 56px;">{{ $pertandingan->livescore->score_away }}</h1>
                      </div>
                    </div>
                    <div class="away-team h-100">
                      <div class="logo">
                        <img src="{{ asset('storage/'.$pertandingan->timAway[0]->logo_tim) }}" alt="" class="img-preview" width="75" height="75">
                        <h5 class="mb-0 fw-bold mt-3">{{ $pertandingan->timAway[0]->nama_tim }}</h5>
                      </div>
                    </div>
                  </div>
                  <div class="detail-pemain d-flex align-items-start justify-content-between">
                    <div class="tim-home">
                      @foreach ($pesertaHome as $pes)
                        <div class="d-flex align-items-center py-3">
                          <div class="foto">
                            <img src="{{ asset('photo/'. $pes->photo) }}" class="img-fluid" width="50" height="50">
                          </div>
                          <div class="detail ms-3">
                            <div class="nama">
                              <h5 class="mb-0 fw-bold">{{ $pes->nama.' ('. $pes->no_punggung . ')' }}</h5>
                              <div class="posisi">{{ $pes->posisi->nama_posisi.' ('.$pes->posisi->kode_posisi.')' }}</div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <div class="tim-away">
                      @foreach ($pesertaAway as $pes)
                        <div class="d-flex align-items-center justify-content-end py-3">
                          <div class="detail me-3">
                            <div class="nama text-right">
                              <h5 class="mb-0 fw-bold">{{ $pes->nama.' ('. $pes->no_punggung . ')' }}</h5>
                              <div class="posisi">{{ $pes->posisi->nama_posisi.' ('.$pes->posisi->kode_posisi.')' }}</div>
                            </div>
                          </div>
                          <div class="foto">
                            <img src="{{ asset('photo/'. $pes->photo) }}" class="img-fluid" width="50" height="50">
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
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
    
@endpush