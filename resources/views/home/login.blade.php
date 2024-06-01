<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

  <style>
    :root {
      --image: {{ asset('assets/img/photo1.png') }}
    }

    body {
      background-image: url(--image);
      background-size: cover;
    }
  </style>
</head>

<body>
  <div class="min-vh-100 d-flex align-items-center justify-content-center bg-black"
    style="--bs-bg-opacity: .4">
    <div class="bg-dark border rounded text-left p-5" style="--bs-bg-opacity: .9">
      <h4>Hello! let's get started</h4>
      <h6 class="font-weight-light">Sign in to continue.</h6>

      @if ($errors->any())
        <div class="alert alert-warning ps-3">
          @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            <br>
          @endforeach
        </div>
      @endif

      <form action="{{ route('ayopilih.auth') }}" method="POST" class="pt-3">
        @csrf
        <div class="form-group mb-3">
          <input type="text" name="nim" class="form-control" placeholder="NIM"
            value="{{ old('nim') }}">
        </div>
        <div class="form-group mb-3">
          <input type="text" name="tgl_lahir" onfocus="(this.type='date')"
            onblur="(this.type='text')" class="form-control" placeholder="Tanggal Lahir">
        </div>
        <div class="mt-3 d-grid gap-2">
          <button type="submit" class="btn btn-primary btn-lg font-weight-medium">SIGN
            IN</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>
