<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

  <style>
    body {
      background-image: url({{ asset('assets/img/photo2.png') }});
      background-size: cover;
    }
  </style>
</head>

<body>
  <div class="min-vh-100 d-flex align-items-center justify-content-center bg-dark"
    style="--bs-bg-opacity: .4">
    <div class="bg-white rounded text-left p-5"
      style="--bs-bg-opacity: .3; backdrop-filter: blur(30px)">
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

      <form action="{{ route('auth') }}" method="POST" class="pt-3">
        @csrf
        <div class="form-group mb-3">
          <input type="email" name="email" class="form-control" autofocus placeholder="Email"
            value="{{ old('email') }}">
        </div>
        <div class="form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
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
