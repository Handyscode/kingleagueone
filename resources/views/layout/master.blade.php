<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body id="page-top">
  @yield('content')
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script>
    let qrbox = 0;
    if (screen.width >= 1024 ) {
      qrbox = 250;
    } else{
      qrbox = 150;
    }
    var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: qrbox });
    function onScanSuccess(c, e) {
      console.log(`Scan result: ${c}`)
      html5QrcodeScanner.clear();
      $('#scanQRModal').modal('hide')
      window.location.href = c;
    }

    $('#scanQRModal').on('hide.bs.modal', function (e) {
      html5QrcodeScanner.clear()
    })

    $('#scanQRModal').on('show.bs.modal', function (e) {
      html5QrcodeScanner.render(onScanSuccess);
    })
  </script>
  @stack('script')
</body>
</html>