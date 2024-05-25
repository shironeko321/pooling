@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
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
          <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name"
                  placeholder="Nama" value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email"
                  placeholder="Email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                  placeholder="Password">
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
