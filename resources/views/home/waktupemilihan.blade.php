<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Waktu Pemilihan</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
  <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
    <h2>{{ $msg }}</h2>
    <time>{{ $time }}</time>
    <a href="{{ route('ayopilih') }}" class="btn btn-primary">Kembali Ke Login</a>
  </div>

</body>

</html>
