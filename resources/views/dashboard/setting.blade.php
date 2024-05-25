@extends('layout.dashboard')

@section('main')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid row justify-content-between px-4">
      {{-- form open pemilihan --}}
      <div class="card col col-md-8">
        <div class="card-header">
          <h5>Waktu buka dan tutup pemilihan</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('setting.waktuPemilihan') }}" method="POST">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="form-group">
                <label for="buka">Buka</label>
                <input type="datetime-local" name="buka_poling" class="form-control" id="buka_poling"
                  placeholder="Buka Poling" value="{{ $pengaturan->buka_poling }}">
              </div>
              <div class="form-group">
                <label for="tutup">Tutup</label>
                <input type="datetime-local" name="tutup_poling" class="form-control"
                  id="tutup_poling" placeholder="Tutup Poling"
                  value="{{ $pengaturan->tutup_poling }}">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>

      {{-- reset pilihan mahasiswa --}}
      <div class="col col-md-3">
        <div class="card">
          <div class="card-header">
            <h5>Reset Pemilihan</h5>
          </div>
          <div class="card-body" id="clear_pilihan_mahasiswa">
            <div class="card-body">
              <div class="card-title">Reset Pemilihan</div>
            </div>
            <div class="card-footer">
              <button data-toggle="modal" data-target="#resetPemilihan" class="btn btn-danger">Reset
                Pemilihan</button>
              <div class="modal fade" id="resetPemilihan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Reset Pemilihan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Anda yakin ingin mereset data pemilihan saat ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default"
                        data-dismiss="modal">Close</button>
                      <form action="{{ route('setting.resetPemilihan') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reset Pilihan</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
          </div>
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
