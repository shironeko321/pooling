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
        <div class="card-body">
          <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
          <table class="table">
            <thead>
              <th>*</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach ($collection as $item)
                <tr>
                  <th>{{ $collection->firstItem() + $loop->index }}</th>
                  <td>{{ $item->nim }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->jurusan }}</td>
                  <td>
                    <a href="{{ route('mahasiswa.edit', ['mahasiswa' => $item->id]) }}"
                      class="btn btn-success">Edit</a>
                    <button data-toggle="modal" data-target="#delete-{{ $item->id }}"
                      class="btn btn-danger">Delete</button>
                  </td>

                  <div class="modal fade" id="delete-{{ $item->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Mahasiswa</h4>
                          <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Hapus Mahasiswa {{ $item->nama }}</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                          <form action="{{ route('mahasiswa.destroy', ['mahasiswa' => $item->id]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $collection->links() }}
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@if (session()->has('msg'))
  @push('script')
    <script>
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        autohide: true,
        delay: 5000,
        body: "{{ session()->get('msg') }}"
      })
    </script>
  @endpush
@endif
