@extends('layout.index')

@push('style')
  <style>
    :root {
      --bs-link-color: white;
      --bs-link-hover-color: white;
    }
  </style>
@endpush

@section('content')
  <div class="min-vh-100 d-flex flex-column">
    @include('template.home.navbar')

    <div class="container h-100 flex-grow-1 d-flex flex-column">
      <div class="my-3 d-inline-flex justify-content-between">
        <a href="{{ route('ayopilih') }}" class="btn btn-primary">Kembali</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
          data-bs-target="#calonmodal">
          Pilih Calon
        </button>

        <!-- Modal -->
        <div class="modal fade" id="calonmodal" tabindex="-1" aria-labelledby="calonmodallabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="calonmodallabel">Peringatan Memilih</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Anda Yakin Ingin memilih</p>

                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Calon Ketua</p>
                    <p class="card-subtitle mb-2 text-body-secondary">
                      {{ $data->calonketua->jurusan }}</p>
                    <p class="card-text">{{ $data->calonketua->nama }}</p>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Calon Wakil Ketua</p>
                    <p class="card-subtitle mb-2 text-body-secondary">
                      {{ $data->calonwakilketua->jurusan }}</p>
                    <p class="card-text">{{ $data->calonwakilketua->nama }}</p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('pilih') }}" method="post">
                  @csrf
                  <input type="hidden" name="pilihan" value="{{ $data->id }}">
                  <button type="submit" class="btn btn-primary">Pilih</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card bg-dark" style="--bs-bg-opacity: .95">
        <div class="card-header">
          <ul class="nav nav-tabs mb-3 card-header-tabs flex-nowrap overflow-x-auto overflow-y-hidden"
            id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="gambar-tab" data-bs-toggle="tab"
                data-bs-target="#gambar-tab-pane" type="button" role="tab"
                aria-controls="gambar-tab-pane" aria-selected="true">Gambar</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#profile-tab-pane" type="button" role="tab"
                aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="visi-tab" data-bs-toggle="tab"
                data-bs-target="#visi-tab-pane" type="button" role="tab"
                aria-controls="contact-tab-pane" aria-selected="false">Visi</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="disabled-tab" data-bs-toggle="tab"
                data-bs-target="#misi-tab-pane" type="button" role="tab"
                aria-controls="misi-tab-pane" aria-selected="false">Misi</button>
            </li>
          </ul>
        </div>

        <div class="card-body">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="gambar-tab-pane" role="tabpanel"
              aria-labelledby="misi-tab" tabindex="0">
              <div class="card mt-2">
                <img src='{{ asset("storage/images/$data->gambar") }}' class="card-img-top"
                  data-bs-toggle="modal" data-bs-target="#gambarmodal">
              </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
              aria-labelledby="profile-tab" tabindex="0">
              <div class="card mt-2">
                <div class="card-header">Calon Ketua</div>
                <div class="card-body">
                  <div class="row">
                    <span class="col-4 col-md-2">Nama</span>
                    <span class="col-7 col-md-9">{{ $data->calonketua->nama }}</span>
                  </div>
                  <div class="row">
                    <span class="col-4 col-md-2">NIM</span>
                    <span class="col-7 col-md-9">{{ $data->calonketua->nim }}</span>
                  </div>
                  <div class="row">
                    <span class="col-4 col-md-2">Jurusan</span>
                    <span class="col-7 col-md-9">{{ $data->calonketua->jurusan }}</span>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">Calon Wakil Ketua</div>
                <div class="card-body">
                  <div class="row">
                    <span class="col-4 col-md-2">Nama</span>
                    <span class="col-7 col-md-9">{{ $data->calonwakilketua->nama }}</span>
                  </div>
                  <div class="row">
                    <span class="col-4 col-md-2">NIM</span>
                    <span class="col-7 col-md-9">{{ $data->calonwakilketua->nim }}</span>
                  </div>
                  <div class="row">
                    <span class="col-4 col-md-2">Jurusan</span>
                    <span class="col-7 col-md-9">{{ $data->calonwakilketua->jurusan }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="visi-tab-pane" role="tabpanel"
              aria-labelledby="visi-tab" tabindex="0">
              <div class="card mt-2">
                <div class="card-body">
                  {!! $data->visi !!}
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="misi-tab-pane" role="tabpanel"
              aria-labelledby="misi-tab" tabindex="0">
              <div class="card mt-2">
                <div class="card-body">
                  {!! $data->misi !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- image --}}
      <div class="modal fade" id="gambarmodal" tabindex="-1" aria-labelledby="gambarmodallabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="gambarmodallabel">Gambar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src='{{ asset("storage/images/$data->gambar") }}' class="w-100">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
