@extends('layout/master')
@section('title', 'Kingleagueone - Dashboard')
@push('css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
          <h1 class="h3 mb-0 text-gray-800">List Peserta</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Peserta</h6>
            </div>
            <div class="mx-3">
              @if (session('Success'))
                <div class="alert alert-success mt-3" role="alert">
                  {{ session('Success') }}
                </div>
              @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Nama Peserta</th>
                                <th>Asal Tim</th>
                                <th>Kategori Usia</th>
                                <th>No Punggung</th>
                                <th>Posisi</th>
                                @if (Auth::user()->role == 'admin')
                                  <th>Foto KK</th>
                                  <th>Foto Akte</th>
                                  <th>Foto Ijazah</th>
                                @endif
                                <th>Tanggal Daftar</th>
                                @if (Auth::user()->role == 'admin')
                                  <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Photo</th>
                              <th>Nama Peserta</th>
                              <th>Asal Tim</th>
                              <th>Kategori Usia</th>
                              <th>No Punggung</th>
                              <th>Posisi</th>
                              @if (Auth::user()->role == 'admin')
                                <th>Foto KK</th>
                                <th>Foto Akte</th>
                                <th>Foto Ijazah</th>
                              @endif
                              <th>Tanggal Daftar</th>
                              @if (Auth::user()->role == 'admin')
                                <th>Action</th>
                              @endif
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($pesertas as $p => $peserta)                              
                            <tr>
                              <td>
                                {{ $p+1 }}
                              </td>
                              <td>
                                <img src="{{ asset('storage/'. $peserta->photo) }}" alt="" class="img-preview img-fluid" width="75" id="photoPreview">
                              </td>
                              <td>{{ $peserta->nama }}</td>
                              <td>{{ $peserta->asal_tim }}</td>
                              <td>{{ $peserta->kategori_usia }}</td>
                              <td>{{ $peserta->no_punggung }}</td>
                              <td>{{ $peserta->posisi }}</td>
                              @if (Auth::user()->role == 'admin')
                                <td>
                                  <img src="{{ asset('storage/'.$peserta->foto_kk) }}" alt="" class="img-preview img-fluid" width="75" id="KKPreview">
                                </td>
                                <td>
                                  <img src="{{ asset('storage/'.$peserta->foto_akte) }}" alt="" class="img-preview img-fluid" width="75" id="aktePreview">
                                </td>
                                <td>
                                  <img src="{{ asset('storage/'.$peserta->foto_ijazah) }}" alt="" class="img-preview img-fluid" width="75" id="ijazahPreview">
                                </td>
                              @endif
                              <td>{{ date('d-m-Y', strtotime($peserta->tgl_daftar)); }}</td>
                              @if (Auth::user()->role == 'admin')
                                <td>
                                  <div class="actionBtn d-flex align-items-center justify-content-center">
                                    <div class="editBtn">
                                      <a href="/list-peserta/edit-peserta/{{ $peserta->id_peserta }}" class="btn btn-secondary text-white"><i class="fa-solid fa-pencil"></i></a>
                                    </div>
                                    <div class="deleteBtn ml-3">
                                      <form action="/list-peserta/delete-peserta/{{ $peserta->id_peserta }}" method="post" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="id_peserta">
                                        <a href="#" class="btn btn-danger text-white" onclick="deleteBtn()"><i class="fa-solid fa-trash"></i></a>
                                      </form>
                                    </div>
                                  </div>
                                </td>
                              @endif
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
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
  <!-- Page level plugins -->
  <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script>
    function deleteBtn() {
      Swal.fire({
        title: 'Anda yakin ingin menghapus data?',
        text: "Data yang telah dihapus tidak dapat diubah kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74a3b',
        cancelButtonColor: '#858796',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus Data'
      }).then((result) => {
        if (result.isConfirmed) {
          form = document.querySelector('#deleteForm')
          form.submit()
        }
      })
    }
  </script>
@endpush