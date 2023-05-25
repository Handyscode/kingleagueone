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
          <h1 class="h3 mb-0 text-gray-800">List Tim</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Tim</h6>
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
                                <th>Logo Tim</th>
                                <th>Nama Tim</th>
                                <th>Nama Pelatih</th>
                                <th>Kategori Usia</th>
                                <th>Jumlah Pertandingan</th>
                                <th>Jumlah Poin</th>
                                @if (Auth::user()->role == 'admin')
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Logo Tim</th>
                              <th>Nama Tim</th>
                              <th>Nama Pelatih</th>
                              <th>Kategori Usia</th>
                              <th>Jumlah Pertandingan</th>
                              <th>Jumlah Poin</th>
                              @if (Auth::user()->role == 'admin')
                              <th>Actions</th>
                              @endif
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($tims as $p => $tim)                              
                            <tr>
                              <td>
                                {{ $p+1 }}
                              </td>
                              <td>
                                <img src="{{ asset('storage/'.$tim->logo_tim) }}" alt="" class="img-preview img-fluid" width="75" id="KKPreview">
                              </td>
                              <td>{{ $tim->nama_tim }}</td>
                              <td>{{ $tim->nama_pelatih }}</td>
                              <td>{{ $tim->kategori_usia }}</td>
                              <td>{{ $tim->jumlah_pertandingan }}</td>
                              <td>{{ $tim->jumlah_poin }}</td>
                              @if (Auth::user()->role == 'admin')
                                <td>
                                  <div class="actionBtn d-flex align-items-center justify-content-center">
                                    <div class="editBtn">
                                      <a href="/list-tim/edit-tim/{{ $tim->id_tim }}" class="btn btn-secondary text-white"><i class="fa-solid fa-pencil"></i></a>
                                    </div>
                                    <div class="deleteBtn ml-3">
                                      <form action="/list-tim/delete-tim/{{ $tim->id_tim }}" method="post" id="deleteForm">
                                        @csrf
                                        <input type="hidden" name="id_tim">
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