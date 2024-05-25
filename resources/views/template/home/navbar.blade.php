<nav class="navbar bg-black" data-bs-theme="dark" style="--bs-bg-opacity: .9">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="{{ route('ayopilih') }}">Ayo Pilih</a>

    <span class="text-white">{{ Auth::guard('mahasiswa')->user()->nama }}</span>
    <form action="{{ route('ayopilih.logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn text-white">
        <i class="fa fa-sign-out-alt"></i>
        Logout
      </button>
    </form>
  </div>
</nav>
