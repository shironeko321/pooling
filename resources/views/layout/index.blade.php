<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  @stack('style')

  <style>
    body {
      background-image: url({{ asset('assets/img/photo4.jpg') }});
      background-attachment: fixed;
      background-size: cover;
    }

    body>div {
      background: rgba(0, 0, 0, .4)
    }
  </style>

</head>

<body>
  @yield('content')

  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
  @stack('script')
</body>

</html>
