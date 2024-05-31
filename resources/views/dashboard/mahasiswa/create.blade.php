@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4>Tambah Baru</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="nama" class="form-control" id="name"
                  placeholder="Nama" value="{{ old('nama') }}">
              </div>
              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="nim" name="nim" class="form-control" id="nim"
                  placeholder="NIM" value="{{ old('nim') }}">
              </div>
              <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                  placeholder="Tanggal lahir" value="{{ old('tgl_lahir') }}">
              </div>
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan"
                  placeholder="Jurusan" value="{{ old('jurusan') }}">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@push('script')
  @if (session()->has('msg'))
    <script>
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        autohide: true,
        delay: 5000,
        body: "{{ session()->get('msg') }}"
      })
    </script>
  @endif

  @if ($errors->any())
    <script>
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Warning',
        autohide: true,
        delay: 10000,
        body: "<ul>@foreach ($errors->all() as $error)<li> {{ $error }} </li>@endforeach</ul>"
      })
    </script>
  @endif
@endpush
