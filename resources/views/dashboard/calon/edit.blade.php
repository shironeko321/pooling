@extends('layout.dashboard')

@push('style')
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

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
        <div class="card-header">
          <h4>Edit Calon</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('calon.update', ['calon' => $data->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <img src='{{ asset("storage/images/$data->gambar") }}' alt=""
                      width="200">
                  </div>
                  <div class="col">
                    <label for="gambar">Gambar ketua dan Wakil Ketua</label>
                    <input type="file" name="gambar" class="form-control-file" id="gambar">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ketua_id">Nama Ketua</label>
                <select name="ketua_id" class="form-control select2" id="ketua_id"
                  style="width: 100%">
                  @foreach ($mahasiswa as $item)
                    <option value="{{ $item->id }}" @selected($data->ketua_id == $item->id)>
                      {{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="nama_wakil_ketua">Nama wakil Ketua</label>
                <select name="wakil_ketua_id" class="form-control select2" id="wakil_ketua_id"
                  style="width: 100%">
                  @foreach ($mahasiswa as $item)
                    <option value="{{ $item->id }}" @selected($data->wakil_ketua_id == $item->id)>
                      {{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Visi</label>
                <textarea id="visi" name="visi">{!! $data->visi !!}</textarea>
              </div>
              <div class="form-group">
                <label>Misi</label>
                <textarea id="misi" name="misi">{!! $data->misi !!}</textarea>
              </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection

@push('script')
  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script>
    $('.select2').select2()
    $('#visi').summernote()
    $('#misi').summernote()
  </script>

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
