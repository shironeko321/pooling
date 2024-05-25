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
          <h4>Tambah Baru</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('calon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" id="kotakkosong">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="kotak_kosong"
                    id="kotak_kosong" value="1">
                  <label class="custom-control-label" for="kotak_kosong">Kotak Kosong</label>
                </div>
              </div>
            </div>
            <div class="card-body" id="form">
              <div class="form-group">
                <label for="gambar">Gambar ketua dan Wakil Ketua</label>
                <input type="file" name="gambar" class="form-control-file" id="gambar">
              </div>
              <div class="form-group">
                <label for="ketua_id">Nama Ketua</label>
                <select name="ketua_id" class="form-control select2" id="ketua_id"
                  style="width: 100%">
                  @foreach ($mahasiswa as $item)
                    <option value="{{ $item->id }}" @selected(old('ketua_id') == $item->id)>
                      {{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="nama_wakil_ketua">Nama wakil Ketua</label>
                <select name="wakil_ketua_id" class="form-control select2" id="wakil_ketua_id"
                  style="width: 100%">
                  @foreach ($mahasiswa as $item)
                    <option value="{{ $item->id }}" @selected(old('wakil_ketua_id') == $item->id)>
                      {{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Visi</label>
                <textarea id="visi" name="visi">{!! old('visi') !!}</textarea>
              </div>
              <div class="form-group">
                <label>Misi</label>
                <textarea id="misi" name="misi">{!! old('misi') !!}</textarea>
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
  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

  {{-- disable semua input ketika kotak kosong true --}}
  <script>
    let kotak_kosong = $('#kotak_kosong')
    let gambar = $('#gambar')
    let ketua_id = $('#ketua_id')
    let wakil_ketua_id = $('#wakil_ketua_id')
    let visi = $('#visi')
    let misi = $('#misi')
    let form = $('#form')

    kotak_kosong.change(check)

    function check() {
      if (this.checked) {
        gambar.prop('disabled', true)
        ketua_id.prop('disabled', true)
        wakil_ketua_id.prop('disabled', true)
        visi.prop('disabled', true)
        misi.prop('disabled', true)
        visi.summernote('disable')
        misi.summernote('disable')

        form.fadeOut(200)
      } else {
        gambar.prop('disabled', false)
        ketua_id.prop('disabled', false)
        wakil_ketua_id.prop('disabled', false)
        visi.prop('disabled', false)
        misi.prop('disabled', false)
        visi.summernote('enable')
        misi.summernote('enable')

        form.fadeIn(200)
      }
    }

    $(document).ready(function() {
      check()
    })
  </script>

  {{-- select and textbox --}}
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
