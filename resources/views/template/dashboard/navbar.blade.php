<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
          class="fas fa-bars"></i></a>
    </li>
  </ul>

  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-transparent">
      <i class="fa fa-sign-out-alt"></i>
      Logout
    </button>
  </form>
</nav>
