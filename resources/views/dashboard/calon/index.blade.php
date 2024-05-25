@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Calon</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Calon</li>
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
          <a href="{{ route('calon.create') }}" class="btn btn-primary">Tambah</a>
          <table class="table">
            <thead>
              <th>*</th>
              <th>Gambar</th>
              <th>Nama Ketua</th>
              <th>Nama Wakil Ketua</th>
              <th>Action</th>
            </thead>
            <tbody>
              @foreach ($collection as $item)
                <tr>
                  @if ($item->kotak_kosong != 1)
                    <th>{{ $collection->firstItem() + $loop->index }}</th>
                    <td><img src='{{ asset("storage/images/$item->gambar") }}' alt=""
                        width="150"></td>
                    <td>{{ $item->calonketua->nama }}</td>
                    <td>{{ $item->calonwakilketua->nama }}</td>
                  @else
                    <th>{{ $collection->firstItem() + $loop->index }}</th>
                    <td>-</td>
                    <td>Kotak Kosong</td>
                    <td>Kotak Kosong</td>
                  @endif
                  <td>
                    @if ($item->kotak_kosong != 1)
                      <a href="{{ route('calon.show', ['calon' => $item->id]) }}"
                        class="btn btn-info">Detail</a>
                      <a href="{{ route('calon.edit', ['calon' => $item->id]) }}"
                        class="btn btn-success">Edit</a>
                    @endif
                    <button data-toggle="modal" data-target="#delete-{{ $item->id }}"
                      class="btn btn-danger">Delete</button>
                  </td>

                  <div class="modal fade" id="delete-{{ $item->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Calon</h4>
                          <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @if ($item->kotak_kosong != 1)
                            <p>Hapus Calon {{ $item->calonketua->nama }}</p>
                          @else
                            <p>Hapus Kotak Kosong</p>
                          @endif
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close</button>
                          <form action="{{ route('calon.destroy', ['calon' => $item->id]) }}"
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
